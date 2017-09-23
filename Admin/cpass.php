<?php
//here must use the token for emailinh to the client
include('../dbconfig/dbconnect.php');
if(isset($_SESSION['id'])){
$id = $_GET['id'];

if(isset($_POST['cpass'])){
    $current = $_POST['password'];
    $cpassword = $_POST['npassword'];
    $cnpass = $_POST['cnpassword'];

    $query=mysql_query("select * from users where id='$id'");

    $fetch = mysql_fetch_array($query);

    if($fetch['password'] != $current){
        $sms = "<p class='alert alert-error'>current password does not match with our records</p>";
    }else{
        if($cpassword==$cnpass){
            mysql_query("update users set password='$cpassword' where id='$id'");
            header('Location: ../index.php');
        }else{
            $sms = "<p class='alert alert-error'>Sorry, new passwords did'nt match</p>";
        }
    }
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>RMS| Change Password</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="../assets/js/angular4.js"></script>
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../assets/css/matrix-login.css" />
        <link href="../assets//font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body ng-app="app" ng-controller="mainController">
        <div id="loginbox">        
            <form id="loginform" method="POST" action="" class="">
            <h4><a href="index.php">Back Home</a> <i class="icon icon-home"></i></h4>
		<div class="control-group normal_text"> <h1><span style="color: red;">R</span><span style="color: blue;">M</span><span style="color: black;">S</span></h1></div>
              <center><?php if(isset($sms)){ echo $sms; }?></center>    
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="password" name="password" placeholder="current Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" ng-model="npassword" name="npassword" placeholder="New Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" ng-model="c2
                            " name="cnpassword" placeholder="Confirm New Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button name="cpass" class="btn btn-success">Change Password</button></span>
                </div>
                    <center><p class="alert alert-success">{{compare()}}</p></center>
            </form>
        </div>
        
        <script src="../assets/js/jquery.min.js"></script>  
        <script src="../assets/js/matrix.login.js"></script> 
    <script type="text/javascript">
        var app = angular.module("app", []);

        app.controller("mainController", function($scope){

               $scope.compare = function(){
        if($scope.npassword !="" || $scope.cnpassword !=""){
            if(angular.equals($scope.npassword,$scope.cnpassword)){

                return 'passwords match!!';
            }else{

                return 'Sorry, password didnt match';
            }
        }
    }
        });
    </script>
     <?php
    }else{
      header('location: ../index.php');
    }
  ?>
    </body>
</html>
