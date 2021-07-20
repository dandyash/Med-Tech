<?php include("connection.php"); 
  include("pckge_mail.php");
	session_start();
	if(isset($_GET['package'])){
		$package=$_GET['package'];
		$q = "SELECT * FROM package_maaster p JOIN lab_master l ON p.lab_id=l.lab_id JOIN user_master u on l.u_id=u.u_id JOIN user_type_master ut on u.u_type_id=ut.u_type_id JOIN area_master a ON u.area_id=a.area_id WHERE u.u_type_id=4 AND p.pckge_name='$package'";
    	$result = mysqli_query($conn,$q);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$phn=$row['u_phn'];
    		$email=$row['u_email'];
    		$add=$row['u_addr'];
    		$mor_time=$row['l_mor_time'];
    		$noon_time=$row['l_noon_time'];
    		$area=$row['area_name'];
        $lab_name=$row['u_name'];
        $pckge_price=$row['pckge_price'];
        $pckge_id=$row['pckge_id'];
        $lab_id=$row['lab_id'];
     	}
      $view = mysqli_query($conn, "SELECT t.t_name FROM pckge_test_master pt JOIN package_maaster p ON pt.pckge_id=p.pckge_id JOIN test_master t ON pt.t_id=t.t_id WHERE p.pckge_name='$package'");
	}
  if(isset($lab_id))
  {
    $q = mysqli_query($conn , "Select * from lab_master where lab_id='$lab_id'");
    while ($r = mysqli_fetch_array($q)) {
        $starttime = $r['l_mor_time'];  // your start time
        $endtime = $r['l_noon_time'];  // End time
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

              
        $q = "INSERT INTO package_appointment_master(u_id, lab_id, pckge_id, p_a_date, p_a_time, u_status, l_status) VALUES ('$u','$lab_id','$pckge_id','$appdate','$time','1','1')";
        $query=mysqli_query($conn,$q);

        if ($query) {
          $q1 = "select * from user_master where u_id ='$u' ";
          $query1 = mysqli_query($conn,$q1);

          while($row=mysqli_fetch_array($query1))
          {
            $_SESSION['email'] = $row['u_email'];
            $_SESSION['pat_name'] = $row['u_name'];
          }

          $q2 = " select * from package_appointment_master p join lab_master l on p.lab_id = l.lab_id join user_master u on l.u_id = u.u_id join package_maaster pa on p.pckge_id = pa.pckge_id";
          $query2 = mysqli_query($conn,$q2);
          while($row=mysqli_fetch_array($query2))
          {
            $_SESSION['lab_name'] = $row['u_name'];
            $_SESSION['lab_addr'] = $row['u_addr'];
            $_SESSION['lab_phn'] = $row['u_phn'];
            $_SESSION['pckge_name'] = $row['pckge_name'];
          }
          if($query)
          {
            sendmail();
            echo "<script>alert('Your appointment successfully booked');</script>";
            echo "<script>alert('Mail successfully send..');</script>";
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
    
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/lab.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="package.php">Packages <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread" style="color: white"><?php echo $package; ?></h1>
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
      					<h2><?php echo $package; ?></h2>
                <h6><?php echo $lab_name; ?></h6>
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
                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Tests Included</a>
                  </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Lab Details</a>
							    </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Book Appointment</a>
                  </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <ul class="features">
                        <?php while ($row = mysqli_fetch_assoc($view)) {?>
                        <li class="check"><span class="ion-ios-checkmark"></span><?php echo $row['t_name']; ?></li>
                      <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						    	<div class="row">

						    		<div class="col-md-4">
						    			<ul class="features">
                        <li class="check"><span class="icon-user"></span> Lab Name: <?php echo $lab_name;?></li>
						    				<li class="check"><span class="icon-map-marker"></span> &nbsp;Address: <?php echo $add;?>,<?php echo $area;?>,Gujarat,India</li>
						    				<li class="check"><span class="icon-phone"></span> Phone: <?php echo $phn;?></li>
						    				<li class="check"><span class="icon-envelope"></span>Email: <?php echo $email;?></li>
						    				<li class="check"><span class="ion-ios-time"></span> Timmings: <?php echo $mor_time;?>-<?php echo $noon_time; ?></li>
						    				</ul>
						    		</div>
						    	</div>
						    </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <ul class="features">
                        <li class="check"><span class="icon-rupee"></span><?php echo $pckge_price; ?></li>
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
});
    </script>  
  </body>
</html>