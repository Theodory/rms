<?php
include('../dbconfig/dbconnect.php');
session_start();

if(isset($_SESSION['id'])){
$id = $_GET['id'];

if(isset($_POST['submit'])){

  $file = $_FILES["image"]["name"];
  $temporary = explode(".", $file);
  $file_extension = end($temporary);

  if($_FILES["image"]["size"] < 6000000){
              if($_FILES["image"]['error'] > 0){

                      $sms =  $_FILES["image"]["error"];
              }else{
                   $target = "../Images/$file";
      move_uploaded_file($_FILES["image"]["tmp_name"] , $target);
     header('Location: profile.php?id='.$id);
        //header('Location: ' . $_SERVER['HTTP_REFERER']);

              }
  }else{
      $sms = "<p style='color: red'>Maximum size is 100000</p>";
  }

  mysql_query("UPDATE users SET image='".$_FILES["image"]["name"]."' WHERE id='$id' ");

}

?>
<!DOCTYPE html>
<html lang="en">
<title>RMS| Dashboard</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../assets/css/fullcalendar.css" />
<link rel="stylesheet" href="../assets/css/matrix-style.css" />
<link rel="stylesheet" href="../assets/css/matrix-media.css" />
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style type="text/css">
body {
font-family: Arial;
font-size: 14px;
}
.bgColor {
max-width: 440px;
height:150px;
background-color: #fff4be;
border-radius: 4px;
}
.bgColor label{
font-weight: bold;
color: #A0A0A0;
}
#targetLayer{
float:left;
width:150px;
height:150px;
text-align:center;
line-height:150px;
font-weight: bold;
color: #C0C0C0;
background-color: #F0E8E0;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}
#uploadFormLayer{
  float:left;
  padding: 20px;
}
.btnSubmit {
  background-color: #696969;
    padding: 5px 30px;
    border: #696969 1px solid;
    border-radius: 4px;
    color: #FFFFFF;
    margin-top: 10px;
}
.inputFile {
  padding: 5px;
  background-color: #FFFFFF;
  border:#F0E8E0 1px solid;
  border-radius: 4px;
}
.image-preview {  
width:150px;
height:150px;
border-bottom-left-radius: 4px;
border-top-left-radius: 4px;
}

</style>

</head>
<body>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> > Profile</div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
<div class="row-fluid">
  <div class="span11">
  <center>
      <div class="bgColor">
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
        <div id="targetLayer">No Image</div>
        <div id="uploadFormLayer">
        <input type="file" name="image" class="inputFile" /><br/>
        <button name="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</div>
</center>

  </div>
</div>
    
    
</div>

<!--end-main-container-part-->
<?php include('includes/footer.php'); ?>

<script src="../assets/js/excanvas.min.js"></script> 
<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/jquery.ui.custom.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/jquery.flot.min.js"></script> 
<script src="../assets/js/jquery.flot.resize.min.js"></script> 
<script src="../assets/js/jquery.peity.min.js"></script> 
<script src="../assets/js/fullcalendar.min.js"></script> 
<script src="../assets/js/matrix.js"></script> 
<script src="../assets/js/matrix.dashboard.js"></script> 
<script src="../assets/js/jquery.gritter.min.js"></script> 
<script src="../assets/js/matrix.interface.js"></script> 
<script src="../assets/js/matrix.chat.js"></script> 
<script src="../assets/js/jquery.validate.js"></script> 
<script src="../assets/js/matrix.form_validation.js"></script> 
<script src="../assets/js/jquery.wizard.js"></script> 
<script src="../assets/js/jquery.uniform.js"></script> 
<script src="../assets/js/select2.min.js"></script> 
<script src="../assets/js/matrix.popover.js"></script> 


<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
<script type="text/javascript">
$(document).ready(function (e) {
  $("#uploadForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
      $("#targetLayer").html(data);
        },
        error: function() 
        {
        }           
     });
  }));
});
</script>
<?php
}else{
  header('location: ../index.php');
}
?>
</body>
</html>
