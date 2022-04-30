<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProducts();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Buying Price</th>
			<th>Selling Price</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<tr>
				<td><a href="showProducts.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
				<td><?php echo $product['Buying Price'] ?></td>
				<td><?php echo $product['Selling Price'] ?></td>
				<td>
					<a href="editProducts.php?id=<?php echo $product['ID'] ?>">Edit</a>
					&nbsp
					<a href="controller/deleteProducts.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
				</td>

			
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>