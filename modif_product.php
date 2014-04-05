<?php
if ($_POST['name'] == "")
{
	echo "Le produit n existe pas";
	return ;
}
$name = $_POST['name'];
$tab = array("name" => $name);
if ($_POST['price'] != "")
   $tab['price'] = $_POST['price'];
if ($_POST['quantity'] != "")
   $tab['quantity'] = $_POST['quantity'];
if ($_POST['category'] != "")
   $tab['category'] = $_POST['category'];
if ($_POST['sub_category'] != "")
   $tab['sub_category'] = $_POST['sub_category'];

$products = file_get_contents("private/products.csv");
$products = unserialize($products);
if (count($products) == 0 || count($products[0]) == 0)
{
	echo "Le produit n existe pas";
	return ;
}
else
{
	foreach ($products as $key => $elem)
	{
		if ($products[$key]['name'] == $name)
		{
			if (isset($tab['price']))
			 	 $products[$key]['price'] = $tab['price'];
			if (isset($tab['quantity']))
			 	 $products[$key]['quantity'] = $tab['quantity'];
			if (isset($tab['category']))
			 	 $products[$key]['category'] = $tab['category'];
			if (isset($tab['sub_category']))
			 	 $products[$key]['sub_category'] = $tab['sub_category'];
		}
	}
}
print_r($products);
file_put_contents("private/products.csv", serialize($products));
?>