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
							<h3 class="page-title">Assignment 3</h3>
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
							<small> Assume there is a Emp table with three columns - Emp Id, Name, Date of birth (dd-mm-yyyy) with 5000 rows. <br>
							Write a sql statement that shows the employees for each age from 30 to 50. Output will have two columns. <br> 
							For example: <br>
								<table border="1">
									<tr>
										<th>Age</th>
										<th>NoOfEmployees
									</tr>
									<tr>
										<td>30</td>
										<td>100</td>
									</tr>
									<tr>
										<td>31</td>
										<td>47</td>
									</tr>
								</table>
							</small>
						</div>
					</div>
					<!-- END PAGE HEADER-->
					<!-- BEGIN PAGE CONTENT-->
					<div class="row-fluid" style="margin-top: 20px">
						<div class="span12">
							<div class="tabbable portlet-tabs">
								<div class="tab-content">
									<div class="tab-pane active" id="portlet_tab1">
										<p><b>SELECT FLOOR(DATEDIFF(NOW(), DATE_FORMAT(STR_TO_DATE(`DateOfBirth`,'%d-%m-%Y'),'%Y-%m-%d'))/365) AS Age, COUNT(*) AS NoOfEmployees
										<br/> FROM Emp
										<br/> GROUP BY Age
										<br/> HAVING Age >= 30 && Age <= 50</b></p>
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
	
	</body>
</html>