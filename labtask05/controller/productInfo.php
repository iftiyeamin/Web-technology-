<?php 

require_once ('model/model.php');

function fetchAllProducts(){
	return showAllProducts();

}
function fetchProducts($id){
	return showProducts($id);

}
