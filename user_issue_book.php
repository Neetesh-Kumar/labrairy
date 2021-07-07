<?php
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$query = "select book_name,book_author,book_no from issued_books where student_id=$_SESSION[id] and status = 1";
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

	<div class="col-md-5">
    <h1 style="text-align:center; color:white;" class="bg-dark">Issued Books </h1>
    <form>
			<table class="table table-bordered"  style="text-align: center">
				<thead>
					<tr>
						<th>Book Name:</th>
						<th>Book Author:</th>
						<th>Book Number:</th>
					</tr>
				</thead>
				<?php
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						$book_name = $row['book_name'];
						$author = $row['book_author'];
						$book_no = $row['book_no'];
				?>
						<tr>
							<td><?php echo $book_name;?></td>
							<td><?php echo $author;?></td>
							<td><?php echo $book_no;?></td>
						</tr>
						<?php
					}
				?>
			</table>
		</form>
	</div>
	
    <div class="col-md-2"></div>
    <div class="col-md-5">
    <h1 style="text-align:center; color:white;" class="bg-dark">Student Issue Book</h1>
	<form action="" method="post">
				<div class="form-group">
					<label>Book Name:</label>
					<select class="form-control" name="book_name">
					<option>-Select author-</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select book_name from books";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['book_name'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Book Author:</label>
					<select class="form-control" name="book_author">
						<option>-Select author-</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select autor_name from authors";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['autor_name'];?></option>
								<?php
							}
						?>
					</select>
				<div class="form-group">
					<label>Book Number:</label>
					<select class="form-control" name="book_no">
					<option>-Select author-</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select book_no from books";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['book_no'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Student ID:</label>
					<input type="text" name="student_id" class="form-control" required="" value="<?php echo $_SESSION['id'];?>" disabled>
				</div>
				<div class="form-group">
					<label>Issue Date:</label>
					<input type="text" name="issue_date" class="form-control" value="<?php echo date("yy-m-d");?>" required="">
				</div>	
				</div>
				<button class="btn btn-primary" name="issue_book">Issue Book</button>

			</form>

    </div>
    
</div>
	
</body>
</html>
<?php
	if(isset($_POST['issue_book'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into issued_books values(null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_SESSION[id],1,'$_POST[issue_date]')";
		$query_run = mysqli_query($connection,$query);
		header("location:user_issue_book.php");
		exit;
	}
?>