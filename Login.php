<?php

require_once "config.php";

class Login
{
	public $mysqli;

	function __construct()
	{
		$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		session_start();

		$this->check_login();
	}

	function check_login()
	{

		if (isset($_POST['login'])) {
			$username = "";
			$password = "";

			if (empty($_POST['username']) || empty($_POST['password'])) {
				echo "<script>alert('Username or Password cannot be empty');</script>";
			} else {
			
			$username = isset($_POST['username']) ? $_POST['username'] : '';
			$password = isset($_POST['password']) ? $_POST['password'] : '';

			$username = stripcslashes($username);
			$password = stripcslashes($password);
			$username = $this->mysqli->real_escape_string($username);
			$password = $this->mysqli->real_escape_string($password);
			$password = md5($password);

			$sql = "SELECT * FROM account where username = '$username' AND password = '$password'";
			$result = $this->mysqli->query($sql);
			$rows = $result->num_rows;
			$row = $result->fetch_array(MYSQLI_BOTH);

				if ($rows == 1) {

					if ($row['level']==0) {
						$_SESSION['username'] = $username;
						$_SESSION['level'] = $row['level'];
						header("location:halamanA.php");
					}else{
						$_SESSION['level'] = $row['level'];
						$_SESSION['username'] = $username;
						header("location:halamanB.php");
					}
				} else {
					echo "<script>alert('Username or Password is invalid');</script>";
				}
			}
		} 

	}

}