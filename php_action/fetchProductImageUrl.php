<?php 	

require_once 'core.php';

$productId = $_GET['i'];
$companyid=$_SESSION['companyid'];

$sql = "SELECT product_image FROM product WHERE product_id = {$productId} AND companyid='$companyid'";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "stock/" . $result[0];
