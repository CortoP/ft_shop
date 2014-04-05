<?PHP
	echo "<!DOCTYPE>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "	<title>Shop 42</title>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "	<h1>SHOP 42</h1>\n";
	if (isset($_COOKIE["user"]))
	{
		echo "	<p>Bonjour" . $_COOKIE["user"]["login"] . "</p>\n";
		echo "	<a href=modif_user.html>Modifier les information de mon compte</a>\n";
	}
	if (isset($_COOKIE["user"]["admin"]))
	{
		echo "	<a href=\"add_product\">Ajouter un produit</a>\n";
	}
	else
	{
		echo "	<p>Bonjour cher visiteur</p>\n";
		echo "	<form action=\"connect.php\" method=\"post\">\n";
				echo "		<input type=\"text\" name=\"login\" size=\"72\" class=\"text\"><br />\n";
				echo "		<input type=\"password\" name=\"passwd\" size=\"72\" class=\"text\">\n";
				echo "		<input type=\"submit\" value=\"Se connecter\" id=\"button\">\n";
		echo "	</form>\n";
		echo "	<a href=add_user.html>Je souhaite me creer un compte</a>\n";
	}
	echo "</body>\n";
?>