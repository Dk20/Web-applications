<?php
// COMMIT ADD
  $link = mysql_connect("localhost", "root", "")
    or die("Could not connect: " . mysql_error());
  mysql_select_db('library', $link)
    or die ( mysql_error());
  switch ($_GET['action']) {
    case "add":
      switch ($_GET['type']) {
        case "member":
          $sql = "INSERT INTO member
                   (nric,
                    fname,
                    lname,
                    sex,
                    dob,
                    address,
                    homephone,
                    mobilephone,
                    nationality,
                    singstatus,
                    mem_remark
                    )
                  VALUES
                   ('" . $_POST['nric'] . "',
                    '" . $_POST['fname'] . "',
                    '" . $_POST['lname'] . "',
                    '" . $_POST['sex'] . "',
                    '" . $_POST['dob'] . "',
                    '" . $_POST['address'] . "',
                    '" . $_POST['homephone'] . "',
                    '" . $_POST['mobilephone'] . "',
                    '" . $_POST['nationality'] . "',
                    '" . $_POST['singstatus'] . "',
                    '" . $_POST['mem_remark'] . "')";
          break;
      }
      break;
  }

  if (isset($sql) && !empty($sql)) {
    echo "<!--" . $sql . "-->";
    $result = mysql_query($sql)
      or die("Invalid query: " . mysql_error());
?>
  <p align="center" style="color:#FF0000">
    Done. <a href="/library_j/library/member_record.php">Goto Add Member Data Page</a>
  </p>
<?php
  }
?>
