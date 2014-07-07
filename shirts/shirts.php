<?php 
	require_once("../inc/config.php");
 	require_once(ROOT_PATH . "inc/products.php");
 	$all_products = get_products_all()
 ?><?php 
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include(ROOT_PATH . 'inc/header.php'); ?>

		<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				<ul class="products">
					<?php foreach($all_products as $product) { 
							echo get_list_view_html($product);
						}
					?>
				</ul>

			</div>

		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>