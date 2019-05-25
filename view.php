<?php
session_start();
include_once("functions.php");
//view file
if(!isset($_COOKIE['user'])) {
	header("location: login.php?show_direct_access_error=true");
}

if(isset($_GET['id'])) {
	$eid = $_GET['id'];
} else {
	header("location: index.php");
}



//get employees
$db = new Functions();
$db->connect();
$emp = $db->read("employee_info", "emp_id", $eid);

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>

	<title>ByteRemix - Employee <?=$emp["emp_name"]?> info</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>

	<!-- Custom CSS -->
	<style>
	body {
		padding-top: 50px;
	}
	.starter-template {
		padding: 40px 15px;
		text-align: center;
	}
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">ByteRemix</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Dashboard</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">
		<?php
		if(isset($message)) {
            echo '<div class="alert alert-warning" role="alert">';
            echo $message;
            echo '</div>';
        }
		?>
		<br><br>
		<a href="index.php"> back </a>
		<br>
		<h3> ID </h3> <p> <?=$emp["emp_id"]?> </p>
		<h3> Name </h3> <p> <?=$emp["emp_name"]?> </p>
		<h3> Designation </h3> <p> <?=$emp["emp_designation"]?> </p>
		<h3> Salary </h3> <p> <?=$emp["emp_salary"]?> </p>
		<h3> Photo </h3> <img  src="<?=$emp["emp_photo"]?>"></img> </p>
		<!-- /.row -->
	</div>
	<!-- /.container -->
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>