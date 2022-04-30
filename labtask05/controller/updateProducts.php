<?php  
require_once '../model/model.php';


if (isset($_POST['updateProducts'])) {
	$data['pame'] = $_POST['pname'];
	$data['bprice'] = $_POST['bprice'];
	$data['sprice'] = $_POST['sprice'];
	// $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);;



  if (updateProduct($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showProducts
  	header('Location: ../showProducts.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>