<?PHP
function print_right_bar_bottom()
{
	echo "</div>\n";
	echo "<div classe=\"right_bar\">\n";
	if (isset($_COOKIE["pannier"]))
	{
		foreach ($_COOKIE["pannier"] as $elem)
		{
			echo "<p class=name_of_product>" . $elem['name'] . "</p>/n";
			echo "<p class=quantity_of_product>" . $elem['quantity'] . "</p>/n";
		}
	}
	else
	echo "<p>votre pannier est vide</p>";
	echo "</div>\n";
	echo "</body>\n";
}
?>