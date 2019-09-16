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
  
    $confirm= test_input($_POST["confirm"]);   
    $password= test_input($_POST["password"]);
    $email = $_SESSION['username'];
    echo $email;


    
   
        if($_SESSION['process']=="fp")
         {
        
            $conn->query(" UPDATE `register` SET `password` = '$password' WHERE `email` = '$email';");
            echo("Error description: " . mysqli_error($conn));
  
            if(mysqli_affected_rows($conn) > 0)
              {
                //$_SESSION['process']="verified";
                //$_SESSION['username']=$email;

                $result = $conn->query("select * from `register` where email = '$email';");
                $row = mysqli_fetch_array($result);
                $numbers = $row['mobile'];
                //$phone = "91".$phone;
                $sender = "TXTLCL";

                $_SESSION['mobile'] = $numbers;
                $_SESSION['name'] = $row['name'];
                $message = "Your Password Has been changed";

                 
                 //sendWay2SMS("9987262313", "diArY32", $phone, $msg);
                echo sendSms($numbers, $message, $sender);
                echo "<br>";
                echo $numbers;
                
               echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Password is changed')
                      window.location.href='login.php';
                      </SCRIPT>");
              }
              else {
			 
              echo "Try Again";
			       echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('someting went wrong')
                      window.location.href='changePassword.php';
                      </SCRIPT>");			 

              }
          }
          else
          {

          }


      

  ?>
