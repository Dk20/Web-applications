<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><?php $link = mysqli_connect('localhost', 'root','');
if (!$link)
{
$error = 'Unable to connect to the database server.';
include 'error.html.php';
exit();
}
if (!mysqli_set_charset($link, 'utf8'))
{
$output = 'Unable to set database connection encoding.';
include 'output.html.php';
exit();
}
if (!mysqli_select_db($link,'qcmgmt'))
{
$error = 'Unable to locate the joke database.';
include 'error.html.php';
exit();
}
//mysql_select_db("qcmgmt")
//r die (mysql_error());
?></head>
<body><br>

</body></html>