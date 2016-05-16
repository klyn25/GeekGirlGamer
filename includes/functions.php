<?php 

function get_var($name, $default = ''){
	// $_SERVER['PHP_SELF'] contains the filename of the current page
	$page_name = $_SERVER['PHP_SELF'];
	
	if(isset($_POST[$name])){
		$value = $_POST[$name];	
	}else if(isset($_GET[$name])){
		$value = $_GET[$name];	
	}else if(isset($_SESSION[$page_name][$name])){
		$value= $_SESSION[$page_name][$name];
	}else{
		$value= $default;
	}
	//store the value in the session for later
	$_SESSION[$page_name][$name] = $value;
	
	return $value;
}

function get_pagination($start, $per_page, $total_rows){
	//variableto store all this html
	$html = '';
	// determine page numbers
		$current_page = $start / $per_page + 1;
		$last_page = ceil($total_rows / $per_page);
		
		// determine prev, next, and end links
		$end = (($start + $per_page) < $total_rows) ? ($start + $per_page) : $total_rows;
		$prev_start = $start - $per_page;
		$next_start = $start + $per_page;
		$last_start = (($last_page - 1) * $per_page);
		
		$html .= '<div id="showing">Showing ' . ($start + 1) . ' to ' . $end .' of ' . $total_rows . ' records.</div>
			  <div id="pagination">';
				
				// previous page links if this is not the first page
				if($prev_start >= 0){
					$html .=  '<a href="?start=0" title="First page"> << &nbsp; </a> 
						  <a href="?start=' . $prev_start . '" title="Previous page"> < &nbsp; </a> ';
				}else{
					$html .=  '<span title="First page"> << &nbsp; </span> 
						  <span title="Previous page"> < &nbsp; </span> ';
				}
				
				// how many links you want (works best if odd)
				$link_count = 7;
			 
				// determine start number 
				if ($current_page < ceil($link_count/2) or $last_page < $link_count){
					// this current page is near the beginning
					$start_i = 0;
				}else if ($last_page - $current_page < ceil($link_count/2)){
					// this current page is near the end
					$start_i = $last_page - $link_count;
				}else{
					// this current page is in the middle
					$start_i = $current_page - ceil($link_count/2);
				}
				
				// determine end of loop
				$end_i = $start_i + $link_count - 1;
				
				// print links, loop until we've printed $link_count pages OR we reach the last page
				for ($i = $start_i; $i <= $end_i and $i < $last_page; $i++){
					// human version of the page number    
					$page_num = $i + 1;
					
					// the start number for this page
					$page_start = $i * $per_page; 
					
					// only print a link if it's not the current page
					if($page_num != $current_page){
						$html .=  '<a href="?start=' . $page_start . '" title="Page ' . $page_num . '">&nbsp;' . $page_num . '&nbsp;</a>';
					}else{
						$html .=  '<span>&nbsp;' . $page_num . '&nbsp;</span>';  
					}
					
					// add a separator if it's not the last page
					//if($i < $end_i and $page_num < $last_page){
					//  echo '|';
					//}
				}
				
				// next page links if this isn't the last page
				if($next_start < $total_rows){
					$html .=  '<a href="?start=' . $next_start . '" title="Next page"> &nbsp; > </a>
					<a href="?start=' . $last_start . '" title="Last page"> &nbsp; >> </a> ';
				}else{
					$html .=  '<span title="Next page"> &nbsp; > </span> 
						  <span title="Last page"> &nbsp; >> </span> ';
				}
				
		 $html .= '</div>';
		 
		 //return html
		 return $html;
	
}

function get_per_page_form($per_page){
	$html = '<div id="per_page">
	<form method="get" action="">
      <label>Show
    	<select name="per_page">
        	<option value="5" ' .(($per_page == 5) ? 'selected' : '').' >5</option>
            <option value="10" '. (($per_page == 10) ? 'selected' : '').' >10</option>
            <option value="20" '. (($per_page == 20) ? 'selected' : '').' >20</option>
            </select>
       </label>
            <input type="submit" name="go" value="Go!">
    </form>
</div>';

return $html;	
}

function redirect_user($page = 'index.php'){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);	
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	
	header("Location: $url");
	exit();
} //end of redirect user function

function get_sort($sort){
	$html = '<div id="sort_page">
	<form method="get" action="">
      <label>Sort by
    	<select name="sort">
        	<option value="date" ' .(($sort == 'date') ? 'selected' : '').' >date</option>
            <option value="title" '. (($sort == 'title') ? 'selected' : '').' >title</option>
            </select>
       </label>
            <input type="submit" name="go" value="Go!">
    </form>
</div>';

return $html;	
}

function get_sort_link($db_col_name, $display_name, $sort, $dir){
    
    // logic for ASC vs. DESC
    $this_dir = ($sort == $db_col_name and $dir == "ASC") ? "DESC" : "ASC";
    $this_title = 'Sort by ' . strtolower($display_name) . (($this_dir == "ASC") ? ' ascending.' : ' descending.');
    
    // retun the generated link
    return '<a href="?sort=' . $db_col_name .  '&dir=' . $this_dir .'" title="' . $this_title . '">
                ' . $display_name . '</a>';
}

?>