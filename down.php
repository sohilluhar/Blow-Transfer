
<?php


$file = 'uploads/abc.png';
	$filename="abc.png";
    $url = "C:/Users/ypila/Desktop/blow/decrypt/".$filename;
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

		//Set the headers
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
    ?>
