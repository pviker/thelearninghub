<?php

/**
 * Programmer: Patrick Viker
 * Team: ETC.
 * Instructor: Michael Dorin
 * Project: Capstone
 * Date: 3/25/16
 * Filename: getdiscussionpost.php
 * Description: Retrieves from database discussion_post information
 * 				based on selected post from user.
 *
 **************************************************************************/


	if(isset($_SESSION['selectedCourse'])){
		$selectedCourse = $_SESSION['selectedCourse'];
	} else {
		$_SESSION['errormsg'] = "Can't retrieve courses.";
		header("Location: ../index.php");
	}
	
	$postID = $_GET['postID'];
	
	$server = $_SERVER['PHP_SELF'];
	$pos = strpos($server, "postreply");
	
	// if we're in postreply.php script do NOT echo reply link
	if ($pos !== false) {
		$replyToPost = "";
	} else {
		$replyToPost = "<a href='postreply.php?postID=".$postID."' style='color:black' class='btn btn-default'>
				  			<span class='glyphicon glyphicon-share-alt' aria-hidden='true'></span> Reply to post
				  		</a><br><br>";
	}
	
	$query = "SELECT title, body, date FROM discussion_post where discussion_post_id=".$postID;
	
	$results = mysqli_query($conn, $query);
	
	//echo $query;
	
	if(!$results) {
		$_SESSION["errormsg"] = "ERROR: Can't get course updates info";
		//header("Location: ../index.php");
		exit;
	} else {
		while($row = mysqli_fetch_assoc($results)) {
			echo "<div class='panel-heading'>
						<h4 class='panel-title'>".$row['title']."</h4>
				  </div>
				  <div id='collapse1' class='panel-collapse collapse in'>
						<div class='panel-body'>".$row['body']."</div>
				  </div>&nbsp;&nbsp;
				  ".$replyToPost;
		}
	}

?>