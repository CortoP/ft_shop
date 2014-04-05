<?php
if ($_POST['name'] == "" || $_POST['price'] == "" || $_POST['quantity'] == "" || $_POST['category'] == "" || $_POST['sub-category'] == "")
{
	echo "Un champ est vide";
	return ;
}
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$sub_category = $_POST['sub-category'];

$tab = array("name" => $name, "price"=>$price, "quantity"=>$quantity, "category"=>$category, "sub_category"=>$sub_category);
$accounts = file_get_contents("private/products.csv");
$accounts = unserialize($accounts);
if (count($accounts) == 0 || count($accounts[0]) == 0)
   $accounts = array($tab);
else
{
	foreach ($accounts as $key => $elem)
	{
		if ($accounts[$key]['name'] == $name)
		{
			echo "Utilisateur deja enregistre";
			return ;
		}
	}
	array_push($accounts, $tab);
}
file_put_contents("private/products.csv", serialize($accounts));
?>