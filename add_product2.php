<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
		<form align="center" action="add_product.php" method="POST">
			  Name : <input type='text' name='name' value="" /><br/>
			  Prix : <input type='number' name='price' value="" /><br/>
			  Img : <input type='text' name='img' value="" /><br/>
			  Quantite : <input type='number' name='quantity' value="" /><br/>
			  Categorie : <select name="category">
							<option value="Informatique" selected="">Informatique</option>
							<option value="Livre">Livre</option>
			 				<option value="Hi_fi">Hi_fi</option>
						</select><br/>
			  Sous-categorie : <input type='text' name='sub_category' value="" /><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>
