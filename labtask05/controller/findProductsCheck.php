<?php

require_once '../model/model.php';

if (isset($_POST['findproducts'])) {
	
		echo $_POST['searchProducts'];

    try {
    	
    	$allSearchedProducts = searchProduct($_POST['searchProducts']);
    	require_once '../showSearchProducts.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

