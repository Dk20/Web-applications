<?php

if(isset($_FILES['filefield'])){

$file=$_FILES['filefield'];

$upload_directory='C:/wamp64/www/IWP_php/uploads/';

$ext_str = "gif,jpg,jpeg,mp3,tiff,bmp,doc,docx,ppt,pptx,png,txt,pdf";

$allowed_extensions=explode(',',$ext_str);

$max_file_size = 10485760;//10 mb remember 1024bytes =1kbytes /* check allowed extensions here */

$ext = substr($file['name'], strrpos($file['name'], '.') + 1); //get file extension from last sub string from last . character
echo $ext;
if (!in_array($ext, $allowed_extensions) ) {

echo "only".$ext_str." files allowed to upload"; // exit the script by warning

} /* check file size of the file if it exceeds the specified size warn user */

 
echo $file['size'];
if($file['size']>=$max_file_size){
 
echo "only the file less than ".$max_file_size."mb  allowed to upload"; // exit the script by warning

}

//if(!move_uploaded_file($file['tmp_name'],$upload_directory.$file['name'])){

$path=$file['name'];
echo $path;
if(move_uploaded_file($file['tmp_name'],$upload_directory.$path)){

$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());

$sql = "INSERT INTO gravator(path) VALUES ('".$path."')";

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);
}

else{

echo "The file cant moved to target directory."; //file can't moved with unknown reasons likr cleaning of server temperory files cleaning

}

}

/*

Hurrey we uploaded a file to server successfully.

*/

?>

<form action="" method="post" enctype="multipart/form-data">

<label>Upload File

<input id="filefield" type="file" name="filefield" />

</label>

<label>

<input id="Upload" type="submit" name="Upload" value="Upload" />

<!-- This hidden input will force the  PHP max upload size. it may work on all servers. -->

<input type="hidden" name="MAX_FILE_SIZE" value="100000" />

</label></form>









