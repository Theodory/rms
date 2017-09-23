<?php
include('../dbconfig/dbconnect.php');
session_start();

$id = $_GET['id'];

mysql_query("delete from alumni_programme_participants where id='$id'");

 header('Location: ' . $_SERVER['HTTP_REFERER']);


?>