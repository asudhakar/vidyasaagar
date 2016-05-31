<?php     	
	include_once '../controllers/function.php';
	if($_GET['action']=='logout'){
		logOut();
		header('location: login.php');
	}else{
		loginPageSessionCheck();
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Vefetch SMS API - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../css/logincss.css">
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/loginjs.js"></script>
</head>
<body>
<script src="//mymaplist.com/js/vendor/TweenLite.min.js"></script>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="#" method="post">
	                    <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" required placeholder="Username" name="username" type="text">
				    		</div>
				    		<div class="form-group">
				    			<input class="form-control" required placeholder="Password" name="password" type="password" value="">
				    		</div>
				    		<input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value="Login">
				    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(isValidateUser($username, $password)){
			loginPageSessionCheck();
		}
		echo 'Invalid user!';
	}