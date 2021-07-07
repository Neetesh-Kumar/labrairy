<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
	  body {
  				background: url("background.jpg");
  				background-repeat: no-repeat;
    			background-attachment: fixed;
    			background-position: center;
    			background-size: cover;
    			-webkit-background-size: cover;
    			-moz-background-size: cover;
    			-o-background-size: cover;
				margin-right:0px;
			}
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
		  .form-group{
			  color: White;
		  }
		  .fr{
			  width:50%;
			  margin-left:200px;
		  }
		  .marq{
			  background-color:white;			
		  }
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Register</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<span class="marq " style="margin-right:0px;"><marquee>This is library Management System. Library opens at <a class="text-primary">8:00 AM</a> and close at <a class="text-danger">8:00 PM</a></marquee></span><br><br>
	<div class="row" style="margin-right:0px;">
		<div class="col-md-4" id="side_bar">
			<h5>Library Timing</h5>
			<ul>
				<li>Opening Timing: 8:00 AM</li>
				<li>Closing Timing: 8:00 PM</li>
				<li>(Sunday off)</li>
			</ul>
			<h5>What we provide ?</h5>
			<ul>
				<li>Full furniture</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>		
		<div class="col-md-8" id="main_content">
			<center><h3  class="font-weight-bold bg-dark text-light p-2">User Registration Form</h3></center>
			<form action="register.php" method="post" enctype="multipart/form-data" class="fr">
				<div class="form-group">
					<label for="name">Full Name:</label>
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Mobile Number:</label>
					<input type="text" name="mobile" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Address:</label>
					<textarea rows="3" cols="40" class="form-control" name="address"></textarea>
				</div>
				<div class="form-group">
					<label for="name">Image:</label>
					<input type="file" name="avatar" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
	</div>
	</div>
</body>
</html>