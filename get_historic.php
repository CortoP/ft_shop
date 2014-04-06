<?PHP

function filter_user($user)
{
	if ($_COOKIE['user'] == $user)
	   return true;
	return false;
}

function get_historic()
{
	$orders = unserialize(file_get_contents("private/orders"));
	setcookie("historic", "serialize(array_filter($orders, filter_user)), time() + 3600);
}

?>