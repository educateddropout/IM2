
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
					<div class="w3-container tabSection" id="signUp" style="display:none">
					    <br>
					    <div class="w3-row w3-center"><h2><b>Create your account now!</b></h2></div>
					    <br>
					    <form name="signUpForm">
					        <div class="w3-row w3-border-top">
					        
					            <br>
					            <div class="w3-row-padding">
					                <div class="w3-half">
					                    <label><b>Username</b></label>
					                    <input class="w3-input w3-border" name="username" maxlength = "60" required>
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
					                </div>
					            </div>
					            <br>
					            <div class="w3-container">
					                <fieldset>
					                    <legend>Personal Information:</legend>
					                    <div class="w3-row-padding">
					                        <p>
					                        <div class="w3-third">
					                            <label>Name</label>
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
					                    <div class="w3-row-padding">
					                        <p>
					                        
					                        <div class="w3-twothird">
					                            <label>Address</label>
					                            <input class="w3-input w3-border" type="text" name="address" ng-model="su.address" maxlength = "100" required>
					                        </div>
					                        
					                        <div class="w3-third">
					                            <label>Birthday</label>
					                            <input class="w3-input w3-border" name="birthday" type="date" placeholder="mm/dd/yyyy" ng-model="su.birthday" required>
					                        </p>
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
					                                <label>Email Address</label>
					                                <input class="w3-input w3-border" type="email" name="emailAddress" ng-model="su.emailAddress" maxlength = "60" required>
					                            </div>
					                        </p>
					                    </div>
					                    <div class="w3-row-padding">
					                        <p>
					                            <div class="w3-half">
					                                <label>Contact Number</label>
					                                <input class="w3-input w3-border" type="text" name="contactNumber" maxlength="11" minlength="7" ng-model="su.contactNumber" required>
					                            </div>
					                            <div class="w3-half">
					                                <label>Other Contact Number</label>
					                                <input class="w3-input w3-border" type="text" maxlength="11" minlength="7" ng-model="su.oContactNumber">
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
