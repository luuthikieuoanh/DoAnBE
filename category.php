<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});
session_start();
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
$id = $_GET['id'];
$productModel = new ProductModel();

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategories();
$categoryItem = $categoryModel->getCategoriesByID($id);

$perPage = 3;
if (isset($_GET['limit'])) {
	$perPage = $_GET['limit'];
}

$productList2 = $productModel->getProductsByCategory($id);
$totalRow = count($productList2);
// $productList = $productModel->getProductsByCategoryPage($id, $page, $perPage);

if (isset($_GET['sort']) && isset($_GET['limit'])) {
	if ($_GET['sort'] == 'default') {
		$productList = $productModel->getProductsByCategoryPage($id, $page, $perPage);
	} else if ($_GET['sort'] == 'a-z') {
		$productList = $productModel->sortCategoryASC($id, 'product_name', $page, $perPage);
	} else if ($_GET['sort'] == 'z-a') {
		$productList = $productModel->sortCategoryDECS($id, 'product_name', $page, $perPage);
	} else if ($_GET['sort'] == 'priceA') {
		$productList = $productModel->sortCategoryASC($id, 'product_price', $page, $perPage);
	} else {
		$productList = $productModel->sortCategoryDECS($id, 'product_price', $page, $perPage);
	}
} else {
	$productList = $productModel->getProductsByCategoryPage($id, $page, $perPage);
}
$pageLinks = Pagination::createPageLinks('id',$totalRow, $perPage, $page, $id, $perPage, $_GET['sort']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
	<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700&display=swap" rel="stylesheet">

	<!--<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--<link href="catalog/view/theme//stylesheet/TemplateTrip/bootstrap.min.css" rel="stylesheet" media="screen" />-->

	<link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/javascript/jquery/owl-carousel/owl.theme.default.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/stylesheet.css" rel="stylesheet">
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/ttblogstyle.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/category-feature.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/newsletter.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/animate.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/ttcountdown.css" rel="stylesheet" type="text/css" />

	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/lightbox.css" rel="stylesheet" type="text/css" />

	<link href="catalog/view/javascript/jquery/swiper/css/swiper.min.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="catalog/view/javascript/jquery/swiper/css/opencart.css" type="text/css" rel="stylesheet" media="screen" />

	<script src="catalog/view/javascript/common.js"></script>

	<!-- TemplateTrip custom Theme JS START -->
	<script src="catalog/view/javascript/TemplateTrip/addonScript.js"></script>
	<!-- <script src="catalog/view/javascript/TemplateTrip/tt_quickview.js"></script> -->
	<script src="catalog/view/javascript/TemplateTrip/inview.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/parallex.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/theia-sticky-sidebar.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/ResizeSensor.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/lightbox-2.6.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/waypoints.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/bootstrap-notify.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/ttcountdown.js"></script>
	<script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js"></script>
	<!-- TemplateTrip custom Theme JS END -->

	<link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=66" rel="canonical" />
	<link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/catalog/cart.png" rel="icon" />

	<script src="catalog/view/javascript/jquery/swiper/js/swiper.jquery.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.bpopup.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.cookie.js"></script>

</head>

<body class="product-category-66">
	<div id="page">
		<header>
			<?php include 'header.php' ?>
		</header>
		<div class="header-content-title">

		</div>

		<script>
			$(document).ready(function() {
				/* ---------------- start Templatetrip link more menu ----------------------*/
				var max_link = 4;
				var moretext = "More";
				var items = $('.menu-category > ul.dropmenu > li.TT-Sub-List');
				var surplus = items.slice(max_link, items.length);
				surplus.wrapAll('<li class="dropdown more-menu TT-Sub-List"><div class="dropdown-menu"><ul class="list-unstyled childs_1 single-dropdown-menu"></div>');
				$('.more-menu').prepend('<a href="#" class="level-top">' + moretext + '</a>');
				if ($(window).width() > 992) {
					$('.dropdown.more-menu .dropdown-menu li').addClass('TT-Sub-List1').removeClass('TT-Sub-List');
				}
				var ttcat_count = $('.more-menu ul > li.TT-Sub-List1 .CAT').length;
				if (ttcat_count > 2) {
					$('.more-menu > ul').addClass('tt-sub-auto');
				}
				$(".main-category-list .menu-category ul.dropmenu > li").hover(
					function() {
						$("body").addClass("menu_hover");
					},
					function() {
						$("body").removeClass("menu_hover");
					}
				);

				/* ---------------- End Templatetrip link more menu ----------------------*/
			});
		</script>

		<div id="product-category" class="container product-category">
			<ul class="breadcrumb">
				<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=common/home"><i class="material-icons">home</i></a></li>
				<li><a href=""><?php echo $categoryItem['category_name']?></a></li>
			</ul>
			<div class="row">
				<aside id="column-left" class="col-sm-3 hidden-xs">
					<div class="left-right-inner">
						<div class="panel panel-default category-treeview">
							<div class="panel-heading">Categories</div>
							<ul class="list-group">
								<li class="category-li">
									<a href="" class="list-group-item">azulejo</a>
									<!-- Display all category - child items list -->
								</li>
								<li class="category-li">
									<a href="" class="list-group-item">Pottery</a>
									<!-- Display all category - child items list -->
								</li>
								<li class="category-li">
									<a href="" class="list-group-item">Cameo</a>
									<!-- Display all category - child items list -->
								</li>

								<li class="category-li ">
									<a href="" class="list-group-item ">Pewter</a>
								</li>
								<li class="category-li">
									<a href="" class="list-group-item">clothes</a>
									<!-- Display all category - child items list -->
								</li>
							</ul>
						</div>
						<div class="swiper-viewport">
							<div id="banner0" class="swiper-container">
								<div class="swiper-wrapper">
									<div class="swiper-slide"><a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/left-banner-280x420.jpg" alt="Left-Banner" class="img-responsive" /></a></div>
								</div>
							</div>
						</div>
						<script>
							$('#banner0').swiper({
								effect: 'fade',
								autoplay: 2500,
								autoplayDisableOnInteraction: false
							});
						</script>
						<div class="featured-carousel products-list">
							<div class="box-heading">
								<h3>Featured</h3>
							</div>
							<div class="featured-items products-carousel row">
								<div class="product-layouts">
									<div class="product-thumb transition">
										<div class="image">
											<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=43">
												<img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/09-70x91.jpg" title="perspiciatis unde omnis" alt="perspiciatis unde omnis" />
												<img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/09--70x91.jpg" title="perspiciatis unde omnis" alt="perspiciatis unde omnis" />
											</a>
										</div>
										<div class="thumb-description">

											<div class="caption">
												<h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=43">perspiciatis unde omnis</a></h4>
												<div class="price">
													$14.00

													<span class="price-tax">Ex Tax: $10.00</span>
												</div>
											</div>

											<div class="button-group">
												<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('43')">

													<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
													</span><span class="loading"><i class="material-icons">cached</i></span></button>
												<button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('43');"><i class="material-icons icon-wishlist">favorite_border</i>
													<span title="Add to Wish List">Add to Wish List</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-compare" title="Add to compare" onclick="compare.add('43');"><i class="material-icons icon-exchange">equalizer</i>
													<span title="Add to compare">Add to compare</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=43')"><i class="material-icons quick_view_icon">visibility</i>
													<span title=""></span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-layouts">
									<div class="product-thumb transition">
										<div class="image">
											<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=40">
												<img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/19-70x91.jpg" title="voluptate velit esse" alt="voluptate velit esse" />
												<img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/19--70x91.jpg" title="voluptate velit esse" alt="voluptate velit esse" />
											</a>
										</div>
										<div class="thumb-description">

											<div class="caption">
												<h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=40">voluptate velit esse</a></h4>
												<div class="price">
													$123.20

													<span class="price-tax">Ex Tax: $101.00</span>
												</div>
											</div>

											<div class="button-group">
												<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('40')">

													<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
													</span><span class="loading"><i class="material-icons">cached</i></span></button>
												<button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('40');"><i class="material-icons icon-wishlist">favorite_border</i>
													<span title="Add to Wish List">Add to Wish List</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-compare" title="Add to compare" onclick="compare.add('40');"><i class="material-icons icon-exchange">equalizer</i>
													<span title="Add to compare">Add to compare</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=40')"><i class="material-icons quick_view_icon">visibility</i>
													<span title=""></span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-layouts">
									<div class="product-thumb transition">
										<div class="image">
											<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">
												<img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01-70x91.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
												<img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--70x91.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
											</a>
										</div>
										<div class="thumb-description">

											<div class="caption">
												<h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">aliquam quaerat voluptatem</a></h4>
												<div class="rating">
													<span class="fa-stack"><i class="material-icons star_on">star</i></span>
													<span class="fa-stack"><i class="material-icons star_on">star</i></span>
													<span class="fa-stack"><i class="material-icons star_on">star</i></span>
													<span class="fa-stack"><i class="material-icons star_on">star</i></span>
													<span class="fa-stack"><i class="material-icons star_off">star_border</i></span>
												</div>
												<div class="price">
													$122.00

													<span class="price-tax">Ex Tax: $100.00</span>
												</div>
											</div>

											<div class="button-group">
												<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">

													<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
													</span><span class="loading"><i class="material-icons">cached</i></span></button>
												<button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
													<span title="Add to Wish List">Add to Wish List</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-compare" title="Add to compare" onclick="compare.add('42');"><i class="material-icons icon-exchange">equalizer</i>
													<span title="Add to compare">Add to compare</span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
												<button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42')"><i class="material-icons quick_view_icon">visibility</i>
													<span title=""></span>
													<span class="loading"><i class="material-icons">cached</i></span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="sidebar panel panel-default information-list">
							<div class="panel-heading">Information</div>
							<div class="list-group">
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=4" class="list-group-item">About Us</a>
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=6" class="list-group-item">Delivery Information</a>
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=3" class="list-group-item">Privacy Policy</a>
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=5" class="list-group-item">Terms &amp; Conditions</a>
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/contact" class="list-group-item">Contact Us</a>
								<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/sitemap" class="list-group-item">Site Map</a>
							</div>
						</div>

					</div>
				</aside>

				<div id="content" class="col-sm-9">
					<!-- Category Description START -->
					<h1 class="category-name"></h1>
					<div class="category-description">
						<div class="row">
						</div>
					</div>
					<!-- Category Description END -->
					<!-- Category filter START -->
					<div class="category-filter">
						<!-- Grid-List Buttons -->
						<div class="col-md-2 filter-grid-list">
							<div class="btn-group">
								<button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="material-icons grid-on">grid_on</i></button>
								<button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="material-icons list-on">
										format_list_bulleted</i></button>
								<button type="button" id="short-view" class="btn btn-default" data-toggle="tooltip" title="Short"><i class='material-icons'>dehaze
									</i></button>
							</div>
						</div>
						<!-- Show Products Selection -->
						<div class="filter-show">
							<div class="col-md-4 text-right filter-text">
								<label class="input-group-addon control-label" for="input-limit">Show:</label>
							</div>
							<div class="col-md-8 text-right filter-selection">
								<select id="input-limit" class="form-control" onchange="location = this.value;">


									<option value="category.php?id=<?php echo $id ?>&limit=1&sort=<?php echo $_GET['sort'] ?>" <?php if ($_GET['limit'] == 1) {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>1</option>


									<option value="category.php?id=<?php echo $id ?>&limit=2&sort=<?php echo $_GET['sort'] ?>" <?php if ($_GET['limit'] == 2) {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>2</option>


									<option value="category.php?id=<?php echo $id ?>&limit=3&sort=<?php echo $_GET['sort'] ?>" <?php if ($_GET['limit'] == 3) {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>3</option>


									<option value="category.php?id=<?php echo $id ?>&limit=75&sort=<?php echo $_GET['sort'] ?>"<?php if ($_GET['limit'] == 75) {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>75</option>


									<option value="category.php?id=<?php echo $id ?>&limit=100&sort=<?php echo $_GET['sort'] ?>" <?php if ($_GET['limit'] == 100) {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>100</option>


								</select>
							</div>
						</div>
						<!-- Sort By Selection -->
						<div class="filter-sort-by">
							<div class="col-md-3 text-right filter-text">
								<label class="input-group-addon control-label" for="input-sort">Sort By:</label>
							</div>
							<div class="col-md-9 text-right filter-selection">
								<select id="input-sort" class="form-control" onchange="location = this.value;">

								
										<option value="category.php?id=<?php echo $id ?>&limit=<?php echo $_GET['limit'] ?>" <?php if ($_GET['sort'] == 'default') {
																																echo "selected = 'selected'";
																															} else {
																																echo "";
																															} ?>>Default</option>


										<option value="category.php?id=<?php echo $id ?>&limit=<?php echo $_GET['limit'] ?>&sort=a-z" <?php if ($_GET['sort'] == 'a-z') {
																																			echo "selected = 'selected'";
																																		} else {
																																			echo "";
																																		} ?>>Name (A - Z)</option>


										<option value="category.php?id=<?php echo $id ?>&limit=<?php echo $_GET['limit'] ?>&sort=z-a" <?php if ($_GET['sort'] == 'z-a') {
																																			echo "selected = 'selected'";
																																		} else {
																																			echo "";
																																		} ?>>Name (Z - A)</option>


										<option value="category.php?id=<?php echo $id ?>&limit=<?php echo $_GET['limit'] ?>&sort=priceA" <?php if ($_GET['sort'] == 'priceA') {
																																			echo "selected = 'selected'";
																																		} else {
																																			echo "";
																																		} ?>>Price (Low &gt; High)</option>


										<option value="category.php?id=<?php echo $id ?>&limit=<?php echo $_GET['limit'] ?>&sort=priceD" <?php if ($_GET['sort'] == 'priceD') {
																																			echo "selected = 'selected'";
																																		} else {
																																			echo "";
																																		} ?>>Price (High &gt; Low)</option>

								
								</select>
							</div>
						</div>
					</div>
					<!-- Category filter END -->
					<!-- Category products START -->
					<div class="category-products">
						<div class="row">
							<?php
							foreach ($productList as $item) {
								$imgs = explode(',', $item['product_picture']);
								$productPrice = number_format($item['product_price'], 2);
								$productPath = strtolower(str_replace(' ', '-', $item['product_name'])) . '-' . $item['product_id'];
							?>
								<div class="product-layout product-list col-xs-12">
									<div class="product-thumb row">
										<div class="image">
										 	<a href="product.php?/<?php echo $productPath; ?>">
												<img class="image_thumb" src="./image/cache/catalog/demo/product/<?php echo $imgs[0] ?>" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
												<?php
												if (count($imgs) > 1) {
												?>
												<img class="image_thumb_swap" src="./image/cache/catalog/demo/product/<?php echo $imgs[1] ?>" title="suscipit laboriosam nisi" alt="suscipit laboriosam nisi" />
												<?php }
												?>
											</a>
											<!-- <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--354x460.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" /> </a> -->
												<div class="button-group">
													<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">
														<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
														</span><span class="loading"><i class="material-icons">cached</i></span></button>
													<!-- <button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
														<span title="Add to Wish List">Add to Wish List</span>
														<span class="loading"><i class="material-icons">cached</i></span>
													</button> -->
												</div>
										</div>
										<div class="thumb-description">
											<div class="caption">
												<div class="product-description">
													<h4><a href="product.php?=<?php echo $productPath; ?>"><?php echo $item['product_name']; ?></a></h4>
													<p class="description"><?php $str = substr($item['product_description'], 0, 100);
																			echo $str . '...';
																			?></p>
												</div>
												<div class="product-price-and-shipping">
													<div class="price">
														$<?php echo $productPrice ?>

														<!-- <span class="price-tax">Ex Tax: $100.00</span> -->
													</div>

												</div>

											</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>

							<script>
								jQuery(document).ready(function($) {
									$(".item-countdown").each(function() {
										var date = $(this).data('date');
										$(this).lofCountDown({
											TargetDate: date,
											DisplayFormat: "<div>%%D%% <span>text_days</span></div><div>%%H%% <span>text_hours</span></div><div>%%M%% <span>text_minutes</span></div><div>%%S%% <span>text_seconds</span></div>"
										});
									});
								});
							</script>
						</div>
					</div>
					<!-- Category products END -->
					<!-- Category pagination START -->
					<div class="category-pagination">
						<div class="col-xs-6 text-left">Showing 1 to <?php echo $perPage ?> of <?php echo $totalRow ?> (<?php echo $page ?> Pages)</div>

						<div class="col-xs-6 text-right">
							<?php echo $pageLinks ?>
						</div>
					</div>

					<!-- Category pagination END -->
					<script>
						var Tawk_API = {},
							$_Tawk_LoadStart = new Date();
						(function() {
							var s1 = document.createElement("script"),
								s0 = document.getElementsByTagName("script")[0];
							s1.async = true;
							s1.src = 'https://embed.tawk.to/5fa664720a68960861bc9308/default';
							s1.charset = 'UTF-8';
							s1.setAttribute('crossorigin', '*');
							s0.parentNode.insertBefore(s1, s0);
						})();
					</script>
					<!--End of Tawk.to Script-->

				</div>
			</div>
		</div>
		<footer>

			<div class="footer-top-cms col-sm-12">
				<div class="footer-bg"></div>
				<div class="container">
					<aside id="footer-top">
						<div class="newletter-subscribe container hb-animate-element right-to-left hb-in-viewport">
							<div id="newletter-boxes" class="newletter-container">
								<div id="dialog-normal" class="window">
									<div class="box">
										<div class="newletter-title col-sm-6">
											<h2 class="tt-title">Sign Up For Newsletter</h2>
											<span class="newletter-desc">Sign up with us and get latest deals, offers & updates about store.</span>
										</div>
										<div class="box-content newleter-content col-sm-6">
											<label></label>
											<div id="form_subscribe">
												<form name="subscribe" id="subscribe">
													<input type="text" placeholder="Your email address" value="" name="subscribe_email" id="subscribe_email">
													<input type="hidden" value="" name="subscribe_name" id="subscribe_name" />
													<a class="button btn btn-primary" onclick="email_subscribe()"><span>subscribe</span><i class='material-icons'>near_me</i></a>

												</form>
											</div><!-- /#form_subscribe -->
											<div id="notification-normal"></div>
										</div>
									</div><!-- /.box-content -->
								</div>
							</div>

							<script>
								function email_subscribe() {
									$.ajax({
										type: 'post',
										url: 'index.php?route=extension/module/ttnewslettersubscribe/subscribe',
										dataType: 'html',
										data: $("#subscribe").serialize(),
										success: function(html) {
											try {

												eval(html);

											} catch (e) {}

										}
									});


								}

								function email_unsubscribe() {
									$.ajax({
										type: 'post',
										url: 'index.php?route=extension/module/ttnewslettersubscribe/unsubscribe',
										dataType: 'html',
										data: $("#subscribe").serialize(),
										success: function(html) {
											try {

												eval(html);

											} catch (e) {}
										}
									});
									$('html, body').delay(1500).animate({
										scrollTop: 0
									}, 'slow');

								}
							</script>
							<script>
								$(document).ready(function() {
									$('#subscribe_email').keypress(function(e) {
										if (e.which == 13) {
											e.preventDefault();
											email_subscribe();
										}
										var name = $(this).val();
										$('#subscribe_name').val(name);
									});
									$('#subscribe_email').change(function() {
										var name = $(this).val();
										$('#subscribe_name').val(name);
									});

								});
							</script>
						</div>

					</aside>

				</div>
			</div>
			<div class="footer-container">
				<div class="container bottom-to-top hb-animate-element">
					<div class="footer-left-cms col-sm-3">
						<aside id="footer-left">
							<div class="html-content">
								<div class="box-content">
									<div id="ttcmsfooter" class="links">
										<div class="ttfooter-logo"><a href="#"><img src="image/catalog/demo/banners/footer-logo.png" alt="footer-logo"></a></div>
										<div class="ttfooter-desc">Claritas processus Lorem ipsum dynamicus recmicus sequit qituconsut.</div>
									</div>
								</div>
							</div>

						</aside>



					</div>
					<div class="col-sm-3 footer-column footer-my-account">
						<h5>My Account</h5>
						<ul class="list-unstyled">
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/account">My Account</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist">Wish List</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/voucher">Gift Certificates</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/return/add">Returns</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/special">Specials</a></li>
						</ul>
					</div>
					<div class="col-sm-3 footer-column footer-column_1  footer-extras">
						<h5>Extras</h5>
						<ul class="list-unstyled">
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=4">About Us</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=6">Delivery Information</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=3">Privacy Policy</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=5">Terms &amp; Conditions</a></li>
							<li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/contact">Contact Us</a></li>
						</ul>
					</div>
					<div class="footer-column footer-right-cms col-sm-3">
						<aside id="footer-right">
							<div class="html-content">
								<div class="box-content">
									<div class="contact-us">
										<h5 class="">Store Information</h5>
										<ul style="display: block;" class="list-unstyled">
											<li class="contact-detail">
												<div class="data address">
													<i class="material-icons">location_on</i>
													<div class="contact-address">Demo Store<br>United States</div>
												</div>
											</li>
											<li class="contact">
												<div class="data contact">
													<i class="material-icons">local_phone</i>
													<span class="phone">
														<a href="#">0123456789</a>
													</span>
												</div>
											</li>
											<li class="fax">
												<div class="data fax">
													<i class="material-icons">present_to_all</i>
													<span class="fax-address">
														<a href="#">0123-456-7890</a>
													</span>
												</div>
											</li>
											<li class="email">
												<div class="data email">
													<i class="material-icons">mail_outline</i>
													<span class="email-address">
														<a href="mailto:demo@gmail.com">demo@gmail.com</a>
													</span>
												</div>
											</li>

										</ul>
									</div>
								</div>
							</div>

						</aside>

					</div>

				</div>
			</div>
			<div class="bottom-footer">
				<div class="container bottom-to-top hb-animate-element">
					<div class="footer-bottom col-sm-5">
						<p>Powered By <a href="http://www.opencart.com">OpenCart</a> Your Store &copy; 2021</p>
					</div>
					<div class="block-social col-sm-7">
						<div class="footer-bottom-cms">
							<aside id="footer-bottom">
								<div class="html-content">
									<div class="box-content">
										<div class="follow-us col-sm-3">
											<h5>Follow us</h5>
											<ul class="list-unstyled">
												<li class="facebook"><a href="#">
														<p>Facebook</p>
													</a></li>
												<li class="twitter"><a href="#">
														<p>Twitter</p>
													</a></li>
												<li class="youtube"><a href="#">
														<p>YouTube</p>
													</a></li>
												<li class="instagram"><a href="#">
														<p>instagram</p>
													</a></li>
												<li class="pinterest"><a href="#">
														<p>Pinterest</p>
													</a></li>


											</ul>
										</div>
									</div>
								</div>

							</aside>

						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- <script>
		var tt_live_search = {
			selector: '#search input[name=\'search\']',
			text_no_matches: 'There are no products to list in this category.',
			height: '50px'
		}

		$(document).ready(function() {
			var html = '';
			html += '<div class="live-search">';
			html += '	<ul>';
			html += '	</ul>';
			html += '<div class="result-text"></div>';
			html += '</div>';

			//$(tt_live_search.selector).parent().closest('div').after(html);
			$(tt_live_search.selector).after(html);

			$(tt_live_search.selector).autocomplete({
				'source': function(request, response) {
					var filter_name = $(tt_live_search.selector).val();
					var cat_id = 0;
					var module_tt_live_search_min_length = '1';
					if (filter_name.length < module_tt_live_search_min_length) {
						$('.live-search').css('display', 'none');
					} else {
						var html = '';
						html += '<li style="text-align: center;height:10px;">';
						html += '<img class="loading" src="image/catalog/demo/banners/loading.gif" />';
						html += '</li>';
						$('.live-search ul').html(html);
						$('.live-search').css('display', 'block');

						$.ajax({
							url: 'index.php?route=extension/module/tt_live_search&filter_name=' + encodeURIComponent(filter_name),
							dataType: 'json',
							success: function(result) {
								var products = result.products;
								$('.live-search ul li').remove();
								$('.result-text').html('');
								if (!$.isEmptyObject(products)) {
									var show_image = 1;
									var show_price = 1;
									var show_description = 0;
									$('.result-text').html('<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/search&amp;search=' + filter_name + '" class="view-all-results">       View all results        (' + result.total + ')</a>');

									$.each(products, function(index, product) {
										var html = '';

										html += '<li>';
										html += '<a href="' + product.url + '" title="' + product.name + '">';
										if (product.image && show_image) {
											html += '	<div class="product-image col-sm-4"><img alt="' + product.name + '" src="' + product.image + '"></div>';
										}
										html += '<div class="search-description col-sm-8 col-xs-8">';
										html += '	<div class="product-name">' + product.name;
										if (show_description) {
											html += '<p>' + product.extra_info + '</p>';
										}
										html += '</div>';
										if (show_price) {
											if (product.special) {
												html += '	<div class="product-price"><span class="price">' + product.special + '</span><span class="special">' + product.price + '</span></div>';
											} else {
												html += '	<div class="product-price"><span class="price">' + product.price + '</span></div>';
											}
										}
										html += '</div>';
										html += '<span style="clear:both"></span>';
										html += '</a>';
										html += '</li>';
										$('.live-search ul').append(html);
									});
								} else {
									var html = '';
									html += '<li style="text-align: center;height:10px;">';
									html += tt_live_search.text_no_matches;
									html += '</li>';

									$('.live-search ul').html(html);
								}
								$('.live-search').css('display', 'block');
								return false;
							}
						});
					}
				},
				'select': function(product) {
					$(tt_live_search.selector).val(product.name);
				}
			});

			$(document).bind("mouseup touchend", function(e) {
				var container = $('.live-search');
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					container.hide();
				}
			});
		});
		//
	</script> -->


	<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body>

</html>