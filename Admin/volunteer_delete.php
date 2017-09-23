<?php
require_once('../dbconfig/dbconnect.php');

$id = $_GET['id'];

mysql_query("delete from volunteers where id='$id'");
//many redirection on the same page
 header('Location: ' . $_SERVER['HTTP_REFERER']);

?>