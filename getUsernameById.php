<?php
include("config.php");
$cpanel_id = $_POST['cpanel_id'];
$query = "SELECT `username` FROM `cpanel` WHERE `id` =".$cpanel_id;
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row['username']);
?>