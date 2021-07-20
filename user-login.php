<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM user_master WHERE u_type_id='2' and u_email='".$_POST['username']."' and u_pwd='".$_POST['password']."' and u_is_verfied='1'");
$num=mysqli_fetch_array($ret);
echo $num;
if($num>0)
{



$extra="index.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['u_id'];
$_SESSION['u_name']=$num['u_name'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	echo "<script>alert('Username not found or User is blocked !!');</script>";
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
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <a href="#"></a><br><br><br>
                <img src="images/MEDTECH_01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="user-login.php">
                <fieldset>
                    <legend>
                        Sign in to your account
                    </legend>
                    <p>
                        <br />
                    </p>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="Email" autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="registration.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </fieldset>
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
</script>
<!--===============================================================================================-->
<script src="loginjs/main.js"></script>

</body>
</html>