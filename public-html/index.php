<?php session_start(); require('system.ctrl.php'); ?>
<?php  ?>

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

<!-- SYSTEM-WIDE FEEDBACK -->
<?php if (isset($_SESSION["msgid"]) && $_SESSION["msgid"]!="" && phpShowSystemFeedback($_SESSION["msgid"])[0]!="") { ?>

<div class="row">
	<div class="col-12">
		<div class="alert alert-<?php echo (phpShowSystemFeedback($_SESSION['msgid'])[0]); ?>" role="alert">
			<?php echo (phpShowSystemFeedback($_SESSION['msgid'])[1]); ?>
		</div>
	</div>
</div>

<?php } ?>
<!-- SYSTEM-WIDE FEEDBACK -->

	
	<hr><br>

	<div class="row">
		<div class="col-6">
			<!-- this is the form -->
			<form name="formSignUp" method="POST" action="signup.ctrl.php" novalidate>
				<div class="form-group">
					<label for="formSignUpEmail">Email address</label>
					<input type="email" <?php echo (phpShowEmailInputValue($_SESSION['formSignUpEmail'])); ?>
					class="form-control <?php if ($_SESSION['msgid']!='801' && $_SESSION['msgid']!='')
					{echo 'is-valid';} else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); }?>" id="formSignUpEmail" placeholder="Enter your email address"
					name="formSignUpEmail" onkeyup="jsSignUpValidateEmail()">
					<?php if ($_SESSION['msgid']=='801') { ?>
					<div class="invalid-feedback"> <?php echo (phpShowInputFeedback($_SESSION['msgid'])[1]); ?></div>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="formSignUpPassword">Password</label>
					<input type="password" class="form-control <?php echo (phpShowInputFeedback($_SESSION["msgid"])[0]); ?>" id="formSignUpPassword" placeholder="Enter your password" 
					onkeyup="jsSignUpValidatePassword()"
					name="formSignUpPassword">
					<?php if($_SESSION["msgid"]=="802"){ ?>
					<div class="invalid-feedback"><?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?></div>
			        <?php } ?> 

					<input type="password" class="form-control mt-4 <?php echo (phpShowInputFeedback($_SESSION["msgid"])[0]); ?>" id="formSignUpPasswordConf" placeholder="Confirm your password" 
					onkeyup="jsSignUpValidatePassword();" name="formSignUpPasswordConf">
				    <?php if($_SESSION["msgid"]=="803"){ ?>
					<div class="invalid-feedback"><?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?></div>
			        <?php } ?> 
				</div>
				<button type="submit" id="formSignUpSubmit" class="btn btn-primary btn-success">Sign Up</button>
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

    <?php $_SESSION["msgid"]=""; $_SESSION['formSingnUpEmail']=""; ?>
    <!-- Javascript -->
	<script>
	  var jsSignUpEmail = document.getElementById("formSignUpEmail");
	  var jsEmailRegexPattern = /^[\w]{1,}[\w.+-]{0,}@[a-zA-Z0–9]{1,}[\w-]{1,}([.][a-zA-Z]{2,}|[.][a-zA-Z0–9]{1,}[\w-]{1,}[.][a-zA-Z]{2,})$/;
	  var jsSignUpPassword = document.getElementById("formSignUpPassword");
      var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");
      var jsPasswordRegexPattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}/;
	  document.getElementById("formSignUpSubmit").disabled = true;
	  document.getElementById("formSignUpSubmit").classList.remove("btn-success");
	  document.getElementById("formSignUpSubmit").classList.add("btn-danger");
	  function jsSignUpSubmitEnable() {
			if (jsEmailRegexPattern.test(jsSignUpEmail.value) && jsPasswordRegexPattern.test(jsSignUpPassword.value) && jsSignUpPassword.value == jsSignUpPasswordConf.value) {
				document.getElementById("formSignUpSubmit").disabled = false;
				document.getElementById("formSignUpSubmit").classList.remove("btn-danger");
	            document.getElementById("formSignUpSubmit").classList.add("btn-success");
			}else{
				document.getElementById("formSignUpSubmit").disabled = true;
				document.getElementById("formSignUpSubmit").classList.remove("btn-success");
	            document.getElementById("formSignUpSubmit").classList.add("btn-danger");
			}
		} 
	  //it check the wherther the pasword and conform password is true or not
	  function jsSignUpValidateEmail() {
		jsSignUpSubmitEnable();
		if(!jsEmailRegexPattern.test(jsSignUpEmail.value)) {
			if (!document.getElementById("formSignUpEmailInvalidFeedback")) {
				jsSignUpEmail.classList.add("is-invalid");
				var newElement = document.createElement("div");
				newElement.setAttribute("id", "formSignUpEmailInvalidFeedback");
				newElement.classList.add("invalid-feedback");
				var newElementContent = document.createTextNode("This is not a valid email address");
				newElement.appendChild(newElementContent);
				jsSignUpEmail.parentNode.insertBefore(newElement, jsSignUpEmail.nextSibling);
			}
		}else{
			if (document.getElementById("formSignUpEmailInvalidFeedback")) {
		document.getElementById("formSignUpEmailInvalidFeedback").parentElement.removeChild(document.getElementById("formSignUpEmailInvalidFeedback"));
		}
		jsSignUpEmail.classList.remove("is-invalid");
		jsSignUpEmail.classList.add("is-valid");
		}
	  }

	  
	  function jsSignUpValidatePassword(){
		jsSignUpSubmitEnable()
		if(!jsPasswordRegexPattern.test(jsSignUpPassword.value)){
			if(!document.getElementById("formSignUpPasswordInvalidFeedback")){
				jsSignUpPassword.classList.add("is-invalid");
				var newElement = document.createElement("div");
				newElement.setAttribute("id","formSignUpPasswordInvalidFeedback");
				newElement.classList.add("invalid-feedback");
				var newElementContent = document.createTextNode("Password must be between 8 and 16 characters long, with at least one uppercase and lowercase character, one number and one special character (@, *, $ or #).");
				newElement.appendChild(newElementContent);
				jsSignUpPassword.parentNode.insertBefore(newElement, jsSignUpPassword.nextSibling);
			}
		} else if(jsSignUpPassword.value != jsSignUpPasswordConf.value) {
			if(!document.getElementById("formSignUpPasswordConfInvalidFeedback")){
				jsSignUpPasswordConf.classList.add("is-invalid");
				var newElement = document.createElement("div");
				newElement.setAttribute("id","formSignUpPasswordConfInvalidFeedback");
				newElement.classList.add("invalid-feedback");
				var newElementContent = document.createTextNode("password doesn't match!!");
				newElement.appendChild(newElementContent);
				jsSignUpPasswordConf.parentNode.insertBefore(newElement, jsSignUpPasswordConf.nextSibling);
			}
			if (document.getElementById("formSignUpPasswordInvalidFeedback")){
				document.getElementById("formSignUpPasswordInvalidFeedback").parentElement.removeChild(
					document.getElementById("formSignUpPasswordInvalidFeedback"));
			}
			jsSignUpPassword.classList.remove("is-invalid");
			jsSignUpPassword.classList.add("is-valid");
	    } 
		else {
			if (document.getElementById("formSignUpPasswordConfInvalidFeedback")){
				document.getElementById("formSignUpPasswordConfInvalidFeedback").parentElement.removeChild(
					document.getElementById("formSignUpPasswordConfInvalidFeedback"));
			}
			jsSignUpPasswordConf.classList.remove("is-invalid");
			jsSignUpPasswordConf.classList.add("is-valid");
			
        }
      }

    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>