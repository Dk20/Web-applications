<?php
$link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());
$query = "SELECT * FROM book order by slno";
$result = mysqli_query($link,$query);
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=unicode UTF-8" />
        <title>J comp</title>

        <link href="/library_j/css/default.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrapper">
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/header.php'; ?>
                <div id="page">
                <div id="content">
                    <div id="welcome">

 <h2 class="head2" ><a class="head">View / Edit Book Master Data</a></h2>

 <table class="aatable">
<tr>
<th >SL No</th>
<th>Title</th>
<th>Media Type</th>
<th >Author</th>
<th >Publication</th>
<th >Edition</th>
<th >Year</th>
<th >No of Copy Avail</th>
<th >Location......</th>
<th >Category</th>
<th >Sub Category</th>
<th >Remark</th>
<th></th></tr>
<?php

while ($row = mysqli_fetch_array($result)) {
$book_id = $row['book_id'];
$slno = $row['slno'];
$title = $row['title'];
$media_type = $row['media_type'];
$author=$row['author'];
$publication=$row['publication'];
$edition=$row['edition'];
$year=$row['year'];
$total_holding=$row['total_holding'];
$location=$row['location'];
$category=$row['category'];
$sub_category=$row['sub_category'];
$book_remark=$row['book_remark'];

echo "<tr>";
echo "<td>".$slno."</td>";
echo "<td >".$title."</td>";
echo "<td>".$media_type."</td>";
echo "<td>".$author."</td>";
echo "<td>".$publication."</td>";
echo "<td >".$edition."</td>";
echo "<td>".$year."</td>";
echo "<td >".$total_holding."</td>";
echo "<td>".$location."</td>";
echo "<td>".$category."</td>";
echo "<td>".$sub_category."</td>";

echo "<td>".$book_remark."</td>";

?>
<td><a href="book_update.php?action=edit&id=<?php echo $row['book_id']; ?>">[EDIT]</a> </td>
<?php
echo "</tr>";
}
?>
 </table>
                          <!--body ends-->
 </div>
                    <!-- end div#welcome -->

                </div>
                <!-- end div#content -->

                <!-- end div#sidebar -->
                <div style="clear: both; height: 1px"></div>
            </div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/library_j/includes/footer.php'; ?>
        </div>
        <!-- end div#wrapper -->
    </body>
</html>
