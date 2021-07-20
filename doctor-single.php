<?php include("connection.php");
include "sendpatientmail.php";
session_start();
	if(isset($_GET['doctor'])){
		$doctor=$_GET['doctor'];
		$q = "SELECT u.u_id,u.u_img,u.u_phn,u.u_email,d.d_id,s.speci_id,s.speci_name,s.qualification,c.c_id,c.c_addr,c.c_mor_time,c.c_noon_time,c.old_case_price,c.new_case_price,a.area_name FROM doctor_master d JOIN user_master u ON d.u_id=u.u_id JOIN user_type_master ut ON u.u_type_id=ut.u_type_id JOIN specialization_master s ON d.speci_id=s.speci_id JOIN clinic_master c ON c.d_id=d.d_id JOIN area_master a ON c.area_id=a.area_id WHERE ut.u_type_id=1 AND u.u_name='$doctor'";
    	$result = mysqli_query($conn,$q);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$phn=$row['u_phn'];
    		$email=$row['u_email'];
    		$spec=$row['speci_name'];
    		$qualification=$row['qualification'];
    		$add=$row['c_addr'];
    		$mor_time=$row['c_mor_time'];
    		$noon_time=$row['c_noon_time'];
    		$old_price=$row['old_case_price'];
    		$new_price=$row['new_case_price'];
    		$area=$row['area_name'];
        $id=$row['u_id'];
        $doc_id=$row['d_id'];
        $clinic_id=$row['c_id'];
     	}
	}
  if(isset($clinic_id))
  {
    $q = mysqli_query($conn , "Select * from clinic_master where c_id='$clinic_id'");
    while ($r = mysqli_fetch_array($q)) {
        $starttime = $r['c_mor_time'];  // your start time
        $endtime = $r['c_noon_time'];  // End time
        $duration = '30';  // split by 30 mins

        $array_of_time = array();
        $start_time = strtotime($starttime); //change to strtotime
        $end_time = strtotime($endtime); //change to strtotime

        $add_mins = $duration * 60;

        while ($start_time <= $end_time) // loop between time
        {
            $array_of_time[] = date("h:i", $start_time);
            $start_time += $add_mins; // to check endtie=me
        }
    }
  }
    if(isset($_POST['submit']))
    {
        $appdate=$_POST['appdate'];
        $time=$_POST['time'];
      if (isset($_SESSION['id'])) {
        $userstatus=1;
        $docstatus=1;

        $u=$_SESSION['id'];
        $_SESSION['date'] = $appdate;
        $_SESSION['time'] = $time;


        $q = "insert into doctor_appointment_master(u_id,d_id,c_id,d_a_date,d_app_time,u_status,d_status)values('$u','$doc_id','$clinic_id','$appdate','$time','$userstatus','$docstatus')";
        $query=mysqli_query($conn,$q);
        if ($query) {
          $q1 = "select * from user_master where u_id ='$u' ";
      $query1 = mysqli_query($conn,$q1);

      while($row=mysqli_fetch_array($query1))
      {
        $_SESSION['email'] = $row['u_email'];
        $_SESSION['pat_name'] = $row['u_name'];
      }

      $q2  = "select * from doctor_master d join user_master u on d.u_id = u.u_id where d.u_id='$id'" ;
      $query2 = mysqli_query($conn,$q2);
      while($row=mysqli_fetch_array($query2))
      {
        $_SESSION['doc_name'] = $row['u_name'];
        $_SESSION['doc_phn'] = $row['u_phn'];
      }

      $q3 = "select * from clinic_master where c_id = '$clinic_id'";
      $query3 = mysqli_query($conn,$q3);
      while($row=mysqli_fetch_array($query3))
      {
        $_SESSION['cli_name'] =$row['c_name'];
        $_SESSION['cli_addr'] = $row['c_addr'];
      }
      $q4 = "select * from doctor_appointment_master da join doctor_master d on da.d_id = d.d_id join specialization_master s on s.speci_id = d.speci_id ";
      $query4 = mysqli_query($conn,$q4);
      while($row=mysqli_fetch_array($query4))
      {
        $_SESSION['speci'] = $row['speci_name'];
      }   

      //echo $q;
      if($query)
      {
    
        sendmail();
        echo "<script>alert('Your appointment successfully booked');</script>";
      }
      if(sendmail())
      {
        echo "<script>alert('Mail Successfully send........');</script>";
      }
        }
        else{
                  echo $q;
        }
      
      }
      else{
        echo "<script>alert('Please Login to Book An Appointment');</script>";
      }
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="doctor.php">Doctors <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread"><?php echo $doctor; ?></h1>
          </div>
        </div>
        </div>
      </div>
    </div>

		<section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<div class="img" style="background-image: url(images/doctor_back.jpg);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo$spec; ?></span>
      					<h2><?php echo $doctor; ?></h2>
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
							      <a class="nav-link" id="doc-details-tab" data-toggle="pill" href="#doc-details" role="tab" aria-controls="doc-details" aria-expanded="true">Details</a>
							    </li>
                  
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="doc-details" role="tabpanel" aria-labelledby="doc-details-tab">
						    	<div class="row">

						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="icon-map-marker"></span> &nbsp;Address: <?php echo $add;?>,<?php echo $area;?>,Gujarat,India</li>
						    				<li class="check"><span class="icon-phone"></span> Phone: <?php echo $phn;?></li>
						    				<li class="check"><span class="icon-envelope"></span>Email: <?php echo $email;?></li>
						    				<li class="check"><span class="ion-ios-time"></span> Timmings: <?php echo $mor_time;?>-<?php echo $noon_time; ?></li>
						    				<li class="check"><span class="icon-rupee"></span> Old Case Price: <?php echo $old_price;?>Rs</li>
						    				<li class="check"><span class="icon-rupee"></span> New Case Price: <?php echo $new_price;?>Rs</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4"></div>
						    		<div class="col-md-4">
						    			<form method="post" action="">
                          <label for="AppointmentDate">
                            Date
                          </label>
                          <input class="form-control datepicker" name="appdate" type="" required="required" data-date-format="yyyy-mm-dd" autocomplete="off">
                          <br>
                          <label for="clinic">
                            Time
                          </label>
                          <select name="time" class="form-control" id="time"  required="required">
                            <option value="">Select Time</option>
                             <?php foreach ($array_of_time as $value) { ?>
                                 <option value="<?php  echo $value; ?>">
                             <?php  echo $value; ?>
                                 </option><?php }?>

                          </select>
                          <br>
                        <button type="submit" name="submit" class="btn btn-primary">
                              Book Appointment
                        </button>
                      </form>
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
      <script>
      jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
      });

      $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '0d',
    endDate: '+3d',
    color: '#28a745'
});
    </script> 
  </body>
</html>