<?php 


    require('../php-excel-reader/excel_reader2.php');

    require('../SpreadsheetReader.php');
	$file_path = "../".$_GET['file_path'];
    $Reader = new SpreadsheetReader($file_path);
    foreach ($Reader as $Row)
    {
    	$final_output[$Row[0]]['number'][$Row[2]][] = $Row[1];
    }

    