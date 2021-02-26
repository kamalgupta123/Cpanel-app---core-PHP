<?php
include("config.php");
$product_id = $_POST['product_id'];
$sql = "SELECT slug FROM products WHERE product_id=".$product_id;
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row['slug']);
?>