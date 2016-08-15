<?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");
$name = $_FILES['file']['name'];
$exp = explode(".", $name);
$extension = end($exp);
if($extension != "csv"){
	$error = array(
		'error' => "1",
		);
	echo json_encode($error,true);
} else {
	$file_name = 'uploads/' . $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $file_name);
	$file = fopen($file_name,"r");
	$arr_code = fgetcsv($file);
	$result = array();
	foreach ($arr_code as $code) {
		$result[] = array(
			"code" => $code,
			"hash" =>  hash('adler32', $code).'-'.hash('crc32', $code),
			);
	}
	echo json_encode($result,true);
}

 ?>