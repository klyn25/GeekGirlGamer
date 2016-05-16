<?php

function redirect_user($page = 'index.php'){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);	
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	
	header("Location: $url");
	exit();
} //end of redirect user function

function check_login($db, $user = '', $pass = ''){
	$errors = array();
	//checks to see if a value was entered into username
	if (empty($user)){
		$errors[] = 'You forgot to enter your user name.';
	}else{
		$u = mysqli_real_escape_string($db, trim($user));
	}
	//checks to see if a value was entered into password
	if (empty($pass)){
		$errors[] = "You forgot to enter your password.";
	}else{
		$p = mysqli_real_escape_string($db, trim($pass));
	}
	
	if(empty($errors)){
		$q = "SELECT u.username, s.styleID  FROM ggger AS u INNER JOIN style AS s WHERE username = '$u' AND password=SHA1('$p')";
		$r = @mysqli_query ($db, $q); 	
	
		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		}else{
			$errors[] = 'The username and password do not match those on file.';	
		}
		
		return array(false, $errors);
	}
	
}// end of check_login