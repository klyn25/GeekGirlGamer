<?php
 
	$pageTitle = 'Edit Comment';
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
	if(isset($_POST['submit3'])){
		// store our errors in an array
		$errors = array();				
				
		// validate title
		// remove spaces at beginning and end of the title
		$title = trim($_POST['title']);
		$commentID = ($_POST['commentID']);	
		// make sure the title has at least 2 characters
		if(strlen($title) < 2){
			$errors[] = "Title must be at least two characters";	
		}
				
		// validate review
		// remove spaces at beginning and end of the review
		$comment = trim($_POST['comment']);
				
		// make sure the review has between 5 and 500 words
		if(str_word_count($comment) < 3 or str_word_count($comment) > 500){
			$errors[] = "Comment must be between 5 and 500 words.";	
		}		
				
			if(count($errors) === 0){
				// strip out html tags to prevent XSS attacks
				$user = $_SESSION['user'];
				$userID = $_SESSION['user_id'];
				$title = strip_tags($title);
				$comment = filter_var($comment, FILTER_SANITIZE_STRING);
				// mysqli_escape_string escapes all special characters used by SQL
				$title = mysqli_real_escape_string($db, $title);
				$comment = mysqli_real_escape_string($db, $comment);;
				$page = mysqli_escape_string($db, $_SERVER['PHP_SELF']);
		
				$update = "UPDATE `gggcomments` SET `title` = ?,`comment` = ? WHERE `commentID` = ?";
			
				// prepare the query
				// make sure the statement is valid
				$stmt = mysqli_prepare($db, $update) or die('Error updating review. ' . mysqli_error($db) );
				
				// add values to the statement
				// does sanitation for you (s = string, i = integer, d = double, b = blob)
				// this DOES NOT do any validation for your 
				// this DOES NOT prevent XSS attacks
				mysqli_stmt_bind_param($stmt, "ssi", $title, $comment,$commentID );
				
				// execute the prepared statement
				mysqli_stmt_execute($stmt);
				
				echo ('<h3> Thank you! Your post has been updated, ' . $_SESSION['user'] . '.</h3>');
		}else{
			// output errors
			echo '<p style="color:red;">Please fix the following errors and resubmit: </p>
					<ul style="color:red;"><li>' . implode('</li><li>', $errors)	. '</li></ul>';
		}
		
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
		
	
		echo '<div id="leftcol">
			<div id="userform">	
				<form name="form1" method="post" action="">
				<fieldset id="update">
					
					<input type="hidden" name="commentID" value="' . $row['commentID'] .'">
				
				  <p>
					<label for="username">user name: </label>
					<input type="text" name="username" id="username" value="' . $row['username'] .'" readonly>
				  </p>
				  <p>
					<label for="title">title: </label>
					<input type="text" name="title" id="title" value="' .$row['title'].'">
				  </p>
				  <p>
					<label for="comment">comment: </label>
					<textarea name="comment" id="comment">'. $row['comment'] .'</textarea>
				  </p>
				 
				  <p>
					<input type="submit" name="submit3" id="submit" value="Submit">
				  </p>
				  
				  </fieldset>
				</form>
			 </div>   
		</div>';
    
	include('./includes/footer.html.php');
	
?>