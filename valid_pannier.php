<?
$orders = file_get_contents("private/users.csv");
$orders = unserialize($orders);
$command = array('login' => $_GET['login']);
if (count($orders) == 0 || count($orders[0]) == 0)
   $orders = array($command);
else
	arary_push($orders, $command);
file_put_contents("private/orders.csv", serialize($orders));
?>