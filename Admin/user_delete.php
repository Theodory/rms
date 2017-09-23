<?php
require_once('../dbconfig/dbconnect.php');

$id = $_GET['id'];

mysql_query("delete from users where id='$id'");

header('Location: users.php');

?>