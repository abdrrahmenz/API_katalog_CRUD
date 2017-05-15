<?php

	$con = new mysqli("localhost","root","","project_katalog");
	$id = $_POST['id'];

	$stmt = $con->prepare('SELECT * FROM produk WHERE id = ?');
	header('Content-Type: application/json');
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	if ($row) {
		$output = array();
		$output['result'] = true;
		$output['message'] = $row;
		echo json_encode($output);
	} else {
		$output = array();
		$output['result'] = false;
		$output['message'] = 'No product found';
		echo json_encode($output);
	}
	$stmt->close();
	$con->close();
?>