<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Page</title>
		<?php $user=$_GET['user'];include 'C:/wamp64/www/IWP_php/upload_include.php';?>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/containers.css">
		<?php
		$link = mysqli_connect('localhost','root','','portal') or die (mysqli_connect_error());
		
		?>
	</head>
    <body>
        
        
        
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><u>CAL Portal</u></a>
                    </div>
                <ul class="nav navbar-nav">
                <li><a href="index.php">Log out</a></li>
                </ul>
                </div>
         </nav>
		<form action="" method="post" enctype="multipart/form-data">
		
                
 
        
      
		<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
					Faculty Name<span class="caret"></span>
				</button>
				<select name="facName" >
				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="right:0; left: 0;">
					<?php 	
							
							$sql = "SELECT * FROM main where studId = '".$user."'";

							$result=mysqli_query($link, $sql);
							if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($row = mysqli_fetch_assoc($result)) {
									

					?>
					<li><option value="<?php echo $row["teachId"]; ?>" ><?php echo $row["teachId"]; ?></option></li>
					<?php
					} } else {
							echo "0 results";
					}?>
				</ul>
				</select>
		</div>
        <br/>
        <br/>
		
		<table>
			<thead>
				<tr>
					<th>Assignment</th>
					<th>Upload</th>
					<th>Deadline</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>Digital Assignment-1</strong></td>
					<td>
						<button class="btn" id="stud"></button>
						<input type="submit" name="da1" value="Upload" />
						<input type="file" name="filefield1" />
						
					</td>
					<td>5-12-17</td>
				</tr>
				<tr>
					<td><strong>Digital Assignment-2</strong></td>
					<td>
						<button class="btn" id="stud"></button>
						<input type="submit" name="da2" value="Upload" />
						<input type="file" name="filefield2" />
					</td>
					<td>22-12-17</td>
				</tr>
			</tbody>
		</table>
		</form>
		<!-- Javascript -->
		<script src="assets/js/jquery-1.11.1.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
	</body>
	<?php mysqli_close($link);?>
</html>