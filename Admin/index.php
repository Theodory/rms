<?php
include('../dbconfig/dbconnect.php');
include('../fusioncharts/fusioncharts.php');
session_start();

if(isset($_SESSION['id'])){


if(isset($_POST['submit'])){

  $task = $_POST['task'];
  $user = $_SESSION['id'];
  $date = date("Y-m-d");
  if(mysql_query("insert into tasks values('','$user','$task','$date')")){
    header('Location: ' .$_SERVER['HTTP_REFERER']);
  }else{
    $sms = "<p class='alert alert-error'>Error occured!!</p>";
  } 
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
<script src="../fusioncharts/fusioncharts.js"></script>
<script src="../fusioncharts/fusioncharts.charts.js"></script>
<script src="../fusioncharts/fusioncharts.theme.ocean.js"></script>
<script src="../fusioncharts/fusioncharts.theme.zune.js"></script>
<script src="../fusioncharts/fusioncharts.theme.fint.js"></script>
<script  src="../fusioncharts/fusioncharts.theme.carbon.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<?php include('includes/logo.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
      <div class="row-fluid">
          <?php
            $query =mysql_query("select * from libraries");

            $libraries = mysql_num_rows($query);
          ?>
              <a href="library.php"><div class="bg_lb span6" style="height: 130px;"> <h5> <i class="icon-home"></i> <center><span class="label label-important"><?php echo  $libraries; ?></span> Libraries </center></h5> </div></a>

                 <?php
            $query =mysql_query("select * from volunteers");

            $volunteers = mysql_num_rows($query);
          ?>
              <a href="volunteer.php"><div class="bg_ly span6" style="height: 130px;"> <h5> <i class="icon-group"></i><center><span class="label label-success"><?php echo  $volunteers; ?></span> Volunteers</center></h5> </div></a>
    </div>
    <hr>
    <div class="row-fluid">
      <div class="span6">
          <div class="widget-box widget-chat">
          <div class="widget-title bg_lb"> <span class="icon"> <i class="icon-calendar"></i> </span>
            <h5>My to do list</h5>
          </div>
          <div class="widget-content nopadding collapse in">

              <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Start/Finish</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
          <?php
          $user = $_SESSION['id'];
            $query = mysql_query("select * from tasks where user_id = '$user' order by id DESC");

              $a = 1;

            while($fetch = mysql_fetch_array($query)){

          ?>
                <tr>
                  <td class="taskDesc "><i class="icon-info-sign"></i> <?php echo $fetch['task']; ?></td>
                  <td class="taskStatus"><span class="in-progress"><?php echo $fetch['date']; ?></span></td>
                  <td class="taskOptions"><a id="text" href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="task_delete.php?id=<?php echo $fetch['id']; ?>" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                </tr>
                <?php
                  }
                  $a++;
                ?>
              </tbody>
            </table>
         <!-- End of task table -->

              <div class="chat-message well">
              <center><?php if(isset($sms)){ echo $sms;} ?></center>
              <form method="POST">
                <button name="submit" class="btn btn-success">Create</button>
                <span class="input-box">
                <input type="text" name="task" id="msg-box" required>
                </span> </form></div>
            </div>
        </div>
    </div>

       <div class="span6">
         
          <div class="widget-box widget-chat">
          <div class="widget-title bg_lb"> <span class="icon"> <i class="icon-camera"></i> </span>
            <h5>READ INTERNATIONAL</h5>
          </div>
          <div class="widget-content nopadding collapse in">
            <center><img src="../images/read_1.jpg" style="height: 350px;"></center>
        </div>
      </div>

      </div>
    <hr/>
    
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
<script src="../assets/js/matrix.popover.js"></script> 
<script src="../assets/js/jquery.dataTables.min.js"></script> 
<script src="../assets/js/matrix.tables.js"></script> 

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
     $('#text').on('click', function(e) {
 
         $('tr').addClass("newclass"); 
       
    });

</script>
<?php 
  }else{
    header('Location: ../index.php');
  }
?>
</body>
</html>
