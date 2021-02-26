<!DOCTYPE html>
<?php
   include("config.php");
   session_start();
   if(isset($_POST)) {
      
      $myusername = $_POST['username'];
      $mypassword = md5($_POST['password']); 
    
      $sql = "SELECT * FROM user WHERE firstname = '$myusername' and password = '$mypassword'";

      $result = mysqli_query($db,$sql);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $row['id'];
         echo "<script>window.location.href = './index.php';</script>";
         // header("location: ./index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css"/> 
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <script src="jq/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
   <script src="jq/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="jq/css/validationEngine.jquery.css" type="text/css"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script>
$(document).ready(function(){
    $("#loginForm").validationEngine({
        promptPosition: "topRight:-90"
    });
});
</script>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" class="logform" name="loginform" action="" method="post" id="loginForm">
					<span class="login100-form-title">
						Please Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                  <input type="text" id="username" class="input100 validate[required]" placeholder="username" name = "username"/> 
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
               <input type="password" id="password" name = "password" class="input100 " placeholder="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
                  <input type="submit" name="submit" class="login100-form-btn" value = " Submit "/>
					</div>

					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>

					
				</form>
			</div>
		</div>
	</div>

<!-- <form class="logform" name="loginform" action="" method="post">
  <h2 class="text-center formHead animated bounceInDown">Please Login</h2><br>
    <input type="text" id="username" class="form-control" placeholder="username" name = "username"/> 
    <input type="password" id="password" name = "password" class="form-control" placeholder="password">
  <label class="checkbox">
    <input type="checkbox" value="rememberMe"> Remember me</label> 
    <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block loginbtn" value = " Submit "/><div class="reset-links text-center">
  </div>
</form> -->
</body>
<script src="js/cpanel.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
   $('.js-tilt').tilt({
      scale: 1.1
   })
</script>
<script src="js/main2.js"></script>
</html>