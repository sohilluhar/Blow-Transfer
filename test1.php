<?php
require('dbconnect.php');
    require('test.php');
    require('way2sms-api.php');

 $msg = "The OTP is "." .Please Do not share this with anyone";
 $mobile=7208773082;
                // echo $otp;
                // echo "</br>";
                // echo $phone;
                echo $msg;
                sendWay2SMS("7208773082", "98330", $mobile, $msg);
?>