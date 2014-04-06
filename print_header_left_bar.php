<?PHP
	include 'disconnect.php';
	function print_header_left_bar()
	{
		echo "<!DOCTYPE>\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "	<title>Shop 42</title>\n";
		echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"shop42.css\">\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<div class=\"header\">\n";
		echo "	<a href=\"/index.php\"><h1>SHOP</h1>\n";
		echo "	<img src=\"resource_css/42.png\" id=\"title42\" /></a>\n";
		echo "</div>\n";
		echo "<div class=\"bloc\">\n";
		echo "<div class=\"side_bar\">\n";
		echo "	<div class=\"menu_user\">\n";
		if (isset($_GET["disconnect"]))
			disconnect();
		if (isset($_COOKIE["user"]))
		{
			echo "		<h3 id=\"info_user\">Bonjour " . $_COOKIE["user"] . ",</h3>\n";
			echo "		<a href=modif_user2.php class=\"menu_user\">Parametre du compte</a><br/>\n";
			echo "		<a href=\"/index?disconnect\" class=\"menu_user\">Se deconnecter</a><br/>\n";
			if (isset($_COOKIE["root"]))
			{
				echo "		<a href=\"add_product2.php\" class=\"menu_user\">Ajouter un produit</a><br/>\n";
				echo "		<a href=\"modif_product2.php\" class=\"menu_user\">Modifier un produit</a><br/>\n";
				echo "		<a href=\"remove_product2.php\" class=\"menu_user\">Supprimer un produit</a><br/>\n";
				echo "		<a href=\"root_remove_user2.php\" class=\"menu_user\">Supprimer un compte client</a><br/>\n";
			}
			echo "</div>\n";
		}
		else
		{
			echo "		<p>Bonjour cher visiteur</p>\n";
			echo "		<form action=\"connect.php\" method=\"post\">\n";
			echo "			Login => <input type=\"text\" name=\"login\" size=\"20\" class=\"text\" required><br />\n";
			echo "			Password <input type=\"password\" name=\"passwd\" size=\"20\" class=\"text\" required>\n";
			echo "			<input type=\"submit\" value=\"Se connecter\" id=\"button\">\n";
			echo "		</form>\n";
			if (isset($_GET["error"]))
			{
				if ($_GET["error"] == "user")
					echo "<p class=\"error\">Le nom d'utilisateur n'existe pas<p>";
				if ($_GET["error"] == "passwd")
					echo "<p class=\"error\">Le password est incorrect<p>";
			}
			echo "		<a href=\"add_user2.php\">Je souhaite me creer un compte</a>\n";
			echo "	</div>\n";
		}
		echo "	<br/><h3 class=\"nav_title\">Nos produits :</h3>\n";
		echo "	<div class=\"nav\">\n";
		echo "		<div><a href=\"/index?product=informatique&page=0\" class=\"nav\">Informatique</a></div>\n";			
		echo "		<div><a href=\"/index?product=livre&page=0\" class=\"nav\">Livre</a></div>\n";		
		echo "		<div><a href=\"/index?product=hi_fi&page=0\" class=\"nav\">Hi-fi</a></div>\n";		
		echo "	</div>\n";
		echo "</div>\n";
		echo "<div class=middle>\n";
	}
?>