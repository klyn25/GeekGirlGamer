<?php 
// activates the  account 
$pageTitle = 'Activate';
include('/includes/header.html.php');
include('/includes/nav.html.php');

// If $x and $y don't exist or aren't of the proper format, redirect the user:
if (isset($_GET['x'], $_GET['y']) 
	&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)
	&& (strlen($_GET['y']) == 32 )
	) {

	// update the database...
	require (MYSQL);
	$q = "UPDATE ggger SET active=NULL WHERE (email='" . mysqli_real_escape_string($db, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($db, $_GET['y']) . "') LIMIT 1";
	$r = mysqli_query ($db, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($db));
	
	// Print a customized message:
	if (mysqli_affected_rows($db) == 1) {
		echo "<h3>Your account is now active. You may now log in.</h3>";
	} else {
		echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>'; 
	}

	mysqli_close($db);

} else { // Redirect.

	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.

} // end of if else

include ('/includes/footer.html.php');
?>