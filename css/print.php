<?php
	

	header("Content-type:text/css; charset:UTF-8");
	
	
	$main = '#fff';
	$light = '#fff';
	$medium = '#fff';
	$contrast = '#fff';
	$font = '#000';
	$background = none;
	$header = none;
	$logo = 'url(../images/default/defaultlogo.png)';
	
		
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

#top, #top select, #top input, #top a {
	display: none;	
}

#wrapper {
	background-color: <?php echo $light?>; 
}

li {
	display: none;
}
/*-------------------- HEADER ------------------------*/

header {
	height: 200px;	
	background-image: <?php echo $header?>;
	background-repeat: repeat-x;
}

h1 {
    float: left;
	text-indent: -9999px;
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
	display: none;	
}

nav ul {
	display: none;
}



/*-------------------- CONTENT ------------------------*/

#content {
	clear: both;
}

#leftcol {
	width: 100%;
	background-color: #<?php echo $light?>;
	min-height: 400px;	
}

#welcome {
	width: 100%;
	background-color: <?php echo $contrast?>;
    border-bottom: 1px solid <?php echo $main?>;
    
}

/*-------------------- COMMENTS ------------------------*/

#post {
	width: 100%;
    margin-top: 15px;
	background-color: <?php echo $contrast?>;
    border: 1px solid <?php echo $main?>;
    border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
}

#register, #newcomment, #comment {
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

#newcomment, #comment {
	background-color: <?php echo $main?>;
    width: 87%;
    margin: 10px auto;    
}

#newcomment {
	height: 180px;
}

#comment {
	text-align: left;
}

#newcomment h3, #comment h3 {
	background-color: <?php echo $light?>;
    padding: 3px 1%;
    border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
    margin-bottom: 10px;
}

#comment h5, #comment p {
	margin: 3px 2%;
}

#newcomment h3 {
	text-align: left;
}

#newcomment fieldset p, #comment p {
    padding: 8px 2%;
}

#newcomment input, #newcomment textarea {
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
    background-color: <?php echo $light?>;
    color: <?php echo $font?>;
    width: 80%;
    padding: 5px;
}

#newcomment .submit {
	margin-bottom: 10px;
    padding: 3px 2%;
    width: 15%;
    text-align: center;	
}

.left {
    width: 97%;
    background-color: <?php echo $main?>;
    margin-top: -3px;
}



/*-------------------- INTRO PAGES ------------------------*/

#item {
	clear: both;
    margin-bottom: 20px;	
}

#item img {
	display: none;
}

#item br {
	margin-bottom: 17px;
}

#item a {
	margin-left: 80%;
}

#back {
	display: none;
}

#per_page {
	display: none; 
}

#per_page select, #per_page input {
	display: none;
}


#showing, #pagination {
	display: none;
}

#comment {
    background-color: <?php echo $main?>;    
}

/*-------------------- LOGIN/REGISTER ------------------------*/

#login, #register, #pass, #update {
	width: 60%;
	min-height: 200px;
	margin: 13px 3%;
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	border: 1.5px solid <?php echo $main?>; 
	background-color: <?php echo $contrast?>;
	color: <?php echo $font?>;	
}

#login legend, #register legend {
	margin-left: 4%;
	background-color: <?php echo $main?>;
	padding: 3px 4% 4px 4%;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;	
}

#login h2, #register h2, #pass h2, #update h2 {
	font-size: 1.25em;	
}

#login p, #register p, #pass p, #update p {
	padding: 5px 3%;
	text-align: right;	
}

#login input, #register input, #pass input, #update input {
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

#register {
	height: 250px;
}

#pass {
	height: 150px;
}

#update {
	width: 80%;
}

#update p{
	text-align: left;
}

/*-------------------- ASIDE ------------------------*/

aside {
	display: none;
}
aside #login {
	display: none;	
}

.side {
	display: none;	
}

.side legend {
	display: none;	
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
	text-align: left;	
}

.side img {
	display: none;
}

.logout {
	text-align: right;
    width: 86%;
    margin: 10px 4%;
	background-color: <?php echo $light?>;
	padding: 3px 4% 4px 4%;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}

aside a {
	text-decoration: none;
    color: <?php echo $main?>;
    font-weight: bold;
}

#tmqMainDiv {
	display: none;
}

.tmqItemDiv {
	display: none;
}


/*-------------------- FOOTER ------------------------*/

footer {
	display: none;
	
}

footer nav {
	display: none;	
}

footer nav li {
	margin: 0 auto;
	font-size: .95em;
	display: none;
    text-align: center;	
	padding: 10px 2%;
}

#bottom {
	display: none;
}
