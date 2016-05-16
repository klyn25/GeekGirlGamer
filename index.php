<?php

	include_once('includes/functions.php');
	$pageTitle="Home";
	
	//links to header
	include('./includes/header.html.php');

	//links to nav
	include('./includes/nav.html.php');
	
	
?>

	
    	<div id="welcomeslider">
        	<div id="slider" class="nivoSlider">
                <a href="girlsIntro.php"><img src="images/slider/slide1.jpg" alt="" title="for the ladies..."/></a>
                <a href="geekIntro.php"><img src="images/slider/slide2.jpg" alt="" title="may the 4th..." /></a>
                <a href="girlsIntro.php"><img src="images/slider/slide3.jpg" alt="" title="all things geek" /></a>
                <a href="gamesIntro.php"><img src="images/slider/slide4.jpg" alt="" title="geek the kids"/></a>
            </div>
            
        
        <div id="leftcol">
        <div id="welcome">
        	<fieldset id="about">
        	<legend><h2>What geekgirlgamer is about&hellip;</h2></legend>
                <h3><a href="geekIntro.php">All things geek&hellip;</a></h3>
                <p>Because the word geek can take on many meanings, or mean more than one thing, we here at geekgirlgamer have taken on the computer side of geek. All things we find interesting about computers, software, operating systems, and gadgets can be found here. And let's not forget: All things Wookiee!</p>
                <h3><a href="girlIntro.php">All things girl&hellip;</a></h3>
                <p>Girls can be typical or atypical, we understand that more than anyone. But we want a place where girls can accept all that they are, and everything they are not. We don't need to be told we only know about shoes, the Kardashians, or what's for dinner. We are here to show that girls know a little something more.</p>
                <h3><a href="gamesIntro.php">All things gaming&hellip;</a></h3>
                <p>There is, and will always be, a debate in the gaming world. Which is better: Xbox or PS? Well I'm here to tell you that it's obviously the Xbox. No&hellip;? Seriously though, we love the Xbox but will not discriminate. We know a good game when we see one.</p>
			</fieldset>
		</div>
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