<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Student Information System</title>
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap.min.css"; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap-responsive.min.css"; ?>" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url() . "assets/plugins/data-tables/DT_bootstrap.css"; ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/plugins/select2/select2_metro.css"; ?>" />

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
							<h3 class="page-title">Assignment 1<small> Manager all student records over here.</small></h3>
							<ul class="breadcrumb">
								<li>
									<a href="<?php echo base_url() . "controller"; ?>">Assignment 1</a>
									|
									<a href="<?php echo base_url() . "controller/stringsort"; ?>">Assignment 2</a>
									|
									<a href="<?php echo base_url() . "controller/sqlquery"; ?>">Assignment 3</a>
								</li>
							</ul>
							<small> Create a simple student info system – add, edit, list 
							<br/>- Add should take a page where I can enter (Name, email, dob, phone, college, address, city state, country). 
							<br/>- When we click on Save, show validation warnings and then put the fields in the database. 
							<br/>- List should be able to show all the students in the database 
							<br/>- Edit should be able to edit a student (Use PHP, Mysql and preferably Ajax. Make a usable interface as well.) </small> 
							
						</div>
					</div>
					<!-- END PAGE HEADER-->
					<!-- BEGIN PAGE CONTENT-->
					<div class="row-fluid" style="margin-top:20px;">
						<div class="span12">
							<div class="tabbable portlet-tabs">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#portlet_tab1" id="tab1link" data-toggle="tab">Student List</a>
									</li>
									<li>
										<a href="#portlet_tab2" id="tab2link" data-toggle="tab">Add Student</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="portlet_tab1">
										<table class="table table-striped table-bordered table-hover" id="sample_1">
											<thead>
												<tr>
													<th>StudentName</th>
													<th class="hidden-480">Email</th>
													<th class="hidden-480">DOB</th>
													<th class="hidden-480">PhoneNo</th>
													<th class="hidden-480">CollegeName</th>
													<th class="hidden-480">Address</th>
													<th >Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (isset($StudList)) {
													foreach ($StudList as $key) {
														echo "<tr class='odd gradeX'>
<td>{$key->studName}</td>
<td class='hidden-480'><a href='mailto:shuxer@gmail.com'>{$key->studEmail}</a></td>
<td class='hidden-480'>{$key->studDOB}</td>
<td class='center hidden-480'>{$key->studPhoneNo}</td>
<td class='hidden-480'>{$key->studCollegeName}</td>
<td class='hidden-480'>{$key->studAddress1},
<br/>
{$key->studAddress2},
<br/>
{$key->cityName}
<br/>
{$key->stateName},{$key->countryName}.</td>
<td ><button id='editlink' data-basepath='" . base_url() . "' onclick='UpdateStudeInfo(\"{$key->studID}\");' class='btn blue'>Edit</button></td>
</tr>";
													}
												}
												?>
											</tbody>
										</table>

									</div>
									<div class="tab-pane" id="portlet_tab2">
										<!-- BEGIN FORM-->
										<?php
										$attributes = array('class' => 'form-horizontal', 'id' => 'form_sample_1');
										echo form_open('controller/', $attributes);
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
											<label class="control-label">Student Name<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="studname" id="studname" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Email<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="email" id="email" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Date of Birth<span class="required">*</span></label>
											<div class="controls">
												<div class="input-append date date-picker" data-date="01-01-1995" data-date-viewmode="years">
													<input class="m-wrap m-ctrl-medium date-picker" readonly size="16" type="text" name="dob" id="dob" value="" />
													<span class="add-on"><i class="icon-calendar"></i></span>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Phone No<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="phoneno" id="phoneno" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">College Name<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="collegename" id="collegename" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Address<span class="required">*</span></label>
											<div class="controls">
												<input type="text" name="address1" id="address1" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label"></label>
											<div class="controls">
												<input type="text" name="address2" id="address2" class="span6 m-wrap">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Country</label>
											<div class="controls">
												<select data-basepath="<?php echo base_url(); ?>" name="country" id="country" class="span6 m-wrap">
													<option value="">Select...</option>
													<?php
													foreach ($CountryList as $key) {
														echo "<option value='{$key->countryID}'>{$key->countryName}</option>";
													}
													?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">State</label>
											<div class="controls">
												<select data-basepath="<?php echo base_url(); ?>" name="state" id="state" class="span6 m-wrap">
													<option value="">Select...</option>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">City</label>
											<div class="controls">
												<select name="city" id="city" class="span6 m-wrap">
													<option value="">Select...</option>
												</select>
											</div>
										</div>
										<input type="hidden" name="studid" id="studid" value=""/>
										<div class="form-actions">
											<button type="submit" id="btnsave" name="btnsave" class="btn blue">
												Save
											</button>
											<button type="button" id="btncancel" class="btn">
												Cancel
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
		<!-- Jquery For Searchable JQuery -->
		<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/select2/select2.min.js"; ?>"></script>
		<!-- Jquery For Datatables -->
		<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/jquery.dataTables.js"; ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . "assets/plugins/data-tables/DT_bootstrap.js"; ?>"></script>

		<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

		<!-- Page Level Jquery  -->
		<script src="<?php echo base_url() . "assets/scripts/index.js"; ?>"></script>
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
				Index.InitTable();
				Index.InitValidation();
				Index.Inituidesign();
			});
		</script>

	</body>
</html>