<?php session_start(); require('system.ctrl.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TALKER</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
	<div class="row justify-content-md-center">
		<div class="col-12 col-md-auto"><h1>TALKER | SIGN UP</h1></div>
	</div>
<!-- to show the alert mesage where the validation is true or not -->

<?php 
	if(isset($_SESSION["msgid"])&&$_SESSION["msgid"]!=""){
		echo (phpShowFeedback($_SESSION["msgid"]));
		$_SESSION["msgid"]="";
	}
?>
	
	<hr><br>

	<div class="row">
		<div class="col-6">
		    
			<!-- this is the form -->
			<form name="formSignUp" method="POST" action="signup.ctrl.php">
				<div class="form-group">
					<label for="formSignUpEmail">Email address</label>
					<input type="email" class="form-control" id="formSignUpEmail" placeholder="Enter your email address" required
					pattern="^[\w]{1,}[\w.+-]{0,}@[a-zA-Z0–9]{1,}[\w-]{1,}([.][a-zA-Z]{2,}|[.][a-zA-Z0–9]{1,}[\w-]{1,}[.][a-zA-Z]{2,})$"
					name="formSignUpEmail">
				</div>
				<div class="form-group">
					<label for="formSignUpPassword">Password</label>
					<input type="password" class="form-control" id="formSignUpPassword" placeholder="Enter your password" required
					pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}" onkeyup="jsSignUpValidatePassword()"
					name="formSignUpPassword">

					<input type="password" class="form-control mt-4" id="formSignUpPasswordConf" placeholder="Confirm your password" required
					pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}" onkeyup="jsSignUpValidatePassword();" name="formSignUpPasswordConf">
				</div>
				<p id="password_comparison"></p>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

		<div class="col-6">
			<p>Hello and welcome to Talker! We are very happy that you want to join our great community!</p>
			<p>Please, enter your email and password. Your must have access to your email because we will send
          a confirmation code to that address. Your password must be between 8 and 16 characters long, with at
          least one uppercase and one lowercase character, one number and one special character (@, *, $ or #).</p>
			<p>We hope you'll enjoy Talker!</p>
		</div>
	</div>
</div>


    <!-- Javascript -->
	<script>
      var jsSignUpPassword = document.getElementById("formSignUpPassword");
      var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");

      //it check the wherther the pasword and conform password is true or not
      function jsSignUpValidatePassword(){
        if(jsSignUpPassword.value != jsSignUpPasswordConf.value) {
          jsSignUpPasswordConf.setCustomValidity("Passwords don't match!");
		 document.getElementById("password_comparison").innerHTML = "<div class='alert alert-danger' role='alert'>Passwords don't match!</div>";
        } else {
          jsSignUpPasswordConf.setCustomValidity('');
		 document.getElementById("password_comparison").innerHTML = "";
        }
      }

    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>