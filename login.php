
<?php
	$loginCtr = 2; // 0 means sign up - 1 means sig in 
	if(isset($_GET['lCtr'])){
		$loginCtr = $_GET['lCtr'];
	}
	
?>
<!DOCTYPE html>
<html>
<title>Registration/Login Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lib/css/v4/w3.css">
<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="lib/js/angular.min.js"></script>
<script type="text/javascript" src="lib/js/jquery-2.1.3.js"></script>
<script type="text/javascript" src="Angular/login.js"></script>
<style type="text/css">
	.w3-select1{padding:10px 0;width:100%;border:none;border-bottom:1px solid #ccc}
</style>
<body class="w3-light-grey" ng-app="login">
	<!-- Navbar (sit on top) -->
	<div class="w3-top">
	  <div class="w3-white w3-wide w3-padding w3-card-2 w3-hover-white">
	  	<div class="w3-center">
	    	<a href="#home" class="w3-bar-item w3-button"><span class="w3-text-purple"><b>IM</b></span><span class="w3-text-blue">LifeStyle</span></a>
	    </div>
	  </div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<div class="w3-container">
		<div class="w3-row">
			<div class="w3-col m3">&nbsp</div>
			<div class="w3-col m6 w3-white">
				<div class="w3-row w3-text-grey">
					<input type="text" id="loginCtr" value="<?php echo $loginCtr; ?>" hidden>
					<!-- Sign In / Sign Up Tab -->
					<div class="w3-row w3-center">
						<a href="login.php?lCtr=0">
							<div class="w3-half tablink w3-padding" ><b>SIGN UP</b></div>
						</a>
						<a href="login.php?lCtr=1">
							<div class="w3-half tablink w3-padding" ><b>SIGN IN</b></div>
						</a>
					</div>

					<!-- Sign Up Section -->
					<div class="w3-container tabSection" id="signUp" style="display:none" ng-controller="signUpCtrl as su">
					    <br>
					    <div class="w3-row w3-center"><h2><b>Create your account now!</b></h2></div>
					    <br>
					    <form name="signUpForm">
					        <div class="w3-row w3-border-top">
					        
					            <br>
					            <div class="w3-row-padding">
					                <div class="w3-half">
					                    <label><b>Username</b></label>
					                    <input class="w3-input w3-border" name="username" ng-model="su.username" maxlength = "60" required>
					                </div>
					            </div>
					            <br>
					            <div class="w3-row-padding">
					                <div class="w3-half">
					                    <label><b>Password</b></label>
					                    <input class="w3-input w3-border" type="password" name="password" ng-model="su.password" maxlength = "20" required>
					                </div>
					                <div class="w3-half">
					                    <label>&nbsp</label>
					                    <input class="w3-input w3-border" type="password" name="rePassword" ng-model="su.rePassword" maxlength = "20">
					                	<span class="w3-text-red" ng-show="signUpForm.rePassword.$touched && (su.rePassword != su.password) && (su.password != '')">These passwords don't match. Try again?</span>
					                </div>
					            </div>
					            <br>
					            <div class="w3-container">
					                <fieldset>
					                    <legend>Personal Information:</legend>
					                    <div class="w3-row-padding">
					                        <p>
					                        <div class="w3-third">
					                            <label><b>Name</b></label>
					                            <input class="w3-input w3-border" type="text" name="firstName" placeholder="First" ng-model="su.firstName" maxlength = "60" required>
					                        </div>
					                        <div class="w3-third">
					                            <label>&nbsp</label>
					                            <input class="w3-input w3-border" type="text" placeholder="Middle" ng-model="su.middleName" maxlength = "60">
					                            
					                        </div>
					                        <div class="w3-third">
					                            <label>&nbsp</label>
					                            <input class="w3-input w3-border" type="text" name="lastName" placeholder="Last" ng-model="su.lastName" maxlength = "60" required>
					                        </div>
					                        </p>
					                    </div>
					                    <div class="w3-container">
					                        <p>
					                            <label><b>Address</b></label>
					                            <input class="w3-input w3-border" type="text" name="address" ng-model="su.address" maxlength = "100" required>
					                        </p>
					                    </div>
					                    <div class="row">
					                        <div class="w3-col l7 w3-container">
					                            <label><b>Birthday</b></label>
					                            <div class='w3-row'>
					                            	<div class="w3-col m6 w3-padding-top">
					                            		<select class="w3-select1 w3-border" ng-model="su.selectedMonth" required>
					                            			<option class="w3-text-grey" value="" disabled selected>Month</option>
					                            			<option ng-repeat="x in su.month">{{x}}</option>
					                            		</select>
					                            	</div>
					                            	<div class="w3-col m3">
					                            		<div class="w3-container">
					                            			<input type="text" ng-model="su.selectedDay" class="w3-input w3-border" maxlength="2" placeholder="Day">
					                            		</div>
					                            	</div>
					                            	<div class="w3-col m3">
					                            		<input type="text" ng-model="su.selectedYear"  class="w3-input w3-border" maxlenght="4" placeholder="Year">
					                            	</div>
					                            </div>
					                            <label class="w3-text-red">{{su.eBirthday}}</label>
					                        </div>
					                    </div>
					                </fieldset>
					            </div>

					        </div>
					        <div class="w3-row">
					            <br>
					            <div class="w3-container">
					                <fieldset>
					                    <legend>Other Information:</legend>
					                    <div class="w3-row-padding">
					                        <p>
					                            <div class="w3-half">
					                                <label><b>Email Address</b></label>
					                                <input class="w3-input w3-border" type="email" name="emailAddress" ng-model="su.emailAddress" maxlength = "60" required>
					                            	<span class="w3-text-red" ng-show="signUpForm.emailAddress.$touched && signUpForm.emailAddress.$invalid && su.emailAddress != ''">Invalid email address</span>
					                            </div>
					                        </p>
					                    </div>
					                    <div class="w3-row-padding">
					                        <p>
					                            <div class="w3-half">
					                                <label><b>Contact Number</b></label>
					                                <input class="w3-input w3-border" type="text" name="contactNumber" maxlength="11" ng-model="su.contactNumber" required>
					                            	<label class="w3-text-red">{{su.eContactNumber}}</label>
					                            </div>
					                            <div class="w3-half">
					                                <label><b>Other Contact Number</b></label>
					                                <input class="w3-input w3-border" type="text" maxlength="11" ng-model="su.oContactNumber">
					                            	<label class="w3-text-red">{{su.eOContactNumber}}</label>
					                            </div>
					                        </p>
					                    </div>
					                    
					                </fieldset>
					            </div>
					        </div>
					        <br>
					        <div class="w3-container w3-center"> 
					                <button type="submit" class="w3-btn w3-border w3-round w3-blue w3-border-blue w3-hover-teal w3-padding w3-small" style="width: 200px" ng-click="su.signUpClick()"><b>SIGN UP</b></button>
					        </div>
					    </form>
					    <br>
					    <div class="w3-container w3-border-top w3-small">
					        <div class="w3-row w3-right w3-wide">
					            © <span class="w3-text-purple"><b>IM</b></span><span class="w3-text-blue">LifeStyle</span> 2017
					        </div>
					    </div>
					</div>
					<!-- End of Sign Up -->

					<!-- Sign In Section -->
					<div class="w3-container tabSection" id="signIn" style="display:none" ng-controller="signInCtrl as si">
						<br>
						<div class="w3-row">
							<div class="w3-col l2">&nbsp</div>
							<div class="w3-col l8">
								<h2><b>Sign In!</b></h2>
								Don't have an account yet? <a href="login.php" class="w3-text-blue"><b>Create a free account</b></a>
							</div>
							<div class="w3-col l2">&nbsp</div>

						</div>
						<br>
						<form >
							<div class="w3-row">
								<br>
								<div class='w3-row'>
									<div class="w3-col l2">&nbsp</div>
									<div class="w3-col l8">
										<label class="w3-text-red">{{si.errorMessage}}</label>
									</div>
									<div class="w3-col l2">&nbsp</div>
								</div>
								<div class='w3-row'>
									<div class="w3-col l2">&nbsp</div>
									<div class="w3-col l8">
										<label><b>Username</b></label>
										<input class="w3-input w3-border" type="text" ng-model="si.username" required>
									</div>
									<div class="w3-col l2">&nbsp</div>
								</div>
								<br>
								<div class='w3-row'>
									<div class="w3-col l2">&nbsp</div>
									<div class="w3-col l8">
										<label><b>Password</b></label>
										<input class="w3-input w3-border" type="Password" ng-model="si.password" required>
									</div>
									<div class="w3-col l2">&nbsp</div>
								</div>
							</div>
							<br>
							<div class="w3-container w3-center"> 
									<button class="w3-medium w3-btn w3-border w3-round w3-blue w3-border-blue w3-hover-teal w3-padding w3-small" ng-click="si.signInClick()" style="width: 200px"><b>Sign In</b></button>
							</div>
							<br>
							<div class="w3-container w3-border-top w3-small">
								<div class="w3-row w3-right w3-wide">
									© <span class="w3-text-purple"><b>IM</b></span><span class="w3-text-blue">LifeStyle</span> 2017
								</div>
							</div>
						</form>
					</div>
					<!-- End of Sign In -->

				</div>
			</div>
			<div class="w3-col m3">&nbsp</div>
		</div>
		<br>
		<br>
	</div>
</body>
<script>

	function openSectionOnLogin(sectionNum) {
	  var tablinks;
	  tablinks = document.getElementsByClassName("tablink");

	  if(sectionNum == 0){
	  	document.getElementById("signUp").style.display = "block";
	  	document.getElementById("signIn").style.display = "none";
	  	//tablinks[sectionNum].className = tablinks[sectionNum].className.replace(" w3-light-grey", "");
	  	tablinks[1].className += " w3-light-grey";
	  }
	  else{
	  	document.getElementById("signUp").style.display = "none";
	  	document.getElementById("signIn").style.display = "block";
	  	//tablinks[sectionNum].className = tablinks[sectionNum].className.replace(" w3-light-grey", "");
	  	tablinks[0].className += " w3-light-grey";
	  }
	}

	$(document).ready(function(){

		openSectionOnLogin($("#loginCtr").val());

	});
</script>
</html>
