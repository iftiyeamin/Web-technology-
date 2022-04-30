
<!DOCTYPE html>
<html>
  <body>
<?php 
    include "nav.php";

?>
    <!-- [SEARCH FORM] -->
    <form method="post" action="controller/findProductsCheck.php">
      <h1>SEARCH FOR PRODUCTS</h1>
      <input type="text" name="searchProducts" />
      <input type="submit" name="findproducts" value="Search"/>
    </form>


 
  </body>
</html>