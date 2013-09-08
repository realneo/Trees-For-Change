<?php
	session_start();
	require_once('db_conn.php');
	
	// Get data from the form
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Check if the Username and Password are both entered
	if($username == true AND $password == true){
		// Check if the Username and Password are correct from database
		$q = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
		if(mysql_numrows($q) == 1){
			// Assign sessions
			while($row = mysql_fetch_array($q)){
				$_SESSION['userID'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$alert = "<div class='alert alert-success'>Successfully Logged In</div>";
				$_SESSION['alert'] = $alert;
				header("Location: ../home.php");
			}
		}else{
			$alert = "<div class='alert alert-error'>Username or Password is incorrect.</div>";
			$_SESSION['alert'] = $alert;
			header("Location: ../index.php");
		}
	}else{
		$alert = "<div class='alert alert-block'>Pleaes Fill in both fields.</div>";
		$_SESSION['alert'] = $alert;
		header("Location: ../index.php");
	}
	

?>