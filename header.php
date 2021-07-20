<?php include('connection.php'); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
.dropbtn {
  color: black;
  padding: px;
  font-size: 15px;
  border: none;
}

.dropdown {
  position: absolute;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: ;
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 0
}

.dropdown-content a {
  color: black; 
  padding: 2px;
  padding-left: 20px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd; color: #28a745;}

.dropdown:hover .dropdown-content {display: block;}


</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">MED-TECH</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto" style="padding-left: 325px;">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="doctor.php" class="nav-link">Doctors</a></li>
	          <li class="nav-item"><a href="lab.php" class="nav-link">Labs</a></li>
	          <li class="nav-item"><a href="package.php" class="nav-link">Packages</a></li>
            <?php if (isset($_SESSION['u_name'])) {
            ?>
            <li class="nav-item" style="padding-top: 15px; padding-left: 475px;">
             	<div class="dropdown">
  					   <a href="#" class="dropbtn"><?php echo $_SESSION['u_name']; ?></a>
  					   <div class="dropdown-content">
    					   <a href="appointment_history.php">View All Appointments</a>
    					   <a href="presc_reports.php">View Prescriptions & Test Reports </a>
    					   <a href="logout.php" style="color: red;">Log Out</a>
  					   </div>
				      </div>
			     </li>
           <?php } 
           else{
           ?>
          <li class="nav-item" style="padding-left: 425px;"><a href="user-login.php" class="nav-link">Login/Signup</a></li>
         <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
</body>
</html>
    