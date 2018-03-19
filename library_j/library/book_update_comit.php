<?php
// COMMIT ADD
  $link = mysql_connect("localhost", "root", "")
    or die("Could not connect: " . mysql_error());
  mysql_select_db('library', $link)
    or die ( mysql_error());
  switch ($_GET['action']) {
    case "edit":
      
          $sql = "UPDATE book SET
                   slno='" . $_POST['slno'] . "',
                    title='" . $_POST['title'] . "',
                    media_type='" . $_POST['media_type'] . "',
                    author='" . $_POST['author'] . "',
                    publication='" . $_POST['publication'] . "',
                    location='".$_POST['location']."',
                    edition='" . $_POST['edition'] . "',
                    year='" . $_POST['year'] . "',
                    pages= '" . $_POST['pages'] . "',
                    total_holding='" . $_POST['total_holding'] . "',
                    category='" . $_POST['category'] . "',
                    sub_category='" . $_POST['sub_category'] . "',
                    related_name='" . $_POST['rlated_name'] . "',                    
                    book_remark = '" . $_POST['book_remark'] . "'
                  WHERE book_id = '" . $_GET['id'] . "'";

          break;
      }
   

  if (isset($sql) && !empty($sql)) {
    echo "<!--" . $sql . "-->";
    $result = mysql_query($sql)
      or die("Invalid query: " . mysql_error());
?>
  <p align="center" style="color:#FF0000">
   Done. You will be redirected in few seconds.

  </p>
<?php
  }
?>
<?php
$redirect = '/library_j/library/booklist.php';
?>
<SCRIPT LANGUAGE="JavaScript">
redirTime = "550";
redirURL = "<?php echo $redirect ?>";
function redirTimer() { self.setTimeout("self.location.href = redirURL;",redirTime); }
</script>
<BODY onLoad="redirTimer()">