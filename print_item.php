<?PHP
	function filter_info($elem)
	{
		return ($elem["category"] == "Informatique");
	}
	function filter_hi_fi($elem)
	{
		return ($elem["category"] == "Hi-fi");
	}
	function filter_livre($elem)
	{
		return ($elem["category"] == "Livre");
	}
	function print_item($page, $product, $category)
	{
		$i = 0;
		$product = array_values($product);
		foreach ($product as $key => $value)
		{
			if ($key >= $page * 9 && $key < ($page + 1) *9)
			{
				echo "		<a href=\"/ft_shop/index?item=".$value["name"]."\">\n";
				echo "		<div class=\"product\">\n";
				echo "			<img class=\"vignette\" src=\"" . $value["img"] . "\"class=\"object_img\">\n";
				echo "			<p class=\"object_name\">".$value["name"]."</p>\n";
				echo "			<p class=\"obect_price\">".$value["price"]."</p>\n";
				echo "		</div>\n";
				echo "		</a>\n";
				$i++;
			}
		}
		if ($i < 9 && $page == 0)
			return;
		if ($i < 9 && $page > 0)
			echo "<a href=\"/ft_shop/index?product=".$category."&page=". ($page - 1) ."\" class=\"link_page_before\">Page precedente</a>\n";
		if ($i == 9 && $product[$i + $page * 9] && $page == 0)
			echo "<a href=\"/ft_shop/index?product=informatique&page=". ($page + 1) ."\" class=\"link_page_after\">Page suivante</a>";
		if ($i == 9 && $product[$i + $page * 9] && $page > 0)
		{
			echo "<a class=\"link_page_before\" href=/ft_shop/index?product=informatique&page=". ($page - 1) ."\">Page precedente</a>\n";
			echo "<a class=\"link_page_after\" href=/ft_shop/index?product=informatique&page=". ($page + 1) ."\">Page suivante</a>\n";
		}
	}
	function print_info_item($page)
	{
		$products = file_get_contents("private/products.csv");
		$products = unserialize($products);
		$info_prod = array_filter($products, "filter_info");
		print_item($page, $info_prod, "informatique");
	}
		function print_hi_fi_item($page)
	{
		$products = file_get_contents("private/products.csv");
		$products = unserialize($products);
		$hi_fi_prod = array_filter($products, "filter_hi_fi");
		print_item($page, $hi_fi_prod, "hi_fi");
	}
		function print_livre_item($page)
	{
		$products = file_get_contents("private/products.csv");
		$products = unserialize($products);
		$livre_prod = array_filter($products, "filter_livre");
		print_item($page, $livre_prod, "livre");
	}
?>