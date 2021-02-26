<?php
include("config.php");
$id = $_POST['app_cpanel_id'];
$sql = "SELECT username FROM cpanel WHERE id=".$id;
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row['username']);
?>