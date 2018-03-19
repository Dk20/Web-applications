<?php 
$link=mysqli_connect('localhost','root','','library') or die (mysqli_connect_error());
//mysqli_select_db("library") or die (mysqli_connect_error());
$query = "SELECT * FROM book";
$result = mysqli_query($link,$query);
$num_supp_name=mysqli_num_rows($result);
?>
<!-- Updates and News Box for our site -->
<li id="news">
    <h2>Updates</h2>
    <ul>
        <li> 
            <p><a href="/library_j/library/booklist.php"><?php echo "There are <b> $num_supp_name </b> books in
            our record."; ?></a></p>
        </li>
 <li>
            <?php
$query = "SELECT
    * from loan where loan_status='On Loan'";
$result = mysqli_query($link,$query);

$num_book_due = mysqli_num_rows($result);
            if ($num_book_due==0){
                $message="There is no book on loan.";
             }
            elseif($num_book_due==1){
                $message="There is <b>$num_book_due </B>book on loan";
            }
            else{
                $message="There are <b>$num_book_due </b>books on loan";
            }
            ?>
            <p><a  href="/library_j/library/book_onloan.php?type=onloan"><?PHP echo "$message"?></a></p>
        </li>

