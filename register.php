<?php
session_start();

ob_start();
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});

if (isset($_SESSION['id'])&&isset($_SESSION['email'])&&isset($_SESSION['password'])) {
    header('Location:account.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Account</title>
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

	<link href="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />

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

	<link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/catalog/cart.png" rel="icon" />

	<script src="catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js"></script>
	<script src="catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js"></script>
	<script src="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.bpopup.min.js"></script>
	<script src="catalog/view/javascript/TemplateTrip/jquery.cookie.js"></script>
</head>
<body class="account-register">
	<div id="page">
		<header>
		<?php include 'header.php'?>
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

		<div id="account-register" class="container">
			<ul class="breadcrumb">
				<li><a href="index.php"><i class="material-icons">home</i></a></li>
				<li><a href="account">Account</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
			<?php
			if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['telephone']) && !empty($_POST['confirm'])) {
				$userModel = new UserModel();
				$getUser = $userModel->getUserByEmail($_POST['email']);
				$user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['telephone'],"customer");

				if ($_POST['password'] == $_POST['confirm'] && $getUser == null && $_POST['agree'] == 1) {
					$createUser = $userModel->createtUser($user);
					header('Location:success.php');
				} else {
					echo "<div class='alert alert-danger alert-dismissible'><i class='material-icons error-outline'>error_outline</i> Warning: E-Mail Address is already registered!</div>";
				}
			}
			?>
			<div class="row">
				<div id="content" class="col-sm-12">
					<h1>Register Account</h1>
					<p>If you already have an account with us, please login at the <a href="login.php">login page</a>.</p>
					<form action="register.php" method="post" enctype="multipart/form-data" class="form-horizontal">
						<fieldset id="account">
							<legend>Your Personal Details</legend>
							<div class="form-group required" style="display:  none ;">
								<label class="col-sm-2 control-label">Customer Group</label>
								<div class="col-sm-10">
									<div class="radio">
										<label>
											<input type="radio" name="customer_group_id" value="1" checked="checked" />
											Default</label>
									</div>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
								<div class="col-sm-10">
									<input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
								<div class="col-sm-10">
									<input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-email">Your email address</label>
								<div class="col-sm-10">
									<input type="email" name="email" value="" placeholder="Your email address" id="input-email" class="form-control" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
								<div class="col-sm-10">
									<input type="tel" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control" />
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Your Password</legend>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-password">Password</label>
								<div class="col-sm-10">
									<input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
								<div class="col-sm-10">
									<input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" />
								</div>
							</div>
						</fieldset>
						<div class="buttons">
							<div class="pull-right">I have read and agree to the<b>Privacy Policy</b></a>
								<input type="checkbox" name="agree" value="1" />
								&nbsp;
								<input type="submit" value="Continue" class="btn btn-primary" />
							</div>
						</div>
					</form>
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
		<script type="text/javascript">
			// Sort the custom fields
			// $('#account .form-group[data-sort]').detach().each(function() {
			// 	if ($(this).attr('data-sort') >= 0 && $(this).attr('data-sort') <= $('#account .form-group').length) {
			// 		$('#account .form-group').eq($(this).attr('data-sort')).before(this);
			// 	}

			// 	if ($(this).attr('data-sort') > $('#account .form-group').length) {
			// 		$('#account .form-group:last').after(this);
			// 	}

			// 	if ($(this).attr('data-sort') == $('#account .form-group').length) {
			// 		$('#account .form-group:last').after(this);
			// 	}

			// 	if ($(this).attr('data-sort') < -$('#account .form-group').length) {
			// 		$('#account .form-group:first').before(this);
			// 	}
			// });

			// $('input[name=\'customer_group_id\']').on('change', function() {
			// 	$.ajax({
			// 		url: 'register.php' + this.value,
			// 		dataType: 'json',
			// 		success: function(json) {
			// 			$('.custom-field').hide();
			// 			$('.custom-field').removeClass('required');

			// 			for (i = 0; i < json.length; i++) {
			// 				custom_field = json[i];

			// 				$('#custom-field' + custom_field['custom_field_id']).show();

			// 				if (custom_field['required']) {
			// 					$('#custom-field' + custom_field['custom_field_id']).addClass('required');
			// 				}
			// 			}
			// 		},
			// 		error: function(xhr, ajaxOptions, thrownError) {
			// 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			// 		}
			// 	});
			// });

			// $('input[name=\'customer_group_id\']:checked').trigger('change');
		</script>
		<!-- <script type="text/javascript">
			
			$('button[id^=\'button-custom-field\']').on('click', function() {
				var element = this;

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
								$(element).button('loading');
							},
							complete: function() {
								$(element).button('reset');
							},
							success: function(json) {
								$(element).parent().find('.text-danger').remove();

								if (json['error']) {
									$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
								}

								if (json['success']) {
									alert(json['success']);

									$(element).parent().find('input').val(json['code']);
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
			
		</script> -->
		<!-- <script type="text/javascript">
			
			$('.date').datetimepicker({
				language: 'en-gb',
				pickTime: false
			});

			$('.time').datetimepicker({
				language: 'en-gb',
				pickDate: false
			});

			$('.datetime').datetimepicker({
				language: 'en-gb',
				pickDate: true,
				pickTime: true
			});
			//
			
		</script> -->
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
						<p>Powered By <a href="http://www.opencart.com">OpenCart</a> Your Store &copy; 2020</p>
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
	<script>
		
		var tt_live_search = {
			selector: '#search input[name=\'search\']',
			text_no_matches: '',
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
		-->
	</script>


	<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body>

</html>
<?php
ob_end_flush();
?>