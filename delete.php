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
$db = new Functions();
$db->connect();
$db->delete("employee_info", "emp_id", $eid);
header("location: index.php?delete=1");