<?php

	$con = new mysqli("localhost","root","","project_katalog");

	$result = $con->query('SELECT * FROM produk');
	header('Content-Type: application/json');

	if ($result) {
		$list_array = array();
		while($row = $result->fetch_assoc()) {
			array_push($list_array,$row);
		}

		$out = array();
		$out['result'] = true;
		$out['message'] = $list_array;
		echo json_encode($out);
	} else {
		$out = array();
		$out['result'] = false;
		$out['message'] = 'Server error';
		echo json_encode($out);
	}
	
	$result->close();
	$con->close();

?>