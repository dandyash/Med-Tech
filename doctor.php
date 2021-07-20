<?php
include 'connection.php';
    $q = "SELECT u.u_id,u.u_img,u.u_name,u.u_phn,u.u_email,s.speci_id,s.speci_name,s.qualification,c.c_id,c.c_addr,c.c_mor_time,c.c_noon_time,c.old_case_price,c.new_case_price FROM doctor_master d JOIN user_master u ON d.u_id=u.u_id JOIN user_type_master ut ON u.u_type_id=ut.u_type_id JOIN specialization_master s ON d.speci_id=s.speci_id JOIN clinic_master c ON c.d_id=d.d_id WHERE ut.u_type_id=1";
    $result = mysqli_query($conn,$q);
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Doctors <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread" >Doctors</h1>
          </div>
        </div>
        </div>
      </div>
    </div>


		<section class="ftco-section">
    	<div class="container">
        <div class="row">
          <?php while (  $row =  mysqli_fetch_assoc($result)    ) {
                ?>
          <div class="col-md-4">
            <div class="property-wrap ftco-animate">
              <a class="img" style="background-image: url(images/doctor_login.jpg);"></a>
              <div class="text">
                <p class="price"><span class="orig-price"><small>Old Case: </small><?php echo $row['old_case_price'];?> Rs</span><br><small>New Case: </small><span class="orig-price"><?php echo $row['new_case_price'];?> Rs</span></p>
                
                <h2><a href="doctor-single.php?doctor=<?php echo $row['u_name'];?>"><?php echo $row['u_name'];?></a></h2>
                <span class="location"><?php echo $row['speci_name'];?></span>
                <a href="doctor-single.php?doctor=<?php echo $row['u_name'];?>" class="d-flex align-items-center justify-content-center btn-custom">
                  <span class="ion-ios-add"></span>
                </a>
              </div>
            </div>
          </div>
        <?php }
        ?>
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