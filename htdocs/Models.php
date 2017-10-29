<?php
session_start();
include 'ecommtable.php';
?>
<html>
<head><title>Models</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body style="background-image:url(image/background.jpg)">
<h1>Sachin Car Agency</h1>
<h4>Serving You Since 1975</h4>
<hr />
<p style="text-align:center;font-size:30px">We sell various models of many car's companys.To provide you comfort,here is the list what we sell: </p>
<ul>
<li><a href="#MASERATI">MASERATI</a></li>
<li><a href="#MERCEDES-BENZ">MERCEDES-BENZ</a></li>
<li><a href="#JEEP">JEEP</a></li>
<li><a href="#LAMBORGHINI">LAMBORGHINI</a></li>
<li><a href="#VOLVO">VOLVO</a></li>
<li><a href="#SUZUKI">SUZUKI</a></li>
<li><a href="#HYUNDAI">HYUNDAI</a></li>
</ul>
<table border="1" cellspacing="0px" width="100%">
<tr>
<td colspan="3"><a name="MASERATI">MASERATI:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=3';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=6 AND product_code>3';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="MARCEDES-BENZ">MARCEDES-BENZ:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=9 AND product_code>6';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=12 AND product_code>9';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="JEEP">JEEP:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=15 AND product_code>12';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=18 AND product_code>15';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="LAMBORGHINI">LAMBORGHINI:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=21 AND product_code>18';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=24 AND product_code>21';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="VOLVO">VOLVO:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=27 AND product_code>24';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=30 AND product_code>27';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="SUZUKI">SUZUKI:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=33 AND product_code>30';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=36 AND product_code>33';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
<tr>
<td colspan="3"><a name="HYUNDAI">HYUNDAI:</a></td>
</tr>
<tr>
<?php
$query='SELECT * FROM com_products
       WHERE
	   product_code <=39 AND product_code>36';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?></tr><tr>
<?php
$query='SELECT * FROM com_products 
       WHERE 
	   product_code <=42 AND product_code>39';
$result=mysql_query($query,$db) or die(mysql_error());
while($row=mysql_fetch_array($result)){
extract($row);
echo'<td>';
echo'<a method="post" href="view_product.php?product_code='.$product_code.'"><img src="image/'.$product_code.'.png" style="margin-left:70px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$name.'</a></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<small><a method="post" href="view_product.php?product_code='.$product_code.'">'.$price.'Rs/-</a></small>';
echo'</td>';
}
?>
</tr>
</table>
<hr />
<p>copyright &copy;1996 Sachin Car Agency&trade;<br />
All Rights Are Reserved.No Material May Be Reproduced Without Written Permission.</p>
</body>
</html>