<div class="header">
    <div class="full-header">
        <div class="container">
            <div class="header-left">
                <div id="logo">
                    <a href="index.php"><img src="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/image/catalog/logo.png" title="Your Store" alt="Your Store" class="img-responsive" /></a>
                </div>
            </div>

            <div class="header-top-right">
                <div id="top-links" class="nav pull-right">
                    <ul class="list-inline">
                        <li class="ttsearch">
                            <div id="search" class="input-group">
                                <span class="ttsearch_button">
                                    <i class="material-icons icon-search">search</i>
                                    <i class="material-icons icon-close">clear</i>
                                </span>
                                <div class="ttsearchtoggle">
                                    <input type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-lg"><i class="material-icons icon-search">search</i></button>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="account-nav dropdown header_user_info"><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/account" title="Account" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons user">perm_identity</i><span class="ttuserheading">Account</span><i class="material-icons expand-more">expand_more</i></a>
                            <ul class="dropdown-menu dropdown-menu-right account-link-toggle">
                                <?php if (!isset($_SESSION['email'])) { ?>
                                    <li><a href="login.php"><i class="material-icons">lock</i> Login</a></li>
                                    <li><a href="register.php"><i class='material-icons reg-person'>person</i> Register</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist" id="wishlist-total" title="Wish List (0)"><i class="material-icons favorite">favorite</i> <span class="hidden-sm hidden-md">Wish List (0)</span></a></li>
                                <?php } else { ?>
                                    <li><a href="account.php?id=<?php echo $_SESSION['id']?>"><i class='material-icons ma-user'>perm_identity</i> My account</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/order"><i class='material-icons calendar-today'>calendar_today</i> Order History</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/transaction"><i class='material-icons credit-card'>credit_card</i> Transactions</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist" id="wishlist-total" title="Wish List (0)"><i class="material-icons icon-wishlist">favorite_border</i> <span class="hidden-sm hidden-md">Wish List (0)</span></a></li>
                                    <li><a href="logout.php"><i class="material-icons">lock_open</i> Logout</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="ttcart">
                            <div id="cart" class="btn-group">
                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle"><i class="material-icons shopping-cart">shopping_cart</i>
                                    <span id="cart-total">0</span>

                                </button>
                                <ul class="dropdown-menu pull-right header-cart-toggle">
                                    <li>
                                        <p class="text-center">Your shopping cart is empty!</p>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--<div class="fixhead"></div>-->
            <div class="header-top-left">
                <div class="header-left-cms">
                    <aside id="header-left">
                        <div class="main-category-list left-main-menu">
                            <div class="cat-menu">
                                <div class="TT-panel-heading">
                                    <span>menu</span>
                                </div>
                                <div class="menu-category">
                                    <ul class="dropmenu">
                                        <li class="TT-Sub-List dropdown">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=20" class="TT-Category-List">azulejo</a>




                                            <div class="dropdown-menu">
                                                <div class="dropdown-inner">
                                                    <ul class="list-unstyled childs_1 mega-dropdown-menu columns-4" style="width: 800px;">

                                                        <li class="dropdown first" style="width: 25%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=20_123" class="single-dropdown">Petuntse</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_126">
                                                                                Bone china</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_125">
                                                                                Cenosphere</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_124">
                                                                                Fritware</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_132">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_127">
                                                                                Pitchers</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=123_128">
                                                                                Vinogel</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>

                                                        <li class="dropdown first" style="width: 25%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=20_118" class="single-dropdown">Vinogel</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_119">
                                                                                fruits</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_122">
                                                                                Geopolymer</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_121">
                                                                                grog</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_120">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_133">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=118_129">
                                                                                Vinogel</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>

                                                        <li class="dropdown first" style="width: 25%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=20_26" class="single-dropdown">Nile silt</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_61">
                                                                                fruits</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_85">
                                                                                Geopolymer</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_60">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_134">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_59">
                                                                                Petuntse</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=26_130">
                                                                                Vinogel</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>

                                                        <li class="dropdown first" style="width: 25%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=20_92" class="single-dropdown">Jesmonite</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_135">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_95">
                                                                                Nile silt</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_96">
                                                                                Petuntse</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_93">
                                                                                Pitchers</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_94">
                                                                                Pitchers</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=92_131">
                                                                                Vinogel</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="TT-Sub-List dropdown">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=25" class="TT-Category-List">Pottery</a>




                                            <div class="dropdown-menu">
                                                <div class="dropdown-inner">
                                                    <ul class="list-unstyled childs_1 mega-dropdown-menu columns-2" style="width: 400px;">

                                                        <li class="dropdown first" style="width: 50%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=25_98" class="single-dropdown">vegtables</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_139">
                                                                                Vinogel</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_102">
                                                                                Cenosphere</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_101">
                                                                                fruits</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_141">
                                                                                fruits</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_140">
                                                                                Nile silt</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=98_100">
                                                                                Stoneware</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>

                                                        <li class="dropdown first" style="width: 50%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=25_99" class="single-dropdown">Petuntse</a>

                                                            <div class="dropdown-menu">
                                                                <div class="dropdown-inner">
                                                                    <ul class="list-unstyled childs_2">

                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_104">
                                                                                Bone china</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_137">
                                                                                dry fruits</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_105">
                                                                                Fire clay</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_136">
                                                                                Lumicera</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_103">
                                                                                Petuntse</a>
                                                                        </li>
                                                                        <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=99_138">
                                                                                vegtables</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="">
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="TT-Sub-List dropdown">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=65" class="TT-Category-List">Cameo</a>




                                            <div class="dropdown-menu">
                                                <div class="dropdown-inner">
                                                    <ul class="list-unstyled childs_1 single-dropdown-menu">
                                                        <li class="dropdown" style="width: 100%;">

                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=65_114">Lumicera</a>


                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="TT-Sub-List">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=66">Pewter</a>


                                        </li>
                                        <li class="TT-Sub-List dropdown">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=67" class="TT-Category-List">clothes</a>




                                            <div class="dropdown-menu">
                                                <div class="dropdown-inner">
                                                    <ul class="list-unstyled childs_1 single-dropdown-menu">
                                                        <li class="dropdown" style="width: 100%;">
                                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=product/category&amp;path=67_116">jacket</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="TT-Sub-List">
                                            <a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=information/tt_blog/blogs">
                                                <span data-hover="Blogs">Blogs</span>
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
</div>