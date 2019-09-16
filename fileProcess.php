<?php
session_start();
require('dbconnect.php');
require('way2sms-api.php');
require('tp.php');
$sender = $_SESSION['mobile'];
//$email="";
$reciever = $_POST["reciever"];
$info = pathinfo($_FILES['fileToUpload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname.".$ext; 
echo $_FILES['fileToUpload']['tmp_name'];
$target_file = basename($_FILES["fileToUpload"]["name"]);
echo "<br>";
echo $target_file;
$target_file = str_replace(' ', '_', $target_file);
$target = 'new/'.$target_file;
echo "<br>";
echo $target_file;
$status= move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);

$secretkey = "yash";


//,`encryptpath`,`decryptpath`,`secretkey`
if($status == 1)
{
	$conn->query("INSERT INTO `filestore` (`file_id`,`sender`,`reciever`, `filename`) VALUES (NULL,'$sender','$reciever','$target_file');");
	echo "file uploaded";
	$printstatus = shell_exec("java EncryptFile ".$target_file );
	echo $printstatus;
	echo "done!!!!";
	$result = $conn->query("select * from register where  mobile = '$sender';");
	$row = mysqli_fetch_array($result);
    $sendername = $row['name'];
    $sender = "TXTLCL";

    $message = $sendername." has sent you file please login/register on BLOWTRANSFER to access the file";
                 echo "</br>";
                
                echo $msg;
                //sendWay2SMS("9987262313", "diArY32", $reciever, $msg);
                sendSms($reciever, $message, $sender);
               // header('Location: dashboard.php');
                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('File Sent')
                      window.location.href='uploadFile.php';
                      </SCRIPT>");
}
else
{
	// echo "<br>";
 //  //echo "otp expired . try again";
  echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('Failed')
                      window.location.href='uploadFile.php';
                      </SCRIPT>");
  
}

//shell_exec("javac EncryptFile.java");
//
//echo $abc

?>