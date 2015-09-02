<!DOCTYPE html>
<html>
<head>
	<title>Login_registration</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if ($this->session->flashdata('login_error'))
{
	echo $this->session->flashdata('login_error');
}
?>

<div class ='container'>
<h1>Welcome!</h1>
	<div class = 'login'>
		<form action = '/users/login' method = 'post'>
			Email: <input type = 'text' name = 'email'><br>
			Password: <input type = 'text' name = 'password'><br>
			<input type = 'submit' value = 'Login'>
		</form>
	</div><hr>
	<div class = 'Registration'>
<?php


if ($this->session->flashdata('errors2'))
{
	echo $this->session->flashdata('errors2');
}
?>

		<form action = '/users/registration' method = 'post'>
			Name: <input type = 'text' name = 'name'><br>
			Alias: <input type = 'text' name = 'Alias'><br>
			Email Address: <input type = 'text' name = 'email'><br>
			Password: <input type = 'password' name = 'password'><br>
			<p>*Passwords should be at least 8 characters</p>
			Confirm Password: <input type = 'password' name = 'confirm_password'><br>
			<input type = 'submit' value = 'Register'>
		</form>
	</div>
</div>



</body>
</html>