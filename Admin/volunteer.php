<?php
include('../dbconfig/dbconnect.php');
session_start();

if(isset($_SESSION['id'])){

?>
<!DOCTYPE html>
<html lang="en">
<title>RMS| Library</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css" />
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> > Volunteers</div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
      <div class="row-fluid">
  <div class="span10">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>Read International Volunteers Table</h5>
    <a href=""><h5 onclick ="$('#myTable').tableExport({type:'pdf',escape:'false',tableName:'yourTableName',htmlContent:'false',consoleLog:'false'});">PDF REVIEW</h5></a>
              <div id="search">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ...">
                  <button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button>
              </div>
          </div>
          <div class="widget-content nopadding">

            <table class="table table-bordered table-striped" id="myTable">

              <thead>

                <tr>

                  <th>Name</th>

                  <th>Email</th>

                  <th>Phone number</th>

                  <th>School</th>

                  <th>Year</th>

                  <th>Actions</th>

                </tr>

              </thead>

              <tbody>

               <?php
               $query = mysql_query("select * from volunteers");
               if(mysql_num_rows($query) < 1){
                    echo "<p class='alert alert-error'>Ooops! No volunteers yet!</p>";
               }else{
            $query = mysql_query("select libraries.id,libraries.sname,libraries.refub_from,libraries.refub_to,volunteers.id,volunteers.name,volunteers.pnumber,volunteers.email,volunteers.school  from libraries,volunteers where libraries.id=volunteers.library_id");

        
            $a = 1;

            while($fetch = mysql_fetch_array($query)){
          ?>
                <tr class="odd gradeX">

                  <td><?php echo $fetch['name']; ?></td>

                  <td><?php echo $fetch['pnumber']; ?></td>

                  <td><?php echo $fetch['email']; ?></td>
                  <td class="center"> <?php echo $fetch['sname']; ?></td>
                  <td><?php echo $fetch['refub_from']; ?>"-"<?php echo $fetch['refub_to']; ?></td>
                  <td class="center"><a href="volunteer_edit.php?id=<?php echo $fetch['id'] ?>"><i title="edit" class="icon icon-edit "></i></a> | <a href="volunteer_delete.php?id=<?php echo $fetch['id'] ?>"><i title="delete" class="icon icon-trash"></i></a></td>

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
<script src="../tableintocvspdf/tableExport.js"></script>
<script src="../tableintocvspdf/jquery.base64.js"></script>
<!--pdf plugins-->

<script src="../tableintocvspdf/jspdf/libs/sprintf.js"></script>
<script src="../jspdf.js"></script>
<script src="../tableintocvspdf/jspdf/libs/base64.js"></script>


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
 <?php
    }else{
      header('location: ../index.php');
    }
  ?>
</body>
</html>
