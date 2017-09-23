        <?php
include('../dbconfig/dbconnect.php');
session_start();

  $locations=array();
    $query = mysql_query("SELECT * FROM libraries WHERE 1=1 AND lat !=0 AND lon !=0");
        while( $row = mysql_fetch_array($query)){

            $sname = $row['sname'];                           
            $lat = $row['lat'];
             $lon = $row['lon']; 

            /* Each row is added as a new array */
  $locations[]=array( 'sname'=>$sname,'lat'=>$lat, 'lng'=>$lon );
        }
        /* Convert data to json */
       $markers = json_encode( $locations);
?>
<!DOCTYPE html>
<html lang="en">
<title>RMS | Map</title>
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a>  >  Library Refubishment Coverage Map </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
           <div id="map" style="width:100%;height:600px"></div>
           <script type='text/javascript'>
    <?php
        echo "var markers=$markers;\n";

    ?>

    function initMap() {

  var latlng = new google.maps.LatLng(-6.386925,35.682995);
        var myOptions = {
            zoom: 6,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
        };

        var map = new google.maps.Map(document.getElementById("map"),myOptions);
        var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
       
        var json = jQuery.parseJSON(JSON.stringify(markers));
          
        for(var o in json){

            lat = json[ o ].lat;
            lng=json[ o ].lng;
            sname=json[ o ].sname;
          
           var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,lng),
                name:sname,
                map: map
            }); 
            google.maps.event.addListener( marker, 'click', function(e){
                infowindow.setContent( this.name );
                infowindow.open( map, this);
            }.bind( marker));
        }
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByVu595YE_kePRp21mjgu2GsQLDGGOZoQ&callback=initMap">
    </script>
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
   //will return null if has no route
}
</script>
</body>
</html>
