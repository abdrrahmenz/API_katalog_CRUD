<?php

	$con = new mysqli("localhost","root","","project_katalog");
	$nama = $_POST['name'];
	$harga = $_POST['price'];
	$deskripsi = $_POST['desc'];

	$stmt = $con -> prepare("INSERT INTO produk (nama, harga, deskripsi) VALUES (?, ?, ?)");
	$stmt -> bind_param('sis', $nama, $harga, $deskripsi);

	$result = $stmt -> execute();
	if ($result) {
		$output = array();
		$output['result'] = 'success';
		$output['message'] = 'Product has been created';
		echo json_encode($output);
	}else {
		$output = array();
		$output['result'] = false;
		$output['message'] = 'Something error';
		echo json_encode($output);
	}

	$stmt->close();
	$con->close();
	?>