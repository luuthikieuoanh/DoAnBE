<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategories();

//$category_List = $categoryModel->getCategoriesByCategory($categoryList[0]['category_id']);
//var_dump($category_List[0]);

?>
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
                                <form class="ttsearchtoggle" method="get" action="search.php">
                                    <input type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
                                    <input type="hidden" name="sort" value="default" placeholder="Search" class="form-control input-lg" />
                                    <input type="hidden" name="limit" value="2" placeholder="Search" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-lg"><i class="material-icons icon-search">search</i></button>
                                    </span>
                                </form>
                            </div>
                        </li>
                        <li class="account-nav dropdown header_user_info"><a href="#" title="Account" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons user">perm_identity</i><span class="ttuserheading">Account</span><i class="material-icons expand-more">expand_more</i></a>
                            <ul class="dropdown-menu dropdown-menu-right account-link-toggle">
                                <?php if (!isset($_SESSION['email'])) { ?>
                                    <li><a href="login.php"><i class="material-icons">lock</i> Login</a></li>
                                    <li><a href="register.php"><i class='material-icons reg-person'>person</i> Register</a></li>
                                    <!-- <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist" id="wishlist-total" title="Wish List (0)"><i class="material-icons favorite">favorite</i> <span class="hidden-sm hidden-md">Wish List (0)</span></a></li> -->
                                <?php } else if(!$_SESSION['role']=='admin'){ ?>
                                    <li><a href="account.php?id=<?php echo $_SESSION['id'] ?>"><i class='material-icons ma-user'>perm_identity</i> My account</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/order"><i class='material-icons calendar-today'>calendar_today</i> Order History</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/transaction"><i class='material-icons credit-card'>credit_card</i> Transactions</a></li>
                                    <li><a href="https://demo.templatetrip.com/Opencart/OPC01/OPC009/OPC04/index.php?route=account/wishlist" id="wishlist-total" title="Wish List (0)"><i class="material-icons icon-wishlist">favorite_border</i> <span class="hidden-sm hidden-md">Wish List (0)</span></a></li>
                                    <li><a href="logout.php"><i class="material-icons">lock_open</i> Logout</a></li>
                                <?php } else{?>
                                    <li><a href="manageproducts"><i class='material-icons ma-user'>perm_identity</i> Manage Products</a></li>
                                    <li><a href="logout.php"><i class="material-icons">lock_open</i> Logout</a></li>
                                <?php }?>

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

                                        <?php
                                        foreach ($categoryList as $item) {
                                            $category_List = $categoryModel->getCategoriesByCategory($item['category_id']);
                                        ?>
                                            <?php
                                            if (count($category_List) > 0) {
                                            ?>
                                                <li class="TT-Sub-List dropdown">
                                                    <a href="category.php?id=<?php echo $item['category_id']?>&limit=2&sort=default" class="TT-Category-List"><?php echo $item['category_name']; ?></a>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-inner">
                                                            <ul class="list-unstyled childs_1 mega-dropdown-menu columns-4" style="width: 200px;">

                                                                <li class="dropdown first" style="width: 25%;">


                                                                    <div class="dropdown-menu">
                                                                        <div class="dropdown-inner">
                                                                            <ul class="list-unstyled childs_2">
                                                                                <?php
                                                                                for ($i = 0; $i < count($category_List); $i++) {
                                                                                ?>
                                                                                    <li><a href="category.php?id=<?php echo $category_List[$i]['category_id'] ?>-<?php echo $category_List[$i]['category_in_id'] ?>">
                                                                                            <?php echo $category_List[$i]['category_name'];    ?></a>
                                                                                    </li>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="TT-Sub-List">
                                                    <a href="category.php?id=<?php echo $item['category_id'] ?>"><?php echo $item['category_name']; ?></a>
                                                </li>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>

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