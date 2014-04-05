<?php
if ($_POST['login'] == "")
{
	echo "Rediriger vers ouverture de session";
	return ;
}
$login = $_POST['login'];
$name = $_POST['name'];
$first_name = $_POST['first_name'];
$mail = $_POST['mail'];
$address = $_POST['address'];
$zip = $_POST['zip'];

$oldpasswd = hash("whirlpool", $_POST['oldpasswd']);
$newpasswd = hash("whirlpool", $_POST['newpasswd']);
$passwd2 = hash("whirlpool", $_POST['passwd2']);
if ($newpasswd != $passwd2)
{
	echo "Confirmation du pasword incorrect\n";
	return ;
}
$tab = array("login"=>$login, "passwd"=>$newpasswd, "name"=>$name , "first_name"=>$first_name , "mail"=>$mail , "address"=>$address , "zip"=>$zip);
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
			 if ($elem['passwd'] != $oldpasswd)
			 {
				echo "Ancien mot de passe incorrect ";
				return ;
			 }
		}
	}
	array_push($accounts, $tab);
}
file_put_contents("private/users.csv", serialize($accounts));
?>