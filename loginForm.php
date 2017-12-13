<?php

require_once "Login.php";

$login = new Login();

if (isset($_SESSION['username'])) {
	if ($_SESSION['level']==0) {
		header("location:halamanA.php");
	}else{
		header("location:halamanB.php");
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
<h1>Login</h1>

<form method="POST" action="">
	<table>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="reset" name="reset" value="RESET">
				<input type="submit" name="login" value="LOGIN">
			</td>
		</tr>
	</table>
</form>

</body>
</html>

