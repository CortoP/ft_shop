<?php
if (file_exists("private/users.csv") && file_exists("private/products.csv") && file_exists("private/orders.csv"))
   return ;
if (!file_exists("private"))
   mkdir("private", 0755);
$accounts = array();
$products = array();
$orders = array();
file_put_contents("private/users.csv", $accounts);
file_put_contents("private/products.csv", $products);
file_put_contents("private/orders.csv", $orders);
?>