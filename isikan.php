<?php
require_once("config.php");
$query = "INSERT INTO pesan_".$_POST["id"]." (nama,msg) values ('".$_POST["nama"]."','".$_POST["msg"]."')";
$conn->query($query);
?>