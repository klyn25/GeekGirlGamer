<?php

	
	if(!isset($_SESSION['agent']) || ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )){
		require('includes/loginfunctions.inc.php');	
		redirect_user();
	}else{
		header("Location: $url");
		exit();	
	}
	
	$pageTitle="Home";
	
	//links to header
	include('./includes/header.html.php');

	//links to nav
	include('./includes/nav.html.php');

	
	
?>

	<div id="leftcol">
    	<div id="welcome">
        	<?php echo "<h4>Thank you! for logging in, {$_SESSION['user']}</h4>";?>
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