<?php 


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
  		<h1>Manage Templates</h1>
  		<div class="jumbotron">
  		<form method="post" action="template_do.php">
  		<h3>Add a template</h3>
		  	<input type="text-box" class="form-control" name="template_name" placeholder="enter you title here" required>
		  	<br/>
		  	 <textarea name="template-message" class="form-control message-box" rows="5" id="comment" placeholder="enter your message here" ></textarea>
		  	 <input type="submit" class="btn btn-primary">
		  	 <a href="../index.php"><input type="button" class="btn btn-warning" value="cancel"></a>
		</form>

		<br/>
		<hr/>
		<div>
			
			<?php

				



			?>


		</div>
		</div>
  	</div>


  </body>
  </html>