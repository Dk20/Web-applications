<?php
  $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());
  date_default_timezone_set('Asia/Singapore');
?>
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
                        <h2>Book Lending</h2>

<form action="book_lending_comit.php?action=add&type=book" method="post">
    <div id="UILabel">Book Serial Number</div>

              <select name="loan_book_slno" >
                <option value="" selected >Select a serial number...</option>
 <?php $book_sql="select * from book";
	$result = mysqli_query($link,$book_sql);
    while ($row=mysqli_fetch_array($result)) {
    $slno[$row['book_id']]=$row['slno'];
    }

    foreach ($slno as $book_id => $slno) {
 ?>
        <option value="<?php echo $slno; ?>" ><?php echo $slno; ?></option>
<?php
  }
?>
      </select><br><br><br>
    <div id="UILabel">Member ID</div>

              <select name="loan_mem_name" >
                <option value="" selected >Select a member ID...</option>
 <?php $mem_sql="select * from member";
$result = mysqli_query($link,$mem_sql);
while ($row=mysqli_fetch_array($result)) {
    $mem_name[$row['reader_id']]=$row['nric'];
}

  foreach ($mem_name as $reader_id => $nric) {
?>
        <option value="<?php echo $nric; ?>" ><?php
        echo $nric; ?></option>
<?php
  }
?>
      </select><br><br><br>


  <div id="UILabel">Loan Date [ yyyy-mm-dd ]</div>
  <input class="form_tfield" type="text" name="loan_date" value="<?php echo date('Y-m-d')?>" /><br><br>

 
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
                        <?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/nav_trans.php';?>
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


