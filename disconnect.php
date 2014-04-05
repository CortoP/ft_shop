<?
function disconnect()
{
	setcookie("user", "", time() - 3600);
	setcookie("pannier", "", time() - 3600);
}
?>