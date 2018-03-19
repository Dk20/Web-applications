<?php
// COMMIT ADD
  $link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());;
  switch ($_GET['action']) {
    case "edit":

          $sql = "UPDATE loan SET
                   loan_return_mem_name='" . $_POST['loan_return_mem_name'] . "',
                   loan_return_date='" . date('Y-m-d'). "',
                    loan_status = 'Returned'
                  WHERE loan_book_slno = '" . $_POST['loan_book_slno'] . "'";

          break;
      }


  if (isset($sql) && !empty($sql)) {
    echo "<!--" . $sql . "-->";
    $result = mysqli_query($link,$sql);
?>
  <p align="center" style="color:#FF0000">
   Done. You will be redirected in few seconds.

  </p>
<?php
  }
?>
<?php
$redirect = '/library_j/index.php';
?>
<SCRIPT LANGUAGE="JavaScript">
redirTime = "550";
redirURL = "<?php echo $redirect ?>";
function redirTimer() { self.setTimeout("self.location.href = redirURL;",redirTime); }
</script>
<BODY onLoad="redirTimer()">