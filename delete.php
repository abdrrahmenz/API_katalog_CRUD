<?php

	$con = new mysqli("localhost","root","","project_katalog");
	$id = $_POST['id'];

	$stmt = $con->prepare('DELETE FROM produk WHERE id=?');
	$stmt->bind_param('i',$id);

	$result = $stmt->execute();


	if ($result) {
		$out = array();
		$out['result'] = true;
		$out['message'] = 'Product has been deleted';
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