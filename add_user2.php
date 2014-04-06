<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
		<form align="center" action="add_user.php" method="POST">
			  Identifiant : <input type='text' name='login' value="" required/><br/>
			  Nom : <input type='text' name='name' value="" /><br/>
			  Prenom : <input type='text' name='first_name' value="" /><br/>
			  Email : <input type='email' name='mail' value="" required/><br/>
			  Adresse : <input type='text' name='address' value="" /><br/>
			  Code postal : <input type='text' name='zip' value="" /><br/>
			  Mot de passe : <input type='password' name='passwd' value="" required/><br/>
			  Confirmer le mot de passe : <input type='password' name='passwd2' value="" required/><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>