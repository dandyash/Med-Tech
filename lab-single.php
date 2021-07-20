<?php include("connection.php"); 
	
	if(isset($_GET['lab'])){
		$lab=$_GET['lab'];
		$q = "SELECT u.u_id,u.u_img,u.u_name,u.u_addr,u.u_phn,u.u_email,l.lab_id,l.l_mor_time,l.l_noon_time,l.home_service,a.area_name FROM lab_master l JOIN user_master u ON l.u_id=u.u_id JOIN user_type_master ut ON u.u_type_id=ut.u_type_id JOIN area_master a ON u.area_id=a.area_id WHERE u.u_name='$lab'";
    	$result = mysqli_query($conn,$q);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$phn=$row['u_phn'];
    		$email=$row['u_email'];
    		$add=$row['u_addr'];
    		$mor_time=$row['l_mor_time'];
    		$noon_time=$row['l_noon_time'];
    		$area=$row['area_name'];
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="lab.php">Labs <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread" style="color: white"><?php echo $lab; ?></h1>
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
      					<h2><?php echo $lab; ?></h2>
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
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Details</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						    	<div class="row">

						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="icon-map-marker"></span> &nbsp;Address: <?php echo $add;?>,<?php echo $area;?>,Gujarat,India</li>
						    				<li class="check"><span class="icon-phone"></span> Phone: <?php echo $phn;?></li>
						    				<li class="check"><span class="icon-envelope"></span>Email: <?php echo $email;?></li>
						    				<li class="check"><span class="ion-ios-time"></span> Timmings: <?php echo $mor_time;?>-<?php echo $noon_time; ?></li>
						    				</ul>
						    		</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <br>
                      <a href="test.php?lab=<?php echo $lab;?>" class="d-flex align-items-center justify-content-center btn-custom" style="background-color: currentColor; border-radius: 15px"><span style="color: white;">View List Of Available Tests</span></a>
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