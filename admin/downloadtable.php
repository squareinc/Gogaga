<?php

set_time_limit(0);
	require_once("../dompdf/dompdf_config.inc.php");
	spl_autoload_register('DOMPDF_autoload');
	function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE)
	{	$old_limit = ini_set("memory_limit", "100M");
		$dompdf = new DOMPDF();
		$dompdf->set_paper($paper,$orientation);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename.".pdf");
	}

	$filename = 'table_data';
	$dompdf = new DOMPDF();
	$html = file_get_contents('downloadtable1.php');
	//sleep(5);
	pdf_create($html,$filename,'A4','portrait');


?>