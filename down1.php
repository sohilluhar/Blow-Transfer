<?php


//Get file
require('dbconnect.php');
$id = $_GET['id'];


$result=mysqli_query($conn,"SELECT * FROM filestore where file_id = '$id'");

if($result->num_rows >0)
{
	while($row=$result->fetch_assoc())
	{     
		$id = $row['file_id'];
		$mobile = $row['sender'];
		//$subject=$row[teacher_subjects];
		$filename= $row['filename'];
	}
	//echo $filename;

 	$abc = shell_exec("java DecryptFile ".$filename );
 	//echo $abc;
 	$url = "c:/xampp/htdocs/BlowTransfer/uploads/decrypt/".$filename;
 		
		$source = file_get_contents($url);

		//Image Mime types
		$images = array('jpg'=>'image/jpg','png'=>'image/png','png'=>'image/png');
		//Is it an image extention
		if(in_array(substr($url,-3),$images)){
		    $type = $images[substr($url,-3)];
		}else{
		    //No its somthing else
		    $type = 'application/octet-stream';
		}

		// Set the headers
		header('Content-Description: File Transfer');
		header('Content-Type: '.$type);
		header('Content-Disposition: attachment; filename='.basename($url));
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . sprintf("%u", strlen($source)));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		header('Pragma: public');

		//echo the source
		echo $source;
	

}                                                 
else
	echo "failed";

// //C:/Users/ypila/Desktop/blow/decrypt/

?>