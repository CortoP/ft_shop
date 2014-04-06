<?PHP

if ($_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "Un champ est vide";
	return ;
}
$login = $_POST['login'];
$passwd = hash("whirlpool", $_POST['passwd']);
$accounts = file_get_contents("private/users.csv");
$accounts = unserialize($accounts);
$flag = 0;
foreach ($accounts as $key => $elem)
{
	if ($elem['login'] == $login)
	{
		$k = $key;
		$flag += 10;
	}
	if ($elem['login'] == "root" && $passwd == $elem['passwd'])
	   $flag += 1;
}
if ($flag == 11)
{
	unset($accounts[$k]);
	file_put_contents("private/users.csv", serialize($accounts));
}
echo "Mauvais mot de passe";
?>