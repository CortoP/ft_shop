<?PHP
function print_right_bar_bottom()
{
	echo "</div>\n";
	echo "<div class=\"pannier\">\n";
	$tot_price = 0;
	if (isset($_COOKIE["pannier"]))
	{
		$array = unserialize($_COOKIE["pannier"]);
		foreach ($array as $elem)
		{
			echo "	<p class=name_of_product>" . $elem['name'] . "</p>\n";
			echo "	<p class=quantity_of_product>Quantite voulu: " . $elem['quantity'] . "</p>\n";
			echo "	<p class=price_of_product> Prix des produits: " . $elem['price'] . " euro</p>\n";
			echo "	<form action=\"delete_pannier.php\" method=\"POST\">\n";
			echo "		<input type=\"text\" name=\"del_prod\" value=\"".$elem["name"]."\" size=\"25\"readonly></input><br/>\n";
			echo "		<input type=\"submit\" name=\"submit\" value=\"Supprimmer de ma commande\" />\n";
			echo "	</form><br/>\n";
			$tot_price += $elem['price'];
		}
		echo "<h4>Le prix total de votre pannier est de ".$tot_price." euro</h4>";
		echo "	<form align=\"right\" action=\"add_product.php\" method=\"POST\">\n";
		echo "		<input type=\"submit\" name=\"submit\" value=\"Je valide ma commande\" />\n";
		echo "	</form>\n";
	}
	else
		echo "	<p>Votre pannier est vide</p>\n";
	echo "</div>\n";
	echo "</body>\n";
	echo "</html>\n";
}
?>