<?php
	session_start();
	function get_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $book_count = "";
        $query=" select count(*) as book_count from books";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $book_count = $row['book_count'];

        }
        return ($book_count);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		
		  #side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
		  
		  .carousel-inner {
    		position: relative;
    		width: 100%;
    		overflow: hidden;
		}
		.carousel-item img {
    		height: 500px;
		}
		.w-100 {
   			 width: 100%!important;
		}
		.item {
   			 display: none;
    		 position: relative;
    		.transition(.6s ease-in-out left);
		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['avatar'];?>My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="user_dashboard.php" class="nav-link">Dashboard</a>
			</li>
		
		</ul>
	</div>
</nav>
<span><marquee>This is library Management System. Library opens at <a class="text-primary">8:00 AM</a> and close at <a class="text-danger">8:00 PM</a></marquee></span>

<!-- Add Slider -->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="https://i2.wp.com/www.lovelycoding.org/wp-content/uploads/2020/12/Library-Management-System.jpg?resize=640%2C427&ssl=1" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://imicrocloud.com/wp-content/uploads/2021/01/library-cover-page.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="http://www.elibrarysoftware.com/img/blog/1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Cl0se Slider -->
<br><br>
	<!-- <span><marquee>This is library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br> -->
	<h1 style="text-align:center; color:white;" class="bg-dark">Student Books Details </h1>

	<div class="row" style="margin-right:0px;">
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Available Books:</div>
				<div class="card-body">
					<p class="card-text">No. of Avalable Books: <span class="badge badge-danger"><?php echo get_book_count();?> </span></p>
					<a href="view_issued_book.php" class="btn btn-danger" target="_blank">View Available Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
	<br><br><br><br><br><br>
</body>
</html>