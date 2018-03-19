<?php
$link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());
$query = "SELECT * FROM location ";
$result = mysqli_query($link,$query);
?>
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

 <h2 class="head2" ><a class="head">View / Edit Location List</a></h2>

 <table class="aatable" style="width:500px; position:relative;left:-30px;">
<tr>
<th >Location ID</th>
<th>Location Name</th>
<th></th></tr>
<?php

while ($row = mysqli_fetch_array($result)) {

$loc_id = $row['loc_id'];
$loc_name = $row['loc_name'];

echo "<tr>";
echo "<td>".$loc_id."</td>";
echo "<td >".$loc_name."</td>";
?>
<td><a href="loc_update.php?action=edit&id=<?php echo $row['loc_name']; ?>">[EDIT]</a> </td>
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

