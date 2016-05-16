<?php
	

	header("Content-type:text/css; charset:UTF-8");
	
	
	$main = '#8e5856';
	$light = '#eadbcc';
	$medium = '#95a670';
	$contrast = '#101b1a';
	$font = '#fff';
	$background = 'url(../images/retrogirly/retrogirlybackground.gif)';
	$header = 'url(../images/retrogirly/retrogirlyheader.gif)';
	$logo = 'url(../images/retrogirly/retrogirlylogo.png)';
	
		
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

#top select, #top input {
	float: right;
    width: 10.5%;
	margin: 0 0 6px .5%;
	background-color: <?php echo $medium?>;
	padding: 4px 1%;
	border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
	color: <?php echo $font?>;	
}

#top input {
	width: 2.5%;
    margin-right: 1.5%;
}

#top a {
	text-align: center;
    width: 8%;
    margin: 4px 1% 6px 1%;
	background-color: <?php echo $medium?>;
	padding: 6px 4% 6px 4%;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	text-decoration: none;
    color: <?php echo $main?>;
    font-weight: bold;
}

#wrapper {
	clear: both;
	width: 960px;	
	margin: 0 auto;
	background-color: <?php echo $light?>; 
}

a:link {color: <?php echo $font?>;}
a:visited {color: <?php echo $font?>;}
a:focus {color: <?php echo $main?>;}
a:hover {color: <?php echo $medium?>;}
a:active {color: <?php echo $contrast?>;}

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
	height: 42px;
	color: #fff;
    font-size: 1.25em;
	background-color: <?php echo $medium?>;
	width: 100%;
    border-bottom: 1px solid <?php echo $main?>;	
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
    padding: 9px;
    color: <?php echo $font?>;
	
}

nav li a:link {
    background-color: <?php echo $medium?>;
    color: <?php echo $font?>;
}

nav li a:visited {
	background-color: <?php echo $medium?>;
    color: <?php echo $font?>;
}

nav li a:focus {
	background-color: <?php echo $main?>;
    color: <?php echo $font?>;
}
nav li a:hover {
	background-color: <?php echo $light?>;
    color: <?php echo $font?>;
}

nav li a:active {
	background-color: <?php echo $contrast?>;
    color: <?php echo $font?>;
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
}

#welcomeslider {
	width: 100%;
	background-color: <?php echo $contrast?>;
    border-bottom: 1px solid <?php echo $main?>;
}

#welcome {
	width: 100%;
	background-color: <?php echo $contrast?>;
    border-bottom: 1px solid <?php echo $main?>;
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
}

#message {
	height: 200px;
    background-color: <?php echo $contrast?>;
    width: 100%;
    padding: 20px 2%;
}

#about {
    padding: 8px 2% 10px 2%;
    margin: 10px 2%;
    height: 500px;
}

#about legend {
	margin-top: 20px;
	background-color: <?php echo $main?>;
	border: 1px solid <?php echo $main?>;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}

#about h3, h2, p, a {
	padding: 10px 2%;
}
#about p {
	padding-left: 4%; 
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
	min-height: 200px;
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

#item h3 {
	border-top: 1px solid <?php echo $font?>;
	padding: 10px 2%; 
	width: 96%;
	background-color: <?php echo $main?>;
}
#item p {
	clear: both;
	line-height: 1.25em;
	padding: 10px;
}

#item img {
	padding-top: 17px;
}

#item br {
	margin-bottom: 17px;
}

#item a {
	margin-left: 75%;
}

#item li {
	margin-left: 10%;
	padding: 2px 4%;
}

#back {
	float: left;
    padding: 10px 1.5%;
    font-weight: bold;
}

#per_page {
    margin-left: 75%;
    padding: 10px 1.5%; 
}

#per_page select, #per_page input {
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
    background-color: <?php echo $light?>;
    color: <?php echo $font?>;
    width: 35%;
    text-align: center;
}

#per_page input {
	width: 25%;
    background-color: <?php echo $main?>;     
}

#sort_page {
	float: left;
    width: 35%;
    padding: 10px 1.5% 2px 1.5%; 
}

#sort_page select, #sort_page input {
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
    background-color: <?php echo $light?>;
    color: <?php echo $font?>;
    width: 35%;
    text-align: center;
}

#sort_page input {
	width: 20%;
    background-color: <?php echo $main?>;     
}

#showing, #pagination {
	text-align: center;
    background-color: <?php echo $main?>;
    padding: 3px 1%;
}

#pagination { 
    border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;   
}

#comment {
    background-color: <?php echo $main?>;    
}

#noreview {
	padding: 10px 4%;
}

/*-------------------- LOGIN/REGISTER ------------------------*/

#login, #register, #pass, #update {
	width: 60%;
	min-height: 200px;
	margin: 10px 3%;
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
    margin: 20px 4%;	
}

#register {
	height: 275px;
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
	float: right;
	width: 27%;
	min-height: 400px;
	padding: 10px 1.5%;
	background-color: <?php echo $medium?>;
}
aside #login {
	width: 100%;
	
}

.side {
	width: 100%;
	min-height: 75px;
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
	padding: 2px 4% 2px 4%;
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
	padding: 5px 5%;
	text-align: left;	
}
.side li{
	margin-left: 20%;
	padding: 5px 4%;
}

.side img {
	margin: 20px 7.5%;
    border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}

.logout {
	text-align: right;
    width: 82%;
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
	padding: 5px 3%;
}

.tmqItemDiv {
	padding: 5px 5%;
}


/*-------------------- FOOTER ------------------------*/

footer {
	clear: both;
	border-top: 1px solid <?php echo $main?>;	
}

footer nav {
	
	text-align: center;
	border: none;	
}

footer nav li {
	margin: 0 auto;
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