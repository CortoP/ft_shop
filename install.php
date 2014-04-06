<?php
if (file_exists("private/users.csv") && file_exists("private/products.csv") && file_exists("private/orders.csv"))
   return ;
if (!file_exists("private"))
   mkdir("private", 0755);
$passwd = hash("whirlpool", "42");
$accounts = array(array("root" => 'root', "passwd" => $passwd));
$products = array();
$orders = array();
file_put_contents("private/users.csv", serialize($accounts));
file_put_contents("private/products.csv", $products);
file_put_contents("private/orders.csv", $orders);
?>