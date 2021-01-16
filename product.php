<?php
session_start();

require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});

$pathURI = explode('-', $_SERVER['REQUEST_URI']);
$id = $pathURI[count($pathURI) - 1];


$productModel = new ProductModel();
$itemP = $productModel->getProductByID($id);
$img = explode(',', $itemP['product_picture']);



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modern Art Store</title>
	<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js"></script>
	<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700&display=swap" rel="stylesheet">


	<!--<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- <link href="catalog/view/theme//stylesheet/TemplateTrip/bootstrap.min.css" rel="stylesheet" media="screen" /> -->

	<link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/javascript/jquery/owl-carousel/owl.theme.default.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/stylesheet.css" rel="stylesheet">
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/ttblogstyle.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/category-feature.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/newsletter.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/animate.css" rel="stylesheet" type="text/css" />
	<link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/ttcountdown.css" rel="stylesheet" type="text/css" />

	<!-- <link href="catalog/view/theme/OPC009_04/stylesheet/TemplateTrip/lightbox.css" rel="stylesheet" type="text/css" /> -->

	<link href="catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />

	<script src="catalog/view/javascript/common.js"></script>

	<!-- TemplateTrip custom Theme JS START -->
	<script src="catalog/view/javascript/TemplateTrip/addonScript.js"></script>
	<!-- <script src="catalog/view/javascript/TemplateTrip/tt_quickview.js"></script> -->
	<script src="catalog/view/javascript/TemplateTrip/inview.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/parallex.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/theia-sticky-sidebar.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/ResizeSensor.min.js"></script>
	<!-- <script src="catalog/view/javascript/TemplateTrip/lightbox-2.6.min.js"></script> -->
	<script src="catalog/view/javascript/TemplateTrip/waypoints.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/bootstrap-notify.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/ttcountdown.js"></script>
	<script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js"></script>
	<!-- TemplateTrip custom Theme JS END -->

	<!-- <link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=45" rel="canonical" /> -->
	<link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/catalog/cart.png" rel="icon" />

	<script src="catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js"></script>
	<script src="catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js"></script>
	<script src="catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js"></script>
	<script src="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.bpopup.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.cookie.js"></script>

</head>

<body class="product-product-45">
	<div id="page">
		<header>
			<?php include 'header.php' ?>
		</header>
		<div class="header-content-title">

		</div>

		<!-- <script>
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
			}); -->
		</script>

		<div id="product-product" class="container product-product">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="material-icons">home</i></a></li>
				<li><a href="#"><?php echo $itemP['product_name'] ?> </a></li>
			</ul>
			<div class="row">
				<div id="content" class="col-sm-12">

					<h1 class="page-title"><?php echo $itemP['product_name'] ?> </h1>
					<!-- Product row START -->
					<div class="row">
						<div class="col-xs-12 col-sm-5 col-md-5 product-images">
							<!-- Product Image thumbnails START -->
							<div class="thumbnails">
								<div class="product-image">
									<a class="thumbnail">
										<?php

										?>
										<img src="/<?php echo BASE_URL; ?>/image/cache/catalog/demo/product/<?php echo $img[0] ?>" class="img-fluid" alt="...">
										<!-- <img src="./image/cache/catalog/demo/product/<?php //echo $itemP['product_picture']
																							?>" alt="quis autem veleuminium" /> -->
									</a>
								</div>

								<div class="additional-images-container">
									<div class="additional-images">
										<?php
										foreach ($img as $value) {
										?>

											<div class="image-additional">

												<img src="/<?php echo BASE_URL; ?>/image/cache/catalog/demo/product/<?php echo $value ?>" alt="...">

												<!-- <img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/11-800x1040.jpg" title="quis autem veleuminium" data-image="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/11-800x1040.jpg" data-zoom-image="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/11-800x1040.jpg" alt="quis autem veleuminium" /> -->
											</div>


										<?php } ?>
									</div>
								</div>


								<!-- Product Image thumbnails END -->
							</div>
						</div>
						<script>
							var ttadditionalcontent = $('.additional-images').owlCarousel({
								items: 4, //1 items above 1000px browser width
								nav: true,
								dots: false,
								loop: false,
								autoplay: false,
								rtl: false,
								responsive: {
									0: {
										items: 2
									},
									481: {
										items: 3
									},
									768: {
										items: 2
									},
									992: {
										items: 3
									},
									1400: {
										items: 3
									}
								}
							});

							// Custom Navigation Events

							$(".additional-next").click(function() {
								ttadditionalcontent.trigger('next.owl.carousel', [700]);
							})
							$(".ttblog_prev").click(function() {
								ttadditionalcontent.trigger('prev.owl.carousel', [700]);
							})
						</script>
						<div class="col-xs-12 col-sm-7 col-md-7 product-details">
							<h1 class="product-name"><?php echo $itemP['product_name'] ?> </h1>
							<div class="rating">
								<div class="product-rating">
									<span class="fa fa-stack"><i class="material-icons star_off">star_border</i></span>
									<span class="fa fa-stack"><i class="material-icons star_off">star_border</i></span>
									<span class="fa fa-stack"><i class="material-icons star_off">star_border</i></span>
									<span class="fa fa-stack"><i class="material-icons star_off">star_border</i></span>
									<span class="fa fa-stack"><i class="material-icons star_off">star_border</i></span>
								</div>
								<a class="product-total-review" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">
									<i class='material-icons mode-comment'>mode_comment</i>0 reviews</a>
								<a class="product-write-review" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">
									<i class="material-icons mode-edit">edit</i>Write a review</a>
							</div>
							<table class="product-info">
								<!-- <tr>
									<td>Brands</td>
									<td class="product-info-value"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/manufacturer/info&amp;manufacturer_id=8">Apple</a></td>
								</tr> -->
								<tr>
									<td>Product Code:</td>
									<td class="product-info-value">Product <?php echo $itemP['product_id'] ?> </td>
								</tr>

								<tr>
									<td>Availability:</td>
									<td class="product-info-value">In Stock</td>
								</tr>
							</table>

							<!-- Product Rating START -->

							<!-- Product Rating END -->

							<ul class="list-unstyled product-price">
								<li>
									<?php $productPrice = number_format($itemP['product_price'], 2); ?>
									<h2>$<?php echo $itemP['product_price'] ?> </h2>
								</li>
								<!-- <li class="product-tax">Ex Tax: $2,000.00</li> -->


							</ul>

							<!-- Product Options START -->
							<div id="product" class="product-options">


								<div class="form-group product-quantity">
									<label class="control-label" for="input-quantity">Qty</label>
									<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
									<input type="hidden" name="product_id" value="45" />
									<button type="button" id="button-cart" data-loading-text="Loading..." class="btn  btn-primary  btn-lg btn-block">
										Add to Cart </button>
								</div>
							</div>
							<!-- Product Options END -->

							<!-- Product Wishlist Compare START -->
							<div class="btn-group">
								<button class="btn btn-default product-btn-wishlist" type="button" class="btn btn-default" title="Add to Wish List" onclick="wishlist.add('45');"><i class='material-icons favorite'>favorite_border</i>
									Add to Wish List
								</button>
								<button class="btn btn-default product-btn-compare" type="button" class="btn btn-default" title="Add to compare" onclick="compare.add('45');"><i class="material-icons compare-arrows">compare_arrows</i>
									Add to compare
								</button>
							</div>
							<!-- Product Wishlist Compare END -->


							<!-- AddThis Button BEGIN -->
							<div class="addthis_toolbox addthis_default_style" data-url="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=45"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
							<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
							<!-- AddThis Button END -->
						</div>
						<!-- Product option details END -->
					</div> <!-- Product row END -->
				</div> <!-- id content END -->

				<!-- Product nav Tabs START -->
				<div class="col-sm-12 product-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>

						<li class="li-tab-review"><a href="#tab-review" data-toggle="tab">Reviews (0)</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab-description">
							<div class="cpt_product_description ">
								<div>
									<?php echo $itemP['product_description'] ?>
								</div>
							</div>
							<!-- cpt_container_end -->
						</div>
						<div class="tab-pane" id="tab-review">
							<form class="form-horizontal" id="form-review">
								<div id="review"></div>
								<h2>Write a review</h2>
								<div class="form-group required">
									<div class="col-sm-12">
										<label class="control-label" for="input-name">Name</label>
										<input type="text" name="name" value="bao&nbsp;Ngoc" id="input-name" class="form-control" />
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-12">
										<label class="control-label" for="input-review">Your Review</label>
										<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
										<div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-12">
										<label class="control-label">Rating</label>
										&nbsp;&nbsp;&nbsp; Bad&nbsp;
										<input type="radio" name="rating" value="1" />
										&nbsp;
										<input type="radio" name="rating" value="2" />
										&nbsp;
										<input type="radio" name="rating" value="3" />
										&nbsp;
										<input type="radio" name="rating" value="4" />
										&nbsp;
										<input type="radio" name="rating" value="5" />
										&nbsp;Good
									</div>
								</div>

								<div class="buttons clearfix">
									<div class="pull-right">
										<button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Product tab END -->


				<!-- Related products START -->
				<div class="related-carousel products-list col-sm-12">
					<div class="box-heading">
						<h3>Related Products</h3>
					</div>
					<div class="related-items products-carousel row">
						<div class="product-layouts">
							<div class="product-thumb transition">
								<div class="image">
									<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28"> <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04-354x460.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" /> <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04--354x460.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" /> </a>
									<div class="sale-icon">Sale</div>
									<span class="percent">-80%</span>

									<div class="button-group">
										<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('28')">

											<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
											</span><span class="loading"><i class="material-icons">cached</i></span></button>
										<button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('28');"><i class="material-icons icon-wishlist">favorite_border</i>
											<span title="Add to Wish List">Add to Wish List</span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
										<button class="btn-compare" title="Add to compare" onclick="compare.add('28');"><i class="material-icons icon-exchange">equalizer</i>
											<span title="Add to compare">Add to compare</span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
										<button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28')"><i class="material-icons quick_view_icon">visibility</i>
											<span title=""></span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
									</div>
								</div>

								<div class="thumb-description">
									<div class="caption">
										<h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">aspetur autodit autfugit</a></h4>
										<div class="price"> <span class="price-new">$26.00</span> <span class="price-old">$122.00</span>
											<span class="price-tax">Ex Tax: $20.00</span>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="product-layouts">
							<div class="product-thumb transition">
								<div class="image">
									<a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47"> <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03-354x460.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" /> <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03--354x460.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" /> </a>
									<div class="button-group">
										<button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

											<i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to Cart
											</span><span class="loading"><i class="material-icons">cached</i></span></button>
										<button class="btn-wishlist" title="Add to Wish List" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
											<span title="Add to Wish List">Add to Wish List</span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
										<button class="btn-compare" title="Add to compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
											<span title="Add to compare">Add to compare</span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
										<button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47')"><i class="material-icons quick_view_icon">visibility</i>
											<span title=""></span>
											<span class="loading"><i class="material-icons">cached</i></span>
										</button>
									</div>
								</div>

								<div class="thumb-description">
									<div class="caption">
										<h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">aliquam quat voluptatem</a></h4>
										<div class="price"> $122.00

											<span class="price-tax">Ex Tax: $100.00</span>
										</div>

									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="customNavigation">
						<a class="btn prev customNavigation_prev"><i class='material-icons'>arrow_back</i></a>
						<a class="btn next customNavigation_next"><i class='material-icons'>arrow_forward</i></a>
					</div>
				</div>

				<!-- Related products END -->

				<script>
					// Carousel Counter
					colsCarousel = $('#column-right, #column-left').length;
					if (colsCarousel == 2) {
						ci = 4;
					} else if (colsCarousel == 1) {
						ci = 4;
					} else {
						ci = 5;
					}

					var ttrelatedcontent = $('.related-items').owlCarousel({
						items: 4, //1 items above 1000px browser width
						nav: false,
						dots: false,
						loop: false,
						autoplay: false,
						rtl: false,
						responsive: {
							0: {
								items: 1
							},
							360: {
								items: 2
							},
							768: {
								items: 3
							},
							992: {
								items: 4
							},
							1200: {
								items: 4
							},
							1450: {
								items: 4
							}
						}
					});
				</script>
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
		<script src="catalog/view/javascript/TemplateTrip/jquery.elevatezoom.min.js"></script>
		<script>
			$('select[name=\'recurring_id\'], input[name="quantity"]').change(function() {
				$.ajax({
					url: 'index.php?route=product/product/getRecurringDescription',
					type: 'post',
					data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
					dataType: 'json',
					beforeSend: function() {
						$('#recurring-description').html('');
					},
					success: function(json) {
						$('.alert-dismissible, .text-danger').remove();

						if (json['success']) {
							$('#recurring-description').html(json['success']);
						}
					}
				});
			});

			function proelevateZoom() {
				jQuery(".product-image img").elevateZoom({
					zoomType: "inner",
					cursor: "crosshair",
					zoomWindowFadeIn: 500,
					zoomWindowFadeOut: 750
				});
			}
			proelevateZoom();
			$('.image-additional img').on(
				'click',
				(event) => {
					$('.product-image img').attr('src', $(event.target).data('image'));
					$('.selected').removeClass('selected');
					$(event.target).addClass('selected');
					$('.product-image img').data('zoom-image', $(event.currentTarget).data('zoom-image'));
					$('.product-image img').prop('src', $(event.currentTarget).data('image'));
					proelevateZoom();
				}
			);

			//
		</script>
		<script>
			$('#button-cart').on('click', function() {
				$.ajax({
					url: 'index.php?route=checkout/cart/add',
					type: 'post',
					data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea, .tt-fixed-product-wrapper #product select'),
					dataType: 'json',
					beforeSend: function() {
						$('#button-cart').button('loading');
					},
					complete: function() {
						$('#button-cart').button('reset');
					},
					success: function(json) {
						$('.alert-dismissible, .text-danger').remove();
						$('.form-group').removeClass('has-error');

						if (json['error']) {
							if (json['error']['option']) {
								for (i in json['error']['option']) {
									var element = $('#input-option' + i.replace('_', '-'));

									if (element.parent().hasClass('input-group')) {
										element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
									} else {
										element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
									}
								}
							}

							if (json['error']['recurring']) {
								$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
							}

							// Highlight any found errors
							$('.text-danger').parent().addClass('has-error');
						}

						if (json['success']) {
							$.notify({
								message: json['success'],
								target: '_blank'
							}, {
								// settings
								element: 'body',
								position: null,
								type: "info",
								allow_dismiss: true,
								newest_on_top: false,
								placement: {
									from: "top",
									align: "right"
								},
								offset: 20,
								spacing: 10,
								z_index: 2031,
								delay: 5000,
								timer: 1000,
								url_target: '_blank',
								mouse_over: null,
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
								onShow: null,
								onShown: null,
								onClose: null,
								onClosed: null,
								icon_type: 'class',
								template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
									'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button>' +
									'<span data-notify="message"><i class="material-icons check-circle">check_circle</i>&nbsp; {2}</span>' +
									'<div class="progress" data-notify="progressbar">' +
									'<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
									'</div>' +
									'<a href="{3}" target="{4}" data-notify="url"></a>' +
									'</div>'
							});

							// Need to set timeout otherwise it wont update the total
							setTimeout(function() {
								$('#cart > button').html('<i class="material-icons shopping-cart">shopping_cart</i><span id="cart-total"> ' + json['total'] + '</span>');
							}, 100);

							$('#cart > ul').load('index.php?route=common/cart/info ul li');
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			});
			//
		</script>
		<script>
			$('.date').datetimepicker({
				language: 'en-gb',
				pickTime: false
			});

			$('.datetime').datetimepicker({
				language: 'en-gb',
				pickDate: true,
				pickTime: true
			});

			$('.time').datetimepicker({
				language: 'en-gb',
				pickDate: false
			});

			$('button[id^=\'button-upload\']').on('click', function() {
				var node = this;

				$('#form-upload').remove();

				$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

				$('#form-upload input[name=\'file\']').trigger('click');

				if (typeof timer != 'undefined') {
					clearInterval(timer);
				}

				timer = setInterval(function() {
					if ($('#form-upload input[name=\'file\']').val() != '') {
						clearInterval(timer);

						$.ajax({
							url: 'index.php?route=tool/upload',
							type: 'post',
							dataType: 'json',
							data: new FormData($('#form-upload')[0]),
							cache: false,
							contentType: false,
							processData: false,
							beforeSend: function() {
								$(node).button('loading');
							},
							complete: function() {
								$(node).button('reset');
							},
							success: function(json) {
								$('.text-danger').remove();

								if (json['error']) {
									$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
								}

								if (json['success']) {
									alert(json['success']);

									$(node).parent().find('input').val(json['code']);
								}
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
							}
						});
					}
				}, 500);
			});
			//
		</script>
		<script>
			$('#review').delegate('.pagination a', 'click', function(e) {
				e.preventDefault();

				$('#review').fadeOut('slow');

				$('#review').load(this.href);

				$('#review').fadeIn('slow');
			});

			// $('#review').load('#');

			$('#button-review').on('click', function() {
				$.ajax({
					url: 'index.php?route=product/product/write&product_id=45',
					type: 'post',
					dataType: 'json',
					data: $("#form-review").serialize(),
					beforeSend: function() {
						$('#button-review').button('loading');
					},
					complete: function() {
						$('#button-review').button('reset');
					},
					success: function(json) {
						$('.alert-dismissible').remove();

						if (json['error']) {
							$('#review').after('<div class="alert alert-danger alert-dismissible"><i class="material-icons error-outline">error_outline</i> ' + json['error'] + '</div>');
						}

						if (json['success']) {
							$('#review').after('<div class="alert alert-success alert-dismissible"><i class="material-icons check-circle">check_circle</i> ' + json['success'] + '</div>');
							$('input[name=\'name\']').val('');
							$('textarea[name=\'text\']').val('');
							$('input[name=\'rating\']:checked').prop('checked', false);
						}
					}
				});
			});

			$(document).ready(function() {
				if (window.location.hash.substr(1) == 'tab-review') {
					$('.nav.nav-tabs > li.li-tab-review a').trigger('click');
					$('html, body').animate({
						scrollTop: $(".product-tabs").offset().top
					}, 2000);
				}
				$(".product-write-review,.product-total-review").click(function() {
					$('html, body').animate({
						scrollTop: $(".product-tabs").offset().top
					}, 2000);
				});

			});
			//
		</script>
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

	


	<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body>

</html>