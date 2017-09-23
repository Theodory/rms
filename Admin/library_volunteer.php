<?php
include('../dbconfig/dbconnect.php');
session_start();

if(isset($_SESSION['id'])){

$id = $_GET['id'];

if (isset($_POST['register'])) {
  $name = ucfirst($_POST['name']);
  $library_id = $id;
  $email = $_POST['email'];
  $pnumber = $_POST['pnumber'];
  $school = $_POST['school'];
  

  $query = mysql_query("select * from volunteers where email='$email'");

  $fetch = mysql_fetch_assoc($query);
  if($fetch['email'] == $email){
      $sms = "<p class='alert alert-error'>Volunteer already exist</p>";
  }else{
      if(mysql_query("insert into volunteers values('','$library_id','$name','$pnumber','$email','$school')")){
        header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
        die;
         $sms = "<p class='alert alert-success'>Volunteer created successively!!</p>";
       }else{
          $sms = "<p class='alert alert-error'>Error occured!!</p>";
       }

     
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<title>RMS| Library</title>
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
<?php
  $query = mysql_query("select * from libraries where id='$id'");

  $fetch = mysql_fetch_array($query);
?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> > <a href = "javascript:history.back()">Libraries</a> > <?php echo $fetch['sname'];?> > Volunteers</div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
      <div class="row-fluid">
 <div class="span5">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Volunteer for <?php echo $fetch['sname'];?></h5>
        </div>
        <div class="widget-content nopadding">
        <center><?php if(isset($sms)){echo $sms;} ?></center>
          <form action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label"> Name :</label>
              <div class="controls">
                <input type="text" name="name"  class="span11" placeholder="name.." required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" name="email" placeholder="Email" class="span11" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone number(S)</label>
              <div class="controls">
                <input type="number"  name="pnumber" placeholder="Phone Number" class="span11" required>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">School(S)</label>
              <div class="controls">
                <textarea name="school" placeholder="School(s)..." required></textarea>
              </div>
            </div>  
            <div class="form-actions">
              <button type="submit" name="register" class="btn btn-success">Add Volunteer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <div class="span7">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5><?php echo $fetch['sname'];?> Volunteers</h5>

          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered table-striped">

              <thead>

                <tr>

                  <th>Name</th>

                  <th>Email</th>

                  <th>Phone number</th>

                  <th>School</th>

                  <th>Actions</th>

                </tr>

              </thead>

              <tbody>
               <?php
               $query = mysql_query("select * from volunteers where library_id='$id'");
               if(mysql_num_rows($query) < 1){
                    echo "<p class='alert alert-error'>Ooops! No volunteers yet! for ".$fetch['sname']." Add some.</p>";
               }else{
            $query = mysql_query("select * from volunteers where library_id='$id'");

        
            $a = 1;

            while($fetch = mysql_fetch_array($query)){


          ?>
                <tr class="odd gradeX">

                  <td><?php echo $fetch['name']; ?></td>

                  <td><?php echo $fetch['pnumber']; ?></td>

                  <td><?php echo $fetch['email']; ?></td>

                  <td class="center"> <?php echo $fetch['school']; ?></td>

                  <td class="center"><a href="volunteer_edit.php?id=<?php echo $fetch['id'] ?>"><i class="icon icon-edit "></i></a> | <a href="volunteer_delete.php?id=<?php echo $fetch['id'] ?>"><i class="icon icon-trash"></i></a></td>

                </tr>
                <?php
                  }

                  $a++;
                }
                ?>
              </tbody>

            </table>

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
 <?php
    }else{
      header('location: ../index.php');
    }
  ?>
</body>
</html>
