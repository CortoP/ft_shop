<?php
$login = $_POST['login'];
$name = $_POST['name'];
$first_name = $_POST['first_name'];
$mail = $_POST['mail'];
$address = $_POST['address'];
$zip = $_POST['zip'];

// tester les ";" dans le login

$passwd = hash("whirlpool", $_POST['passwd']);
$passwd2 = hash("whirlpool", $_POST['passwd2']);
if ($passwd != $passwd2)
{
	echo "Confirmation du pasword incorrect\n";
	return ;
}
$tab = array("login"=>$login, "passwd"=>$passwd, "name"=>$name , "first_name"=>$first_name , "mail"=>$mail , "address"=>$address , "zip"=>$zip);
$accounts = file_get_contents("private/users.csv");
$accounts = unserialize($accounts);
if (count($accounts) == 0 || count($accounts[0]) == 0)
   $accounts = array($tab);
else
{
	foreach ($accounts as $key => $elem)
	{
		if ($accounts[$key]['login'] == $login)
		{
			echo "Utilisateur deja enregistre";
			return ;
		}
	}
	array_push($accounts, $tab);
}
file_put_contents("private/users.csv", serialize($accounts));
?>