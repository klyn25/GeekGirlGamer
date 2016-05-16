<?php
	ob_start();
	
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<!--favicon link-->
<link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAALy8vAP///wCurq4AISEhAH9/fwBxcXEAz8/PAKCgoAD+/v4Afn5+ACAgIADw8PAAcHBwAEFBQQDv7+8AwMDAAG9vbwBAQEAAYWFhAL+/vwA/Pz8AEBAQADExMQC+vr4Aj4+PAA8PDwDf398AsLCwAAEBAQAwMDAAr6+vAICAgADe3t4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgICAgICAgIJAgICAgICAgkCAgkCAgICAgICAgIbFgAdGiEXAAAdAxEAAAARBwYJAhUQFQICIAoNBwIUEgICAgkOFAICAgUFCQICFBICEwAAABgIAB0ABQcWAAASFB4CAhIUAAwCBQUSHwIUEhQSAgISFAACAgUFEhQCFBIUEgkCFRQAAgIFBRIYAhgSFBICAhIYAAICBQoSFAIQEhQVAgISFAACAgUgEhQCFBIQHgIhHhAADw8TBQ4fAhkVAg4ABBYUIAAWCwUcGgABDgICAgkCAgICAgkCCQIJAgkCAgICAgkCAgICCQICAgkCAgICAgICAgICCQICAgICAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
<title><?php echo $pageTitle; ?></title>

<?php

	if(!isset($_SESSION['style'])){
		echo '<link href="./css/default.php" rel="stylesheet" type="text/css" media="screen">';
	}else{

		if(isset($_POST['submit'])){
			$_SESSION['style'] = $_POST['choice'];
		}
		$skin = $_SESSION['style'];
		
		echo '<link href=';
		
		switch($skin){
			case 1: echo "./css/retro.php";
			break;
			case 2: echo "./css/retrogirl.php";
			break;
			case 3: echo "./css/zombie.php";
			break;
			case 4: echo "./css/zombiegirl.php";
			break;
			default: echo "./css/default.php";	
		}
		
		echo  ' rel="stylesheet" type="text/css" media="screen">';
	}
	require ('includes/config.inc.php');
?>

<link href="print.php" rel="stylesheet" type="text/css" media="print"/>
<link rel="stylesheet" href="./css/nivo-slider.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
<script src="./jquery/jquery.nivo.slider.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});

$('#slider').nivoSlider({
    effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
    slices: 15,                     // For slice animations
    boxCols: 8,                     // For box animations
    boxRows: 4,                     // For box animations
    animSpeed: 500,                 // Slide transition speed
    pauseTime: 3000,                // How long each slide will show
    startSlide: 0,                  // Set starting Slide (0 index)
    directionNav: true,             // Next & Prev navigation
    controlNav: true,               // 1,2,3... navigation
    controlNavThumbs: false,        // Use thumbnails for Control Nav
    pauseOnHover: true,             // Stop animation while hovering
    manualAdvance: false,           // Force manual transitions
    prevText: 'prev',               // Prev directionNav text
    nextText: 'next',               // Next directionNav text
    randomStart: true,             // Start on a random slide
    beforeChange: function(){},     // Triggers before a slide transition
    afterChange: function(){},      // Triggers after a slide transition
    slideshowEnd: function(){},     // Triggers after all slides have been shown
    lastSlide: function(){},        // Triggers when last slide is shown
    afterLoad: function(){}         // Triggers when slider has loaded
});
</script>

</head>

<body>
	<div id="top">
    	
<?php 
	if(!isset($_SESSION['user']) && (basename($_SERVER['PHP_SELF']) != 'login.php')){ 
		echo '<a href="login.php">Log In</a>';
	}elseif((basename($_SERVER['PHP_SELF']) != 'login.php')){  
    	echo '<form action="" method="post">
         	 <input type="submit" name="submit" id="submit" value="go">
             
             <select name="choice">
             <option selected>change style</option>
             <option value="0">original</option>
             <option value="1">retro</option>
             <option value="2">girly retro</option>
             <option value="3">zombie</option>
             <option value="4">girly zombie</option>
             </select>
             
             
             </form>';
             
             	echo '<a href="logout.php">Log Out</a>';
			 }
	
			
	
			 
?>
    </div>
  	<div id="wrapper">
	<header>
    	<h1>geek girl gamer</h1>
        <div id="logo"></div>
    </header>
    <div id="content">