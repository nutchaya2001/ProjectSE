<?php
	session_start();
	include('conn.php');
	
	$title=$_POST['title'];
	$head=$_POST['head'];

	$numattend=$_POST['numattend'];
	$listname=$_POST['listname'];
	$roomid=$_POST['roomid'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$addequipment=$_POST['addequipment'];
	$remark = $_POST['remark'];

	$file=$_FILES['meetfile'];
	$filename=$_FILES['meetfile']['name'];
	$fileTmpname=$_FILES["meetfile"]["tmp_name"];
	$fileExt = explode(".",$filename);
	$fileAcExt=strtolower(end($fileExt));
	$newFilename=time(). "." .$fileAcExt;
	$fileDes = 'upload/'.$newFilename;

	move_uploaded_file($fileTmpname,$fileDes);
	$meetfilelocation=$fileDes;


	
	$sql = "INSERT INTO meeting(title,head,numattend,listname,roomid,start,end,addequipment,remark,meetfile) VALUES ('$title','$head',$numattend,'$listname',$roomid,'$start','$end','$addequipment','$remark','$meetfilelocation')";
	mysqli_query($conn,$sql);
	header('location:addmeet.php');


?>