<?php
include_once("functions.php");


// $cols = [
// "user_name",
// "user_password",
// "user_email"];

// $data = [
// "hassan",
// "123",
// "hassan@email.com"
// ];
$data = [
	["user_name","hassan2"],
	["user_password","12345"],
	["user_email","hassan2@email.com"]
];

$db = new Functions();
$db->connect();
//$db->create("users", $data);
$upd = [
["user_name", "changed"],
["user_email", "changed@newEmails.org"]
];

$where = [
["user_id", 1]
];

$r = $db->read_all("users");
echo "<pre>". print_r($r), "</pre>";



?>