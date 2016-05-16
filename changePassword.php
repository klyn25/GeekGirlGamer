<?php
//change password

 
$pageTitle = 'Change Your Password';
include ('includes/header.html.php');
include ('includes/nav.html.php');

//if no user, redirect to homepage
if (!isset($_SESSION['user_id'])) {
		require ('includes/loginfunctions.inc.php');	
		redirect_user();
		exit();
	
	
}

if (isset($_POST['submit1'])) {
	require (MYSQL);
			
	// match password
	$p = FALSE;
	if (preg_match ('/^(\w){4,20}$/', $_POST['password1']) ) {
		if ($_POST['password1'] == $_POST['password2']) {
			$p = mysqli_real_escape_string ($db, $_POST['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	if ($p) {

		//update password
		$q = "UPDATE ggger SET password=SHA1(?) WHERE gggerID={$_SESSION['user_id']} LIMIT 1";
			
		$stmt = mysqli_prepare($db, $q) or die('Error changing password.' );
		// add values to the statement
		// does sanitation for you (s = string, i = integer, d = double, b = blob)
		mysqli_stmt_bind_param($stmt, "s",$p);
				
		// execute the prepared statement
		mysqli_stmt_execute($stmt);
				
		if (mysqli_stmt_affected_rows($stmt) == 1) {

			
			echo '<h3>Your password has been changed.</h3>';
			mysqli_close($db); 
			include ('includes/footer.html.php');
			exit();
			
		} else { 
		
			echo '<p class="error">Your password was not changed. Make sure your new password is different than the current password. Contact the system administrator if you think an error occurred.</p>'; 

		}

	} else { 
		echo '<p class="error">Please try again.</p>';		
	}
	
	mysqli_close($db);

}
?>
    <div id="leftcol">
        <div id="userform">	
            <h1>Change Your Password</h1>
            <form id="pass" action="changePassword.php" method="post">
                <fieldset>
                <p>New Password: <input type="password" name="password1" size="20" maxlength="20" /> </p>
                
                <p>Confirm New Password: <input type="password" name="password2" size="20" maxlength="20" /></p>
                
                <p class="small">Use only letters, numbers, and the underscore.</p>			 				<p class="small">Must be between 4 and 20 characters long.</p>
                </fieldset>
                <input type="submit" name="submit1" value="change password" id="submit" />
            </form>
         </div>
     </div>

			<?php include ('includes/footer.html.php'); ?>