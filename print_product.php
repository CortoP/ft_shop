<?PHP
function print_product($product_to_print)
{
	$products = file_get_contents("private/products.csv");
	$products = unserialize($products);
	foreach ($products as $key => $value)
	{
		if ($value["name"] == $product_to_print)
		{
			$tmp = $value;
			break;
		}
	}
	echo "<div class=\"page_object\">";
	echo "<img src=\"".$tmp["img"]."\" class=\"object_img_page\">";		
	echo "<p class=\"object_name_page\">".$tmp["name"]."</p>";
	echo "<p class=\"obect_price\">".$tmp["price"]." euro</p>";
	if ($tmp["quantity"] === 0)
		echo "<p>Le produit n'est plus disponible pour le moment.</p>";
	else
	{
		echo "<form class=\"form_command\"align=\"center\" action=\"add_pannier.php\" method=\"POST\">";
		echo "	<input type=\"text\" name=\"name\" value=\"".$tmp["name"]."\" readonly></input>";
		echo "	<input type=\"number\" name='quantity' value=\"\" required></input><br/>";
		echo "	<input type=\"submit\" name=\"submit\" value=\"Commander\" />";
		echo "</form>";
	}
	echo "</div>";
	}
?>