<?php
include 'ecommtable.php';
$query='INSERT INTO com_products
        (product_code,name,description,price)
		VALUES
		(00001,"Ghibli Diesel","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",20000000.00),
		(00002,"Ghibli S Q4","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",23875300.00),
		(00003,"Quattroporte Diesel","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",23875300.00),
		(00004,"Ghibli Sport","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",23895300.00),
		(00005,"GranCarbio","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",33895300.00),
		(00006,"Ghibli","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",33895300.00),
		(00007,"CLA Class COUPE","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",37695300.00),
		(00008,"E CLASS SEDAN","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",47695300.00),
		(00009,"E CLASS CABRIOLET","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",57695300.00),
		(00010,"E CLASS COUPE","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",57565300.00),
		(00011,"E CLASS WAGON","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",58765300.00),
		(00012,"G Class SUV","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",58765300.00),
		(00013,"2015 Cherokee Model","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",587000.00),
		(00014,"2015 Compass Model","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",587000.00),
		(00015,"2015 Grand Cherokee Model","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",488000.00),
		(00016,"2015 Grand Cherokee SRT Model","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",387000.00),
		(00017,"2015 Renegade Model","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",333300.00),
		(00018,"2015 Patriot High Altitude","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",523300.00),
		(00019,"LAMBORGHINI avetador","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",57695300.00),
		(00020,"LAMBORGHINI Bicolore Gallardo","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",97697300.00),
		(00021,"LAMBORGHINI Countach LP400","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",8895300.00),
		(00022,"LAMBORGHINI Espada 1968","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",77695300.00),
		(00023,"AMBORGHINI Diablo","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",67695300.00),
		(00024,"LAMBORGHINI Gallardo Super Trofeo","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",57686300.00),
		(00025,"Volvo C70","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",7695300.00),
		(00026,"Volvo S40","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",4995300.00),
		(00027,"Volvo XC90","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",5795300.00),
		(00028,"Volvo XC70","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",695300.00),
		(00029,"Volvo XC60","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",7695300.00),
		(00030,"Volvo V70","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00031,"Suzuki XL7","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00032,"Suzuki Kizashi","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00033,"Suzuki Escudo","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00034,"Suzuki SX4","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00035,"Suzuki Wagon R","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00036,"Suzuki Alto","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00037,"Hyundai Accent","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00038,"Hyundai Atos","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00039,"Hyundai Blueon","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00040,"Hyundai Blue-Will","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00041,"Hyundai Dynasty","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00),
		(00042,"Hyundai Eon","It Is The Most Beautiful And Preferable Brand Of Many Peoples.",1695300.00)';
mysql_query($query,$db) or die(mysql_error($db));
echo'success';
?>