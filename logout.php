<?php

	$pageTitle="Log out";
	//links to header
	include('./includes/header.html.php');
	
	
	if(!isset($_SESSION['user'])){
		require ('includes/loginfunctions.inc.php');	
		redirect_user();
		exit();
	}else{
		$_SESSION = array();
		session_destroy();	
	}
	//links to nav
	include('./includes/nav.html.php');

	
	
?>

	<div id="leftcol">
    	<div id="welcome">
        	<?php echo "<h4>Thank you! You are now logged out.</h4>" ?>
            <p><a href="login.php">Login</a></p>
        </div>
    
    </div>
    
<?php
	//links to sidebar
	include("./includes/aside.html.php");
?>   
    
    
<?php
	//links to footer
	include("./includes/footer.html.php");
?>