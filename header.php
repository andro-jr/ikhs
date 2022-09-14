<?php
    /**
        * The header for our theme
        *
        * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
        *
        * @package ikhouvanshoppen 
    */
    
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
    
    <head>
        <link rel="icon" href="https://bestforyourbody.shop/wp-content/uploads/2022/06/cropped-BFYB_Faficon.png" type="image/gif" sizes="16x16">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        
        <?php wp_head(); ?>
        
    </head>
    
    <body <?php body_class(); ?>>
        <?php
            wp_body_open();
        ?>
        
        <div class="gnrl_headerTopBg <?php if ( is_user_logged_in() ) { ?>gnrl_headerTopBg_login<?php } ?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-9 col-xs-9 col-sm-7">
                        <p class="ptxt">
                            <!--<a href="#"><i class="fa fa-download"></i>&nbsp; Download App</a> &nbsp;&nbsp;|&nbsp;&nbsp;  -->
                            <!--<a href="#"><i class="fa fa-location-arrow"></i>&nbsp; Volg Jouw Order</a> &nbsp;&nbsp;|&nbsp;&nbsp;  -->
                            <a href="/contact"><i class="fa fa-headphones"></i>&nbsp; Hulp Nodig? Wij helpen jou graag!</a>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-3 col-xs-3 col-sm-5">
                        <p class="ptxt pull-right <?php if ( is_user_logged_in() ) { ?>logout_mob<?php } ?>">
                            <!--<a href="<?php //echo esc_url('/vendor-contact/'); ?>"><button class="local_mktBtn">Partner worden</button></a> -->
                            <!--<a href="javascript:void(0);" class="click_button"><i class="fa fa-fire"></i>&nbsp; MORE <i class="fa fa-angle-down"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp;  -->
                            
                            <?php if ( is_user_logged_in() ) { ?>
                                <?php if( current_user_can('customer') || current_user_can('administrator') ) :  ?>
                                <a href="<?php echo esc_url(wp_logout_url('/my-account')); ?>"><i class="fa fa-sign-out"></i>&nbsp; UITLOGGEN</a> 
                                <?php endif; ?>
                                
                                <span class="span">(<?php $current_user = wp_get_current_user(); printf( esc_html( $current_user->user_firstname ) );?>)</span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                <?php } else { ?>                               
                            <?php } ?>
                            
                            <a href="<?php echo esc_url('/verlanglijst/'); ?>"><i class="fa fa-heart-o"></i>&nbsp; <!--WISHLIST--> <?php echo do_shortcode('[yith_wcwl_items_count]'); ?></a>
                            <!--<a href="#"><i class="fa fa-bell-o"></i>&nbsp; NOTIFICATION <span>5</span></a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                            <a href="#"><i class="fa fa-sign-out"></i>&nbsp; LOGOUT</a>-->
                        </p>
                        
                    </div>
                </div>
            </div>
        </div> 
        
        <ul class="click_shwn" style="display:none;">
            <li>link 1</li>
            <li>link 2</li>
            <li>link 3</li>
            <li>link 4</li>
        </ul>
        
        <script>
            jQuery(document).ready(function(){
                jQuery(".click_button").click(function(){
                    jQuery(".click_shwn").toggle();
                });
            });
        </script>       
        <header  class="gnrl_headerBg"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-5">
                        <div class="logotop">
                            
                            <a href="<?php echo esc_url(home_url());?>">
                                
                            <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?> " alt="Logo"></a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7 col-sm-7 pr-0 pl-0">
                        <div class="clear mb-5"></div>
                        <div class="searbar">
                            <!--<form role="search" method="get" id="searchform" action="<?php //bloginfo('siteurl'); ?>">
                                <input type="text" class="search-input" placeholder="Search for shops, brands and more" name="s" id="s" autocomplete="off" />
                                <span id="submitBtn" class="cursor-pointer"><b></b> <i class="fa fa-search"></i></span>
                            </form>-->
                            <?php echo do_shortcode('[fibosearch]'); ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <p class="ptxt2 pull-right">
                            
                        
                                <!-- <a href="<?php echo esc_url('/shop'); ?>" class="hidden-xs"><button class="local_mktBtn local_mktBtnshop">Onze Webshop</button></a> -->
                                <a href="<?php echo esc_url('/my-account'); ?>" class="hidden-xs"><button class="local_mktBtn">Inloggen</button></a>
                            
                            
                            <b class="clear hidden-xl hidden-lg hidden-md hidden-sm"></b>
                            
                            <!--<a href="<?php //echo esc_url('/online-stores/'); ?>" class="hidden-xs"><button class="local_mktBtn">Online Shops</button></a> -->
                            
                            <?php if ( is_user_logged_in() ) { ?>
                                <?php if( current_user_can('customer') || current_user_can('administrator') ) :  ?>
                                
                                <?php endif; ?>
                                
                                <?php } else { ?>
                                <a class="hidden-xs" href="<?php echo esc_url('/registeren/'); ?>"><button class="local_mktBtn"><i class="fa fa-user-o"></i>&nbsp; Registeren</button></a> 

                            <?php } ?>
                            
                            <a class="shop-icon" href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i><span class="misha-cart"><?php echo wc()->cart->get_cart_contents_count();?></span>&nbsp; <span class="misha-cart22"><!--CART--></span></a>
                        </p> 
                    </div>
                </div>
            </div>
        </header>
        
        
        <div class="Npg_navbg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar">
                            
                            <!-- <?php if ( is_page( 'local-market' ) ) { ?> 
                                <a href="<?php echo esc_url('/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Online shoppen</button></a>
                                <a href="<?php echo esc_url('/partner-aanmelden/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Partner worden</button></a>
                                <?php } else { ?>
                                <a href="<?php echo esc_url('/local-market/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Shop Lokaal</button></a>
                                <a href="<?php echo esc_url('/partner-aanmelden/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Partner worden</button></a>
                            <?php } ?> -->  
                            
                            <!-- <?php if ( is_woocommerce() ) { ?> 
                                <a href="<?php echo esc_url('/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm" ><button class="local_mktBtn local_mktBtnshop">Shop Lokaal</button></a>
                                <a href="<?php echo esc_url('/partner-aanmelden/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Aanmelden</button></a>
                                <?php } else { ?>
                                <a href="<?php echo esc_url('/shop'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn local_mktBtnshop">Onze eigen webshop</button></a>
                                <a href="<?php echo esc_url('/partner-aanmelden/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Aanmelden</button></a>
                            <?php } ?>   -->

                            <!-- <a href="<?php echo esc_url('/shop'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn local_mktBtnshop">Onze Webshop</button></a> -->
                            
                                <a href="<?php echo esc_url('/my-account/'); ?>" class="hidden-xl hidden-lg hidden-md hidden-sm"><button class="local_mktBtn">Inloggen</button></a>
                                <a class="hidden-xl hidden-lg hidden-md hidden-sm" href="<?php echo esc_url('/registeren/'); ?>"><button class="local_mktBtn"><i class="fa fa-user-o"></i>&nbsp; Registeren</button></a> 
                            


                            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                            
                        </nav>
                    </div>
                    <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "220px";
                }
                
                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
                $(".homesideRMs").click(function() {
                    document.getElementById("mySidenav").style.width = "0";
                });
            </script>
                    
                </div>
            </div>
        </div>
        
        
        <script>
            jQuery(document).ready(function(){
                jQuery("#submitBtn").click(function(){        
                    jQuery("#searchform").submit(); // Submit the form
                });
            });
            
            
            /* globals global */
            jQuery(function($){
                var searchRequest;
                $('.search-autocomplete').autoComplete({
                    minChars: 2,
                    source: function(term, suggest){
                        try { searchRequest.abort(); } catch(e){}
                        searchRequest = $.post(global.ajax, { search: term, action: 'search_site' }, function(res) {
                            suggest(res.data);
                        });
                    }
                });
            });
            
            
            
            var timeout;
            
            jQuery( function( $ ) {
                $('.woocommerce').on('change', 'input.qty', function(){
                    
                    if ( timeout !== undefined ) {
                        clearTimeout( timeout );
                    }
                    
                    timeout = setTimeout(function() {
                        $("[name='update_cart']").trigger("click");
                    }, 500 ); // 1 second delay, half a second (500) seems comfortable too
                    
                });
            } );
            
        </script>
        <script>
            $(".panel-collapse").on("show.bs.collapse", function () {
              $(this).siblings(".panel-heading").addClass("active");
            });

            $(".panel-collapse").on("hide.bs.collapse", function () {
              $(this).siblings(".panel-heading").removeClass("active");
            });
        </script>
        
        <?php if ( is_shop() || is_product_category() || is_product_tag() ) { ?>
            <style>.content-area{padding: 0 2% 0 1%;float: right;}.post-type-archive-product.woocommerce .widget-area, .post-type-archive-product.woocommerce-page .widget-area {padding: 0 2% 0 2%;float: left;}.wcfmmp-product-geolocate-wrapper{display: none;}</style>
            <?php } else { ?>
            <style>.widget-area{display: none;}.content-area{width: 100%;padding: 0 2% 0 2%;}</style>
        <?php } ?>  
        <?php if ( is_product() || is_product_category() || is_product_tag() ) { ?>
            <style>.woocommerce-notices-wrapper {width: 100%;position: relative;margin-top: 0;}.single-product.woocommerce div.product .entry-summary p.price::before {display: none;}.single-product.woocommerce div.product .entry-summary p.price > span {padding-left: 0;}.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{padding-right:7px;min-width:60px;text-align:center;}.woocommerce div.product form.cart .button{background: #b5c09f !important;}.woocommerce-checkout button.button.alt{background-color: #c78572;}</style>
            <?php } else { ?>
        <?php } ?>          
        
        <?php if ( is_checkout() ) { ?>
            <style>.payment_methods, .woocommerce-info{display:none !important;}.woocommerce table.shop_table td small {display:block;}.woocommerce-notices-wrapper {width:100%;position:unset;margin-top:0;}</style>
            <?php } else { ?>
        <?php } ?>  
        <?php if ( is_cart() ) { ?>
            <style>.woocommerce-cart .woocommerce {display:unset;}.woocommerce-notices-wrapper {width: 100%;position: unset;margin-top: 0;}.woocommerce-cart .woocommerce-cart-form {width: 64%;float: left;}.woocommerce-cart .cart-collaterals {width: 33%;float: left;}
                @media screen and (max-width:980px) {.woocommerce-cart .woocommerce-cart-form {width:100%;margin-bottom:30px;}.woocommerce-cart .cart-collaterals {width:100%;}}
            </style>
            <?php } else { ?>
        <?php } ?>      
        
        <?php if ( is_wc_endpoint_url( 'order-received' ) ) { ?>
            <style>.woocommerce table.shop_table, .woocommerce-page table.shop_table { background: #f8f8f8; padding: 15px; border: 1px solid #eee; box-shadow: 4px 4px 10px rgb(0 0 0 / 18%); } .woocommerce table.shop_table td, .woocommerce-page table.shop_table td a { color: #000 !important; background: #fff; padding: 15px 0px 15px 6px; } .woocommerce-table__product-name, .woocommerce-table__product-table { font-size: 18px; } .woocommerce table.shop_table tbody th, .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th { border-top: 0; } .entry-content .woocommerce h2 { text-align: left !important; } .woocommerce .woocommerce-customer-details address { font-size: 15px; font-weight: 500; font-family: 'Montserrat', sans-serif; color: #000 !important; line-height: 2; height: 220px; padding: 15px; border: 1px solid #eee; box-shadow: 4px 4px 10px rgb(0 0 0 / 18%); background: #fff; padding-left: 24px; border-radius: 0; } tbody{ font-size: 15px; font-weight: 500; font-family: 'Montserrat', sans-serif; color: #000 !important; line-height: 2; padding: 15px; border: 1px solid #eee; background: #fff; } td, th { padding: 5px 0 5px 24px; width: 50.5%; } .woocommerce-order p{display:none;} .woocommerce ul.order_details { margin: 0 0 3em; list-style: none; font-size: 15px; font-weight: 500; font-family: 'Montserrat', sans-serif; color: #000 !important; line-height: 2; padding: 15px; border: 1px solid #eee; box-shadow: 4px 4px 10px rgb(0 0 0 / 18%); background: #fff; padding-left: 24px; } .woocommerce-table__product-name{width: 51.5%;} .yith-wcwl-add-button a.single_add_to_wishlist.button.alt{background-color: #c78572 !important; }
                @media screen and (max-width:768px) {.woocommerce .woocommerce-customer-details address {margin-bottom: 25px !important;}}
                @media screen and (max-width:468px) {.woocommerce table.shop_table td, .woocommerce-page table.shop_table td a {padding: 0;}.woocommerce table.shop_table td, .woocommerce-page table.shop_table td {padding: 15px 10px !important;}.woocommerce .woocommerce-customer-details address {margin-bottom:25px !important;}}
            </style>
            <?php } else { ?>
        <?php } ?>   

        <?php if ( is_page( 'my-account' ) ) { ?>
            <style>.content-area {background: #eefaf4;}</style>
            <script>
                jQuery( document ).ready(function() {
                    if (jQuery("body").hasClass("page-id-26")) {
                        jQuery('div.woocommerce').addClass('myaccount-css user_detail');
                    }
                });
            </script>
            <?php } else { ?>
        <?php } ?>  
        
        <script>
                jQuery( document ).ready(function() {
                    if (jQuery("body").hasClass("page-template-default")) {
                        jQuery('div.elementor-widget-container').addClass('page_text');
                    }
                });
            </script>