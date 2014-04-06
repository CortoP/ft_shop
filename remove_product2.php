<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
		<form align="center" action="remove_product.php" method="POST">
		  Supprimer le compte : <br/>
			  Produit : <input type='text' name='name' value="" /><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>