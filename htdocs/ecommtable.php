<?php
include 'database.php';
$query='CREATE TABLE IF NOT EXISTS com_products(
        product_code   INTEGER UNSIGNED        NOT NULL,
		name           VARCHAR(255)            NOT NULL,
		description    MEDIUMTEXT              NOT NULL,
		price          DEC(13,2)               NOT NULL,
		Primary Key(Product_code)
		)
		ENGINE=MyISAM';
mysql_query($query,$db) or die(myaql_error($db));
$query='CREATE TABLE IF NOT EXISTS ecom_customers(
        customer_id    INTEGER UNSIGNED       NOT NULL    AUTO_INCREMENT,
		first_name     VARCHAR(255)           NOT NULL,
		last_name      VARCHAR(20)            NOT NULL,
        address_1      VARCHAR(50)            NOT NULL,
        address_2      VARCHAR(50),
        city           VARCHAR (20)           NOT NULL,
        state          CHAR(2)                NOT NULL,
        zip_code       CHAR(5)                NOT NULL,
        phone          CHAR(12)               NOT NULL,
        email          VARCHAR(100)           NOT NULL,
		Primary Key(customer_id)
		)
		ENGINE=MyISAM';
mysql_query($query,$db) or die(myaql_error($db));
$query = 'CREATE TABLE IF NOT EXISTS ecom_orders (
          order_id               INTEGER UNSIGNED     NOT NULL     AUTO_INCREMENT,
          order_date             DATE                 NOT NULL,
          customer_id            INTEGER UNSIGNED     NOT NULL,
          cost_subtotal          DEC(14,2) NOT NULL,
          cost_shipping          DEC (13,2),
          cost_tax               DEC(13,2),
          cost_total             DEC(14,2)             NOT NULL,
          shipping_first_name    VARCHAR(20)          NOT NULL,
          shipping_last_name     VARCHAR(20)          NOT NULL,
          shipping_address_1     VARCHAR(50)          NOT NULL,
          shipping_address_2     VARCHAR(50),
          shipping_city          VARCHAR (20)         NOT NULL,
          shipping_state         CHAR(2)              NOT NULL,
          shipping_zip_code      CHAR(5)              NOT NULL,
          shipping_phone         CHAR(12)             NOT NULL,
          shipping_email         VARCHAR(100)         NOT NULL,
          PRIMARY KEY(order_id),
          FOREIGN KEY (customer_id) REFERENCES ecom_customers(customer_id)
          )
          ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));
$query = 'CREATE TABLE IF NOT EXISTS commm_order_details (
          order_id      INTEGER UNSIGNED      NOT NULL,
          order_qty     INTEGER UNSIGNED      NOT NULL,
          product_code  INTEGER UNSIGNED                NOT NULL,
          FOREIGN KEY (order_id) REFERENCES ecom_orders(order_id),
          FOREIGN KEY (product_code) REFERENCES com_products(product_code)
          )
          ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));
$query = 'CREATE TABLE IF NOT EXISTS commm_temp_cart (
          session         CHAR(50)           NOT NULL,
          product_code    INTEGER UNSIGNED   NOT NULL,
          qty             INTEGER UNSIGNED   NOT NULL,
          PRIMARY KEY (session, product_code),
          FOREIGN KEY (product_code) REFERENCES com_products(product_code)
          )
          ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));
?>