<?PHP
	echo '<!DOCTYPE>';
	echo '<html>';
	echo '<head>';
	echo	'<title>Shop 42</title>';
	echo '</head>';
	echo '<body>';
	echo '<h1>SHOP 42</h1>';
	if (isset($_COOKIE["user"]))
	{
		echo '<p>Bonjour $_COOKIE["user"]["login"]</p>';
		echo '<a href=modif_user.html>Modifier les information de mon compte</a>';
	}
	else
	{
		echo '<p>Bonjour cher visiteur</p>';
		echo '<form action="connect.php" method="post">';
				echo '<input type="text" name="login" size="72" class="text"><br />';
				echo '<input type="password" name="passwd" size="72" class="text">';
				echo '<input type="submit" value="Se connecter" id="button">';
		echo '</form>';
		echo '<a href=add_user.html>Je souhaite me creer un compte</a>';
	}
	if (isset($_COOKIE["user"]["admin"]))
	{
		echo '<a href="add_product">Ajouter un produit</a>';
	}
	echo '</body>';
?>