<?php
if ($_POST['name'] == "" || $_POST['price'] == "" || $_POST['quantity'] == "" || $_POST['category'] == "" || $_POST['sub_category'] == "" || $_POST['img'] == "")
{
	echo "Un champ est vide";
	header("Location: /ft_shop/index.php");
	return ;
}
if (!is_numeric($_POST['price']) || !is_numeric($_POST['quantity']))
{
	echo "Un champ est mal renseigne";
	header("Location: /ft_shop/index.php");
}
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$sub_category = $_POST['sub_category'];
if (!copy($img, "private/img/$name.img"))
{
	echo "L'adress de l'image est invalide";
	header("Location: /ft_shop/index.php");
	return;
}
$img = "private/img/$name.img";
$tab = array("name" => $name, "price"=>$price, "quantity"=>$quantity, "category"=>$category, "sub_category"=>$sub_category, "img"=>$img);
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
			echo "Produit deja enregistre";
			header("Location: /ft_shop/index.php");
			return ;
		}
	}
	array_push($accounts, $tab);
}
file_put_contents("private/products.csv", serialize($accounts));
header("Location: /ft_shop/index.php");
?>