<?php
require_once('../dbconfig/dbconnect.php');
session_start();
session_destroy();

header('Location: ../index.php');
?>