<?php
$login = $_COOKIE['user'];
$tab = array("login" => $login);
if ($_POST['name'] != "")
   $tab['name'] = $_POST['name'];
if ($_POST['first_name'] != "")
   $tab['first_name'] = $_POST['first_name'];
if ($_POST['mail'] != "")
   $tab['mail'] = $_POST['mail'];
if ($_POST['address'] != "")
   $tab['address'] = $_POST['address'];
if ($_POST['zip'] != "")
   $tab['zip'] = $_POST['zip'];

$modif_passw = false;
if ($_POST['oldpasswd'] != "" && $_POST['newpasswd'] != "" && $_POST['passwd2'] != "")
{
	$modif_passw = true;
	$oldpasswd = hash("whirlpool", $_POST['oldpasswd']);
	$newpasswd = hash("whirlpool", $_POST['newpasswd']);
	$passwd2 = hash("whirlpool", $_POST['passwd2']);
	if ($newpasswd != $passwd2)
	{
		echo "Confirmation du pasword incorrect\n";
		header("Location: /ft_shop/index.php");
		return ;
	}
}
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
			 if ($modif_passw == true && $elem['passwd'] != $oldpasswd)
			 {
				header("Location: /ft_shop/index.php");
				return ;
			 }
			 else if ($modif_passw == true)
			 	 $accounts[$key]['passwd'] = $newpasswd;
			if (isset($tab['name']))
			 	 $elem['name'] = $tab['name'];
			if (isset($tab['first_name']))
			 	 $accounts[$key]['first_name'] = $tab['first_name'];
			if (isset($tab['mail']))
			 	 $accounts[$key]['mail'] = $tab['mail'];
			if (isset($tab['address']))
			 	 $accounts[$key]['address'] = $tab['address'];
			if (isset($tab['zip']))
			 	 $accounts[$key]['zip'] = $tab['zip'];
		}
	}
}
print_r($accounts);
file_put_contents("private/users.csv", serialize($accounts));
?>