(function(){
     var app = angular.module('adminProd', []);

     app.directive("sideBar", function(){
          return {
               retrict: 'E',
               templateUrl: "AdminCMS/im-AdminProdSideBar.html",
               controller: function ($scope, $http){
                    var userInfo = this;

                    $http({
                         method: "GET",
                         url: "userInfo.php"
                    }).then(function mySuccess(response) {
                         console.log(response.data);
                         if(response.data.errorCtr == 0){
                              userInfo.name =  response.data.name;
                              userInfo.id =  response.data.id;
                              userInfo.username =  response.data.username;
                              userInfo.userType =  response.data.userType;
                              console.log(userInfo.username);
                         }
                         else{
                              alert("You are not allowed to access this system.");
                              window.location = "login.php";
                         }
                    }, function myError(response) {
                         console.log(response.status);
                    });

                    this.logOut = function () {

                         $http({
                              method: "GET",
                              url: "logOut.php"
                         }).then(function mySuccess(response) {
                              window.location = "login.php";
                         }, function myError(response) {
                              console.log(response.status);
                         });

                    };
               },
               controllerAs: "userInfo"
          }
     });

     app.directive("adminProdContent", function(){
          return {
               retrict: 'E',
               templateUrl: "AdminCMS/im-AdminProdContent.html"
          }
     });


})();