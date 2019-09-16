	<?php
	// Authorisation details.
	function sendSms($numbers, $message, $sender)
	{
		$username = "ypilankar@gmail.com";
	$hash = "a6e7efd06ecdad19549aadc121de436e0aafd676515ac3fb766e5f744e0a6f7d";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	


	// Data for text message. This is the text message data.
	//$sender = "TXTLCL"; // This is who the message appears to be from.
	//$numbers = "917021854016"; // A single number or a comma-seperated list of numbers
	//$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

	}
	
?>