<?PHP
	function filter_info($elem)
	{
		return ($elem["category"] == "Informatique");
	}
	function filter_hi_fi($elem)
	{
		return ($elem["category"] == "hi_fi");
	}
	function filter_livre($elem)
	{
		return ($elem["category"] == "livre");
	}
	function print_item($page, $product)
	{
		$i = 0;
		foreach ($product as $key => $value)
		{
			if ($key >= $page * 12 && $key < ($page + 1) *12)
			{
			echo "		<div class=\"product\">\n";
			echo "			<img src=\"" . $value["img"] . "\"classe=\"object_img\">\n";
			echo "			<p classe=\"object_name\">".$value["name"]."</p>\n";
			echo "			<p classe=\"obect_price\">".$value["price"]."</p>\n";
			echo "		</div>\n";
			$i++;
			}
		}
//		while ($i < 12 && $product[$i + $page * 10])
//		{
//			echo "		<div class=\"product\">\n";
//			echo "			<img src=\"" . $product[$i + $page * 10]["img"] . "\"classe=\"object_img\">\n";
//			echo "			<p classe=\"object_name\">".$product[$i + $page * 10]["name"]."</p>\n";
//			echo "			<p classe=\"obect_price\">".$product[$i + $page * 10]["price"]."</p>\n";
//			echo "		</div>\n";
//			$i++;
//		}
		if ($i < 11 && $page == 0)
			return;
		if ($i < 11 && $page > 0)
			echo "<a classe=\"link_page_before\" href=/ft_shop/index?product=informatique&page=". $page - 1 .">Page precedente</a>\n";
		if ($i == 11 && $product[$i + $page * 12] && $page == 0)
			echo "<a classe=\"link_page_after\" href=/ft_shop/index?product=informatique&page=". $page + 1 .">Page suivante</a>\n";
		if ($i == 11 && $product[$i + $page * 12] && $page > 0)
		{
			echo "<a classe=\"link_page_before\" href=/ft_shop/index?product=informatique&page=". $page - 1 .">Page precedente</a>\n";
			echo "<a classe=\"link_page_after\" href=/ft_shop/index?product=informatique&page=". $page + 1 .">Page suivante</a>\n";
		}
	}
	function print_info_item($page)
	{
		$products = file_get_contents("private/products.csv");
		$products = unserialize($products);
		print_r($products);
		$info_prod = array_filter($products, "filter_info");
		print_r($info_prod);
		print_item($page, $info_prod);
	}
?>