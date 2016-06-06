<?php 

include_once '../controllers/function.php';
$link = db_connect_local();

 ?>


<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <script type="text/javascript" src="//code.jquery.com/jquery-compat-git.js"></script>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>
  	
  	<div class="container">

<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="../index.php">Home</a></li>
            <li role="presentation"><a href="http://vefetch.com/">About</a></li>
            <li role="presentation"><a href="login.php?action=logout">Logout</a></li>
          </ul>
        </nav>
        <img src="../images/company_logo.png" height="125px" width="220px">
      </div>
      <hr/>
  		<h1>Manage Templates</h1>
  		<div class="jumbotron">
  		<form method="post" action="template_do.php">
  		<h3>Add a template</h3>
		  	<input type="text-box" class="form-control" name="template_name" placeholder="enter you title here" required>
		  	<br/>
		  	 <textarea name="template-message" class="form-control message-box" rows="5" id="comment" placeholder="enter your message here" ></textarea>
         <br/>
		  	 <input type="submit" class="btn btn-primary">
		  	 <a href="../index.php"><input type="button" class="btn btn-warning" value="cancel"></a>
		</form>

		<br/>

    <h3>Click here to delete</h3>


		<hr/>
		<div>
			
			<?php

				

        $sql = "SELECT * FROM message_templates";
        $result = executeQuery($sql, $link);
        while($row = mysqli_fetch_assoc($result)) {
          $final_output[] = $row;
        }
        foreach ($final_output as $primary_key => $final_array) {
          echo '<a href="delete.php?id='.$final_array['id'].'"><button class="btn btn-danger">'.$final_array['template_name'].'</button></a>';
        }



			?>


		</div>
		</div>
  	</div>
    <footer class="footer">

         <p style="text-align: center">All rights are reserved by <a href="http://vefetch.com/">Vefetch</a>, Developed by <a href="https://twitter.com/sudhakar_valar">@sudhakar</a>.</p>
      </footer>


  </body>
  </html>