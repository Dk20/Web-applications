<?php
 $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());
 
$query = "SELECT * FROM category ";
$result = mysqli_query($link,$query);
$num_supp_name = mysqli_num_rows($result);?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>J comp</title>

        <link href="/library_j/css/default.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrapper">
<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/library_j/includes/header.php'; ?>
                <div id="page">
                <div id="content">
                    <div id="welcome">

 <h2 class="head2" ><a class="head">View / Edit Category List</a></h2>

 <table class="aatable" style="width:500px; position:relative;left:-30px;">
<tr>
<th >Category ID</th>
<th>Category Name</th><th></th>
</tr>
<?php

while ($row = mysqli_fetch_array($result)){

$cat_id = $row['cat_id'];
$cat_name = $row['cat_name'];

echo "<tr>";
echo "<td>".$cat_id."</td>";
echo "<td >".$cat_name."</td>";
?>
<td><a href="cat_update.php?action=edit&id=<?php echo $row['cat_name']; ?>">[EDIT]</a> </td>
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

