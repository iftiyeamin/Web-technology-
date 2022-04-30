<?php
 require_once 'db-connect.php';

function showAllProducts(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `products` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function showProducts($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `products` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addProducts($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO `products`(`Name`, `Buying Price`, `Selling Price`) VALUES (:pname, :bprice, :sprice)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':pname' => $data['pname'],
        	':bprice' => $data['bprice'],
        	':sprice' => $data['sprice'],
        	
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateProduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE 'products' set 'Name' = ?, 'Buying Price' = ?, 'Selling Price'= ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['pname'], $data['bprice'], $data['sprice'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `products` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function searchProduct ($searchProducts){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `products` WHERE Name LIKE '%$searchProducts%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

?>