<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">

  div>span{
  	display: block;
    font-size: 14px;
    margin-bottom: 9px;
  }

  </style>
</head>
<body>
<?php 

	include_once '../app_functions/default_functions.php';

	if(array_key_exists("GROUP BY",$final_output)){
		unset($final_output['GROUP BY']);
	}
	
 ?>
<div class="container">

<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right            <li role="presentation" cla">
ss="active"><a href="../index.php">Home</a></li>
            <li role="presentation"><a href="http://vefetch.com/">About</a></li>
            <li role="presentation"><a href="login.php?action=logout">Logout</a></li>
          </ul>
        </nav>
        <img src="../images/company_logo.png" height="125px" width="220px">
      </div>
      <hr/>

<h1>Select Contacts</h1>

<form method="post" action="message_process.php">

<input type="hidden" name="path" value="<?php echo $file_path; ?>">
<label><input type="checkbox" id="checkAll">Check All</label>

            
  <table class="table">
    <tbody>
      <?php

      $i = 1; 
      $totalhtml = "";
      foreach ($final_output as $class => $student_values) {
      	$html1 = '<label><input type="checkbox" class="checkthis"><p style="text-align: center;font-size: 27px;font-style: initial;">'.$class.'</p></label><br>';
      	foreach ($student_values as $number_text => $number_and_names) {
      		foreach ($number_and_names as $number => $names) {
      			foreach ($names as $key => $name) {
      				$html1 = $html1.'
  <label><input type="checkbox" name = "name[]" value="'.$number.'">'.$name.'('.$number.')</label><br>';
      			}
      		}$totalhtml = $totalhtml.'<div class="checkbox"><fieldset>'.$html1.'</fieldset></div><hr/>';
      	}
      } 

      echo "$totalhtml";
      $totalhtml = "";
      $html1 = "";
      
      ?>
    </tbody>
  </table>
  <input type="submit" class="btn btn-primary" value="submit">
  <a href="../index.php"><input type="button" class="btn btn-warning" value="cancel"></a>

  </form>
</div>
<footer class="footer">

         <p style="text-align: center">All rights are reserved by <a href="http://vefetch.com/">Vefetch</a>, Developed by <a href="https://twitter.com/sudhakar_valar">@sudhakar</a>.</p>
      </footer>

<script type="text/javascript">
  
$(function () {
    $('.checkthis').on('click', function () {
        $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
    });
});


$('body').on('change', '#checkAll', function(){
      $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

</script>



</body>
</html>