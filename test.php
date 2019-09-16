<?php
function getRandomCode(){
	$an = "0123456789";//ABCDEFGHIJKLMNOPQRSTUVWXYZ;
	$su = strlen($an) - 1;
	return substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1) .
			substr($an, rand(0, $su), 1);
}
?>
