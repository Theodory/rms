<?php
require_once('../dbconfig/dbconnect.php');

$id = $_GET['id'];

mysql_query("delete from literacy where id='$id'");

 header('Location: ' . $_SERVER['HTTP_REFERER']);

?>