<?php
include_once('connection.php');
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $adr = $_POST['adr'];
    $gen = $_POST['gender'];
    $daob = $_POST['dob'];
    $phn = $_POST['phone'];
    $bgroup = $_POST['blood'];
    $mail = $_POST['email'];
    $pwd = $_POST['password'];
    $conpwd = $_POST['password_again'];
    // $img = $_POST['image'];
    $area = $_POST['area'];
    $msg="";

    //Name
    if (empty($name)){
        $nameErr = "Please Enter Full Name";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/",$name)){
        $nameErr = "Only Letters And White Space Allowed";
    }
    if (empty($adr)){
        $addErr = "Please Enter Address";
    }
    //Gender
    if ($gen=="Gender"){
        $genErr = "Please Select anyone of the Above Gender";
    }
    //DOB
    if (empty($daob)){
        $daobErr = "Please Enter Your Date Of Birth";
    }
    //Area
    if ($area=="Select area"){
        $areaErr = "Please Select an Area";
    }
    //Phone
    if (empty($phn)){
        $phnErr = "Please Enter Mobile No upto 10 Digits";
    }
    elseif (!preg_match("/^\d{10}+$/",$phn)){
        $phnErr = "Please Enter Mobile No upto 10 Digits";
    }
    //Blood Group
    if ($bgroup=="Select Blood Group"){
        $bgroupErr = "Please Select A Blood Group";
    }
    //Mail
    if (empty($mail)){
        $mailErr = "Please Enter Full Email with '@' and '.'";
    }
    elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $mailErr = "Please Enter Full Email with '@' and '.'";
    }
    //Password
    if (empty($pwd)){
        $pwdErr = "Please Enter Password";
    }
    //confirm Password
    if (empty($conpwd)){
        $conpwdErr = "Please Enter Confirm Password";
    }
    if($nameErr == "" && $addErr == "" && $areaErr == "" && $genErr == "" && $daobErr == "" && $phnErr == "" && $bgroupErr == "" && $mailErr == "" && $pwdErr == "" && $conpwdErr == ""){
        $q = "SELECT u_email FROM user_master WHERE u_email='$mail'";
        $r = mysqli_query($conn, $q);
        $num = mysqli_fetch_assoc($r);
        if ($num) {
            echo "<script>alert('Entered E-mail ID already Exists !!');</script>";
        }
        else{
            $query = "INSERT INTO user_master(u_type_id,u_img, u_name, u_gender, u_birthdate, u_addr, u_phn, u_bg, allergy_id, u_email,
   u_pwd,area_id,u_is_verfied,u_is_active)
 values ('2','1','$name','$gen','$daob','$adr','$phn','$bgroup','1','$mail','$pwd','$area','1','1');";
            $result1 = mysqli_query($conn, $query);
            if ($result1) {
                echo "<script>alert('Successfully Registered. You can login now');</script>";
                header('location:user-login.php');
            }
        }
    }
    else{
        $msg = "Please Fill The Form Appropriately !!";
    }

}
?>
<!DOCTYPE>
<html lang="en">
<head>
    <title>Med-Tech</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="loginimages/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginvendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginfonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginvendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginvendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginvendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="logincss/util.css">
    <link rel="stylesheet" type="text/css" href="logincss/main.css">
    <!--===============================================================================================-->
</head>
<body >

<div class="limiter">
    <div class="container-login100" style="background: linear-gradient(to top right, #33ccff 0%, #28a745 100%);">
        <div class="wrap-login100" style="padding-top: 50px">
            <div class="login100-pic js-tilt" data-tilt style="padding-top: 500px">
                <a href="#"></a><br><br><br><br><br><br><br>
                <img src="images/MEDTECH_01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="">
                    <legend>
                        Create New Account
                    </legend>
                    <p>
                        <br />
                    </p>
                    <div class="wrap-input100 validate-input" data-validate = "Please Enter Your Full Name">
                        <input class="input100" type="text" name="name"  value="<?php if(isset($name)){echo $name;}?>" placeholder="Name">
                         <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($nameErr)){echo $nameErr;}?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please Enter Your Address">
                        <input class="input100" type="text" name="adr" value="<?php if(isset($adr)){echo $adr;}?>"  placeholder="Address">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($addErr)){echo $addErr;}?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please Select Any Area">
                        <select name="area" id="area" class="input100">
                            <option value="Select area">Select an Area</option>
                            <?php

                            $c=mysqli_query($conn,"select * from area_master") or die("error");
                            while($row=mysqli_fetch_array($c))
                                //$row=mysqli_fetch_array($q)

                                echo "<option value='$row[area_id]'>
                             $row[area_name]</option>";

                            ?></select> 
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span> 
                        <span class="text-danger"><?php if (isset($areaErr)){echo $areaErr;}?></span>
                    </div>


                    <div class="wrap-input100">
                        <select class="input100" name="gender" id="gender">
                            <option value="Gender">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select> 
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span> 
                        <span class="text-danger"><?php if (isset($genErr)){echo $genErr;}?></span>
                    </div>

                    <div class="wrap-input100" >
                        <input type="date" value="" class="input100" name="dob" id="dob" max="2002-12-31">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($daobErr)){echo $daobErr;}?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please Enter Your Phone Number">
                        <input type="text" class="input100" placeholder="Phone number" value="<?php if(isset($phn)){echo $phn;}?>" name="phone" minlength="10" maxlength="10">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($phnErr)){echo $phnErr;}?></span>
                    </div>
                    
                    <div class="wrap-input100">
                        <select name="blood" id="blood" class="input100">
                            <option value="Select Blood Group">Select  Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-tint" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($bgroupErr)){echo $bgroupErr;}?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" value="<?php if(isset($mail)){echo $mail;}?>" placeholder="Email" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($mailErr)){echo $mailErr;}?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($pwdErr)){echo $pwdErr;}?></span>

                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" id="password_again" name="password_again" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <span class="text-danger"><?php if (isset($pwdErr)){echo $pwdErr;}?></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="submit">
                            Login
                        </button>
                    </div>

            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="loginvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="loginvendor/bootstrap/js/popper.js"></script>
<script src="loginvendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="loginvendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="loginvendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.loginjs-tilt').tilt({
        scale: 1.1
    })
    jQuery(document).ready(function() {
        Main.init();
        Login.init();
    });
    document.getElementById("blood").value = "<?php echo $bgroup; ?>";
    document.getElementById("area").value = "<?php echo $area; ?>";
    document.getElementById("dob").value = "<?php echo $daob; ?>";
    document.getElementById("gender").value = "<?php echo $gen ?>"
</script>
<!--===============================================================================================-->
<script src="loginjs/main.js"></script>

</body>
</html>