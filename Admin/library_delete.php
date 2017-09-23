<?php
require_once('../dbconfig/dbconnect.php');

$id = $_GET['id'];

mysql_query("delete from libraries where libraries.id='$id'");

 header('Location: ' . $_SERVER['HTTP_REFERER']);

?>