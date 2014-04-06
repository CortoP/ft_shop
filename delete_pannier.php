<?PHP
$name = $_POST['del_prod'];
if (isset($_COOKIE['pannier']))
{
	$cart = unserialize($_COOKIE['pannier']);
	foreach ($cart as $key => $prod)
	{
		if ($prod['name'] == $name)
		{
			$products = file_get_contents("provate/products.csv");
			$products = unserialize($products);
			foreach($products as $k => $elem)
			{
				if ($elem['name'] == $prod['name'])
				{
					$products[$k]['quantity'] += $prod['quantity'];
					unset($cart[$key]);
					setcookie("pannier", serialize($cart), time() + 3600);
					file_put_contents("private/products.csv", serialize($products));
					header("Location: /ft_shop/index.php");
					return ;
				}
			}
		}
	}
}
header("Location: /ft_shop/index.php");
?>