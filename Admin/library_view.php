<?php
include('../dbconfig/dbconnect.php');
session_start();

if(isset($_SESSION['id'])){

$id = $_GET['id'];

$query = mysql_query("select * from libraries where id='$id'");

$fetch = mysql_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<title>RMS | Libraries</title>
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> > Libraries > <?php echo $fetch['sname']; ?></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
      <div class="row-fluid">
  <div class="col-md-6 offset-md-4">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5><a href="javascript:demoFromHTML()">PDF Preview</a></h5>
            <h5><span class="pull-right"><a href="library_edit.php?id=<?php echo $fetch['id'];?>">Edit Library Information</a></span></h5>

          </div>
         <div class="widget-content nopadding updates collapse in" id="collapseG3">

            <div class="new-update clearfix"> <i class="icon-home"></i> <span class="update-notice"> <span><h4>NAME OF SCHOOL:  <?php echo $fetch['sname']; ?></h4></span> </span> </div>

            <div class="new-update clearfix"> <i class="icon-home"></i> <span class="update-notice"> <span><h4>REGION:  <?php echo $fetch['region']; ?></h4></span> </span> </div>

             <div class="new-update clearfix"> <i class="icon-calendar"></i> <span class="update-notice"> <span><h4>REFUBISHMENT FROM:  <?php echo $fetch['refub_from']; ?></h4></span> </span> </div>

              <div class="new-update clearfix"> <i class="icon-calendar"></i> <span class="update-notice"> <span><h4>REFUBISHMENT TO:  <?php echo $fetch['refub_to']; ?></h4></span> </span> </div>

               <div class="new-update clearfix"> <i class="icon-home"></i> <span class="update-notice"> <span><h4>SCHOOL EMAIL:  <?php echo $fetch['email']; ?></h4></span> </span> </div>

                <div class="new-update clearfix"> <i class="icon-phone"></i> <span class="update-notice"> <span><h4>PHONE NUMBER(S):  <?php echo $fetch['pnumber']; ?></h4></span> </span> </div>

                 <div class="new-update clearfix"> <i class="icon-map-marker"></i> <span class="update-notice"> <span><h4>LATITUDE:  <?php echo $fetch['lat']; ?></h4></span> </span> </div>

                  <div class="new-update clearfix"> <i class="icon-map-marker"></i> <span class="update-notice"> <span><h4>LONGITUDE:  <?php echo $fetch['lon']; ?></h4></span> </span> </div>

                   <div class="new-update clearfix"> <i class="icon-comment"></i> <span class="update-notice"> <span><h4>LIBRARY DESCRIPTION:</h4>  <h5><?php echo $fetch['description']; ?></h5></span> </span> </div>

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
<script src="../assets/js/jquery.validate.js"></script> 
<script src="../assets/js/matrix.form_validation.js"></script> 
<script src="../assets/js/jquery.wizard.js"></script> 
<script src="../assets/js/jquery.uniform.js"></script> 
<script src="../assets/js/select2.min.js"></script> 
<script src="../assets/js/matrix.popover.js"></script> 
<script src="../assets/js/jquery.dataTables.min.js"></script> 
<script src="../assets/js/matrix.tables.js"></script> 
<script src="../jspdf.js"></script>

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
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#collapseG3')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 30,
            bottom: 40,
            left: 30,
            width: 200
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width':550, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('library.pdf');
            }, margins
        );
    }
</script>
 <?php
    }else{
      header('location: ../index.php');
    }
  ?>
</body>
</html>
