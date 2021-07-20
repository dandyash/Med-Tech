<?php 
    include ('connection.php');
    if (isset($_POST['search'])){
        $s_data = $_POST['search_box'];
        $user_q = "SELECT u_type_id FROM user_master WHERE u_name LIKE '%$s_data%'";
        $user_r = mysqli_query($conn,$user_q);
        
            while ($row = mysqli_fetch_assoc($user_r)) {
                $type_id = $row['u_type_id'];
            }
            if ($type_id == 1) {
                header("Location:search_doctor_view.php?d_name=$s_data");
            }
            elseif ($type_id == 4) {
                header("Location:search_lab_view.php?l_name=$s_data");
            }
            else {
                $spec_q = "SELECT s.speci_name FROM doctor_master d JOIN user_master u ON d.u_id=u.u_id JOIN user_type_master ut ON u.u_type_id=ut.u_type_id JOIN specialization_master s ON d.speci_id=s.speci_id JOIN clinic_master c ON c.d_id=d.d_id WHERE s.speci_name='$s_data'";
                $spec_r = mysqli_query($conn,$spec_q);
                    while ($row = mysqli_fetch_assoc($spec_r)) {
                        $spec = $row['speci_name'];
                    }
                    if ($spec) {
                        header("Location:search_doctor_view.php?spec=$spec");
                    }
                    else{
                        $pckge_q = "SELECT * FROM package_maaster WHERE pckge_name LIKE '%$s_data%'";
                        $pckge_r = mysqli_query($conn,$pckge_q);
                        while ($row = mysqli_fetch_assoc($pckge_r)) {
                        $pckge = $row['pckge_name'];
                        }
                        if ($pckge) {
                            header("Location:search_pckge_view.php?pckge_name=$s_data");
                        }
                        else{
                            $test_q = "SELECT * FROM test_master WHERE t_name LIKE '%$s_data'";
                            $test_r = mysqli_query($conn,$test_q);
                            while ($row = mysqli_fetch_assoc($test_r)) {
                                $test = $row['t_name'];
                            }
                            if ($test) {
                              header("Location:search_test_view.php?test_name=$s_data");
                            }
                            else{
                              echo "<script>alert('Specified Data Not Found !!');</script>";
                            }
                        }
                    }
            }
    }
?>
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
    <?php 
      include("header.php");
    ?>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/index.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text text-center">
	            <h1 class="mb-4">The Simplest <br>Way To Book An Appointment</h1>
	            <form action="" class="search-location mt-md-5" method="post">
		        		<div class="row justify-content-center">
		        			<div class="col-lg-10 align-items-end">
		        				<div class="form-group">
		          				<div class="form-field">
				                <input type="text" class="form-control" placeholder="Search" name="search_box" autocomplete="off" required>
				                <button name="search"><span class="ion-ios-search"></span></button>
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
            </div>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section ftco-no-pb">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Our Services</span>
            <h2 class="mb-2">The Simplest Way To Book An Appointment</h2>
          </div>
        </div>
        <div class="row default">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div>
              <div class="media-body py-md-4">
                <h3>No Payment</h3>
                <p>User Do Not Have To Give Any Kind Of Paymment To Book An Appointment.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center"><img src="images/checkmark.ico"></div>
              <div class="media-body py-md-4">
                <h3>Verified Doctors & Labs</h3>
                <p>All The Doctors & Labs Are Fully Verified And Then Only They Are Available To User For The Consultation.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
              <div class="media-body py-md-4">
                <h3>Digitalized Reports</h3>
                <p>User Will Get All Prescriptions & Test Reports Directly On His/Her Phone/Computer. </p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <br>
    
    <section class="ftco-section ftco-degree-bg services-section img mx-md-5" style="background-image: url(images/index.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-start mb-5">
          <div class="col-md-6 text-center heading-section heading-section-white ftco-animate">
            <span class="subheading">System flow</span>
            <h2 class="mb-3">How it works</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2">
                  <div class="media-body py-md-4 text-center">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span>01</span></div>
                    <h3>Login Or Signup</h3>
                  </div>
                </div>      
              </div>
              <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2">
                  <div class="media-body py-md-4 text-center">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span>02</span></div>
                    <h3>View Various Doctors/Labs/Test Packages And Their Details</h3>
                  </div>
                </div>      
              </div>
              <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2">
                  <div class="media-body py-md-4 text-center">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span>03</span></div>
                    <h3>Select Date And Time For Appointment According To Your Convenience</h3>
                  </div>
                </div>      
              </div>
              <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2">
                  <div class="media-body py-md-4 text-center">
                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span>04</span></div>
                    <h3>Book The Appointment</h3>
                  </div>
                </div>      
              </div>
          </div>
        </div>
      </div>
    </section>



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