<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>add products</title>
</head>
<body>

	<form action="controller/addProductCheck.php" method="POST"> 


 <fieldset style="size: 50px; text-align: center;"> 
<legend> Add Products</legend>
<label for="name"> Name: </label>
<input type="text" name="pname" id="name"> <br> <br>
<label for="Bprice"> Buying Price: </label>
<input type="text" name="bprice" id="Bprice"> <br> <br>

<label for="Sprice"> Selling Price: </label>
<input type="text" name="sprice" id="Sprice">  <br> <br>
<input type="submit" name="addproduct" value="save">

</fieldset>


	</form>

</body>
</html>