<?php

	$con = new mysqli("localhost","root","","project_katalog");
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];

	$stmt = $con->prepare('UPDATE produk SET nama=?, harga=?, deskripsi=? WHERE id=?');
	$stmt->bind_param('sisi', $nama, $harga, $deskripsi, $id);
	$result = $stmt->execute();

	if ($result) {
		$out = array();
		$out['result'] = true;
		$out['message'] = 'Product has been updated';
		echo json_encode($out);
	}else {
		$out = array();
		$out['result'] = false;
		$out['message'] = 'Server out';
		echo json_encode($out);
	}

	$stmt->close();
	$con->close();

?>