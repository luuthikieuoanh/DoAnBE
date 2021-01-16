<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['email']) && !isset($_SESSION['password'])) {
}
$productModel = new ProductModel();
$page = 1;
$perpage = 2;
$totalRow = $productModel->getTotalRow();
$numberPage = ceil($totalRow / $perpage);

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

    <link href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/catalog/cart.png" rel="icon" />

    <script src="catalog/view/javascript/jquery/swiper/js/swiper.jquery.js"></script>
    <script src="catalog/view/javascript/TemplateTrip/jquery.bpopup.min.js"></script>
    <script src="catalog/view/javascript/TemplateTrip/jquery.cookie.js"></script>
</head>


<body class="common-home">
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

        <div class="content-top">
            <div class="slideshow-panel col-sm-10">
                <!-- <div class="ttloading-bg ttloader"></div> -->
                <div class="swiper-viewport">
                    <div id="slideshow0" class="slideshow-main swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide text-center">
                                <a href="#">
                                    <img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/slider-01-1903x850.jpg" alt="slider-01" class="img-responsive" />
                                </a>
                            </div>
                            <div class="swiper-slide text-center">
                                <a href="#">
                                    <img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/slider-02-1903x850.jpg" alt="slider-02" class="img-responsive" />
                                </a>
                            </div>
                        </div>
                        <div class="swiper-pagination slideshow0"></div>
                        <div class="swiper-pager">
                            <div class="swiper-button-prev"><i class='material-icons'>arrow_back</i></div>
                            <div class="swiper-button-next"><i class='material-icons'>arrow_forward</i></div>
                        </div>
                    </div>
                </div>

            </div>
            <script>
                $('#slideshow0').swiper({
                    mode: 'horizontal',
                    slidesPerView: 1,
                    pagination: '.slideshow0',
                    paginationClickable: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 0,
                    autoplay: 5000,
                    autoplayDisableOnInteraction: true,
                    loop: true
                });
            </script>
            <div class="newletter-popup">
                <div class="ttpopupclose"></div>
                <div id="boxes" class="newletter-container">
                    <div id="dialog" class="window">
                        <div id="popup2">
                            <span class="b-close"><i class="material-icons icon-close">clear</i></span>
                        </div>
                        <div class="newslatter-img col-sm-5 col-xs-5">
                        </div>
                        <div class="box col-sm-7 col-xs-7">
                            <div class="newletter-title">
                                <h2>Newsletter</h2>
                            </div>
                            <div class="box-content newleter-content">
                                <label></label>
                                <div id="frm_subscribe">
                                    <form name="subscribe" id="subscribe_popup">
                                        <div class="newslatterpopup-content">
                                            <span>Subscribe to our newsletters now and stay up to date with new
                                                collections, latest lookbooks and exclusive offers.</span>
                                            <div id="notification"></div>
                                            <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Your email address">
                                            <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname" />

                                            <div class="popup-button">
                                                <a class="button btn btn-primary" onclick="email_subscribepopup()"><span>subscribe</span></a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="subscribe-bottom">
                                        <input type="checkbox" id="newsletter_popup_dont_show_again">
                                        <label for="newsletter_popup_dont_show_again">Don't show this popup
                                            again</label>
                                    </div>
                                </div>
                                <!-- /#frm_subscribe -->
                            </div>
                            <!-- /.box-content -->
                        </div>
                    </div>

                    <script>
                        function email_subscribepopup() {
                            $.ajax({
                                type: 'post',
                                url: 'index.php?route=extension/module/ttnewslettersubscribe/subscribepopup',
                                dataType: 'html',
                                data: $("#subscribe_popup").serialize(),
                                success: function(html) {
                                    //$.cookie('shownewsletter', '1');
                                    try {

                                        eval(html);

                                    } catch (e) {}
                                }
                            });


                        }

                        function email_unsubscribepopup() {
                            $.ajax({
                                type: 'post',
                                url: 'index.php?route=extension/module/ttnewslettersubscribe/unsubscribe',
                                dataType: 'html',
                                data: $("#subscribe_popup").serialize(),
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

                            if ($.cookie('shownewsletter') == 1) $('.newletter-popup').hide();
                            $('#subscribe_pemail').keypress(function(e) {
                                if (e.which == 13) {
                                    e.preventDefault();
                                    email_subscribepopup();
                                }
                                var name = $(this).val();
                                $('#subscribe_pname').val(name);
                            });
                            $('#subscribe_pemail').change(function() {
                                var name = $(this).val();
                                $('#subscribe_pname').val(name);
                            });


                            //transition effect
                            if ($.cookie("shownewsletter") != 1) {
                                $('.newletter-popup').bPopup();

                            }


                            $('#newsletter_popup_dont_show_again').on('change', function() {
                                if ($.cookie("shownewsletter") != 1) {
                                    $.cookie("shownewsletter", '1')
                                } else {
                                    $.cookie("shownewsletter", '0')
                                }
                            });


                        });
                    </script>

                </div>
            </div>
            <!-- /.box -->


        </div>
        <div class="tt-home">

            <div id="content" class="col-sm-12">
                <div class="html-content">
                    <div class="box-content">
                        <div id="ttcmsservices">
                            <div class="container">
                                <div class="ttcmstopservice-maincontent">
                                    <div class="ttsupport service">
                                        <div class="service-icon-background">
                                            <div class="ttsupport_img service-icon"></div>
                                        </div>
                                        <div class="service-content">
                                            <div class="service-title">Free Shipping Worlwide</div>
                                            <div class="service-desc">Lorem Ipsum Dolor Sit co.</div>
                                        </div>
                                    </div>
                                    <div class="ttshare service">
                                        <div class="service-icon-background">
                                            <div class="ttshare_img service-icon"></div>
                                        </div>
                                        <div class="service-content">
                                            <div class="service-title">24/7 Customer Service</div>
                                            <div class="service-desc">Lorem Ipsum Dolor Sit co.</div>
                                        </div>
                                    </div>
                                    <div class="ttsaving service">
                                        <div class="service-icon-background">
                                            <div class="ttsaving_img service-icon"></div>
                                        </div>
                                        <div class="service-content">
                                            <div class="service-title">Get 100% Money Back</div>
                                            <div class="service-desc">Lorem Ipsum Dolor Sit co.</div>
                                        </div>
                                    </div>
                                    <div class="ttsmart service af-none">
                                        <div class="service-icon-background">
                                            <div class="ttsmart_img service-icon"></div>
                                        </div>
                                        <div class="service-content">
                                            <div class="service-title">Online Payment</div>
                                            <div class="service-desc">Lorem Ipsum Dolor Sit co.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="html-content">
                    <div class="box-content">
                        <div id="ttcmsbanner">
                            <div class="ttcmsbanner">
                                <div class="ttbanner-image1 ttbanner1 col-xs-3 col-sm-3">
                                    <div class="ttbanner">
                                        <a href="#"><img src="image/catalog/demo/banners/banner-01.jpg" alt="Banner-01" width="330" height="380"></a>
                                    </div>
                                </div>
                                <div class="ttbanner-image2 col-xs-9 col-sm-9">
                                    <div class="ttbanner1 col-xs-6 col-sm-6">
                                        <div class="ttbanner">
                                            <a href="#"><img src="image/catalog/demo/banners/banner-02.jpg" alt="Banner-02" width="690" height="380"></a>
                                        </div>
                                    </div>
                                    <div class="ttbanner1 col-xs-6 col-sm-6">
                                        <div class="ttbanner">
                                            <a href="#"><img src="image/catalog/demo/banners/banner-03.jpg" alt="Banner-03" width="690" height="380"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ttproduct-main bottom-to-top hb-animate-element">
                    <div class="home-image"> </div>
                    <div class="container">
                        <div class="row main-tab">
                            <div class="TTProduct-Tab TT-product-carousel products-list">
                                <div class="box-heading tthometab-title">
                                    <h3>Trending Products</h3>
                                </div>
                                <div id="TTPTab-0" class="tab-box-heading">
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a href="#tab-featured-0" data-toggle="tab">
                                                <h3 class="tab-title">Featured</h3>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab-latest-0" data-toggle="tab">
                                                <h3 class="tab-title">Latest</h3>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab-bestseller-0" data-toggle="tab">
                                                <h3 class="tab-title">Bestseller</h3>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div id="tab-featured-0" class="tab-pane fade in">
                                        <div id="owl1" class="products-carousel">
                                        </div>
                                    </div>



                                    <div id="tab-latest-0" class="tab-pane fade ">
                                        <div id="owl2" class="products-carousel">
                                            <?php
                                            for ($i = 0; $i < $numberPage; $i++) {
                                                $latestProductList = $productModel->getLatestProductsByPage($page, $perpage);
                                            ?>
                                                <div class='single-column'>
                                                    <?php
                                                    foreach ($latestProductList as $item) {
                                                        $productPrice = number_format($item['product_price'], 2);
                                                    ?>
                                                        <div class="product-layouts">
                                                            <div class="product-thumb transition">
                                                                <div class="image">
                                                                    <div class="ttcdimg"></div>
                                                                    <?php
                                                                    $imgs = explode(',', $item['product_picture']);

                                                                    $productPath = strtolower(str_replace(' ', '-', $item['product_name'])) . '-' . $item['product_id'];
                                                                    ?>
                                                                    
                                                                    <a href="product.php?/<?php echo $productPath; ?>">
                                                                    
                                                                        <?php
                                                                        $today = date("Y-m-d H:i:s");
                                                                        if ((strtotime($today) - strtotime($item['create_at'])) <= 172800) {
                                                                        ?>
                                                                        <img src="./image/new.gif" class="card-img-top" alt="..." style="position: absolute;width: 100px;right: 0;">

                                                                        <?php }  ?>
                                                                        <img class="image_thumb" src="./image/cache/catalog/demo/product/<?php echo $imgs[0] ?>" title="suscipit laboriosam nisi" alt="suscipit laboriosam nisi" />
                                                                        <?php
                                                                        if (count($imgs) > 1) {
                                                                        ?>
                                                                            <img class="image_thumb_swap" src="./image/cache/catalog/demo/product/<?php echo $imgs[1] ?>" title="suscipit laboriosam nisi" alt="suscipit laboriosam nisi" />
                                                                        <?php }
                                                                      ?>
                                                                    </a>
                                                                    <div class="button-group">
                                                                        <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                            <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                                Cart
                                                                            </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                        <!-- <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                            <span title="Add to wishlist">Add to wishlist</span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button> -->
                                                                        <!-- <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                            <span title="Add to Compare">Add to Compare</span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button> -->
                                                                        <!-- <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47')"><i class="material-icons quick_view_icon">visibility</i>
                                                                            <span title=""></span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button> -->
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-description">

                                                                    <div class="caption">

                                                                        <h4><a href="product.php?=<?php echo $productPath; ?>"><?php echo $item['product_name'] ?></a></h4>

                                                                        <div class="price">
                                                                            $<?php echo $productPrice ?>


                                                                            <!-- <span class="price-tax">Without tax: $199.99</span> -->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            <?php
                                                $page++;
                                            }
                                            ?>
                                        </div>
                                    </div>



                                    <div id="tab-bestseller-0" class="tab-pane fade">
                                        <div id="owl3" class="products-carousel">

                                            <?php
                                            $page = 1;
                                            for ($i = 0; $i < $numberPage; $i++) {
                                                $bestSellerList = $productModel->getBestSellerProductsByPage($page, $perpage);
                                            ?>
                                                <div class='single-column'>
                                                    <?php
                                                    foreach ($bestSellerList as $item) {
                                                        $productPrice = number_format($item['product_price'], 2);
                                                    ?>
                                                        <div class="product-layouts">
                                                            <div class="product-thumb transition">
                                                                <div class="image">
                                                                    <div class="ttcdimg"></div>
                                                                    <?php
                                                                    $productPath = strtolower(str_replace(' ', '-', $item['product_name'])) . '-' . $item['product_id'];
                                                                    ?>
                                                                    <a href="product.php?/<?php echo $productPath; ?>">
                                                                        <img class="image_thumb" src="./image/cache/catalog/demo/product/<?php echo $item['product_picture'] ?>" title="suscipit laboriosam nisi" alt="suscipit laboriosam nisi" />
                                                                        <!-- <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/20--354x460.jpg" title="suscipit laboriosam nisi" alt="suscipit laboriosam nisi" /> -->
                                                                    </a>
                                                                    <div class="button-group">
                                                                        <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                            <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                                Cart
                                                                            </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                        <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                            <span title="Add to wishlist">Add to wishlist</span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button>
                                                                        <!-- <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                            <span title="Add to Compare">Add to Compare</span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button> -->
                                                                        <!-- <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47')"><i class="material-icons quick_view_icon">visibility</i>
                                                                            <span title=""></span>
                                                                            <span class="loading"><i class="material-icons">cached</i></span>
                                                                        </button> -->
                                                                    </div>
                                                                </div>
                                                                <div class="thumb-description">

                                                                    <div class="caption">

                                                                        <h4><a href="product.php?=<?php echo $productPath; ?>"><?php echo $item['product_name'] ?></a></h4>

                                                                        <div class="price">
                                                                            $<?php echo $productPrice ?>


                                                                            <!-- <span class="price-tax">Without tax: $199.99</span> -->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            <?php
                                                $page++;
                                            }
                                            ?>





                                        </div>
                                    </div>
                                    <div class="customNavigation">
                                        <a class="btn prev customNavigation_prev"><i class='material-icons'>arrow_back</i></a>
                                        <a class="btn next customNavigation_next"><i class='material-icons'>arrow_forward</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    jQuery(document).ready(function($) {
                        $(".item-countdown").each(function() {
                            var date = $(this).data('date');
                            $(this).lofCountDown({
                                TargetDate: date,
                                DisplayFormat: "<div>%%D%% <span>Days</span></div><div>%%H%% <span>Hours</span></div><div>%%M%% <span>Min</span></div><div>%%S%% <span>Sec</span></div>"
                            });
                        });
                    });
                </script>

                <script>
                    $('.TTProduct-Tab > .tab-box-heading > ul > li:first-child').addClass('active');
                    $('.TTProduct-Tab > .tab-content > .tab-pane:first-child').addClass('active');
                    var tttrendingproducts = $(".TTProduct-Tab .products-carousel.owl-carousel");
                    tttrendingproducts.owlCarousel({
                        items: 4,
                        itemsDesktop: [1170, 4],
                        itemsDesktopSmall: [991, 4],
                        itemsTablet: [767, 2],
                        itemsMobile: [480, 1],
                        navigation: true,
                        pagination: false
                    });
                </script>
                <div class="html-content">
                    <div class="box-content">
                        <div id="ttcmsparallax">
                            <div class="parallex" data-source-url="image/catalog/demo/banners/parallax.jpg" style="background-image:url('image/catalog/demo/banners/parallax.jpg'); background-position: 50% 65.8718%;">
                                <div class="ttcmsparallax">
                                    <div class="container">
                                        <div class="ttparallax col-sm-6">
                                            <div class="ttparallax-content">
                                                <div class="ttpara-title">Decorative Art</div>
                                                <div class="ttpara-desc">Save 30% OFF - on your first order!</div>
                                                <div class="ttpara-title2">big offer</div>
                                                <div class="ttpara-btn"><a href="#">Shop Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="ttcat-main">
                    <div class="container">
                        <div class="row">

                            <div class="TTProduct-Tab TT-cat-carousel products-list bottom-to-top hb-animate-element">
                                <div class="box-heading tthometab-title">
                                    <h3>Category Products</h3>
                                </div>
                                <div class="categoryslider-content">
                                    <div class="ttcat-tab">

                                        <div id="TTCTab-" class="tab-box-heading">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab-1" data-toggle="tab">
                                                        <h3 class="tab-title">Pottery</h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-2" data-toggle="tab">
                                                        <h3 class="tab-title">vegtables</h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-3" data-toggle="tab">
                                                        <h3 class="tab-title">fruits</h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab-4" data-toggle="tab">
                                                        <h3 class="tab-title">Vinogel</h3>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-content">

                                        <div class="tab-pane fade	 active in" id="tab-1">
                                            <div class="TTcategory-tab products-carousel">

                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01-371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-10%</span>

                                                            <div class="rating"> <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_off">star_border</i></span>
                                                            </div>


                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('42');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">aliquam
                                                                        quaerat voluptatem</a></h4>
                                                                <div class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02-371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02--371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('30')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('30');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('30');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">aliquam
                                                                        quaerat voluptem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03-371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03--371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">aliquam
                                                                        quat voluptatem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04-371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04--371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-80%</span>



                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('28')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('28');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('28');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">aspetur
                                                                        autodit autfugit</a></h4>
                                                                <div class="price"> <span class="price-new">$26.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade	" id="tab-2">
                                            <div class="TTcategory-tab products-carousel">

                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01-371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-10%</span>

                                                            <div class="rating"> <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_off">star_border</i></span>
                                                            </div>


                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('42');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">aliquam
                                                                        quaerat voluptatem</a></h4>
                                                                <div class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02-371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02--371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('30')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('30');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('30');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">aliquam
                                                                        quaerat voluptem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03-371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03--371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">aliquam
                                                                        quat voluptatem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04-371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04--371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-80%</span>



                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('28')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('28');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('28');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">aspetur
                                                                        autodit autfugit</a></h4>
                                                                <div class="price"> <span class="price-new">$26.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade	" id="tab-3">
                                            <div class="TTcategory-tab products-carousel">

                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01-371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-10%</span>

                                                            <div class="rating"> <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_off">star_border</i></span>
                                                            </div>


                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('42');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">aliquam
                                                                        quaerat voluptatem</a></h4>
                                                                <div class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02-371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02--371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('30')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('30');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('30');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">aliquam
                                                                        quaerat voluptem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03-371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03--371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">aliquam
                                                                        quat voluptatem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04-371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04--371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-80%</span>



                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('28')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('28');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('28');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">aspetur
                                                                        autodit autfugit</a></h4>
                                                                <div class="price"> <span class="price-new">$26.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade	" id="tab-4">
                                            <div class="TTcategory-tab products-carousel">

                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01-371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/01--371x482.jpg" title="aliquam quaerat voluptatem" alt="aliquam quaerat voluptatem" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-10%</span>

                                                            <div class="rating"> <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_on">star</i></span>
                                                                <span class="fa-stack"><i class="material-icons star_off">star_border</i></span>
                                                            </div>


                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('42')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('42');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('42');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=42">aliquam
                                                                        quaerat voluptatem</a></h4>
                                                                <div class="price"> <span class="price-new">$110.00</span> <span class="price-old">$122.00</span>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02-371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/02--371x482.jpg" title="aliquam quaerat voluptem" alt="aliquam quaerat voluptem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('30')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('30');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('30');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-quickview" type="button" title="" onclick="tt_quickview.ajaxView('https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30')"><i class="material-icons quick_view_icon">visibility</i>
                                                                    <span title=""></span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="thumb-description">
                                                            <div class="caption">
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=30">aliquam
                                                                        quaerat voluptem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03-371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/03--371x482.jpg" title="aliquam quat voluptatem" alt="aliquam quat voluptatem" />
                                                            </a>




                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('47')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('47');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('47');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=47">aliquam
                                                                        quat voluptatem</a></h4>
                                                                <div class="price"> $122.00

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="product-layouts">
                                                    <div class="product-thumb transition">
                                                        <div class="image">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">
                                                                <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04-371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                                <img class="image_thumb_swap" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/product/04--371x482.jpg" title="aspetur autodit autfugit" alt="aspetur autodit autfugit" />
                                                            </a>

                                                            <div class="sale-icon">Sale</div>
                                                            <span class="percent">-80%</span>



                                                            <div class="button-group">
                                                                <button class="btn-cart " type="button" title="Add to Cart" onclick="cart.add('28')">

                                                                    <i class="material-icons">shopping_cart</i><span class="hidden-xs hidden-sm hidden-md">Add to
                                                                        Cart
                                                                    </span><span class="loading"><i class="material-icons">cached</i></span></button>
                                                                <button class="btn-wishlist" title="Add to wishlist" onclick="wishlist.add('28');"><i class="material-icons icon-wishlist">favorite_border</i>
                                                                    <span title="Add to wishlist">Add to wishlist</span>
                                                                    <span class="loading"><i class="material-icons">cached</i></span>
                                                                </button>
                                                                <button class="btn-compare" title="Add to Compare" onclick="compare.add('28');"><i class="material-icons icon-exchange">equalizer</i>
                                                                    <span title="Add to Compare">Add to Compare</span>
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
                                                                <h4><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/product&amp;product_id=28">aspetur
                                                                        autodit autfugit</a></h4>
                                                                <div class="price"> <span class="price-new">$26.00</span> <span class="price-old">$122.00</span>
                                                                </div>


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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // product Carousel
                    var ttcategorytab = $('.TTcategory-tab.products-carousel').owlCarousel({
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
                            767: {
                                items: 3
                            },
                            992: {
                                items: 4
                            },
                            1201: {
                                items: 4
                            },
                        }
                    });
                </script>
                <div class="html-content">
                    <div class="box-content">
                        <div id="ttcmstestimonial">
                            <div class="bottom-to-top hb-animate-element">
                                <div class="ttcmstestimonial">
                                    <div class="tttesti-con container">
                                        <div class="tttestimonial-inner">
                                            <div class="ttcmstestimonial-content">
                                                <div class="tttestimonial-content-left col-sm-4">
                                                    <div class="tttestiimg testi-img1">
                                                        <a href="#"><img src="image/catalog/demo/banners/user1.png" alt="user1.jpg"></a>
                                                    </div>
                                                    <div class="tt-testi-userinfo">
                                                        <div class="tt-testi-title">John Doe</div>
                                                        <div class="tt-testi-post">CEO &amp; Founder</div>
                                                    </div>
                                                </div>
                                                <div class="tttestimonial-content-right col-sm-8">
                                                    <div class="testi-ico"></div>
                                                    <div class="tttesti-desc">"Duis faucibus enim vitae nunc molestier arcu facilisis arcu Nullam mattis faucibus enim vitae nunc molestie, need arcu Nullam bibendumnc molestien bibendum vitae nunc molestie, nec nec arcu Nullam bibendum
                                                        aac,."
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ttcmstestimonial-content">
                                                <div class="tttestimonial-content-left col-sm-4">
                                                    <div class="tttestiimg testi-img1">
                                                        <a href="#"><img src="image/catalog/demo/banners/user2.png" alt="user2.jpg"></a>
                                                    </div>
                                                    <div class="tt-testi-userinfo">
                                                        <div class="tt-testi-title">John Doe</div>
                                                        <div class="tt-testi-post">CEO &amp; Founder</div>
                                                    </div>
                                                </div>
                                                <div class="tttestimonial-content-right col-sm-8">
                                                    <div class="testi-ico"></div>
                                                    <div class="tttesti-desc">"Duis faucibus enim vitae nunc molestier arcu facilisis arcu Nullam mattis faucibus enim vitae nunc molestie, need arcu Nullam bibendumnc molestien bibendum vitae nunc molestie, nec nec arcu Nullam bibendum
                                                        aac,."
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ttcmstestimonial-content">
                                                <div class="tttestimonial-content-left col-sm-4">
                                                    <div class="tttestiimg testi-img1">
                                                        <a href="#"><img src="image/catalog/demo/banners/user3.png" alt="user3.jpg"></a>
                                                    </div>
                                                    <div class="tt-testi-userinfo">
                                                        <div class="tt-testi-title">John Doe</div>
                                                        <div class="tt-testi-post">CEO &amp; Founder</div>
                                                    </div>
                                                </div>
                                                <div class="tttestimonial-content-right col-sm-8">
                                                    <div class="testi-ico"></div>
                                                    <div class="tttesti-desc">"Duis faucibus enim vitae nunc molestier arcu facilisis arcu Nullam mattis faucibus enim vitae nunc molestie, need arcu Nullam bibendumnc molestien bibendum vitae nunc molestie, nec nec arcu Nullam bibendum
                                                        aac,."
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="blog_latest_new_home" class="bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="box-heading title_block heading">
                            <h3><a class="ttblock-heading" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog/blogs">Latest
                                    News</a></h3>
                        </div>
                        <div class="block_content">
                            <div class="row">
                                <ul id="ttsmartblog-carousel" class="tt-carousel ttblog-content owl-carousel owl-theme">
                                    <li>
                                        <div class="blog-content col-xs-12 col-sm-12">
                                            <div class="ttblog_image_holder blog_image_holder col-xs-4 col-sm-4">
                                                <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=5">
                                                    <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/5-home-default-370x240.jpg" alt="Latest News" title="Latest News" />
                                                    <div class="blog-hover"></div>
                                                </a>
                                                <span class="bloglinks">
                                                    <a class="icon zoom" data-lightbox="example-set" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/5-home-default-870x564.jpg" title="Click to view Full Image">
                                                        <i class="material-icons icon-search">search</i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="blog-caption blog-sub-content">
                                                <div class="blog_inner">
                                                    <h5 class="post_title"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=5">voluptate
                                                            velit esse</a></h5>
                                                    <span class="blog-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="date">27</span>
                                                        <span class="month">Oct-2020</span>
                                                    </span>
                                                    <p class="blog-description"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. ...
                                                    </p>
                                                    <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=5" class="read-more">read more</a>
                                                    <div class="comment">
                                                        <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=5">
                                                            <i class="fa fa-comments-o"></i> 0 Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="blog-content col-xs-12 col-sm-12">
                                            <div class="ttblog_image_holder blog_image_holder col-xs-4 col-sm-4">
                                                <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=4">
                                                    <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/4-home-default-370x240.jpg" alt="Latest News" title="Latest News" />
                                                    <div class="blog-hover"></div>
                                                </a>
                                                <span class="bloglinks">
                                                    <a class="icon zoom" data-lightbox="example-set" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/4-home-default-870x564.jpg" title="Click to view Full Image">
                                                        <i class="material-icons icon-search">search</i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="blog-caption blog-sub-content">
                                                <div class="blog_inner">
                                                    <h5 class="post_title"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=4">suscipit
                                                            laboriosam nisi</a></h5>
                                                    <span class="blog-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="date">27</span>
                                                        <span class="month">Oct-2020</span>
                                                    </span>
                                                    <p class="blog-description"> Duis faucibus enim vitae nunc, Nullam mattis bvitae nunc facilisis matt.... ...
                                                    </p>
                                                    <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=4" class="read-more">read more</a>
                                                    <div class="comment">
                                                        <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=4">
                                                            <i class="fa fa-comments-o"></i> 0 Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="blog-content col-xs-12 col-sm-12">
                                            <div class="ttblog_image_holder blog_image_holder col-xs-4 col-sm-4">
                                                <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=3">
                                                    <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/3-home-default-370x240.jpg" alt="Latest News" title="Latest News" />
                                                    <div class="blog-hover"></div>
                                                </a>
                                                <span class="bloglinks">
                                                    <a class="icon zoom" data-lightbox="example-set" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/3-home-default-870x564.jpg" title="Click to view Full Image">
                                                        <i class="material-icons icon-search">search</i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="blog-caption blog-sub-content">
                                                <div class="blog_inner">
                                                    <h5 class="post_title"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=3">Upon
                                                            of seasons earth...</a></h5>
                                                    <span class="blog-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="date">27</span>
                                                        <span class="month">Oct-2020</span>
                                                    </span>
                                                    <p class="blog-description"> Duis faucibus enim vitae nunc, Nullam mattis bvitae nunc facilisis mat...</p>
                                                    <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=3" class="read-more">read more</a>
                                                    <div class="comment">
                                                        <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=3">
                                                            <i class="fa fa-comments-o"></i> 0 Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="blog-content col-xs-12 col-sm-12">
                                            <div class="ttblog_image_holder blog_image_holder col-xs-4 col-sm-4">
                                                <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=2">
                                                    <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/2-home-default-370x240.jpg" alt="Latest News" title="Latest News" />
                                                    <div class="blog-hover"></div>
                                                </a>
                                                <span class="bloglinks">
                                                    <a class="icon zoom" data-lightbox="example-set" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/2-home-default-870x564.jpg" title="Click to view Full Image">
                                                        <i class="material-icons icon-search">search</i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="blog-caption blog-sub-content">
                                                <div class="blog_inner">
                                                    <h5 class="post_title"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=2">Lorem
                                                            ipsum dolor sit...</a></h5>
                                                    <span class="blog-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="date">27</span>
                                                        <span class="month">Oct-2020</span>
                                                    </span>
                                                    <p class="blog-description"> Duis faucibus enim vitae nunc, Nullam mattis bvitae nunc facilisis matt.... ...
                                                    </p>
                                                    <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=2" class="read-more">read more</a>
                                                    <div class="comment">
                                                        <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=2">
                                                            <i class="fa fa-comments-o"></i> 0 Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="blog-content col-xs-12 col-sm-12">
                                            <div class="ttblog_image_holder blog_image_holder col-xs-4 col-sm-4">
                                                <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=1">
                                                    <img class="image_thumb" src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/1-home-default-370x240.jpg" alt="Latest News" title="Latest News" />
                                                    <div class="blog-hover"></div>
                                                </a>
                                                <span class="bloglinks">
                                                    <a class="icon zoom" data-lightbox="example-set" href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/banners/1-home-default-870x564.jpg" title="Click to view Full Image">
                                                        <i class="material-icons icon-search">search</i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="blog-caption blog-sub-content">
                                                <div class="blog_inner">
                                                    <h5 class="post_title"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=1">Lorem
                                                            ipsum dolor sit...</a></h5>
                                                    <span class="blog-date">
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="date">27</span>
                                                        <span class="month">Oct-2020</span>
                                                    </span>
                                                    <p class="blog-description"> Duis faucibus enim vitae nunc, Nullam mattis bvitae nunc facilisis matt.... ...
                                                    </p>
                                                    <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=1" class="read-more">read more</a>
                                                    <div class="comment">
                                                        <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog&amp;tt_blog_id=1">
                                                            <i class="fa fa-comments-o"></i> 0 Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <div class="customNavigation">
                                    <a class="btn prev ttblog_prev"><i class='material-icons'>arrow_back</i></a>
                                    <a class="btn next ttblog_next"><i class='material-icons'>arrow_forward</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brand-carousel">
                    <div class="container">
                        <div class="row">
                            <div class="swiper-viewport">
                                <div id="carousel0" class="swiper-container brand-items">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-01-140x100.png" alt="NFL" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-02-140x100.png" alt="RedBull" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-03-140x100.png" alt="Sony" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-04-140x100.png" alt="Coca Cola" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-05-140x100.png" alt="Burger King" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-06-140x100.png" alt="Canon" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-07-140x100.png" alt="Harley Davidson" class="img-responsive" /></a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a href="#"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/cache/catalog/demo/manufacturer/brand-logo-08-140x100.png" alt="Dell" class="img-responsive" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination carousel0"></div>
                                <div class="swiper-pager">
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#carousel0').swiper({
                        mode: 'horizontal',
                        autoplay: 3000,
                        //pagination: '.carousel0',
                        pagination: false,
                        paginationClickable: false,
                        prevButton: '.swiper-button-prev',
                        nextButton: '.swiper-button-next',


                        // Default parameters
                        slidesPerView: 5,

                        // Responsive breakpoints
                        breakpoints: {
                            // when window width is <= 1200px
                            1199: {
                                slidesPerView: 4
                            },
                            // when window width is <= 991px
                            991: {
                                slidesPerView: 3
                            },
                            // when window width is <= 767px
                            767: {
                                slidesPerView: 3
                            },
                            // when window width is <= 480px
                            480: {
                                slidesPerView: 2
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
                                            <span class="newletter-desc">Sign up with us and get latest deals, offers &
                                                updates about store.</span>
                                        </div>
                                        <div class="box-content newleter-content col-sm-6">
                                            <label></label>
                                            <div id="form_subscribe">
                                                <form name="subscribe" id="subscribe">
                                                    <input type="text" placeholder="Your email address" value="" name="subscribe_email" id="subscribe_email">
                                                    <input type="hidden" value="" name="subscribe_name" id="subscribe_name" />
                                                    <a class="button btn btn-primary" onclick="email_subscribe()"><span>subscribe</span><i class='material-icons'>near_me</i></a>

                                                </form>
                                            </div>
                                            <!-- /#form_subscribe -->
                                            <div id="notification-normal"></div>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
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
                                        <div class="ttfooter-logo">
                                            <a href="#"><img src="image/catalog/demo/banners/footer-logo.png" alt="footer-logo"></a>
                                        </div>
                                        <div class="ttfooter-desc">Claritas processus Lorem ipsum dynamicus recmicus sequit qituconsut.</div>
                                    </div>
                                </div>
                            </div>

                        </aside>



                    </div>
                    <div class="col-sm-3 footer-column footer-my-account">
                        <h5>My Account</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/account">My
                                    Account</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist">Wish
                                    List</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/voucher">Gift
                                    Certificates</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/return/add">Returns</a>
                            </li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/special">Specials</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 footer-column footer-column_1  footer-extras">
                        <h5>Extras</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=4">About
                                    Us</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=6">Delivery
                                    Information</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=3">Privacy
                                    Policy</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/information&amp;information_id=5">Terms
                                    &amp; Conditions</a></li>
                            <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/contact">Contact
                                    Us</a></li>
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
                                                <li class="facebook">
                                                    <a href="#">
                                                        <p>Facebook</p>
                                                    </a>
                                                </li>
                                                <li class="twitter">
                                                    <a href="#">
                                                        <p>Twitter</p>
                                                    </a>
                                                </li>
                                                <li class="youtube">
                                                    <a href="#">
                                                        <p>YouTube</p>
                                                    </a>
                                                </li>
                                                <li class="instagram">
                                                    <a href="#">
                                                        <p>instagram</p>
                                                    </a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="#">
                                                        <p>Pinterest</p>
                                                    </a>
                                                </li>


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
    </script> -->


    <!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body>

</html>