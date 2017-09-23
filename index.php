<?php
//comment
include('processlogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>RMS| Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="assets/css/matrix-login.css" />
        <link href="assets//font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">        
            <form id="loginform" method="POST" action="" class="">
		<div class="control-group normal_text"> <h1><span style="color: red;">R</span><span style="color: blue;">M</span><span style="color: black;">S</span></h1></div>
              <center><?php if(isset($sms)){ echo $sms; }?></center>    
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="email" placeholder="email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button name="login" class="btn btn-success">Login</button></span>
                </div>
            </form>
        </div>
        
        <script src="assets/js/jquery.min.js"></script>  
        <script src="assets/js/matrix.login.js"></script> 
    </body>
</html>
