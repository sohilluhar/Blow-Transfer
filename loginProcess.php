<?php
    session_start();
    require('dbconnect.php');
    require('test.php');
    //require('way2sms-api.php');
    require('tp.php');

    //all details
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   // $name= test_input($_POST["name"]);	
    $email= test_input($_POST["email"]);
   // $mobile= test_input($_POST["mobile"]);
    $password= test_input($_POST["password"]);
    
    $otp = getRandomCode();
    //echo $otp;
    $conn->query("SELECT * FROM `register` WHERE email='$email' AND password='$password';");
    if(mysqli_affected_rows($conn) > 0)
      {
        if($_SESSION['process']=="login")
         {
        
            $conn->query(" UPDATE `authotp` SET `otp` = '$otp' WHERE `authotp`.`email` = '$email';");
            echo("Error description: " . mysqli_error($conn));
  
            if(mysqli_affected_rows($conn) > 0)
              {
                //$_SESSION['process']="verified";
                $_SESSION['username']=$email;

                $result = $conn->query("select * from `register` where email = '$email';");
                $row = mysqli_fetch_array($result);
                $numbers = $row['mobile'];
                //$phone = "91".$phone;
                $sender = "TXTLCL";

                $_SESSION['mobile'] = $numbers;
                $_SESSION['name'] = $row['name'];
                $message = "The OTP is ".$otp." .Please Do not share this with anyone";

                 
                 //sendWay2SMS("9987262313", "diArY32", $phone, $msg);
                echo sendSms($numbers, $message, $sender);
                echo "<br>";
                echo $numbers;
                
               header('Location: otpverify.php');
              }
              else {
			 
              echo "Try Again";
			       echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('wrong id / password')
                      window.location.href='login.php';
                      </SCRIPT>");
			 

              }
          }

      }
      else
      {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('wrong id / password')
                      window.location.href='login.php';
                       </SCRIPT>");
      }

  ?>
