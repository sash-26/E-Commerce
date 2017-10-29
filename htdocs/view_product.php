<?php
session_start();
$session=session_id();
include 'ecommtable.php';
if(isset($_POST['submit']) && $_POST['submit']=='ADD CART'){
if($_POST['quantity']>0){
$query='INSERT INTO commm_temp_cart
        (session,product_code,qty)
		VALUES
		("'.$session.'",'.$_GET['product_code'].','.$_POST['quantity'].')';
mysql_query($query,$db) or die(mysql_error());
echo'Items Have Been Added To Your Cart.Thanks For Shoping From Us.';
die();		
}
else{
die("NO Item Has Been Selected");
}
}
$product_code=$_GET['product_code'];
$query='SELECT* FROM com_products
        WHERE
		product_code='.$product_code;
$result=mysql_query($query,$db) or die (mysql_error());
$row=mysql_fetch_array($result);
extract($row);
?>
<html>
<head>
<title>
View-Product
</title>
</head>
<body>
<h2>Your's Products Full Detail Is Following-</h2>
<hr/>
<table width="100%" height="70%">
<tr>
<td></td>
<td align="middle"><a href="view_cart.php">VIEW CART</a></td>
</tr>
<tr>
<td>
<img src="image/<?php echo $product_code;?>.png" height="200px" width="200px"/>
</td>
<td>
<ul style="list-style-type:none">
<li>Name-<?php echo $name;?></li>
<li>Price-<?php echo $price;?></li>
<li>Description-<?php echo $description;?></li>
</ul>
</td>
</tr>
<form method="post" action="view_product.php?product_code=<?php echo $product_code;?>">
<tr>
<td>
<?php
$query='SELECT* FROM commm_temp_cart
        WHERE
		session="'.$session.'" AND product_code='.$product_code;
$result=mysql_query($query,$db) or die (mysql_error());
if(mysql_num_rows($result)>0){
$row=mysql_fetch_array($result);
extract($row);
}
else{
$qty=0;
}
?>
<p>Quantity-&nbsp;&nbsp;<input type="text" name="quantity" value="<?php echo $qty;?>" /></p>
</td>
<td>
<input type="submit" name="submit" value="ADD CART" />
</td>
</tr>
</form>
</table>
</body>
</html>