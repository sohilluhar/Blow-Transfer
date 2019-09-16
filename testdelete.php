	<?php
	require('dbconnect.php');
	$filenameq = "SELECT filename FROM filestore WHERE file_id='56'";
	$filenamerow=$conn->query($filenameq);
	$row = mysqli_fetch_array($filenamerow);
    $filename = $row['filename'];
	unlink("uploads/".$filename);
    echo "$filename";
	
?>