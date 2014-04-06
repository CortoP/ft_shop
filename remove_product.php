<?PHP
if ($_POST['name'] == "")
{
	echo "Veuillez saisir un nom de produit";
	header("Location: /ft_shop/index.php");
	return ;
}
$name = $_POST['name'];
$products = file_get_contents("private/products.csv");
$products = unserialize($products);
foreach ($products as $key => $elem)
{
	if ($elem['name'] == $name)
	{
		unset($products[$key]);
		unlink("private/img/".$name.".img");
		file_put_contents("private/products.csv", serialize($products));
	header("Location: /ft_shop/index.php");
		return ;
	}
}
echo "Produit non present";
header("Location: /ft_shop/index.php");
?>