<?php


	$pageTitle = 'Login';
	include('includes/header.html.php');
	include('includes/nav.html.php');
?>	

	<div id="leftcol">
    	<div id="userform">
    
<?php
	if(!isset($_SESSION['user'])){
		    echo '<form action="login.php" method="post" >
            <fieldset id="login">
            <legend><h2>login</h2></legend>
                <p>
                  <label for="username">username: </label>
                  <input type="text" name="username" id="username">
                </p>
                <p>
                  <label for="password">password: </label>
                  <input type="password" name="password" id="password">
                </p>
				<p class="small">forgot password? <a href="./forgotPassword.php">click here</a></p>
                <p class="small">not registered? <a href="./register.php">click here</a></p>
                <p>
                  <input type="submit" name="submit" id="submit" value="submit">
                </p>
        
            </fieldset>
        </form>';
		
		if(isset($_POST['submit'])){
			$error = "";
			require(MYSQL);
			
			$user = mysqli_real_escape_string($db, trim($_POST['username']));
			$password = mysqli_real_escape_string($db, trim($_POST['password']));
			
			$q = "SELECT gggerID, username, styleID FROM ggger WHERE (username = '$user' AND password = SHA1('$password'))";
			
			$r = mysqli_query($db, $q);
		
				if(mysqli_num_rows($r) == 1){
					$row = mysqli_fetch_array($r);
					$_SESSION['user_id'] = $row['gggerID'];
					$_SESSION['user'] = $row['username'];
					$_SESSION['style'] = $row['styleID'];	
				}else{
					echo '<p>There was an error processing your request, please try again.</p>'; 
				}//end row if		
			}//end submit if
		}else{
			echo ('<H2> You are logged in as ' . $_SESSION['user'] . '.</h2>');
		}
?>	


        </div>
     </div>

	
<?php	

	include('includes/aside.html.php');
	include('includes/footer.html.php');
?>