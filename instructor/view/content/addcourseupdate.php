<?php

/**
 * Programmer: Patrick Viker
 * Team: ETC.
 * Instructor: Michael Dorin
 * Project: Capstone
 * Date: 3/21/16
 * Filename: landing.php
 * Description: This is the primary VIEW landing page after
 * 				a user successfully logs in.
 *
 *****************************************************************/

	include '../../../includes/header.php';
	include '../../includes/nav.php';

?>

	<div class="container-fluid">
	
		<?php if(isset($_SESSION['msg'])){?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Success!</strong> Class update posted.
			</div>
		<?php } unset($_SESSION['msg']);?>
		<?php if(isset($_SESSION['errormsg2'])){?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Oh Snap!</strong> Your update was not posted, please try again.
			</div>
		<?php } unset($_SESSION['errormsg2']);?>
		
		<!-- FORM START -->
		<div class="row">
	    	<div class="col-sm-6">
    			<div class="panel panel-primary" style="border-color: #696053;">
			  		<div class="panel-heading panel-head">
			    		<h3 class="panel-title">Add an update for <?php include $_SERVER['DOCUMENT_ROOT'].$rootDir.'includes/getcoursenum.php';?></h3>
			  		</div>
				  	<div class="panel-body">
						<form role="form" 
							action="<?php echo $rootDir ?>/instructor/controllers/courseupdate.php" method="post">
							<input type="hidden" id="courseID" name="courseID" value="<?php echo $_SESSION['selectedCourse']; ?>">
							<div class="form-group">
							    <input type="text" class="form-control <?php echo $status; ?>" id="title" name="title" placeholder="Title">
						  	</div>
							<div class="form-group">
								<textarea id="txtarea" name="txtarea" placeholder="Update Description" ></textarea><br>	    		
						  	</div>
						 	<button type="submit" name="submit" value="submit" class="btn btn-default btn-block">
						 		Submit
						 	</button>
						</form>
				  	</div>
				</div>	
	    	</div>
	    	<!-- FORM END -->
	    	
		   	<div class="col-sm-6">
	    		<div class="panel panel-primary" style="border-color: #696053;">
			  		<div class="panel-heading panel-head">
			    		<h3 class="panel-title">Course Updates</h3>
			  		</div>
				  	<div class="panel-body">
				    	<div class="list-group">
							<div class="panel-group" id="accordion">
								<div class='panel panel-default'>
									<div class='panel-heading forum' data-toggle='collapse' data-parent='#accordion' href='#collapse'>
										<h4>View Current Course Updates</h4>
									</div>
									<div id='collapse' class='panel-collapse collapse'>
										<div class='panel-body'>
											<?php require '../../includes/getcourseupdates.php';?>
										</div>
									</div>
								</div>
						  	</div>
						</div>
			  		</div>
				</div>
	    	</div>
		</div>
	</div>

</body>
</html>