<?php
	
	session_start();
?>


<!-- avalable book -->
<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$book_author = "";
	$book_no = "";
	$book_price = "";
	$query = "select * from books";
?>
<!-- issued b00ks -->
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
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
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
			<li class="nav-item">
				<a href="user_issue_book.php" class="nav-link">Issue Book</a>
			</li>
		</ul>
	</div>
</nav>

<span><marquee>This is library Management System. Library opens at <a class="text-primary">8:00 AM</a> and close at <a class="text-danger">8:00 PM</a></marquee></span><br><br>
<div class="row"  style="margin-right:0px;">
<div class="col-md-2"></div>
<div class="col-md-8">
<h1 style="text-align:center; color:white;" class="bg-dark">Available Books</h1>
		<form>
			<table class="table-bordered"  style="text-align: center" width="100%">
				<tr>
					<th>Name:</th>
					<th>Author:</th>
					<th>Price:</th>
					<th>Number:</th>
				</tr>
				<?php
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						$book_name = $row['book_name'];
						$book_author = $row['book_author'];
						$book_price = $row['book_price'];
						$book_no = $row['book_no'];
				?>
						<tr>
							<td><?php echo $book_name;?></td>
							<td><?php echo $book_author;?></td>
							<td><?php echo $book_price;?></td>
							<td><?php echo $book_no;?></td>
						</tr>
						<?php
					}
				?>
			</table>
		</form>
</div>

<!-- issued b00ks -->

	
	
    
    <div class="col-md-2">

    </div>
    
</div>
</body>
</html>

