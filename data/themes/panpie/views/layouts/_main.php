<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Cake on Call: Deliver to India</title>
    <meta name="robots" content="max-image-preview:large" />

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />
    <noscript>
        <style>
            #preloader {
                display: none;
            }
        </style>
    </noscript>
    <?php
    $cs = Yii::app()->clientScript;
    $baseUrl = Yii::app()->baseUrl;
    $themeBaseUrl = Yii::app()->theme->baseUrl;
    $pluginBaseUrl = "{$baseUrl}/plugins";
    $skin = "green";
    ?>
    <?php
  /*  $cs->registerCssFile(
        "{$pluginBaseUrl}/woocommerce/assets/css/woocommerce-layout.css?ver=9.0.2",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/woocommerce/assets/css/woocommerce-smallscreen.css?ver=9.0.2",
        "only screen and (max-width: 767px)"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/woocommerce/assets/css/woocommerce.css?ver=9.0.2",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/food-menu-pro/assets/css/foodmenu.min.css?ver=4.0.4",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/food-menu-pro/assets/vendor/swiper/swiper.min.css?ver=4.0.4",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/food-menu-pro/assets/vendor/scrollbar/jquery.mCustomScrollbar.min.css?ver=4.0.4",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/food-menu-pro/assets/vendor/font-awesome/css/font-awesome.min.css?ver=4.0.4",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/food-menu-pro/assets/vendor/jquery-modal/jquery.modal.min.css?ver=4.0.4",
        "all"
    );
    $cs->registerCssFile(
        "{$pluginBaseUrl}/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.30.0",
        "all"
    );*/
    $cs->registerCssFile(
        "{$baseUrl}/uploads/elementor/css/custom-frontend.min.css?ver=1641551132",
        "all"
    ); 
 /*   $cs->registerCssFile(
        "{$pluginBaseUrl}/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5",
        "all"
    );  */
    $cs->registerCssFile(
        "{$baseUrl}/uploads/elementor/css/post-106.css?ver=1641551132",
        "all"
    );
    $cs->registerCssFile(
        "{$baseUrl}/uploads/elementor/css/post-5534.css?ver=1641551132",
        "all"
    );
   /* $cs->registerCssFile(
        "{$pluginBaseUrl}/woo-product-variation-swatches/assets/css/rtwpvs.min.css?ver=1721811793",
        "all"
    );  */
    $cs->registerCssFile(
        "http://fonts.googleapis.com/css?family=Roboto%3A500%2C700%2C400%7CBarlow%3A600%2C700%2C600&amp;subset=latin&amp;display=fallback&amp;ver=3.1.4",
        "all"
    );  

    $cs->registerCssFile("{$themeBaseUrl}/assets/css/default.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/style.css?ver=3.1.4", "all");
    /*
   $cs->registerCssFile("{$themeBaseUrl}/assets/fonts/flaticon-panpie/flaticon.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/magnific-popup.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/font-awesome.min.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/animate.min.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/woocommerce/assets/css/select2.css?ver=9.0.2", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/default.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/elementor.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/style.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/swiper.min.css?ver=3.1.4", "all");
    $cs->registerCssFile("http://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CBarlow%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=6.5.5", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/woocommerce/assets/client/blocks/wc-blocks.css?ver=wc-9.0.2", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/elementor/assets/lib/animations/animations.min.css?ver=3.22.2", "all");
    $cs->registerCssFile("{$pluginBaseUrl}/fluentform/assets/css/fluent-forms-elementor-widget.css?ver=5.1.19", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/owl.carousel.min.css?ver=3.1.4", "all");
    $cs->registerCssFile("{$themeBaseUrl}/assets/css/owl.theme.default.min.css?ver=3.1.4", "all");
    */

    //$cs->registerCssFile("{$pluginBaseUrl}/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3", ["media" => "all", "id" => "elementor-icons-fa-solid-css"]);
    //$cs->registerCssFile("{$pluginBaseUrl}/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3", ["media" => "all", "id" => "elementor-icons-fa-solid-css"]);
    ?>
    
    <?php

    ///   $cs->registerCssFile("{$themeBaseUrl}/assets/css/bootstrap.min.css");

    ?>
    <script type="text/javascript" id="panpie-main-js-extra">
        /* <![CDATA[ */
        var panpieObj = {
            stickyMenu: "1",
            meanWidth: "992",
            siteLogo: "<a href=\"http:\/\/yiiwp.local\/wooshop\/\" alt=\"Panpie - Restaurant WordPress Theme\"><img width='92' height='39' loading='lazy' class='logo-small' src='http:\/\/yiiwp.local\/wooshop\/wp-content\/assets\/img\/logo.png' alt='Panpie - Restaurant WordPress Theme'><\/a>",
            extraOffset: "70",
            extraOffsetMobile: "52",
            rtl: "no",
            ajaxURL: "http:\/\/yiiwp.local\/wooshop\/wp-admin\/admin-ajax.php",
            nonce: "b40eb849a3",
        };
        /* ]]> */
    </script>
    <script type="text/javascript" id="rtwpvs-js-extra">
        /* <![CDATA[ */
        var rtwpvs_params = {
            is_product_page: "",
            ajax_url: "wooshop\/wp-admin\/admin-ajax.php",
            nonce: "78b5aac6db",
            reselect_clear: "1",
            term_beside_label: "",
            archive_swatches: "1",
            enable_ajax_archive_variation: "",
            archive_swatches_enable_single_attribute: "",
            archive_swatches_single_attribute: "",
            archive_swatches_display_event: "click",
            archive_image_selector: ".wp-post-image, .attachment-woocommerce_thumbnail",
            archive_add_to_cart_text: "",
            archive_add_to_cart_select_options: "",
            archive_product_wrapper: ".rtwpvs-product,.product-item",
            archive_product_price_selector: ".price",
            archive_add_to_cart_button_selector: ".rtwpvs_add_to_cart, .add_to_cart_button",
            enable_variation_url: "1",
            enable_archive_variation_url: "",
            has_wc_bundles: "",
        };
        /* ]]> */
    </script>
    <?php
    $scriptmap = Yii::app()->clientScript;
    $scriptmap->scriptMap = array(
        "jquery.min.js" => "{$themeBaseUrl}/assets/js/jquery-2.1.4.min.js",
        "jquery-ui-1.9.2.min.js" => "{$themeBaseUrl}/assets/js/jquery-ui.min.js",
        "coreScriptPosition" => CClientScript::POS_END,
        "jquery.js" => false,
        //"jquery.min.js"=>false,
        // "jquery-ui.min.js" => false
    );

    $cs->registerScriptFile("jquery.min.js", CClientScript::POS_HEAD);
    ?>

</head>

<body class="page-template page-template-elementor_header_footer page page-id-5534 wp-embed-responsive theme-panpie woocommerce-no-js rtwpvg rtwpvs rtwpvs-rounded rtwpvs-attribute-behavior-hide rtwpvs-archive-align-left sticky-header header-style-9 footer-style-3 has-topbar topbar-style-1 no-sidebar right-sidebar product-grid-view fmp-food-menu elementor-default elementor-template-full-width elementor-kit-106 elementor-page elementor-page-5534">
    <div id="page" class="site">
       
        <?php $this->renderPartial('//layouts/header');  ?>
        <div id="content" class="site-content">
            <div data-elementor-type="wp-page" data-elementor-id="5534" class="elementor elementor-5534">
                <?php $this->renderPartial('//layouts/banner');  ?>
                <?php $this->renderPartial('//layouts/banner2');  ?>
                <?php $this->renderPartial('//layouts/foodmenu');  ?>
                <?php echo $content; ?>
                <?php //$this->renderPartial('//layouts/isotope');  
                ?>
            </div>
        </div>    
    <!--FOOTER -->
    <?php $this->renderPartial('//layouts/footer');  ?>
    <a href="#" class="scrollup back-top"><i class="fas fa-angle-double-up"></i>TOP</a>
    </div>
    <?php


    //   $cs->registerScriptFile("{$themeBaseUrl}/assets/js/bootstrap.min.js", CClientScript::POS_END);
    //  $cs->registerScriptFile("{$themeBaseUrl}/assets/js/bootstrap-checkbox-radio-switch.js", CClientScript::POS_END);
    //  $cs->registerScriptFile("{$themeBaseUrl}/assets/js/chartist.min.js", CClientScript::POS_END);
    //  $cs->registerScriptFile("{$themeBaseUrl}/assets/js/bootstrap-notify.js", CClientScript::POS_END);
    //    $cs->registerScriptFile($themeBaseUrl. "/plugins/select2/select2.min.js",CClientScript::POS_END);
    ?>
    <script type="text/javascript" src="/themes/panpie/assets/js/main.js?ver=3.1.4" id="panpie-main-js"></script>
    <script type="text/javascript" src="/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=9.0.2" id="wc-cart-fragments-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/imagesloaded.min.js?ver=5.0.0" id="imagesloaded-js"></script>
    <script type="text/javascript" src="/plugins/food-menu-pro/assets/js/foodmenu.min.js?ver=4.0.4" id="fm-frontend-js"></script>
    <script type="text/javascript" src="/plugins/woo-product-variation-swatches/assets/js/rtwpvs.min.js?ver=1721811793" id="rtwpvs-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/isotope.pkgd.min.js?ver=3.1.4" id="isotope-pkgd-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/popper.js?ver=3.1.4" id="popper-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/bootstrap.min.js?ver=3.1.4" id="bootstrap-js"></script>
    <script type="text/javascript" src="/plugins/woocommerce/assets/js/select2/select2.full.min.js?ver=4.0.3-wc.9.0.2" id="select2-js" defer="defer" data-wp-strategy="defer"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/jquery.countdown.min.js?ver=3.1.4" id="countdown-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/js.cookie.min.js?ver=3.1.4" id="cookie-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/theia-sticky-sidebar.min.js?ver=3.1.4" id="theia-sticky-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/jquery.magnific-popup.min.js?ver=3.1.4" id="magnific-popup-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/wow.min.js?ver=3.1.4" id="rt-wow-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/swiper.min.js?ver=3.1.4" id="swiper-slider-js"></script>
    <script type="text/javascript" src="/themes/panpie/assets/js/masonry.min.js?ver=4.2.2" id="masonry-js"></script>

</body>

</html>