<?php
session_start();
require_once('dbconfig/dbconnect.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email==''||$password==''){

        $sms = "<p class='alert alert-error'>All fields are required</p>";
    }else{

    	$query = mysql_query("select * from users where email='$email' and password= '$password'");

    	if(mysql_num_rows($query)){

        $fetch = mysql_fetch_array($query);

        if($fetch['role'] == 'Admin'){
        $_SESSION['id'] = $fetch['id'];
        $_SESSION['name'] = $fetch['name'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['pnumber'] = $fetch['pnumber'];
        $_SESSION['role'] = $fetch['role'];
        header('Location: Admin/');
            }
        }else{
             $sms = "<p class='alert alert-error'>User does not exist</p>";
        }

    }
}
?>