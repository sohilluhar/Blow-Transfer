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
    $name= test_input($_POST["name"]);
    $email= test_input($_POST["email"]);
    $mobile= test_input($_POST["mobile"]);
    $password= test_input($_POST["password"]);
    //$name= test_input($_POST["name"]);
    //$username=$_SESSION['temp_username'];
    //print_r($_SESSION);
    //echo $username;
    $otp = getRandomCode();
    //echo $mobile;
     $result1=mysqli_query($conn,"SELECT * FROM register where email = '$email'");
       if($result1->num_rows >0)
         {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert(' id already exists !')
                      window.location.href='register.php';
                       </SCRIPT>");
          }
          else
          {
    $conn->query("INSERT INTO `register` (`reg_id`,`name`,`mobile`, `email`,`password`) VALUES (NULL,'$name','$mobile','$email','$password');");
    if(mysqli_affected_rows($conn) > 0)
      {
        if($_SESSION['process']=="signup")
         {
         
            $conn->query("INSERT INTO `authotp` (`email`, `otp`, `timestamp`) VALUES ('$email', '$otp', NULL);");
            echo("Error description: " . mysqli_error($conn));
  
            if(mysqli_affected_rows($conn) > 0)
              {
                //$_SESSION['process']="verified";
                $_SESSION['username']=$email;
                $sender = "TXTLCL";
                $msg = "The OTP is ".$otp." .Please Do not share this with anyone";
                
                //sendWay2SMS("9987262313", "diArY32", $mobile, $msg);
                sendSms($mobile, $msg, $sender);
                header('Location: otpverify.php');
              }
              else {
              echo "Try Again";
              }
          }

      }
}

















   /* if($_SESSION['process']=="signup")
    {
      $conn->query("INSERT INTO `mentoring`.`authotp` (`email`, `otp`, `time`) VALUES ('$username', '$otp', NULL);");
      if(mysqli_affected_rows($conn) > 0)
      {
        $_SESSION['process']="verified";
        $_SESSION['username']=$username;
        header('Location: index.php');
      }
      else {
        echo "Try Again";
      }
    }
    elseif($_SESSION['process']=="login")
    {
      $conn->query("UPDATE `authotp` SET `otp` = '$otp' WHERE `authotp`.`email` = '$username';");
      if(mysqli_affected_rows($conn) > 0)
      { 
        $choice = $_SESSION['choice'];
        if($choice == 1)
        {
           $result = $conn->query("select * from teacher where teacher_email = '$username';");
        $row = mysqli_fetch_array($result);
        $phone = $row['teacher_mobile'];
        $msg = "The OTP is "+$otp+" .Please Do not share this with anyone";
        // echo $otp;
        // echo "</br>";
        // echo $phone;
        sendWay2SMS("8097670658", "codeforgood", $phone, $msg);

        }
        
      }
    }
    else{
      //header('Location: index.php');
      echo "error";
    }*/
  ?>
