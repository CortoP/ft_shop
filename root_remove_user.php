<?PHP
$login = $_POST['login'];
$accounts = file_get_contents("private/users.csv");
$accounts = unserialize($accounts);
foreach ($accounts as $key => $elem)
{
	if ($elem['login'] == $login)
	{
		unset($accounts[$key]);
		file_put_contents("private/users.csv", serialize($accounts));
		header("Location: /index.php");
		return ;
	}
}
header("Location: /index.php");
?>