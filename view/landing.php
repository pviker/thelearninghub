<?php

	include '../includes/header.php';
	include '../includes/nav.php';

?>

	<div class="container-fluid">
		
		<div class="row">
	    	<div class="col-sm-6">
    			<div class="panel panel-primary" style="border-color: #696053;">
			  		<div class="panel-heading panel-head">
			    		<h3 class="panel-title">Select Course</h3>
			  		</div>
				  	<div class="panel-body">
				    	<div class="list-group">
							<a href="<?php echo $rootDir ?>/view/course.php?courseID=1" class="list-group-item">Course 1</a>
							<a href="<?php echo $rootDir ?>/view/course.php?courseID=2" class="list-group-item">Course 2</a>
							<a href="<?php echo $rootDir ?>/view/course.php?courseID=3" class="list-group-item">Course 3</a>
						</div>
				  	</div>
				</div>
	    	</div>
	    	<div class="col-sm-6">
    			<div class="panel panel-primary" style="border-color: #696053;">
			  		<div class="panel-heading panel-head">
			    		<h3 class="panel-title">Assignments due soon?</h3>
			    		
			  		</div>
				  	<div class="panel-body">
				    	<p>*DB query for past 30 days and sort by what's due soonest</p>
				  	</div>
				</div>
			</div>
		</div>
	
	</div>

	

</body>
</html>