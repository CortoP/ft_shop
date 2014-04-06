<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
		<form align="center" action="modif_product.php" method="POST">
			  Name : <input type='text' name='name' value="" /><br/>
			  Prix : <input type='number' name='price' value="" /><br/>
			  Quantite : <input type='number' name='quantity' value="" /><br/>
			  Categorie : <input type='text' name='category' value="" /><br/>
			  Sous-categorie : <input type='text' name='sub_category' value="" /><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>