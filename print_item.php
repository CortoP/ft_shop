<?PHP
	function print_info_item($page)
	{
		$products = file_get_contents("private/products.csv");
		$products = unserialize($products);
		$i = 0;
		while ($i < 10 && $product[$i + $page * 10])
		{
			echo "		<div class=\"product\">\n";
			echo "			<img src=\"$product[$i + $page * 10][\"img\"]\" classe=\"object_img\">\n";
			echo "			<p classe=\"object_name\">$product[$i + $page * 10][\"name\"]</p>\n";
			echo "			<p classe="obect_price">$product[$i + $page * 10][\"price\"]</p>\n";
			echo "		</div>\n";
			$i++;
		}
		if ($i < 10 && $page == 0)
			return;
		if ($i < 10 && $page > 0)
			echo "<a classe=\"link_page_before\" href=/ft_shop/index?product=informatique&page=". $page - 1 .">Page precedente</a>\n";
		if ($i == 10 && $product[$i + $page * 10] && page > 0)
			echo "<a classe=\"link_page_after\" href=/ft_shop/index?product=informatique&page=". $page + 1 .">Page suivante</a>\n";
		if ($i == 10 && $product[$i + $page * 10] && page > 0)
		{
			echo "<a classe=\"link_page_before\" href=/ft_shop/index?product=informatique&page=". $page - 1 .">Page precedente</a>\n";
			echo "<a classe=\"link_page_after\" href=/ft_shop/index?product=informatique&page=". $page + 1 .">Page suivante</a>\n";
		}
	}
?>