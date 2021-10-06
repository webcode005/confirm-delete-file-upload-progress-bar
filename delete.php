<?php 

include '../connection.php';

if(isset($_GET['file'])) {
    
    $file=$_GET['file'];
$query=$conn->query("DELETE FROM `general_file` WHERE file='$file'");
$filename = $file;
 unlink('file/'.$filename);
echo 'Record deleted successfully.';
	//echo "<script>alert('Country Deleted');window.location='city.php'</script>";
}
?>