<?PHP
function print_right_bar_bottom()
{
	echo "</div>\n";
	echo "<div classe=\"right_bar\">\n";
	if (isset($_COOKIE["pannier"]))
	{
		$array = unserialize($_COOKIE["pannier"]);
		foreach ($array as $elem)
		{
			echo "<p class=name_of_product>" . $elem['name'] . "</p>\n";
			echo "<p class=quantity_of_product>" . $elem['quantity'] . "</p>\n";
		}
		echo "<form align=\"center\" action=\"add_product.php\" method=\"POST\">\n";
		echo "<input type=\"submit\" name=\"submit\" value=\"Je valide ma commande\" />\n";
		echo "</form>";
	}
	else
	echo "<p>votre pannier est vide</p>\n";
	echo "</div>\n";
	echo "</body>\n";
}
?>