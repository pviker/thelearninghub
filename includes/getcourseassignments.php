<?php
	
	if (!isset($_SESSION)) session_start();
	require $_SERVER['DOCUMENT_ROOT'].$rootDir.'controllers/db.php';

	if(isset($_SESSION['selectedCourse'])){
		$course = $_SESSION['selectedCourse'];
	} else {
		$_SESSION['errormsg'] = "Can't retrieve courses.";
		//header("Location: ../index.php");
	}

	$getCourseAssignments = "SELECT name, description, due_date, max_points 
								FROM assignments
    							WHERE courses_id=".$course;
	
//	echo $getCourseAssignments;

	$assignmentResults = mysqli_query($conn, $getCourseAssignments);
	
	if(!$assignmentResults) {
    	$_SESSION["errormsg"] = "ERROR: Can't get user info";
       // header("Location: ../index.php");
        exit;
	} else {
		while($row = mysqli_fetch_assoc($assignmentResults)) {
			echo "<tr>".
				 "<td>".$row['name']."</td>".
				 "<td>".$row['description']."</td>".
				 "<td>".$row['due_date']."</td>".
				 "<td>".$row['max_points']."</td>".
				 "</tr>";
 		}
	  }


?>