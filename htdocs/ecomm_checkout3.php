<?php
session_start();
include'ecommtable.php';
$now = date('Y-m-d H:i:s');
$session = session_id();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$shipping_first_name = $_POST['shipping_first_name'];
$shipping_last_name = $_POST['shipping_last_name'];
$shipping_address_1 = $_POST['shipping_address_1'];
$shipping_address_2 = $_POST['shipping_address_2'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];
$shipping_zip_code = $_POST['shipping_zip_code'];
$shipping_phone = $_POST['shipping_phone'];
$shipping_email = $_POST['shipping_email'];
$cost_subtotal=$_POST['cost_subtotal'];
$query = 'SELECT
         customer_id
         FROM
         ecom_customers
         WHERE
first_name = "' . $first_name . '" AND
last_name = "' . $last_name . '" AND
address_1 = "' . $address_1 . '" AND
address_2 = "' . $address_2 . '" AND
city = "' . $city . '" AND
state = "' . $state . '" AND
zip_code = "' . $zip_code . '" AND
phone = "' . $phone . '" AND
email = "' . $email . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
} else {
$query = 'INSERT INTO ecom_customers
         (customer_id, first_name, last_name, address_1, address_2, city,state, zip_code, phone, email)
         VALUES
        (NULL,
         "' . $first_name . '",
         "' . $last_name . '",
         "' . $address_1 . '",
         "' . $address_2 . '",
         "' . $city . '",
         "' . $state . '",
         "' . $zip_code . '",
         "' . $phone . '",
         "' . $email . '"
		 )';
mysql_query($query, $db) or die(mysql_error($db));
$customer_id = mysql_insert_id();
}
$query = 'INSERT into ecom_orders
(order_id, order_date, customer_id, cost_subtotal, cost_total,shipping_first_name, shipping_last_name, shipping_address_1,shipping_address_2, shipping_city, shipping_state, shipping_zip_code,
shipping_phone, shipping_email)
VALUES
(NULL,
"' . $now . '",
' . $customer_id . ','
.$cost_subtotal.',
0.00,
"' . $shipping_first_name . '",
"' . $shipping_last_name . '",
"' . $shipping_address_1 . '",
"' . $shipping_address_2 . '",
"' . $shipping_city . '",
"' . $shipping_state . '",
"' . $shipping_zip_code . '",
"' . $shipping_phone . '",
"' . $shipping_email . '")';
mysql_query($query, $db) or die(mysql_error($db));
$order_id = mysql_insert_id();
$query = 'INSERT INTO commm_order_details
(order_id, order_qty, product_code)
SELECT
' . $order_id . ', qty, product_code
FROM
commm_temp_cart
WHERE
session = "' . $session . '"';
mysql_query($query, $db) or die(mysql_error($db));
$query = 'DELETE FROM commm_temp_cart WHERE session = "' . $session . '"';
mysql_query($query, $db) or die(mysql_error($db));
$cost_shipping = round($cost_subtotal * 0.25, 2);
$cost_tax = round($cost_subtotal * 0.1, 2);
$cost_total = $cost_subtotal + $cost_shipping + $cost_tax;
$query = 'UPDATE ecom_orders 
         SET
         cost_shipping = ' . $cost_shipping . ',
         cost_tax = ' . $cost_tax . ',
         cost_total = ' . $cost_total . '
         WHERE
         order_id = ' . $order_id;
mysql_query($query, $db) or die(mysql_error($db)) ;
?>
<html>
<head>
<title> Order Confirmation </title>
<style type="text/css" >
th { background-color: #999;}
td { vertical-align: top; }
.odd_row { background-color: #EEE; }
.even_row { background-color: #FFF; }
</style >
</head >
<body style="background-image: url(image/background.jpg)">
<p> Here is a recap of your order: </p>
<p> Order Date: <?php echo $now; ?> </p>
<p> Order Number: <?php echo $order_id; ?> </p>
<table>
<tr>
<td>
<table>
<tr>
<th colspan="2" > Billing Information </th >
</tr> <tr>
<td> First Name: </td>
<td> <?php echo $first_name;?> </td>
</tr> <tr>
<td> Last Name: </td>
<td> <?php echo $last_name;?> </td>
</tr> <tr>
<td> Billing Address: </td>
<td> <?php echo $address_1;?> </td>
</tr> <tr>
<td> </td>
<td> <?php echo $address_2;?> </td>
</tr> <tr>
<td> City: </td>
<td> <?php echo $city;?> </td >
</tr> <tr>
<td> State: </td >
<td> <?php echo $state;?> </td >
</tr> <tr>
<td> Zip Code: </td >
<td> <?php echo $zip_code;?> </td >
</tr> <tr>
<td> Phone Number: </td >
<td> <?php echo $phone;?> </td >
</tr> <tr>
<td> Email Address: </td >
<td> <?php echo $email;?> </td >
</td >
</tr>
</table>
</td >
<td>
<table>
<tr>
<th colspan="2" > Shipping Information </th >
</tr> <tr>
<td> First Name: </td >
<td> <?php echo $shipping_first_name;?> </td >
</tr> <tr>
<td> Last Name: </td >
<td> <?php echo $shipping_last_name;?> </td >
</tr> <tr>
<td> Billing Address: </td >
<td> <?php echo $shipping_address_1;?> </td >
</tr> <tr>
<td> </td >
<td> <?php echo $shipping_address_2;?> </td >
</tr> <tr>
<td> City: </td >
<td> <?php echo $shipping_city;?> </td >
</tr> <tr>
<td> State: </td >
<td> <?php echo $shipping_state;?> </td >
</tr> <tr>
<td> Zip Code: </td >
<td> <?php echo $shipping_zip_code;?> </td >
</tr> <tr>
<td> Phone Number: </td >
<td> <?php echo $shipping_phone;?> </td >
</tr> <tr>
<td> Email Address: </td >
<td> <?php echo $shipping_email;?> </td >
</tr>
</table>
</td >
</tr>
</table>
<table style="width: 75%;" >
<tr>
<th> Item Code </th > <th> Item Name </th > <th> Quantity </th > <th> Price Each </th >
<th> Extended Price </th >
</tr>
<?php
$query = 'SELECT
p.product_code, order_qty, name, description, price
FROM
commm_order_details d JOIN com_products p ON
d.product_code = p.product_code
WHERE
order_id ='.$order_id.'
ORDER BY
p.product_code ASC';
$result = mysql_query($query, $db) or die (mysql_error());
$rows = mysql_num_rows($result);
$total = 0;
$odd = true;
while ($row = mysql_fetch_array($result)) {
echo ($odd == true) ? ' <tr class="odd_row" > ' : ' <tr class="even_row" > ';
$odd = !$odd;
extract($row);
?>
<td> <?php echo $product_code; ?> </td >
<td> <?php echo $name; ?> </td >
<td> <?php echo $order_qty; ?> </td >
<td style="text-align: right;" >Rs- <?php echo $price; ?> </td >
<td style="text-align: right;" > Rs- <?php
echo number_format($price * $order_qty, 2);?>
</td >
</tr>
<?php
}
?>
</table>
<p> Shipping: Rs- <?php echo number_format($cost_shipping, 2); ?> </p>
<p> Tax: Rs- <?php echo number_format($cost_tax, 2); ?> </p>
<p> <strong> Total Cost: Rs- <?php echo number_format($cost_total, 2); ?>
</strong > </p>
</body >
<h2> Order Checkout </h2>
<ol>
<li> Enter Billing and Shipping Information </li>
<li> Verify Accuracy of Order Information and Send Order </li>
<li> <strong> Order Confirmation and Receipt </strong > </li>
</ol>
</html >