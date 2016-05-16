<?php
	
	$pageTitle="Geek";
	
	require_once('./includes/functions.php');
	
	
	$start = get_var('start', 0);
	$per_page = get_var('per_page', 5);
	$start = floor($start/$per_page) * $per_page;
	$id = get_var('postID', 1);
	$sort = get_var('sort', 'date');
	
	//links to header
	include('./includes/header.html.php');
	require(MYSQL);
	//links to nav
	include('./includes/nav.html.php');

?>

<div id="leftcol">
    	<div id="post">
        
        <?php
		
		//get order info that matches initial query
		$q = "SELECT p.*, g.username FROM gggposts AS p INNER JOIN ggger AS g USING (gggerID) WHERE categoryID = 1 ORDER BY $sort";
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
				
			echo get_sort($sort) . get_per_page_form($per_page);
				
			while($row = mysqli_fetch_array($r)){		
				echo '<div id="item">
					<h3>' . $row['title'] . '</h3>' .
						'<img src="' . $row['banner'] . '" width="100%" alt="' . $row['title'] . ' image">
						 <p>' . $row['intro'] . '</p>
						 <p>posted by: ' . $row['username'] . '</p>
						 <p class="itemlink"><a href="geek.php?postID=' . $row['postID'] . '">Read more&hellip;</a></p>
					</div>';
			}
								
			
			if($total_rows > $per_page){
				echo get_pagination($start, $per_page, $total_rows);
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