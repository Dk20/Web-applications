<?php // block any attempt to the filesystem
/*
if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
$filename = $_GET['file'];
} else {
$filename = NULL;
$err = 'Sorry, the file you are requesting is unavailable.';
}
*/
echo "entered";
$err = 'Sorry, the file you are requesting is unavailable.';
if(isset($_POST['da1'])){
	$user=$_POST['user'];
echo "entered";	
$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
$sql = "SELECT * FROM main where studId = '".$_POST["studName"]."' AND teachId='".$user."'";
$result=mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$filename=$row['da1'];
 
if (!$filename) {

// if variable $filename is NULL or false display the message
echo $err;

} else {
// define the path to your download folder plus assign the file name
$path = 'C:/wamp64/www/IWP_php/uploads/'.$filename;
// check that file exists and is readable
if (file_exists($path) && is_readable($path)) {
// get the file size and send the http headers
$size = filesize($path);
header('Content-Type: application/octet-stream');
header('Content-Length: '.$size);
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');
// open the file in binary read-only mode
// display the error messages if the file can´t be opened
$file = @ fopen($path, 'rb');
if ($file) {
// stream the file and exit the script when complete
fpassthru($file);
exit;
} else {
echo $err;
}
} else {
echo $err;
}
}
mysqli_close($link);



}

elseif(isset($_POST['da2'])){
	
	//echo "entered";
	$user=$_POST['user'];
	$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
	$sql = "SELECT * FROM main where studId = '".$_POST["studName"]."' AND teachId='".$user."'";
	$result=mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	$filename=$row['da2']; 
	
	//echo $filename;

if (!$filename) {

// if variable $filename is NULL or false display the message
echo $err;

} else {
// define the path to your download folder plus assign the file name
$path = 'C:/wamp64/www/IWP_php/uploads/'.$filename;
// check that file exists and is readable
if (file_exists($path) && is_readable($path)) {
// get the file size and send the http headers
$size = filesize($path);
header('Content-Type: application/octet-stream');
header('Content-Length: '.$size);
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');
// open the file in binary read-only mode
// display the error messages if the file can´t be opened
$file = @ fopen($path, 'rb');
if ($file) {
// stream the file and exit the script when complete
fpassthru($file);
exit;
} else {
echo $err;
}
} else {
echo $err;
}
}
mysqli_close($link);
	
	
}
else{
	
	
	
}

?>
