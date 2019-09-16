<?php
//require('dbconnect.php');
   // require('test.php');
    require('way2sms-api.php');

 $msg = "The OTP is "." .Please Do not share this with anyone";
 $mobile='8097670658';
                // echo $otp;
                // echo "</br>";
                // echo $phone;
                echo $msg;
                sendWay2SMS('8097670658', 'codeforgood', $mobile, $msg);
               /// sendWay2SMS ( '9000012345' , 'password' , '987654321,9876501234' , 'Hello World')
?>