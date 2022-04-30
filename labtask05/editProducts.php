<?php 

require_once 'controller/productInfo.php';
$product = fetchProducts($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/updateProducts.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $product['Name'] ?>" type="text" id="name" name="pname"><br>
  <label for="Bprice">Buying Price:</label><br>
  <input value="<?php echo $product['Buying Price'] ?>" type="text" id="Bprice" name="bprice"><br>
  <label for="Sprice">Selling Price :</label><br>
  <input value="<?php echo $product['Selling Price'] ?>" type="text" id="Sprice" name="sprice"><br>
 
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateProducts" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

