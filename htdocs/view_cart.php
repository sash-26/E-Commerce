<?php
session_start();
$session=session_id();
include 'ecommtable.php';
if(isset($_POST['submit']) && $_POST['submit']=='Empty Cart'){
$query='DELETE FROM commm_temp_cart
        WHERE
		session="'.$session.'"';
mysql_query($query,$db) or die(mysql_error());
header('Refresh:0.0001;URL=Models.php');
die();
}
$query='SELECT t.product_code,t.qty,p.name,p.description,p.price
        FROM commm_temp_cart t LEFT JOIN com_products p ON
		t.product_code=p.product_code
        WHERE
	    session="'.$session.'"';
$result=mysql_query($query,$db) or die(mysql_error());
$num=mysql_num_rows($result);
?>
<html>
<head>
<link rel="stylesheet" href="index.css" type="text/css">
<title>
CART
</title>
</head>
<body>
<h2>You Have <?php echo$num;?> Items In Cart.</h2>
<table border="1" cellspacing="0px" width="75%">
<tr>
<td>
ITEM
</td>
<td>
ITEM NAME
</td>
<td>
Quantity
</td>
<td>
PRICE EACH
</td>
<td>
EXTENDED PRICE
</td>
</tr>
<?php
$odd=true;
while($row=mysql_fetch_array($result)){
extract($row);
echo($odd==true)?'<tr class="odd_row">':'<tr class="even_row">';
$odd=!$odd;
echo'<td width="50px">';
echo'<img src="image/'.$product_code.'.png" />';
echo'</td>';
echo'<td>';
echo$name;
echo'</td>';
echo'<td>';
echo$qty;
echo'</td>';
echo'<td>';
echo$price;
echo'</td>';
$extended_price=number_format($qty*$price,2);
echo'<td>';
echo$extended_price;
echo'<td>';
echo'</tr>';
}
if($num>0){
echo'<tr>';
echo'<td colspan="5">';
echo'<form method="post" action="checkout.php">';
echo'<input type="submit" name="submit" value="Proceed For CheckOut" />';
echo'</form>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="5">';
echo'<form method="post" action="view_cart.php">';
echo'<input type="submit" name="submit" value="Empty Cart" />';
echo'</form>';
echo'</td>';
echo'</tr>';
}
?>
</table>
</body>
</html>