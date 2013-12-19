<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Student Information System</title>
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap-responsive.min.css"; ?>" rel="stylesheet" type="text/css"/>
		
	</head>
	<body>
		<div class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="navbar-inner">
				<div class="container-fluid">
					<!-- BEGIN LOGO -->
					<a class="brand" > Assignment </a>
					<!-- END LOGO -->
				</div>
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>
		<!-- BEGIN CONTAINER -->
		<div class="page-container row-fluid" style="margin-top: 50px;">
			<!-- BEGIN PAGE -->
			<div class="page-content">
				<!-- BEGIN PAGE CONTAINER-->
				<div class="container-fluid">
					<!-- BEGIN PAGE HEADER-->
					<div class="row-fluid">
						<div class="span12">
							<h3 class="page-title">Assignment 2</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="<?php echo base_url() . "controller"; ?>">Assignment 1</a>
									|
									<a href="<?php echo base_url() . "controller/stringsort"; ?>">Assignment 2</a>
									|
									<a href="<?php echo base_url() . "controller/sqlquery"; ?>">Assignment 3</a>
								</li>
							</ul>
							<small> Write a simple PHP program which takes a string as input and breaks the string into words and prints them in ascending order of word length. 
							<br/>Use dictionary order in case of a tie. Don’t use any native PHP functions. <br/>
							<b>Example:</b> Deepanshu is the best programmer in the world 
							<br/><b>Output:</b> in is the the best world Deepanshu programmer</small>
						</div>
					</div>
					<!-- END PAGE HEADER-->
					<!-- BEGIN PAGE CONTENT-->
					<div class="row-fluid" style="margin-top: 20px">
						<div class="span12">
							<div class="tabbable portlet-tabs">
								<div class="tab-content">
									<div class="tab-pane active" id="portlet_tab1">
										<!-- BEGIN FORM-->
										<?php
										$attributes = array('class' => 'form-horizontal', 'id' => 'form_sample_2');
										echo form_open('controller/stringsort', $attributes);
										?>
										<div class="alert alert-error hide">
											<button class="close" data-dismiss="alert"></button>
											You have some form errors. Please check below.
										</div>
										<div class="alert alert-success hide">
											<button class="close" data-dismiss="alert"></button>
											Your form validation is successful!
										</div>

										<div class="control-group">
											<label class="control-label">Enter String<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="string" id="string" class="span6 m-wrap">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label">Output<span class="required">*</span></label>
											<div class="controls">
												<label><?php if(isset($output)){echo $output; }?></label>
											</div>
										</div>


										<div class="form-actions">
											<button type="submit" id="btnsave" name="btnsave" class="btn blue">
												Sort
											</button>
										</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
		</div>
		<!-- END CONTAINER -->
		<!-- BEGIN CORE PLUGINS -->
		<script src="<?php echo base_url() . "assets/plugins/jquery-1.10.1.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . "assets/plugins/bootstrap/js/bootstrap.min.js"; ?>" type="text/javascript"></script>
		<!-- Jquery For Validation -->
		<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/jquery.validate.min.js"; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/jquery-validation/dist/additional-methods.min.js"; ?>"></script>

		<!-- Page Level Jquery  -->
		<script src="<?php echo base_url() . "assets/scripts/string.js"; ?>"></script>
		<script>
			var App = function() {
				return {
					scrollTo : function(el, offeset) {
						pos = el ? el.offset().top : 0;
						jQuery('html,body').animate({
							scrollTop : pos + ( offeset ? offeset : 0)
						}, 'slow');
					}
				};
			}();
			jQuery(document).ready(function() {
				Index.InitValidation();
			});
		</script>

	</body>
</html>