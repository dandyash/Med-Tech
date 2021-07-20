<?php
//error_reporting(0);
include('connection.php');

      if(isset($_GET['d_cancel']))
      {
              mysqli_query($conn,"update doctor_appointment_master set u_status='0' where d_a_id = '".$_GET['d_a_id']."'"); 

                  $_SESSION['msg']="Your appointment canceled !!";
      }
      if(isset($_GET['t_cancel']))
      {
              mysqli_query($conn,"update test_appointment_master set u_status='0' where t_a_id = '".$_GET['t_a_id']."'"); 

                  $_SESSION['msg']="Your appointment canceled !!";
      }
      if(isset($_GET['p_cancel']))
      {
              mysqli_query($conn,"update package_appointment_master set u_status='0' where p_a_id = '".$_GET['p_a_id']."'"); 

                  $_SESSION['msg']="Your appointment canceled !!";
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MED-TECH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="medtech-css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="medtech-css/animate.css">
    
    <link rel="stylesheet" href="medtech-css/owl.carousel.min.css">
    <link rel="stylesheet" href="medtech-css/owl.theme.default.min.css">
    <link rel="stylesheet" href="medtech-css/magnific-popup.css">

    <link rel="stylesheet" href="medtech-css/aos.css">

    <link rel="stylesheet" href="medtech-css/ionicons.min.css">

    <link rel="stylesheet" href="medtech-css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="medtech-css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="medtech-css/flaticon.css">
    <link rel="stylesheet" href="medtech-css/icomoon.css">
    <link rel="stylesheet" href="medtech-css/style.css">
  </head>
  <body>
    <?php include("header.php"); ?>
 
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/index.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread" >Appointment List</h1>
          </div>
        </div>
        </div>
      </div>
    </div>


        <div class="row">
          <div class="col-md-12 pills">
            <div class="bd-example bd-example-tabs">
              <div class="d-flex justify-content-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="doc-description-tab" data-toggle="pill" href="#doc-appointment" role="tab" aria-controls="doc-description" aria-expanded="true">Doctor Appointment List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="test-description-tab" data-toggle="pill" href="#test-appointment" role="tab" aria-controls="test-description" aria-expanded="true">Test Appointment List</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pckge-description-tab" data-toggle="pill" href="#pckge-appointment" role="tab" aria-controls="pckge-description" aria-expanded="true">Package Appointment List</a>
                  </li>
                </ul>
              </div>

              <div class="tab-content" id="appointment-tabContent">
                <div class="tab-pane fade show active" id="doc-appointment" role="tabpanel" aria-labelledby="doc-description-tab">
                  <div class="row">
<table class="table table-hover" id="sample-table-1">
                    <thead>
                      <tr>
                        <th class="hidden-xs">Doctor Name</th>
                        <th>Specialization</th>
                        <th>Consultancy Fee</th>
                        <th>Appointment Date / Time </th>
                                              <th>Current Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
$q = "select u.u_name,s.speci_name,c.old_case_price,da.d_a_date,da.d_app_time,da.u_status,da.d_status,da.d_a_id from doctor_appointment_master da join doctor_master d on da.d_id = d.d_id join user_master u on u.u_id = d.u_id join user_master uu on uu.u_id = da.u_id join specialization_master s on s.speci_id = d.speci_id join clinic_master c on da.c_id = c.c_id where uu.u_id = ".$_SESSION['id']." order by da.d_a_date DESC";  

$sql=mysqli_query($conn,$q);
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                      <tr>
                        <td class="hidden-xs"><?php echo $row['u_name'];?></td>
                        <td><?php echo $row['speci_name'];?></td>
                        <td><?php echo $row['old_case_price'];?></td>
                        <td><?php echo $row['d_a_date'];?> / <?php echo
                         $row['d_app_time'];?>
                        </td>
                        
                        <td>
<?php if(($row['u_status']==1) && ($row['d_status']==1))  
{
  echo "Active";
}
if(($row['u_status']==0) && ($row['d_status']==1))  
{
  echo "Cancel by You";
}

if(($row['u_status']==1) && ($row['d_status']==0))  
{
  echo "Cancel by Doctor";
}
if(($row['u_status']==1) && ($row['d_status']==3))  
{
  echo "Appointment Done";
}



                        ?></td>
                        <td >
                        <div class="visible-md visible-lg hidden-sm hidden-xs">
              <?php if(($row['u_status']==1) && ($row['d_status']==1))  
{ ?>

                          
  <a href="appointment_history.php?d_a_id=<?php echo $row['d_a_id']?>&d_cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-danger" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
  <?php } 
  elseif (($row['u_status']==1) && ($row['d_status']==3)) {
    echo "Appointment Done";
  }
  else {

    echo "Canceled";
    } ?>
                        </div>
                        
                      <?php 
$cnt=$cnt+1;
                       }?>
                      
                      
                    </tbody>
                  </table>
                  </div>
                </div>

                <div class="tab-pane fade" id="test-appointment" role="tabpanel" aria-labelledby="test-description-tab">
                  <div class="row">
<table class="table table-hover" id="sample-table-1">
                    <thead>
                      <tr>
                        <th class="hidden-xs">Lab Name</th>
                        <th>Test Name</th>
                        <th>Test Price</th> 
                        <th>Appointment Date</th>
                        <th>Current Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
//$q = "select d_a_id,d_app_time,d_a_date,u_status,d_status,u_name,speci_name,old_case_price from doctor_appointment_master a join user_master u on u.u_id = a.d_id join doctor_master d on d.d_id = a.d_id join specialization_master s on s.speci_id = d.speci_id join clinic_master c on c.c_id = a.c_id where a.u_id=".$_SESSION['id']."";   

$q = "select * from test_appointment_master t join lab_master l on l.lab_id = t.lab_id join user_master u on u.u_id = l.u_id join test_master tm on t.t_id = tm.t_id where t.u_id = ".$_SESSION['id']." order by t.t_a_date DESC";

$sql=mysqli_query($conn,$q);
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                      <tr>
                        <td class="hidden-xs"><?php echo $row['u_name'];?></td>
                        <td><?php echo $row['t_name'];?></td>
                        <td><?php echo $row['t_price'];?></td> 
                        <td><?php echo $row['t_a_date'];?> 
                        </td>
                        
                        <td>
<?php if(($row['u_status']==1) && ($row['l_status']==1))  
{
  echo "Active";
}
if(($row['u_status']==0) && ($row['l_status']==1))  
{
  echo "Cancel by You";
}

if(($row['u_status']==1) && ($row['l_status']==0))  
{
  echo "Cancel by Lab";
}
if(($row['u_status']==1) && ($row['l_status']==3))  
{
  echo "Appointment Done";
}



                        ?></td>
                        <td >
                        <div class="visible-md visible-lg hidden-sm hidden-xs">
              <?php if(($row['u_status']==1) && ($row['l_status']==1))  
{ ?>

                          
  <a href="appointment_history.php?t_a_id=<?php echo $row['t_a_id']?>&t_cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-danger" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
  <?php }
   elseif (($row['u_status']==1) && ($row['l_status']==3)) {
     echo "Appointment Done";
   }
   else {

    echo "Canceled";
    } ?>
                        </div>
                        
                      <?php 
$cnt=$cnt+1;
                       }?>
                      
                      
                    </tbody>
                  </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="pckge-appointment" role="tabpanel" aria-labelledby="pckge-description-tab">
                  <div class="row">
<table class="table table-hover" id="sample-table-1">
                    <thead>
                      <tr>
                        <th class="hidden-xs">Lab Name</th>
                        <th>Package Name</th>
                        <th>Package Price</th>
                        <th>Appointment Date / Time </th>
                                              <th>Current Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
$q = "SELECT pa.p_a_id,ul.u_name,p.pckge_name,p.pckge_price,pa.p_a_date,pa.p_a_time,pa.u_status,pa.l_status FROM package_appointment_master pa JOIN lab_master l ON pa.lab_id=l.lab_id JOIN user_master ul ON l.u_id=ul.u_id JOIN package_maaster p ON pa.pckge_id=p.pckge_id JOIN user_master u ON pa.u_id=u.u_id WHERE u.u_id= ".$_SESSION['id']." ORDER BY pa.p_a_date DESC";  

$sql=mysqli_query($conn,$q);
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                      <tr>
                        <td class="hidden-xs"><?php echo $row['u_name'];?></td>
                        <td><?php echo $row['pckge_name'];?></td>
                        <td><?php echo $row['pckge_price'];?></td>
                        <td><?php echo $row['p_a_date'];?> / <?php echo
                         $row['p_a_time'];?>
                        </td>
                        
                        <td>
<?php if(($row['u_status']==1) && ($row['l_status']==1))  
{
  echo "Active";
}
if(($row['u_status']==0) && ($row['l_status']==1))  
{
  echo "Cancel by You";
}

if(($row['u_status']==1) && ($row['l_status']==0))  
{
  echo "Cancel by Doctor";
}
if(($row['u_status']==1) && ($row['l_status']==3))  
{
  echo "Appointment Done";
}



                        ?></td>
                        <td >
                        <div class="visible-md visible-lg hidden-sm hidden-xs">
              <?php if(($row['u_status']==1) && ($row['l_status']==1))  
{ ?>

                          
  <a href="appointment_history.php?p_a_id=<?php echo $row['p_a_id']?>&p_cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-danger" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
  <?php } 
  else {

    echo "Canceled";
    } ?>
                        </div>
                        
                      <?php 
$cnt=$cnt+1;
                       }?>
                      
                      
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


     <?php include'footer.php'; ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="medtech-js/jquery.min.js"></script>
  <script src="medtech-js/jquery-migrate-3.0.1.min.js"></script>
  <script src="medtech-js/popper.min.js"></script>
  <script src="medtech-js/bootstrap.min.js"></script>
  <script src="medtech-js/jquery.easing.1.3.js"></script>
  <script src="medtech-js/jquery.waypoints.min.js"></script>
  <script src="medtech-js/jquery.stellar.min.js"></script>
  <script src="medtech-js/owl.carousel.min.js"></script>
  <script src="medtech-js/jquery.magnific-popup.min.js"></script>
  <script src="medtech-js/aos.js"></script>
  <script src="medtech-js/jquery.animateNumber.min.js"></script>
  <script src="medtech-js/bootstrap-datepicker.js"></script>
  <script src="medtech-js/jquery.timepicker.min.js"></script>
  <script src="medtech-js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="medtech-js/google-map.js"></script>
  <script src="medtech-js/main.js"></script>
    
  </body>
</html>