<?php
	
	$pageTitle="Geek";
	
	require_once('./includes/functions.php');
	

	//links to header
	include('./includes/header.html.php');
	require_once(MYSQL);
	//links to nav
	include('./includes/nav.html.php');
	
		
	$start = get_var('start', 0);
	$per_page = get_var('per_page', 5);
	$start = floor($start/$per_page) * $per_page;
	$id = get_var('postID', 1);

?>

<div id="leftcol">
    	<div id="post">
        
        <?php
		
		//get order info that matches initial query
		$q = "SELECT p.*, g.username FROM gggposts AS p INNER JOIN ggger AS g USING (gggerID) WHERE postID = $id ORDER BY date DESC";
		$r = mysqli_query($db, $q) or die('Error querying database: ' . mysqli_error($db));
		$total_rows = mysqli_num_rows($r);
		if($start>$total_rows){
			$start=0;	
		}
		
		$q .= " LIMIT $start, $per_page";
		
		$r = mysqli_query($db, $q) or die('Error querying database: ' . mysqli_error($db));
		//check if we have any results
		
		//if(mysqli_num_rows($result) > 0){
			
			//link back to orderlist for easy navigation
			echo '<div id="back"><a href="geekIntro.php">Back</a></div>';		
			while($row = mysqli_fetch_array($r)){		
				echo '<div id="item">
					<h3>' . $row['title'] . '</h3>' .
						'<p>date posted: ' .	$row['date'] . '</p>
						 <p>posted by: ' . $row['username'] . '</p>
						 <img src="' . $row['banner'] . '" width="100%" alt="' . $row['title'] . ' image">
						 <p>' . $row['intro'] . '</p>
						 <p>' . $row['gggpost'] . '</p>
						 </div>';
			}
								
			if(isset($_SESSION['user'])){
           echo '<form id="newcomment" name="form1" method="post" action="">
            <fieldset>
            	<h3>Add Comment</h3>
              <p>
                <label for="title">Title: </label>
                <input type="text" name="title" id="title">
              </p>
              <p>
                <label for="comment">Comment: </label>
                <textarea name="comment" id="comments"></textarea>
              </p>
              <p>
         	 	<input class="submit" type="submit" name="submit2" id="submit" value="Submit">
        	  </p>
              </fieldset>
              </form>';
		}
			if(isset($_POST['submit2'])){
				// store our errors in an array
				$errors = array();				
				
				// validate title
				// remove spaces at beginning and end of the title
				$title = trim($_POST['title']);
				
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
					$title = mysqli_escape_string($db, $title);
					$comment = mysqli_escape_string($db, $comment);
					
					$now = date("Y-m-d H:i:s");
					
					// query to add a new record
					$insert = "INSERT INTO `gggcomments` 
									(`title`, `gggerid`, `comment`, `postID`, `date`) 
								VALUES 
									('?, ?, ?, ?, NOW());";
						
					$stmt = mysqli_prepare($db, $insert) or die('Error updating review.' );
				
				// add values to the statement
				// does sanitation for you (s = string, i = integer, d = double, b = blob)
				mysqli_stmt_bind_param($stmt, "sisi", $title, $userID, $comment,$id );
				
				// execute the prepared statement
				mysqli_stmt_execute($stmt);
				}else{
					// output errors
					echo '<p style="color:red;">Please fix the following errors and resubmit: </p>
							<ul style="color:red;"><li>' . implode('</li><li>', $errors)	. '</li></ul>';
				}
			}
			
			$q = "SELECT c.*, u.username FROM gggcomments AS c INNER JOIN ggger AS u ON c.gggerID = u.gggerID WHERE postID = '$id' ORDER BY date DESC";
			$r = mysqli_query($db, $q) or die(mysqli_error($db));
			
			if(mysqli_num_rows($r)){
				while($row = mysqli_fetch_array($r)){
					echo '<div id="comment">
							<h3>' . $row['title'] . '</h3>
							<h5>' . $row['username'] . '</h5>
							<p>' . $row['date'] . '</p>
							<p>' . $row['comment'] . '</p>';
							if(isset($_SESSION['user']) && ($_SESSION['user'] == $row['username'])){
								echo '<p>
									<a href="edit.php?commentID=' . $row['commentID'] . '">[Edit]</a> 
									<a href="delete.php?commentID=' . $row['commentID'] . '">[Delete]</a>
								</p>';
							}
							echo '</div>';
				}
			}else{
				echo '<div id="noreview">
				<h3>No reviews yet</h3>
				</div>';	
			}	
			
		
		//close connection to db
		mysqli_close($db);
		
	?>

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