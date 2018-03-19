<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=unicode utf-8" />
        <title>Edit Book Master Data</title>
        <meta name="keywords" content="itinerary, list" />
        <meta name="description" content="This page provides a list of all itineraries" />
        <link href="/library_j/css/default.css" rel="stylesheet" type="text/css" />
    </head>
         <?php
  $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());


switch ($_GET['action']) {
    case "edit":
      $updatesql = "SELECT * FROM book
                   WHERE book_id = '" . $_GET['id'] . "'";
      $result = mysqli_query($link,$updatesql );
      $row = mysqli_fetch_array($result);
 $book_id = $row['book_id'];
$slno = $row['slno'];
$title = $row['title'];
$media_type = $row['media_type'];
$author=$row['author'];
$publication=$row['publication'];
$edition=$row['edition'];
$year=$row['year'];
$pages=$row['pages'];
$total_holding=$row['total_holding'];
$location=$row['location'];
$category=$row['category'];
$sub_category=$row['sub_category'];
$related_name=$row['related_name'];
$book_remark=$row['book_remark'];


break;

    default:
  $slno =  "";
$title =  "";
$media_type =  "";
$author= "";
$publication= "";
$edition= "";
$year="";
$pages="";
$total_holding= "";
$location= "";
$location= "";
$category= "";
$sub_category= "";
$related_name= "";
$book_remark= "";

  break;
  }
?>

    <body>
        <div id="wrapper">
     <?php include $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/header.php';?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h2>Edit Book Master Data</h2>

<form action="book_update_comit.php?action=<?php
             echo $_GET['action']; ?>&type=book&id=<?php
  echo $_GET['id']; ?>" method="post">


  <div id="UILabel">Serial Number</div>
  <input class="form_tfield" type="text" name="slno" value="<?php echo $slno; ?>" /><br><br>
        <div id="UILabel">Title</div>
  <input class="form_tfield" type="text" name="title" value="<?php echo $title; ?>" /><br><br>
   <div id="UILabel">Media Type</div>
  <select name="media_type" >
      <option value="<?php echo $media_type; ?>" selected>
                 <?php echo $media_type ;?></option>
                     <option value="Book">Book</option>
                     <option value="Text Book">Text Book</option>
                     <option value="CD">CD</option>
                     <option value="Magazine">Magazine</option>
                     <option value="eBook">eBook</option>
                     </select><br><br>
 <?php $author_sql="select * from author";
$result = mysqli_query($link,$author_sql);
while ($row=mysqli_fetch_array($result)) {
    $auth_name[$row['auth_id']]=$row['auth_name'];
}
      ?>

  <div id="UILabel">Author Name</div>

              <select name="author" style="width:150px">
      

<?php
  foreach ($auth_name as $auth_id => $auth_name) {
?>
         <option  value="<?php echo $auth_name ; ?>"selected>
                 <?php echo $auth_name ;?></option>

<?php
  }
?>
    <option  value="<?php echo $author ; ?>"selected><?php echo $author ;?></option>
              </select><br><br>

  <div id="UILabel">Publication</div>
  <input class="form_tfield" type="text" name="publication" value="<?php echo $publication; ?>" /><br><br>
  <div id="UILabel">Edition [ Ex: 5th edition ]</div>
  <input class="form_tfield" type="text" name="edition" value="<?php echo $edition; ?>" /><br><br>
  <div id="UILabel">Year of Publication</div>
  <input class="form_tfield" type="text" name="year" value="<?php echo $year; ?>" /><br><br>
  <div id="UILabel">Total No. of Page</div>
  <input class="form_tfield" type="text" name="pages" value="<?php echo $pages; ?>" /><br><br>
  <div id="UILabel">No of Books Available</div>
  <input class="form_tfield" type="text" name="total_holding" value="<?php echo $total_holding; ?>" /><br><br>

  <?php $cat_sql="select * from location";
$result = mysqli_query($link,$cat_sql);
while ($row=mysqli_fetch_array($result)) {
    $loc_name[$row['loc_id']]=$row['loc_name'];
}
      ?>

  <div id="UILabel">Location</div>
              <select name="location" style="width:150px">


<?php
  foreach ($loc_name as $loc_id => $loc_name) {
?>
        <option value="<?php echo $loc_name; ?>"selected >
    <?php echo $loc_name; ?></option>
<?php
  }
?>
 <option value="<?php echo $location; ?>" selected ><?php echo $location; ?></option>
              </select><br><br>


<?php $cat_sql="select * from category";
$result = mysqli_query($link,$cat_sql);
while ($row=mysqli_fetch_array($result)) {
    $cat_name[$row['cat_id']]=$row['cat_name'];
}
      ?>

  <div id="UILabel">Category</div>
              <select name="category" style="width:150px">
               

<?php
  foreach ($cat_name as $cat_id => $cat_name) {
?>
        <option value="<?php echo $cat_name; ?>"selected >
    <?php echo $cat_name; ?></option>
<?php
  }
?>
 <option value="<?php echo $category; ?>" selected ><?php echo $category; ?></option>
              </select><br><br>
  <div id="UILabel">Sub Category</div>
              <select name="sub_category" style="width:150px">

<?php $sub_cat_sql="select * from category";
$result = mysqli_query($link,$sub_cat_sq);
while ($row=mysqli_fetch_array($result)) {
    $sub_cat_name[$row['cat_id']]=$row['cat_name'];
}
  foreach ($sub_cat_name as $cat_id => $cat_name) {
?>
        <option value="<?php echo $cat_name; ?>"selected ><?php
        echo $cat_name; ?></option>
<?php
  }
?>
                <option value="'<?php echo $sub_category; ?>"selected ><?php echo $sub_category; ?></option>
              </select><br><br>
    <div id="UILabel">Related Name</div>
  <input class="form_tfield" type="text" name="related_name" value="<?php echo $related_name; ?>" /><br><br>


                     <div id="UILabel" >Comment</div>
  <TEXTAREA NAME="book_remark" COLS=30 ROWS=3 ><?php echo $book_remark; ?></TEXTAREA>
  <br></br>
<input type="submit" value="Update" />

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


