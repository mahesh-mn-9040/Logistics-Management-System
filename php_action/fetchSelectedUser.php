<?php 	

require_once 'core.php';

$userid = $_POST['userid'];
$companyid=$_SESSION['companyid'];

$sql = "SELECT * FROM users WHERE user_id = '$userid' AND companyid='$companyid'";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);