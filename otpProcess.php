<?php
session_start();
require('dbconnect.php');
$email = $_SESSION['username'];
//$choice = $_SESSION['choice'];
$result = $conn->query("SELECT * FROM `authotp` WHERE email = '$email';");
$row = mysqli_fetch_array($result);
// print_r($row);
// echo "</br>";
$time = $row['timestamp'];
$otp = $row['otp'];
$result = $conn->query("select CURRENT_TIMESTAMP;");
$row = mysqli_fetch_array($result);
$now=$row["CURRENT_TIMESTAMP"];
$dt = date("Y-m-d h:i:sa", strtotime($time));
$dte = date("Y-m-d h:i:sa", strtotime($now));
$datetime1 = new DateTime($dt);
$datetime2 = new DateTime($dte);
$interval = $datetime1->diff($datetime2);
// echo $otp;
// echo "</br>";
// echo $interval->format('%h:%i') ;
 echo "</br>";
 echo $_POST['otp'];
 echo $otp;
 echo "</br>";
if(($otp == $_POST['otp']))
{
	if($_SESSION['process']=="signup")
  		{
        echo "sing";
        //$_SESSION['process'] ="otpverified";
  			header("Location: login.php");

  		}
  		elseif($_SESSION['process']=="fp")
  			{
  				echo "fp";
         // $_SESSION['process'] ="otpverified";
          header("Location: changePassword.php");
  			}
        else
        {
          $_SESSION['process'] ="otpverified";
          header("Location: dashboard.php");
        }
	echo"ssuccssse";


}
else
{
  echo "otp expired . try again";
    // echo ("<SCRIPT LANGUAGE='JavaScript'>
    //                    window.alert('wrong OTP')
    //                     window.location.href='otpverify.php';
    //                     </SCRIPT>");
  
   
}
?>
