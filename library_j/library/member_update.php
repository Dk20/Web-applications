<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <title>Edit Equipment Master Data</title>
        <meta name="keywords" content="itinerary, list" />
        <meta name="description" content="This page provides a list of all itineraries" />
        <link href="/library_j/css/default.css" rel="stylesheet" type="text/css" />
    </head>



         <?php
  $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());


switch ($_GET['action']) {
    case "edit":
      $updatesql = "SELECT * FROM member
                   WHERE nric = '" . $_GET['id'] . "'";
     $result = mysqli_query($link,$updatesql);
      $row = mysqli_fetch_array($result);
      $nric = $row['nric'];
$fname = $row['fname'];
$lname = $row['lname'];
$sex=$row['sex'];
$dob=$row['dob'];
$address=$row['address'];
$homephone=$row['homephone'];
$mobilephone=$row['mobilephone'];
$nationality=$row['nationality'];
$singstatus=$row['singstatus'];
$mem_remark=$row['mem_remark'];
break;

    default:
      $nric =  "";
$fname =  "";
$lname = "";
$sex= "";
$dob="";
$address= "";
$homephone= "";
$mobilephone= "";
$nationality= "";
$singstatus= "";
$mem_remark= "";
  break;
  }
?>

    <body>
        <div id="wrapper">
             <?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/header.php';?>
            <div id="page">
                <div id="content">
<h2 >Edit Member Master Data </h2>
<form action="memberlist_update_comit.php?action=<?php
             echo $_GET['action']; ?>&type=member&id=<?php
  echo $_GET['id']; ?>" method="post">


<form action="memberlist_update_comit.php?action=add&type=member" method="post">
  <div id="UILabel">NRIC Number</div>
  <input class="form_tfield" type="text" name="nric" value="<?php echo $nric; ?>" /><br><br>
        <div id="UILabel">First Name</div>
  <input class="form_tfield" type="text" name="fname" value="<?php echo $fname; ?>" /><br><br>
  <div id="UILabel">Last Name</div>
  <input class="form_tfield" type="text" name="lname" value="<?php echo $lname; ?>" /><br><br>
   <div id="UILabel">Sex</div>
 <select name="sex" >
      <option value="<?php echo $sex; ?>" selected>
                 <?php echo $sex ;?></option>
                     <option value="M">Male</option>
                     <option value="F">Female</option>
                     </select>
<br><br>
  <div id="UILabel">Date of Birth [ yyyy-mm-dd ]</div>
  <input class="form_tfield" type="text" name="dob" value="<?php echo $dob; ?>" /><br><br>
  <div id="UILabel" >Address</div>

  <TEXTAREA  NAME="address" COLS=30 ROWS=3><?php echo $address; ?></TEXTAREA><br><br>
  <div id="UILabel">Home Phone</div>
  <input class="form_tfield" type="text" name="homephone" value="<?php echo $homephone; ?>" /><br><br>
  <div id="UILabel">Mobile Phone</div>
  <input class="form_tfield" type="text" name="mobilephone" value="<?php echo $mobilephone; ?>" /><br><br>
 <div id="UILabel">Nationality</div>
  <select name="nationality" >
      <option value="<?php echo $nationality; ?>" selected>
                 <?php echo $nationality ;?></option>
                     <option value="Singaporean">Singaporean</option>
                     <option value="Indian">Indian</option>
                     <option value="Malaysian">Malaysian</option>
                     <option value="Others">Others</option>
                     </select><br><br>

   <div id="UILabel">Residence Status in Singapore</div>
   <select name="singstatus" >
      <option value="<?php echo $singstatus; ?>" selected>
                 <?php echo $singstatus ;?></option>
                     <option value="Singapore Citizen">Singapore Citizen</option>
                     <option value="Singapore Permanent Resident">Singapore Permanent Resident</option>
                     <option value="S Pass">S Pass</option>
                     <option value="WP">Work Permit</option>
                     <option value="Others">Others</option>
                     </select><br><br>
                     <div id="UILabel" >Comment</div>
  <TEXTAREA NAME="mem_remark" COLS=30 ROWS=3><?php echo $mem_remark; ?></TEXTAREA>
  <br></br>
<input type="submit" value="Update" />

</form>
   <!--body ends-->


                    <!-- end div#welcome -->

                </div>
                <!-- end div#content -->
                <div id="sidebar">
                    <ul>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/nav_library.php';?>
                        <!-- end navigation -->
<?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/updates.php';?>
                        <!-- end updates -->
                    </ul>
                </div>
                <!-- end div#sidebar -->
                <div style="clear: both; height: 1px"></div>
            </div>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/footer.php';?>
        </div>
        <!-- end div#wrapper -->


    </body>
</html>