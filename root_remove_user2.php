<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
	<body>
		<form align="center" action="root_remove_user.php" method="POST">
		  Supprimer le compte : <br/>
			  Identifiant : <input type='text' name='login' value="" required/><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>