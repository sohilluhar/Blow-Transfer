
<?php
session_start();
error_reporting(0);

//include "dbconnect.php";
$sessiontype = $_SESSION['process'] ;
// $usermobile =   $_SESSION['mobile'];
// $useremail = $_SESSION['username'];

if (($sessiontype=="otpverified") || ($sessiontype=="otpverify")) {
 header('Location: login.php');
exit;
}
elseif( $sessiontype =="signup")
{
    $_SESSION['process'] ="signup";
}
elseif( $sessiontype =="fp")
{
    $_SESSION['process'] ="fp";
}
else
{
     $_SESSION['process'] ="otpverify";

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>OTP</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
             <a href="javascript:void(0);">Blow<b>Transfer</b></a>
            <small>Secure File Transfer</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="otpverify" method="POST" action="otpProcess.php">
                    <div class="msg">
                        Enter your OTP sent on your mobile.
                    </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                        </span>
                        <div class="form-line">                             
                                 <input id="otp" type="text" name="otp" class="form-control mobile-phone-number" maxlength="10"  placeholder="OTP" required >
                        </div>
                    </div>


                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="login.php">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/forgot-password.js"></script>
</body>

</html>