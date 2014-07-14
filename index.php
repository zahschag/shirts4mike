<?php 
	require_once('./inc/config.php');
	include(ROOT_PATH . 'inc/products.php'); 
	
	$recent = get_products_recent();
	$pageTitle = "Unique T-shirts designed by a frog";
	$section = "home";
	include(ROOT_PATH .'inc/header.php');
 ?>

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="<?php echo BASE_URL;?>img/mike-the-frog.png" alt="Mike the Frog says:">
				<div class="button">
					<a href="<?php BASE_URL; ?>shirts.php">
						<h2>Hey, I&rsquo;m Mike!</h2>
						<p>Check Out My Shirts</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Mike&rsquo;s Latest Shirts</h2>

				<ul class="products">
					<?php 
						$list_view_html = "";
						foreach($recent as $product) { 
								include(ROOT_PATH . 'inc/partial-products.php');
						}
						echo $list_view_html;
					?>								
				</ul>

			</div>

		</div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>