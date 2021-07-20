<?php
//error_reporting(0);
include('connection.php');
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
            <h1 class="mb-3 bread" >Prescriptions And Test Results</h1>
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
                    <a class="nav-link active" id="doc-description-tab" data-toggle="pill" href="#doc-appointment" role="tab" aria-controls="doc-description" aria-expanded="true">Prescriptions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="test-description-tab" data-toggle="pill" href="#test-appointment" role="tab" aria-controls="test-description" aria-expanded="true">Test Results</a>
                  </li>
                </ul>
              </div>

              <div class="tab-content" id="appointment-tabContent">
                <div class="tab-pane fade show active" id="doc-appointment" role="tabpanel" aria-labelledby="doc-description-tab">
                  <div class="row">
                    <table class="table table-hover" id="sample-table-1">
                                <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Consultancy Fee</th>
                                    <th>Clinic name</th>
                                    <th>Appointment Date / Time </th>
                                    <th>Medicines</th>
                                    <th>Prescription</th>
                                    <th>Dozage Time</th>
                                    <th>Dozage Durations(days)</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $q1 = "select u.u_name,s.speci_name,c.c_name,c.old_case_price,m.med_name,dm.doz_time,dd.ddd_d,p.prec_time,p.Prescription from prescription_master p join doctor_master d on d.d_id = p.d_id join user_master u on d.u_id = u.u_id join user_master uu on p.u_id = uu.u_id join specialization_master s on d.speci_id = s.speci_id join clinic_master c on p.c_id = c.c_id join medicine_master m on p.med_id = m.med_id join dozage_master dm on p.doz_id = dm.doz_id join doz_days dd on p.ddd_id = dd.ddd_id WHERE uu.u_id='".$_SESSION['id']."' ORDER BY p.prec_time DESC";

                                    /*select u.u_name as name, ud.u_name as dname,s.speci_name,c.old_case_price,c.c_name from user_master u join prescription_master p on p.u_id = u.u_id join doctor_master d on u.u_id = d.u_id join user_master ud on u.u_id = d.u_id join specialization_master s on d.speci_id = s.speci_id join doctor_appointment_master da on da.d_id = d.d_id join clinic_master c on c.c_id = da.c_id
    select u.u_name as name, ud.u_name as dname,s.speci_name,c.old_case_price,c.c_name,dm.doz_time,dd.ddd_d from user_master u join prescription_master p on p.u_id = u.u_id join doctor_master d on u.u_id = d.u_id join user_master ud on u.u_id = d.u_id join specialization_master s on d.speci_id = s.speci_id join doctor_appointment_master da on da.d_id = d.d_id join clinic_master c on c.c_id = da.c_id join dozage_master dm on p.doz_id = dm.doz_id join doz_days dd on dd.ddd_id = p.ddd_id
    */
                                    // final   select u.u_name,s.speci_name,c.c_name,c.old_case_price,m.med_name,dm.doz_time,dd.ddd_d,p.prec_time from  prescription_master p join doctor_master d on d.d_id = p.d_id join user_master u  on d.u_id = u.u_id join specialization_master s on d.speci_id = s.speci_id join clinic_master c on p.c_id = c.c_id  join medicine_master m on p.med_id = m.med_id join dozage_master dm on p.doz_id = dm.doz_id join doz_days dd on p.ddd_id = dd.ddd_id

                                $sql1= mysqli_query($conn,$q1);
                                $cnt=1;

                                while($row=mysqli_fetch_array($sql1))
                                {
                                    ?>

                                    <tr> 
                                        <td ><?php echo $row['u_name']; ?></td>
                                        <?php
                                        //}
                                        //$q = "select u_name,speci_name,old_case_price,d_a_date,d_app_time,d_status,u_status from doctor_appointment_master a join user_master u on a.d_id = u.u_id  join  doctor_master d on d.d_id = a.d_id join specialization_master s
                                        //on s.speci_id = d.speci_id join clinic_master c on c.c_id = a.c_id";


                                        //$sql=mysqli_query($conn,$q );
                                        //$sql1=mysqli_query($conn,$q1);

                                        //while($row=mysqli_fetch_array($sql))
                                        //{
                                        ?>



                                        <td><?php echo $row['speci_name'];?></td>
                                        <td><?php echo $row['old_case_price'];?></td>
                                        <td><?php echo $row['c_name'];?></td>
                                        <td><?php echo $row['prec_time'];?>
                                        </td>
                                        <td><?php echo $row['med_name'];?></td>

                                        <td><?php echo $row['Prescription'];?></td>
                                        <td><?php echo $row['doz_time'];?></td>
                                        <td><?php echo $row['ddd_d'];?></td>

                                                                           </tr>

                                    <?php
                                    $cnt+=1;

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
                                    <th>Doctor Name</th>
                                    <th>Test Name</th>
                                    <th>Test Price</th>
                                    <th>Appointment Date</th>
                                    <th>Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $q1 = "SELECT * FROM test_result_master tr JOIN test_appointment_master ta ON tr.t_a_id=ta.t_a_id JOIN lab_master l ON ta.lab_id=l.lab_id JOIN user_master ul ON l.u_id=ul.u_id JOIN test_master t ON ta.t_id=t.t_id WHERE ta.u_id='".$_SESSION['id']."' ORDER BY ta.t_a_date DESC";

                                $sql1= mysqli_query($conn,$q1);
                                $cnt=1;

                                while($row=mysqli_fetch_array($sql1))
                                {
                                    ?>

                                    <tr> 
                                        <td ><?php echo $row['u_name']; ?></td>
                                        <td><?php echo $row['t_name'];?></td>
                                        <td><?php echo $row['t_price'];?></td>
                                        <td><?php echo $row['t_a_date'];?></td>
                                        <td><a href="../med_tech(final)/lab/resultimg/<?php echo $row['t_result'];?>" target="_blank" class="btn btn-primary">View Result</a></td>
                                    </tr>

                                    <?php
                                    $cnt+=1;

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