<?php
	include 'print_item.php';
	include 'print_header_left_bar.php';
	include 'print_right_bar_bottom.php';
	include 'print_product.php';
	print_header_left_bar();
?>
	<body>
		<form align="center" action="modif_user.php" method="POST">
			  Nom : <input type='text' name='name' value="" /><br/>
			  Prenom : <input type='text' name='first_name' value="" /><br/>
			  Email : <input type='email' name='mail' value="" /><br/>
			  Adresse : <input type='text' name='address' value="" /><br/>
			  Code postal : <input type='text' name='zip' value="" /><br/>
			  Ancien mot de passe : <input type='password' name='oldpasswd' value="" /><br/>
			  Nouveau mot de passe : <input type='password' name='newpasswd' value="" /><br/>
			  Confirmer le mot de passe : <input type='password' name='passwd2' value="" /><br/>
			  <input type="submit" name="submit" value="OK" />
		</form>
<?php
	print_right_bar_bottom();
?>