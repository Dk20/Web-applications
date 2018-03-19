<?php
$flag=0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	echo "entered";
$type='';
$user='';
$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
$sql = "select * from login";
$result=mysqli_query($link, $sql);
mysqli_close($link);
if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result))
	{
			if($_POST['form-username']==$row['user'] && $_POST['form-password']==$row['pass']){
				$type=$row['type'];
				$user=$row['user'];
				$flag=1;
			}
		
	}
	if($flag==1){
		//echo "Welcome!";
		//echo $type;
		if($type=='S'){
			header("Location: http://localhost/IWP_php/studlogin.php?user=".$user."");
		}
		else{
			header("Location: http://localhost/IWP_php/teacherlogin.php?user=".$user."");
		}
	}
	

}

}

?>