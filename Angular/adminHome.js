(function(){
     var app = angular.module('adminHome', []);

     app.directive("sideBar", function(){
          return {
               retrict: 'E',
               templateUrl: "AdminCMS/im-AdminSideBar.html"
          }
     });

})();