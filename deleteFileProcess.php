<?php
require('dbconnect.php');
$id = $_GET['id'];
//mysqli_query($conn,"DELETE FROM student WHERE id='".$id."'");

$sql = "DELETE FROM filestore WHERE file_id='".$id."'";
$filenameq = "SELECT filename FROM filestore WHERE file_id='".$id."'";
	$filenamerow=$conn->query($filenameq);
	$row = mysqli_fetch_array($filenamerow);
    $filename = $row['filename'];
	
    
	
if ($conn->query($sql) === TRUE) {
	//unlink('uploads/'.$filename);
	unlink("uploads/".$filename);
    echo "deleted";
    header('Location: dashboard.php');
    // header('Location: admin_view_teacher.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
echo "string";
echo " ".$id."";
?>
