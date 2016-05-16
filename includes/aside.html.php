<aside>
	<div id="something">
   
    
    	<?php
		if(!isset($_SESSION['user']) && (basename($_SERVER['PHP_SELF']) != 'login.php')){
			echo '<fieldset class="side">
						<legend><h2>Welcome!</h2></legend> ';
				echo '<h3>Be a member!</h3>
					<p>By registering and logging in, you\'ll be able to:
						<ul>
							<li>Change the theme</li>
							<li>Post comments</li>
						</ul>
					</p>
					<p class="logout"><a href="./register.php">Register now</a></p>';
				echo '<p class="logout"><a href="./login.php">Login</a></p>
				</fieldset>';
		}else{
			if(isset($_SESSION['user']) && (basename($_SERVER['PHP_SELF']) != 'logout.php')){
				echo '<fieldset class="side">
						<legend><h2>Welcome!</h2></legend> ';
				echo "<h3> {$_SESSION['user']}</h3>";
				echo '<p class="small">change password? <a href="./changePassword.php">click here</a></p>';
				echo '<p class="logout"><a href="./logout.php">Logout</a></p>
				</fieldset>';
			}else{
				if((basename($_SERVER['PHP_SELF']) != 'login.php')){
					echo '<p class="logout"><a href="login.php">Login</a>';
				}
			}
			// echo'<pre>' .
   				//print_r($_SESSION) .
				//'</pre>';
		}
		?>
        <fieldset class="side">
        	<legend><h2>Big Thanks JayR!</h2></legend>
            	<img src="./images/thankyou.gif">
     
        </fieldset>
        
    	<fieldset class="side">
        	<legend><h2>Something</h2></legend>
            	<p><script src="http://www.themoviequotes.com/widgets/javascript?n=1&amp;l=1&amp;g=3" type="text/javascript"></script><p>
        </fieldset>
        
        
    </div>

</aside>