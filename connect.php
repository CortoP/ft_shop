<?php
if ($_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "Un champ est vide";
	return ;
}
$login = $_POST['login'];
$passwd = hash('whirlpool', $_POST['passwd']);
$accounts = file_get_contents("private/users.csv");
$accounts = unserialize($accounts);
if (count($accounts) == 0 || count($accounts[0]) == 0)
{
	echo "Aucun utilisateur enregistre";
	return ;
}
foreach ($accounts as $elem)
{
	if ($elem['login'] == $login)
	{
		if ($elem['passwd'] == $passwd)
		{
			setcookie("user", $login, time() + 3600);
			header("Location: /ft_shop/page_acceuil.php");
			return ;
		}
		else
		{
			header("Location: /ft_shop/page_acceuil.php?error=passwd");
			return ;
		}
	}
}
header("Location: /ft_shop/page_acceuil.php?error=user");
return ;
?>