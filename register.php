<?php
	$pageTitle = 'Register';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	
	if(isset($_SESSION['user'])){
		require ('includes/loginfunctions.inc.php');	
		redirect_user();
		exit();
	}
	
	if(isset($_POST['submit2'])) { // Handle the form.
	
		// Need the database connection:
		require (MYSQL);
		
		// Trim all the incoming data:
		$trimmed = array_map('trim', $_POST);
	
		// Assume invalid values:
		$fn = $ln = $e = $p = FALSE;
		
		// Check for a user name:
		if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['username'])) {
			$un = mysqli_real_escape_string ($db, $trimmed['username']);
		} else {
			echo '<p class="error">Please enter a user name!</p>';
		}
		
		// Check for an email address:
		if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
			$e = mysqli_real_escape_string ($db, $trimmed['email']);
		} else {
			echo '<p class="error">Please enter a valid email address!</p>';
		}
	
		// Check for a password and match against the confirmed password:
		if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
			if ($trimmed['password1'] == $trimmed['password2']) {
				$p = mysqli_real_escape_string ($db, $trimmed['password1']);
			} else {
				echo '<p class="error">Your password did not match the confirmed password!</p>';
			}
		} else {
			echo '<p class="error">Please enter a valid password!</p>';
		}
		
		if ($un && $e && $p) {
	
			//only one of each email can be registered
			$q = "SELECT gggerID FROM ggger WHERE email= '$e'";
			
			$r = mysqli_query($db, $q) or die('Error checking email.' .mysqli_error($db) );
			
			
			if (mysqli_num_rows($r) == 0) {
	
				//create activation code
				$a = md5(uniqid(rand(), true));
	
				//add user
				$q = "INSERT INTO ggger (email, username, password, active, registerdate) VALUES (?, ?, SHA1(?),?, NOW())";
			
				$stmt = mysqli_prepare($db, $q) or die('Error creating user.' );
				// add values to the statement
				// does sanitation for you (s = string, i = integer, d = double, b = blob)
				mysqli_stmt_bind_param($stmt, "ssss",$e, $un, $p, $a);
				
				// execute the prepared statement
				mysqli_stmt_execute($stmt);
	
				if (mysqli_stmt_affected_rows($stmt) == 1) {
	
					//send the email
					$body = "Thank you for registering at geekgirlgamer. To activate your account, please click on this link:\n\n";
					$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
					mail($trimmed['email'], 'Registration Confirmation', $body, 'From: admin@geekgirlgamer.com');
					
					// Finish the page:
					echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
					include ('includes/footer.html.php'); // Include the HTML footer.
					exit(); // Stop the page.
					
				} else { // If it did not run OK.
					echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
				}
				
			} else { // The email address is not available.
				echo '<p class="error">That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
			}
			
		} else { // If one of the data tests failed.
			echo '<p class="error">Please try again.</p>';
		}
	
		mysqli_close($db);
	
	} // End of the main Submit conditional.
	?>
	<div id="leftcol">
    	<div id="userform">	
            <h1>Register</h1>
            <form action="register.php" method="post" id="register">
                <fieldset>
                
                <p><label for="username" >user name: </label>
                <input type="text" name="username" size="20" maxlength="20" value="<?php if (isset($trimmed['username'])) echo $trimmed['username']; ?>" /></p>
            
                <p><label for="email">email: </label>
                <input type="text" name="email" size="30" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" /> </p>
                    
                <p><label for="password">password: </label>
                <input type="password" name="password1" size="20" maxlength="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" /> 
                </p>
            
                <p><label for="password2">reenter password: </label>
                <input type="password" name="password2" size="20" maxlength="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" /></p>
                <p class="small">&emsp;Use only letters, numbers, and the underscore.<br>&emsp;Must be between 4 and 20 characters long.</p>
                </fieldset>
                <p class="small">already registered? <a href="./login.php">click here</a></p>
                <div><input id="submit" type="submit" name="submit2" value="Register" /></div>
            
            </form>
        </div>
     </div>
	
	<?php include ('includes/footer.html.php'); ?>