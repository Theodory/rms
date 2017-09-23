<?php
include('../dbconfig/dbconnect.php');
session_start();

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
</head>
<body>
<?php include('includes/logo.php'); ?>
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
  <div class="span6">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="Enter Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company info :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Description field:</label>
              <div class="controls">
                <input type="text" class="span11">
                <span class="help-block">Description field</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Message</label>
              <div class="controls">
                <textarea class="span11"></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
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
<script src="../assets/js/select2.min.js"></script> 
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
</body>
</html>
