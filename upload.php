<?php
include '../connection.php';
	
		
		
if(!empty($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) 
	{
		$fileu=time().'_'.$_FILES['userImage']['name'];
		$sourcePath = $_FILES['userImage']['tmp_name'];
		$targetPath = "file/".time().'_'.$_FILES['userImage']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) 
		{
		    
		    
		$conn->query("INSERT INTO `general_file`( `file`) VALUES ('$fileu')");
		
		?>
		   <a href="<?php echo $targetPath; ?>"><?php echo $targetPath; ?></a>
		<?php
		}
	}
}
?>