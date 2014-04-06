<?PHP
//	include 'disconnect.php';
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	print_header_left_bar();
	if (isset($_GET["product"]))
	{
		if ($_GET["product"] === "informatique")
			print_info_item($_GET["page"]);
		else if ($_GET["product"] === "livre")
			print_livre_item($_GET["page"]);
		else if ($_GET["product"] === "hi_fi")
			print_hi_fi_item($_GET["page"]);
		else
			echo "<p>rien</p>";
	}
	print_right_bar_bottom();
?>