<?php
include('../dbconfig/dbconnect.php');
include("function.php");
session_start();

  if(isset($_SESSION['id'])){


if (isset($_POST['register'])) {
  $sname = ucfirst($_POST['sname']);
  $region = $_POST['region'];
  $refub_from = $_POST['refub_from'];
  $refub_to = $_POST['refub_to'];
  $pnumber = $_POST['pnumber'];
  $email = $_POST['email'];
  $lat = $_POST['lat'];
  $lon = $_POST['lon'];
  $description = $_POST['description'];


  $query = mysql_query("select * from libraries where sname='$sname'");

  $fetch = mysql_fetch_assoc($query);
  if($fetch['sname'] == $sname){
      $sms = "<p class='alert alert-error'>Library exist</p>";
  }else{
      if(mysql_query("insert into libraries values('','$sname','$region','$refub_from','$refub_to','$email','$pnumber','$lat','$lon','$description')")){
         header('Location: ' . $_SERVER['HTTP_REFERER']);
         $sms = "<p class='alert alert-success'>Library created successively!!</p>";
       }else{
          $sms = "<p class='alert alert-error'>Error occured!!</p>";
       }  
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<title>RMS | Libraries</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../assets/css/colorpicker.css" />
<link rel="stylesheet" href="../assets/css/datepicker.css" />
<link rel="stylesheet" href="../assets/css/matrix-style.css" />
<link rel="stylesheet" href="../assets/css/matrix-media.css" />
<link rel="stylesheet" href="../assets/css/pagination.css" />
<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../assets/css/page.css"> 

</head>
<body>
<?php include('includes/logo.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> > Libraries</div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
      <div class="row-fluid">
 <div class="span5">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Library</h5>
        </div>
        <div class="widget-content nopadding">
        <center><?php if(isset($sms)){echo $sms;} ?></center>
          <form action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label"> Name of School :</label>
              <div class="controls">
                <input type="text" name="sname"  class="span11" placeholder="name of school" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Region :</label>
              <div class="controls">
                <input type="text" name="region" placeholder="region" class="span11" required>
              </div>
            </div>
          <div class="control-group">
              <label class="control-label">Refubrishment from</label>
              <div class="controls">
                <div data-date="12-02-2012" class="input-append date datepicker">
                  <input type="text" value="12-02-2012" name="refub_from" data-date-format="mm-dd-yyyy" class="span11">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Refubrishment to</label>
              <div class="controls">
                <div data-date="12-02-2012" class="input-append date datepicker">
                  <input type="text" name="refub_to" value="12-02-2012" data-date-format="mm-dd-yyyy" class="span11">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text"  name="email" placeholder="Email" class="span11" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone number</label>
              <div class="controls">
                <input type="text"  name="pnumber" placeholder="Phone Number(S)" class="span11" required>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Latitude</label>
              <div class="controls">
                <input type="text"  name="lat" placeholder="Latitude" class="span11" required>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Longitude</label>
              <div class="controls">
                <input type="text"  name="lon" placeholder="Longitude" class="span11" required>
              </div>
            </div>
               <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span11" name="description"></textarea>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="register" class="btn btn-success">Add Library</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <div class="span7">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i></span>

            <h5>Libraries table</h5>
              <div id="search">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here...">
              <button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button>
            </div>

          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered table-striped" id="myTable">

              <thead>

                <tr>

                  <th>School Name</th>

                  <th>Region</th>

                  <th>Phone Number</th>

                  <th>Actions</th>

                </tr>

              </thead>

              <tbody>
               <?php
                $a=1;
                  if(isset($_GET["page"])){
              $page = (int)$_GET["page"];
              }else
              { $page=1; };

              $setLimit = 4;
              $pageLimit = ($page * $setLimit) - $setLimit;
              $sql = "SELECT * FROM libraries ORDER BY id ASC LIMIT $pageLimit,$setLimit";
              $query = mysql_query($sql);

                  while($fetch = mysql_fetch_array($query)){


          ?>
                <tr class="odd gradeX">

                  <td><?php echo $fetch['sname']; ?></td>

                  <td><?php echo $fetch['region']; ?></td>

                  <td class="center"> <?php echo $fetch['pnumber']; ?></td>

                  <td class="center"><a href="library_view.php?id=<?php echo $fetch['id'] ?>"><i title="view library" class="icon icon-eye-open "></i></a>| <a href="library_edit.php?id=<?php echo $fetch['id'] ?>"><i title="edit" class="icon icon-edit "></i></a> | <a onclick="return confirm('Are you sure');" href="library_delete.php?id=<?php echo $fetch['id'] ?>" ><i title="delete" class="icon icon-trash"></i></a>|<a href="library_volunteer.php?id=<?php echo $fetch['id'];?>"><span class="label label-info">Volunteers</span></a></td>

                </tr>
                <?php
                  }

                  $a++;
                ?>
              </tbody>
            </table>
        <?php
        echo displayPaginationBelow($setLimit,$page);
        ?>
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
<script src="../assets/js/bootstrap-datepicker.js"></script> 
<script src="../assets/js/bootstrap-colorpicker.js"></script>
<script src="../assets/js/matrix.js"></script> 
<script src="../assets/js/matrix.dashboard.js"></script> 
<script src="../assets/js/jquery.gritter.min.js"></script> 
<script src="../assets/js/matrix.interface.js"></script> 
<script src="../assets/js/jquery.validate.js"></script> 
<script src="../assets/js/matrix.form_validation.js"></script> 
<script src="../assets/js/jquery.wizard.js"></script> 
<script src="../assets/js/jquery.uniform.js"></script> 
<script src="../assets/js/select2.min.js"></script> 
<script src="../assets/js/matrix.popover.js"></script> 
<script src="../assets/js/jquery.dataTables.min.js"></script> 
<script src="../assets/js/matrix.tables.js"></script> 
<script src="../assets/js/pagination.js"></script> 

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
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38304687-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

  <?php
    }else{
      header('location: ../index.php');
    }
  ?>
</body>
</html>
