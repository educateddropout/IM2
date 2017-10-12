(function(){
     var app = angular.module('login', []);

     app.controller('signUpCtrl', function ($scope, $http) {
          
          var su = this;
          this.eDupUsername = ""; // username already exist
          this.eBirthday = ""; // Invalid birthday
          this.eContactNumber = ""; // invalid contact number
          this.eOContactNumber= ""; // invalid other contact number
          this.errorMessage;
         
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

          
          this.month = [
               {    "name" : "January",
                    "value" : "01"
               },
               {    "name" : "February",
                    "value" : "02"
               },
               {    "name" : "March",
                    "value" : "03"
               },
               {    "name" : "April",
                    "value" : "04"
               },
               {    "name" : "May",
                    "value" : "05"
               },
               {    "name" : "June",
                    "value" : "06"
               },
               {    "name" : "July",
                    "value" : "07"
               },
               {    "name" : "August",
                    "value" : "08"
               },
               {    "name" : "September",
                    "value" : "09"
               },
               {    "name" : "October",
                    "value" : "10"
               },
               {    "name" : "November",
                    "value" : "11"
               },
               {    "name" : "December",
                    "value" : "12"
               }];

          this.signUpClick = function(){

               d = new Date();
               yearToday = d.getFullYear();
               errorIndD = 0; // Check if birthday is already valid
               errorIndC = 0; // Check if contact numbers is already valid
               
               if(this.selectedYear < (yearToday+1) && this.selectedYear > (yearToday-120)){

                    if(su.selectedMonth == "01" || su.selectedMonth == "03" || su.selectedMonth == "05" || su.selectedMonth == "07" ||  su.selectedMonth == "08" ||  su.selectedMonth == "10" || su.selectedMonth == "12"){
                         if(su.selectedDay > 31 || su.selectedDay < 1){
                              su.eBirthday = "Hmm. The day doesn't look right. Make sure it is valid day of a Month";
                              errorIndD = 1;
                         }
                    }
                    else if(su.selectedMonth == "04" || su.selectedMonth == "06" || su.selectedMonth == "09" || su.selectedMonth == "11"){
                         if(su.selectedDay > 31 || su.selectedDay < 1){
                              su.eBirthday = "Hmm. The day doesn't look right. Make sure it is valid day of a Month.";
                              errorIndD = 1;
                         }
                    }
                    else if(su.selectedMonth = "02"){
                         if(su.selectedYear % 4 == 0){
                              if(su.selectedDay > 29 || su.selectedDay < 1){
                                   su.eBirthday = "Hmm. The day doesn't look right. Make sure it is valid day of a Month.";
                                   errorIndD = 1;
                              }
                              
                         }
                         else{
                              if(this.selectedDay > 28 || su.selectedDay < 1){
                                   su.eBirthday = "Hmm. The day doesn't look right. Make sure it is valid day of a Month.";
                                   errorIndD = 1;
                              }
                         }
                    }
               }
               else{
                    su.eBirthday = "Hmm. The date doesn't look right. Make sure you use your actual year of birth.";
                    errorIndD = 1;
               }

               if(su.oContactNumber != "") su.eOContactNumber = validateContactNumber(su.oContactNumber); 
               if(su.contactNumber != "") su.eContactNumber = validateContactNumber(su.contactNumber); 




               if(errorIndD == 0){
                    su.eBirthday = "";
                    su.fBirthday = su.selectedYear + "-" + su.selectedMonth + "-" + su.selectedDay; // Already passed the date validation

                    if(su.eOContactNumber == "" && su.eContactNumber == "" ){
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
                              if(response.data.errorCtr == 0){
                                   window.location = "register.php";
                              }
                              else{
                                   su.errorMessage = response.data.errorMessage;     
                              }
                         }, function myError(response) {
                              console.log(response.status);
                         });
                    }
               }
          };
     });

     function validateContactNumber(num){

          if(!isNaN(num)){
               if(num.length == 7 || num.length == 11){
                    return ""; // valid contact number
                    
               }
               else{
                    return "Please provide 7 or 11 digits contact number."; // invalid contact number 
               }

          }
          else{
               return "Please provide a valid 7 or 11 digits contact number."; // invalid contact number
          }
     }

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