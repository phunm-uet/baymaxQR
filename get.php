<?php
// header('content-type: application/json; charset=utf-8');
// header("access-control-allow-origin: *");
if(isset($_GET['input'])){
	$input = $_GET['input'];
	echo hash('adler32', $input).'-'.hash('crc32', $input);
	// $result = array(
	// 	'1' => hash('adler32', $input),
	// 	'2' => hash('crc32', $input) 
	// 	);
	// echo json_encode($result,true);
}

 ?>