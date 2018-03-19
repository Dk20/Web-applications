
<html >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>J comp</title>
        <link href="/library_j/css/default.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <div id="wrapper">
     <?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/header.php';?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h2>Add New Member</h2>


           <?php
  $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());

  
?>

<form action="member_comit.php?action=add&type=member" method="post">
  <div id="UILabel">NRIC Number</div>
  <input class="form_tfield" type="text" name="nric" value="" /><br><br>
        <div id="UILabel">First Name</div>
  <input class="form_tfield" type="text" name="fname" value="" /><br><br>
  <div id="UILabel">Last Name</div>
  <input class="form_tfield" type="text" name="lname" value="" /><br><br>
   <div id="UILabel">Sex</div>
 <select name="sex" >
                     <option value="" selected>Select a sex...</option>
                     <option value="M">Male</option>
                     <option value="F">Female</option>
                     </select>
<br><br>
  <div id="UILabel">Date of Birth [ yyyy-mm-dd ]</div>
  <input class="form_tfield" type="text" name="dob" value="" /><br><br>
  <div id="UILabel" >Address</div>

  <TEXTAREA  NAME="address" COLS=30 ROWS=3></TEXTAREA><br><br>
  <div id="UILabel">Home Phone</div>
  <input class="form_tfield" type="text" name="homephone" value="" /><br><br>
  <div id="UILabel">Mobile Phone</div>
  <input class="form_tfield" type="text" name="mobilephone" value="" /><br><br>
 <div id="UILabel">Nationality</div>
  <select name="nationality" >
                     <option value="" selected>Select a nationality...</option>
                     <option value="Singaporean">Singaporean</option>
                     <option value="Indian">Indian</option>
                     <option value="Malaysian">Malaysian</option>
                     <option value="Others">Others</option>
                     </select><br><br>

   <div id="UILabel">Residence Status in Singapore</div>
   <select name="singstatus" >
                     <option value="" selected>Select a residence status...</option>
                     <option value="Singapore Citizen">Singapore Citizen</option>
                     <option value="Singapore Permanent Resident">Singapore Permanent Resident</option>
                     <option value="S Pass">S Pass</option>
                     <option value="Work Permit">Work Permit</option>
                     <option value="Others">Others</option>
                     </select><br><br>
                     <div id="UILabel" >Comment</div>
  <TEXTAREA NAME="mem_remark" COLS=30 ROWS=3></TEXTAREA>
  <br></br>
<input type="submit" value="Submit" />
<input  type="reset" value="Clear Form" />
</form>


                        <!--body ends-->
                    </div>

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


