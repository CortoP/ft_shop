<?PHP
$name = $_GET['del_prod'];
if isset($_COOKIE['pannier'])
{
	$cart = unserialize($_COOKIE['pannier']);
	foreach ($cart as $key => $prod)
	{
		if ($prod['name'] == $name)
		{
			unset($cart[$key]);
			$accounts = file_get_contents("provate/products.csv");
			$accounts = unserialize($accounts);
			setcookie("pannier", serialize($cart), time() + 3600ç∂);
			header("Location: /ft_shop/index.php");
			return ;
		}
	}
}
header("Location: /ft_shop/index.php");
?>