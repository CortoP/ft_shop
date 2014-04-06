<?PHP

$name = $_POST['name'];
$quantity = $_POST['quantity'];
if (!is_numeric($quantity))
{
	echo "Veuillez rentrer une quantite";
	return ;
}
$products = file_get_contents("private/products.csv");
$products = unserialize($products);
if (count($products) == 0 || count($products[0]) == 0)
{
	echo "Le produit n existe pas";
	return ;
}
$cook = unserialize($_COOKIE['pannier']);
foreach ($products as $elem)
{
	if ($elem['name'] == $name)
	{
		if ($elem['quantity'] < $quantity)
		{
			echo "Il ne reste que ".$elem['quantity']." de ".$name."(s)";
			return ;
		}
		if (isset($_COOKIE["pannier"]))
		{
			foreach ($_cook as $prod)
			{
				if ($prod['name'] == $name)
				{
					$prod['quantity'] += $quantity;
					$elem['quantity'] -= $quantity;
					$prod['price'] += $quantity * $elem['price'];
					file_put_contents("private/products.csv", serialize($products));
					setcookie("pannier", serialize($cook), time() + 1800);
					header("Location: /ft_shop/index.php?error=user");
				}
			}
			array_push($cook, array("name" => $name, "quantity" => $quantity, "price" => $quantity * $elem['price']));
			$elem['quantity'] -= $quantity;
			file_put_contents("private/products.csv", serialize($products));
			setcookie("pannier", serialize($cook), time() + 1800);
			header("Location: /ft_shop/index.php?error=user");
		}
		setcookie("pannier", serialize(array(array("name" =>  $name, "quantity" => $quantity,  "price" => $quantity * $elem['price']))), time() + 1800);
		$elem['quantity'] -= $quantity;
		file_put_contents("private/products.csv", serialize($products));
	}
}
echo "Produit inexistant";
?>