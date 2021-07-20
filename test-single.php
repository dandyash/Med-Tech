<?php include("connection.php");
include "lab_mail.php";
session_start();
	if(isset($_GET['test'])){
		$test=$_GET['test'];
		$q = "SELECT * FROM test_master t JOIN lab_master l ON t.lab_id=l.lab_id JOIN user_master u ON l.u_id=u.u_id JOIN area_master a ON u.area_id=a.area_id JOIN test_type_master tt ON t.t_type_id=tt.t_type_id WHERE t.t_name='$test'";
    	$result = mysqli_query($conn,$q);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$lab_name=$row['u_name'];
    		$email=$row['u_email'];
        $lab_id=$row['lab_id'];
        $add=$row['u_addr'];
        $area=$row['area_name'];
        $phn=$row['u_phn'];
        $mor_time=$row['l_mor_time'];
        $noon_time=$row['l_noon_time'];
        $price=$row['t_price'];
        $test_id=$row['t_id'];
     	}
	}
    if(isset($_POST['submit']))
    {
        $appdate=$_POST['appdate'];
      if (isset($_SESSION['id'])) {
        $userstatus=1;
        $docstatus=1;

        $u=$_SESSION['id'];
        $_SESSION['date'] = $appdate;


        $q = "insert into test_appointment_master(u_id,lab_id,t_id,t_a_date,u_status,l_status)values('$u','$lab_id','$test_id','$appdate','1','1')";
        $query=mysqli_query($conn,$q);

        if ($query) {
          $q1 = "select * from user_master where u_id ='$u' ";
$query1 = mysqli_query($conn,$q1);

while($row=mysqli_fetch_array($query1))
{
  $_SESSION['email'] = $row['u_email'];
  $_SESSION['pat_name'] = $row['u_name'];
}

$q2 = " select * from test_appointment_master t join lab_master l on t.lab_id = l.lab_id join user_master u on l.u_id = u.u_id join test_master ta on t.t_id = ta.t_id";
$query2 = mysqli_query($conn,$q2);
while($row=mysqli_fetch_array($query2))
{
$_SESSION['lab_name'] = $row['u_name'];
$_SESSION['lab_addr'] = $row['u_addr'];
$_SESSION['lab_phn'] = $row['u_phn'];
$_SESSION['test_name'] = $row['t_name'];
 }
    if($query)
    {
      sendmail();
        echo "<script>alert('Your appointment successfully booked');</script>";
        echo "<script>alert('Mail successfully send..');</script>";
    }        }
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
    
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/lab.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
         <div class="col-md-9 ftco-animate pb-5 text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="test.php?lab=<?php echo $lab_name; ?>">List Of Available Tests <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread" style="color: white;"><?php echo $test; ?></h1>
            <h6 style="color: white;"><?php echo $lab_name; ?></h6>
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
      				<div class="img" style="background-image: url(images/lab.jpg);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo$lab_name; ?></span>
      					<h2><?php echo $test; ?></h2>
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
						    				<li class="check"><span class="icon-rupee"></span> Price: <?php echo $price;?>Rs</li>
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
});
    </script> 
  </body>
</html>