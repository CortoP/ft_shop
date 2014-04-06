<?PHP
$name = $_GET['del_prod'];
if isset($_COOKIE['pannier'])
{
	foreach ($_COOKIE['pannier'] as $prod)
	{
		if ($prod['name'] == $name)
		{
			unset($_prod);
			$accounts = file_get_contents("provate/products.csv");
			$accounts = unserialize($accounts);
			header("Location: /ft_shop/page_aceuil.php");
		}
	}
}
header("Location: /ft_shop/page_aceuil.php");
?>