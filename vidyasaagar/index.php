<?php
	include('controllers/function.php');
	landingPageSessionCheck();
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="http://vefetch.com/">About</a></li>
            <li role="presentation"><a href="view/login.php?action=logout">Logout</a></li>
          </ul>
        </nav>
        <img src="images/company_logo.png" height="125px" width="220px">
      </div>
      <div class="jumbotron">
        	<h2 style="font-family: -webkit-body;">Please Upload Your Excel File</h2>
        	
        	<form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-10"><input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required></div>
            <div class="col-sm-2"> <input type="submit" class="btn btn-info" style="font-size: 13px;"value="Upload File" name="submit"></div>
          </div>
			    
			    
			   
			</form>


      <?php 

        $sql = "SELECT * FROM `files`";
        $link = db_connect_local();
        $result = executeQuery($sql, $link);
        while($row = mysqli_fetch_assoc($result)) {
          $final_output[$row['id']] = $row['file_name'];
        }
        // print_r($final_output);

        foreach ($final_output as $key => $value) {
          echo '<div><a href="view/dashboard.php?file_path='.$value.'">'.$value.'</a><form action="delete.php" method="get"><input type="hidden" name="id" value="'.$key.'"><input type="hidden" name="file" value="'.$value.'"><input type="submit" class="btn btn-danger" style="font-size: 13px;"  value="delete"></form></div><br/>';
        }
       ?>


      </div>
      <footer class="footer">

         <p style="text-align: center">All rights are reserved by <a href="http://vefetch.com/">Vefetch</a>, Developed by <a href="https://twitter.com/sudhakar_valar">@sudhakar</a>.</p>
      </footer>
    </div> 
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


</body></html>