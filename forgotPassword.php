<?php
//reset forgotten password
 
$pageTitle = 'Forgot Your Password';
include ('includes/header.html.php');
include ('includes/nav.html.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);

	$uid = FALSE;

	//validate the email 
	if (!empty($_POST['email'])) {

		//check for email address
		$q = 'SELECT gggerID FROM ggger WHERE email="'.  mysqli_real_escape_string ($db, $_POST['email']) . '"';
		$r = mysqli_query ($db, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($db));
		// get gggerID
		if (mysqli_num_rows($r) == 1) { 
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { 
			echo '<p class="error">The submitted email address does not match those on file!</p>';
		}
		
	} else {
		echo '<p class="error">You forgot to enter your email address!</p>';
	}//end email if 
	
	if ($uid) {

		//generate random password:
		$p = substr ( md5(uniqid(rand(), true)), 3, 10);

		//update database:
		$q = "UPDATE ggger SET password=SHA1('$p') WHERE gggerID=$uid LIMIT 1";
		$r = mysqli_query ($db, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($db));

		if (mysqli_affected_rows($db) == 1) { // If it ran OK.
		
			//send email
			$body = "Your password to log into geekgirlgamer has been temporarily changed to '$p'. Please log in using this password and this email address. Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@geekgirlgamer.com');
			
			//message
			echo '<h3>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</h3>';
			mysqli_close($db);
			include ('includes/footer.html.php');
			exit();
			
		} else { 
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
		}

	} else { 
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($db);

} // end request
?>
	<div id="leftcol">
    	<div id="userform">
        	<form id = "pass" action="forgotPassword.php" method="post">
                <fieldset>	
                <h1>Reset Your Password</h1>
                <p>Enter your email address below to reset your password.</p> 
            
                <p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
                </fieldset>
                <input type="submit" name="submit" value="reset password" id="submit" />
            </form>
         </div>
      </div>

		<?php include ('includes/footer.html.php'); ?>