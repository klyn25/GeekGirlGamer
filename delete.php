<?php
 
	$pageTitle = 'Delete Comment';
	require_once('./includes/functions.php');
	include ('includes/header.html.php');
	include ('includes/nav.html.php');
	// connect to database
	require (MYSQL);
	
	if(!isset($_SESSION['user'])){
		require ('includes/loginfunctions.inc.php');	
		redirect_user();
		exit();
	}
	
	// process the form
		
		if(isset($_POST['submit1']) && $_POST['submit1'] == "Yes"){
			// store our errors in an array					
			
					$update = "DELETE FROM `gggcomments` WHERE `commentID` = ?";
					
					//prepare statement
					$stmt = mysqli_prepare($db, $update) or die('Error updating review. ' . mysqli_error($db) );
					
					// add values to the statement
					mysqli_stmt_bind_param($stmt, "i",$_POST['commentID'] );
					
					// execute the prepared statement
					mysqli_stmt_execute($stmt);
					
					echo '<div id="message">
						<h3> Thank you! Your post has been updated, ' . $_SESSION['user'] . '.</h3>
					</div>';
				
		
	}
	
	
		// get from database
		$id = get_var('commentID', 0);
		
		$select = "SELECT c.*, u.username FROM gggcomments AS c INNER JOIN ggger AS u ON c.gggerID = u.gggerID WHERE commentID = $id";
		$r = mysqli_query($db, $select) or die("Error in query");
		
		// make sure the database only found one record
		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r);
		}else{
			die();
		}
		
?>	
	<div id="leftcol">
			<div id="userform">	
				<form name="form1" method="post" action="">
					<fieldset id="update">
		
						<input type="hidden" name="commentID" value="<?php echo $row['commentID']; ?>">
	
							 <p>Are you sure you want to delete <b><?php echo $row['title']; ?></b>
							</p>
	 
							 <p>
								<input type="submit" name="submit1" id="submit1" value="No">
							</p>
							<p>
							 <input type="submit" name="submit1" id="submit1" value="Yes">
							</p>
					</fieldset>
				</form>
			   
			 </div>   
		</div>
     
	
    
	include('./includes/footer.html.php');
	
?>