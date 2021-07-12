<?php 	

require_once 'core.php';
$companyid=$_SESSION['companyid'];

$sql = "SELECT product_id, product_name FROM product WHERE status = 1 AND active = 1 AND companyid='$companyid'";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);