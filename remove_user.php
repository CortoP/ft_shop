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
foreach ($accounts as $key => $elem)
{
	if ($elem['login'] == $login && $passwd == $elem['passwd'])
	{
		unset($accounts[$key]);
		file_put_contents("private/users.csv", serialize($accounts));
		return ;
	}
}
echo "Mauvais mot de passe";
?>