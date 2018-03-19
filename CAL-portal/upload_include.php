<?php
//echo "entered";	
if(isset($_POST['da1'])){
	//echo "entered";
	if(isset($_FILES['filefield1'])){
		//echo "entered";
	$fac=$_POST['facName'];
	$file=$_FILES['filefield1'];
	$upload_directory='C:/wamp64/www/IWP_php/uploads/';
	$ext_str = "gif,jpg,jpeg,mp3,tiff,bmp,doc,docx,ppt,pptx,png,txt,pdf";
	$allowed_extensions=explode(',',$ext_str);
	$max_file_size = 10485760;//10 mb remember 1024bytes =1kbytes /* check allowed extensions here */
	$ext = substr($file['name'], strrpos($file['name'], '.') + 1); //get file extension from last sub string from last . character
    if (!in_array($ext, $allowed_extensions) ) {
	echo "only".$ext_str." files allowed to upload"; // exit the script by warning
	} /* check file size of the file if it exceeds the specified size warn user */

	if($file['size']>=$max_file_size){
	echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning
	}
	//if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){
	$path=$file['name'];

	if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){
	$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
	$sql = "UPDATE main SET da1='".$path."' where studId='".$user."' AND teachId='".$fac."' ";
	if (mysqli_query($link, $sql)) {
		echo "Upload successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($link);
	}
	mysqli_close($link);
	}
	else{
	echo "The file cant moved to target directory."; //file can't moved with unknown reasons likr cleaning of server temperory files cleaning
	}
	}

}
elseif(isset($_POST['da2']))
{
	if(isset($_FILES['filefield2'])){
		
	$fac=$_POST['facName'];	
	$file=$_FILES['filefield2'];
	$upload_directory='C:/wamp64/www/IWP_php/uploads/';
	$ext_str = "gif,jpg,jpeg,mp3,tiff,bmp,doc,docx,ppt,pptx,png,txt,pdf";
	$allowed_extensions=explode(',',$ext_str);
	$max_file_size = 10485760;//10 mb remember 1024bytes =1kbytes /* check allowed extensions here */
	$ext = substr($file['name'], strrpos($file['name'], '.') + 1); //get file extension from last sub string from last . character
	if (!in_array($ext, $allowed_extensions) ) {
	echo "only".$ext_str." files allowed to upload"; // exit the script by warning
	} /* check file size of the file if it exceeds the specified size warn user */
	
	if($file['size']>=$max_file_size){
		echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning
	}
	//if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){
	$path=$file['name'];
	
	if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){
	$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
	$sql = "UPDATE main SET da2='".$path."' where studId='".$user."' AND teachId='".$fac."' ";
	if (mysqli_query($link, $sql)) {
		echo "Upload successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($link);
	}
	mysqli_close($link);
	}
	else{
	echo "The file cant moved to target directory."; //file can't moved with unknown reasons likr cleaning of server temperory files cleaning
	}
	}
		
	
}
else{
	
}


?>