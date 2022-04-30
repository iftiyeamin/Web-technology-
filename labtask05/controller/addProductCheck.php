<?php  
require_once '../model/model.php';


if (isset($_POST['addproduct'])) {
	$data['pname'] = $_POST['pname'];
	$data['bprice'] = $_POST['bprice'];
	$data['sprice'] = $_POST['sprice'];
	

  if (addProducts($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>