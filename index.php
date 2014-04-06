<?PHP
	include 'disconnect.php';
	include 'print_item.php';
	echo "<!DOCTYPE>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "	<title>Shop 42</title>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<div class=\"header\">\n";
	echo "	<h1>SHOP 42</h1>\n";
	echo "</div>\n";
	echo "<div classe=\"left_bar\">\n";
	echo "	<div class=\"info_user\">\n";
	if (isset($_GET["disconnect"]))
		disconnect();
	if (isset($_COOKIE["user"]))
	{
		echo "		<p>Bonjour " . $_COOKIE["user"] . ",</p>\n";
		echo "		<a href=modif_user.html>Modifier les information de mon compte</a>\n";
		echo "		<a href=\"/ft_shop/index?disconnect\">Se deconnecter</a>\n";
	}
	else if (isset($_COOKIE["user"]["admin"]))
	{
		echo "		<a href=\"add_product\">Ajouter un produit</a>\n";
		echo "		<a href=\"modif_product\">Modifier un produit</a>\n";
		echo "		<a href=\"remove_product\">Supprimer un produit</a>\n";
	}
	else
	{
		echo "		<p>Bonjour cher visiteur</p>\n";
		echo "		<form action=\"connect.php\" method=\"post\">\n";
		echo "			<input type=\"text\" name=\"login\" size=\"72\" class=\"text\"><br />\n";
		echo "			<input type=\"password\" name=\"passwd\" size=\"72\" class=\"text\">\n";
		echo "			<input type=\"submit\" value=\"Se connecter\" id=\"button\">\n";
		echo "		</form>\n";
		if (isset($_GET["error"]))
		{
			if ($_GET["error"] == "user")
				echo "<p class=\"error\">Le nom d'utilisateur n'existe pas<p>";
			if ($_GET["error"] == "passwd")
				echo "<p class=\"error\">Le password est incorrect<p>";
		}
		echo "		<a href=\"add_user.html\">Je souhaite me creer un compte</a>\n";
	}
	echo "	<div class=\"nav\">\n";
	echo "		<div><a href=\"/ft_shop/index.php\">Acceuil</a></div>\n";			
	echo "		<div><a href=\"/ft_shop/index?product=informatique&page=0\">Informatique</a></div>\n";			
	echo "		<div><a href=\"/ft_shop/index?product=livre\">Livre</a></div>\n";		
	echo "		<div><a href=\"/ft_shop/index?product=hi_fi\">HI-fi</a></div>\n";		
	echo "	</div>\n";
	echo "</div>\n";
	echo "<div classe=\"midle\">\n";
	if (isset($_GET["product"]))
	{
		if ($_GET["product"] === "informatique")
			echo print_info_item($_GET["page"]);
		else if ($_GET["product"] === "livre")
			echo "<p>livre product</p>";
		else if ($_GET["product"] === "hi_fi")
			echo "<p>hi_fi product</p>";
		else
			echo "<p>rien</p>";
	}
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
?>