(function(){
     var app = angular.module('login', []);

     /*app.controller('signUpCtrl', function ($scope, $http) {
          
          var su = this;
          this.eDupUsername = "yesyey"; // username already exist
         
          this.password = "";
          this.rPassword = "";
          this.firstName = "";
          this.middleName = "";
          this.lastName = "";
          this.birthday = "";
          this.address = "";
          this.emailAddress = "";
          this.contactNumber = "";
          this.oContactNumber = "";
          this.fBirthday = ""; // formatted birthday


          this.signUpClick = function(){
               
               errorInd = 0; // Check if there is still error in registration

               // birthday validation
               //su.fBirthday = new Date( su.birthday.getTime() + Math.abs(this.startDate.getTimezoneOffset()*60000) );
               
               
               this.responseMessage = $http({
                    method: "POST",
                    url: "register.php",
                    data: {
                         "username" : su.username,
                         "password" : su.password,
                         "firstName" : su.firstName,
                         "middleName" : su.middleName,
                         "lastName" : su.lastName,
                         "address" : su.address,
                         "birthday" : su.fBirthday,
                         "emailAddress" : su.emailAddress,
                         "contactNumber" : su.contactNumber,
                         "oContactNumber" : su.oContactNumber,
                            
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

               }).then(function mySuccess(response) {
                    console.log(response.data);
                    /*if(response.data.errorCtr == 0){
                         window.location = "home.php";
                    }
                    else{
                         lg.errorMessage = response.data.errorMessage;     
                    }
               }, function myError(response) {
                    console.log(response.status);
               });
          };
     });*/

     app.controller('signInCtrl', function ($scope, $http) {
          
          var si = this;
          this.errorMessage = "";

          this.signInClick = function(){

               this.responseMessage = $http({
                    method: "POST",
                    url: "loginVerify.php",
                    data: {
                         "username" : si.username,
                         "password" : si.password,
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

               }).then(function mySuccess(response) {
                    console.log(response.data);
                    if(response.data.queryError == 3){ // not valid
                         window.location = "adminHome.php";
                    }
                    else{
                         si.errorMessage = "Invalid username or password";     
                    }

               }, function myError(response) {
                    console.log(response.status);
               });
          };
     });

})();