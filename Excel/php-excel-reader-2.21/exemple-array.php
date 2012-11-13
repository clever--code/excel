<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("example.xls");

foreach ($data->dumptoarray() as $value) {
	foreach ($value as $row) {
		echo($row.' | ');
	}
	echo('<hr>');
}


echo("<br><br><br><br>##################### OU #####################<br><br><br><br>");


foreach ($data as $value) {
	foreach ($value[0] as $line) {
		if($i >= 326){
			$e++;
			if($e == 1){
				for ($setrow = 1; $setrow <= $data->rowcount(0); $setrow++) {
					foreach ($line[$setrow] as $data_line) {
							echo($data_line);
							echo(" | ");
					}
					echo('<hr>');
				}
			}
		}
		$i++;
	}
}