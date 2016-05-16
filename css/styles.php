<?php

	$skin = get_style($c);
	
	echo '<pre>';
		print_r($skin);
	echo '</pre>';
	

	
	
	
	$main = $skin['main'];
	$light = $skin['light'];
	$medium = $skin['medium'];
	$contrast = $skin['contrast'];
	$font = $skin['font'];
	$background = $skin['backgroundimg'];
	$header = $skin['headerimg'];
	$logo = $skin['logo'];
	
	header("Content-type:text/css; charset:UTF-8");	
?>

/* CSS Document */

* {
	border: 0;
	padding: 0;
	margin: 0;	
}

body {
    background-image: <?php echo $background?>;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 90%;
	color: <?php echo $font?>
}

#top {
	width: 100%;
	background-color: <?php echo $main?>;
	height: 40px;	
}

#top label {
	float: right;
	margin: 6px 0 5px 1%;
	background-color: <?php echo $light?>;
	padding: 3px 1%;
	border-bottom-left-radius: 4px;
	border-top-left-radius: 4px;
	color: <?php echo $font?>;	
}

#top select {
	float: right;
	margin: 6px 1% 5px 0;
	background-color: <?php echo $light?>;
	padding: 4px 1%;
	border-bottom-right-radius: 4px;
	border-top-right-radius: 4px;
	color: <?php echo $font?>;	
}

#wrapper {
	clear: both;
	width: 960px;	
	margin: 0 auto;
	background-color: <?php echo $light?>; 
}

/*-------------------- HEADER ------------------------*/

header {
	height: 200px;	
	background-image: <?php echo $header?>;
	background-repeat: repeat-x;
}

#logo {
	width: 320px;
	height: 200px;
	background-image: <?php echo $logo?>;
	background-repeat: no-repeat;
	margin-left: 33%;
}

/*-------------------- NAV ------------------------*/

nav {
	height: 43px;
	color: #fff;
    font-size: 1.25em;
	background-color: <?php echo $medium?>;
	width: 100%;
	border-bottom: 2px solid <?php echo $main?>;	
}

nav ul {
	list-style-type: none;
}


nav li {
	display: inline;
	float: left;	
	padding: 10px 2%;
}

nav li a {
	text-decoration: none;
    padding: 10px;
    color: <?php echo $font?>;
	
}

nav li a:link {
    background-color: <?php echo $medium?>;
}

nav li a:visited {
	background-color: <?php echo $medium?>;
}

nav li a:focus {
	background-color: <?php echo $main?>;
}
nav li a:hover {
	background-color: <?php echo $light?>;
}

nav li a:active {
	background-color: <?php echo $contrast?>;
}


/*-------------------- CONTENT ------------------------*/

#content {
	clear: both;
}

#leftcol {
	float: left;
	width: 66%;
	padding: 10px 2%;
	background-color: #<?php echo $light?>;
	min-height: 400px;	
	border-top: 2px solid <?php echo $main?>;
}

#welcome {
	float: left;
	width: 94%;
	padding: 10px 2%;
	background-color: #333;
	min-height: 275px;	
	margin: 12px 1% 20px 1%;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border: 1.5px solid <?php echo $main?>;
}

#slider {
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;	
	border: 1.5px solid #000;
}

#register {
	width: 60%;
    padding: 20px 4%;
	height: 200px;
    font-size: 1.15em;
    text-align: right;
	margin-bottom: 20px;
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	border: 1.5px solid <?php echo $main?>; 
	background-color: <?php echo $contrast?>;
	color: <?php echo $font?>;	
}

#register p {
	padding: 3px 2%;
}

.left {
	float: left;
}

/*-------------------- TABLES ------------------------*/

table td {
	line-height: 1.25em;
	padding: 7px;
}

table td img {
	padding: 20px 0;
}

table td p, table td br {
	margin-bottom: 17px;
}

pagination

table tr:nth-child(1)
	background-color: <?php $medium?>;
	border-bottom: 2px solid #fff;
    font-size: 1.35em;
}

table td:nth-child(2), table td:nth-child(3) {
	text-align: right;
}



/*-------------------- LOGIN ------------------------*/

#login {
	width: 60%;
	height: 150px;
	margin-bottom: 20px;
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	border: 1.5px solid <?php echo $main?>; 
	background-color: <?php echo $contrast?>;
	color: <?php echo $font?>;	
}

#login legend {
	margin-left: 4%;
	background-color: <?php echo $main?>;
	padding: 3px 4% 4px 4%;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;	
}

#login h2 {
	font-size: 1.25em;	
}

#login p {
	padding: 5px 3%;
	text-align: right;	
}

#login input, #register input {
	background-color: <?php echo $light?>;
	padding: 5px;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border: 1px solid <?php echo $main?>;		
}

.small{
	font-size: 0.8em;
	margin-top: 3px;
	margin-left: 3px;	
    color: <?php echo $font?>;
}

.require {
	color: red;
}

#submit {
	float: right;	
}

/*-------------------- ASIDE ------------------------*/

aside {
	float: right;
	width: 27%;
	min-height: 400px;
	padding: 10px 1.5%;
	background-color: <?php echo $medium?>;
	border-bottom: 2px solid <?php echo $main?>;	
}
aside #login {
	width: 100%;
	
}

.side {
	width: 100%;
	min-height: 150px;
	margin-bottom: 20px;
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	border: 1.5px solid <?php echo $main?>; 
	background-color: <?php echo $contrast?>;
	color: <?php echo $font?>;	
}

.side legend {
	margin-left: 4%;
	background-color: <?php echo $main?>;
	padding: 3px 4% 4px 4%;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;	
}

.side h2 {
	font-size: 1.25em;	
}

.side h3 {
	font-size: 1.15em;
    font-weight: lighter;
    padding: 5px 4% 4px 5%;	
}

.side p {
	padding: 5px 3%;
	text-align: right;	
}

.logout {
	text-align: right;
}


/*-------------------- FOOTER ------------------------*/

footer {
	clear: both;
	border-top: 2px solid <?php echo $main?>;	
}

footer nav {
	text-align: center;
	border: none;	
}

footer nav li {
	font-size: .95em;
	display: inline;
    text-align: center;	
	padding: 10px 2%;
}

#bottom {
	clear: both;
	width: 100%;
	background-color: <?php echo $main?>;
	height: 40px;
}

#bottom p {
	padding-top: 10px;
	text-align: center;
	color: <?php echo $font?>;	
}