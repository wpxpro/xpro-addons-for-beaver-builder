<?php
/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */

if( !class_exists( "Xpro_Bundle_Lite_For_WP_Init" ) ) {
    class Xpro_Bundle_Lite_For_WP_Init
    {

        /**
         * Initializes the class once all plugins have loaded.
         */
        static public function init()
        {

            self::includes();

            add_action('admin_menu', __CLASS__ . '::xpro_addons_for_bb_dashboard_menu');
            add_action('init', __CLASS__ . '::load_modules');
            add_filter('plugin_action_links_' . XPRO_ADDONS_FOR_BB_BASE, __CLASS__ . '::plugin_action_links');
            add_filter('upload_mimes', __CLASS__ . '::xpro_add_custom_upload_mimes');

            if( isset($_GET['page']) == 'xpro_dashboard_welcome' || isset($_GET['page']) == 'xpro_settings_for_beaver' || isset($_GET['page']) == 'xpro_dashboard_templates' ) {
                add_action('admin_enqueue_scripts', __CLASS__ . '::enqueue_xpro_admin_styles');
            }
            add_action('admin_enqueue_scripts', __CLASS__ . '::enqueue_xpro_wp_admin_icon_styles');
        }

        /**
         * Loads our custom modules.
         */
        public static function load_modules()
        {
            if ( ! class_exists( 'FLBuilder' ) ) {
                return;
            }
            $all_modules    = Xpro_Beaver_Modules_List::instance()->get_list();
            $active_modules = Xpro_Beaver_Dashboard_Utils::instance()->get_option( 'xpro_beaver_modules_list', array_keys( $all_modules ) );

            foreach ( $active_modules as $module_slug ) {
                if ( array_key_exists( $module_slug, $all_modules ) ) {
                    if ( 'pro-disabled' !== $all_modules[ $module_slug ]['package'] && 'pro' !== $all_modules[ $module_slug ]['package'] ) {
                        require_once XPRO_ADDONS_FOR_BB_DIR . 'modules/' . str_replace( '_', '-', $module_slug ) . '/' . str_replace( '_', '-', $module_slug ) . '.php';
                    }
                }
            }

        }

        public static function xpro_addons_for_bb_dashboard_menu()
        {

            add_menu_page('Xpro Addons BB', 'Xpro Addons', 'manage_options', 'xpro_dashboard_welcome', 'xpro_dashboard_welcome', plugins_url( 'xpro-addons-beaver-builder-elementor/assets/images/XproX.svg' ), 66);
            add_submenu_page('xpro_dashboard_welcome', 'Xpro Addons For Beaver Builder', 'Welcome', 'manage_options', 'xpro_dashboard_welcome','xpro_dashboard_welcome' );
            add_submenu_page('xpro_dashboard_welcome', 'Templates', 'Templates', 'manage_options', 'xpro_dashboard_templates', 'xpro_dashboard_templates', 99);
            if ( did_action( 'xpro_addons_for_bb_pro_loaded' ) || did_action( 'xpro_beaver_themer_loaded' ) || did_action( 'xpro_gallery_for_bb_pro_loaded' ) || did_action( 'xpro_portfolio_for_bb_pro_loaded' ) || did_action( 'xpro_slider_for_bb_pro_loaded' ) || did_action( 'xpro_themes_for_bb_pro_loaded' ) ) {
                add_submenu_page('xpro_dashboard_welcome', 'Settings', 'Settings', 'manage_options', 'xpro_settings_for_beaver', 'xpro_settings_for_beaver', 55);

            }
        }

        public static function enqueue_xpro_admin_styles()
        {
            wp_enqueue_style('xpro-grid', XPRO_ADDONS_FOR_BB_URL . 'assets/css/xpro-grid.min.css', array());
            wp_enqueue_style('xpro-admin-style-lite', XPRO_ADDONS_FOR_BB_URL . 'assets/css/xpro-admin-style-lite.css', array());
            wp_enqueue_style('xpro-icons-min', XPRO_ADDONS_FOR_BB_URL . 'assets/css/xpro-icons.min.css', array());
            wp_enqueue_style('owl-theme-default', XPRO_ADDONS_FOR_BB_URL . 'assets/css/owl.theme.default.css', array());
            wp_enqueue_style('owl-carousel', XPRO_ADDONS_FOR_BB_URL . 'assets/css/owl.carousel.min.css', array());

            wp_enqueue_script('xpro-admin-script-lite', XPRO_ADDONS_FOR_BB_URL . 'assets/js/xpro-admin-script-lite.js', array('jquery'), null, true);
            wp_enqueue_script('isotope-pkgd-min', XPRO_ADDONS_FOR_BB_URL . 'assets/js/isotope.pkgd.min.js', array('jquery'), null, true);
            wp_enqueue_script('owlcarousel-filter', XPRO_ADDONS_FOR_BB_URL . 'assets/js/owlcarousel-filter.min.js', array('jquery'), '2.3.4', true);
            wp_enqueue_script('owl-carousel', XPRO_ADDONS_FOR_BB_URL . 'assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
            wp_enqueue_script('in-view', XPRO_ADDONS_FOR_BB_URL . 'assets/js/in-view.min.js', array('jquery'), null, true);
        }

        public static function enqueue_xpro_wp_admin_icon_styles() {

            wp_enqueue_style('xpro-wp-admin-menu-icon', XPRO_ADDONS_FOR_BB_URL . 'assets/css/xpro-wp-admin-menu-icon.css', array());

        }

        static public function includes()
        {
            require_once XPRO_ADDONS_FOR_BB_DIR . 'dashboard/dashboard.php';
            require_once XPRO_ADDONS_FOR_BB_DIR . 'classes/class-xpro-plugins-helper.php';
            require_once XPRO_ADDONS_FOR_BB_DIR . 'dashboard/xpro-dashboard-setting.php';
            require_once XPRO_ADDONS_FOR_BB_DIR . 'dashboard/xpro-modules-list.php';
            require_once XPRO_ADDONS_FOR_BB_DIR . 'dashboard/xpro-features-list.php';
            if( ! did_action( 'xpro_themes_for_bb_pro_loaded' ) ) {
                require_once XPRO_ADDONS_FOR_BB_DIR . 'dashboard/xpro-templates-setting.php';
            }
            if ( ! did_action( 'xpro_addons_for_bb_pro_loaded' ) && ! did_action( 'xpro_beaver_themer_loaded' ) && ! did_action( 'xpro_gallery_for_bb_pro_loaded' ) && ! did_action( 'xpro_portfolio_for_bb_pro_loaded' ) && ! did_action( 'xpro_slider_for_bb_pro_loaded' ) && ! did_action( 'xpro_themes_for_bb_pro_loaded' ) ) {
                require_once XPRO_ADDONS_FOR_BB_DIR . 'classes/class-xpro-templates-liberary.php';
                //var_dump("I am loaded");
            }

        }

        /**
         * Plugin action links.
         *
         * Adds action links to the plugin list table
         *
         * Fired by `plugin_action_links` filter.
         *
         * @param array $links An array of plugin action links.
         *
         * @return array An array of plugin action links.
         * @since 1.5.0
         * @access public
         *
         */
        static public function plugin_action_links( $links ) {

            $settings_link = sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=xpro_dashboard_welcome' ), esc_html__( 'Settings', 'xpro-bb-addons' ) );

            array_unshift( $links, $settings_link );

            if ( did_action( 'xpro_addons_for_bb_pro_loaded' ) ) {
                $links['rate_us'] = sprintf( '<a href="%1$s" target="_blank" class="xpro-beaver-addons-gopro">%2$s</a>', 'https://wordpress.org/plugins/xpro-addons-beaver-builder-elementor/#reviews', esc_html__( 'Rate Us', 'xpro-bb-addons' ) );
            } else {
                $links['go_pro'] = sprintf( '<a href="%1$s" target="_blank" class="xpro-beaver-addons-gopro">%2$s</a>', 'https://beaver.wpxpro.com/bundle-pricing/', esc_html__( 'Go Pro', 'xpro-bb-addons' ) );
            }

            return $links;
        }

        static public function xpro_add_custom_upload_mimes($existing_mimes) {
            $existing_mimes['otf'] = 'application/x-font-otf';
            $existing_mimes['woff'] = 'application/x-font-woff';
            $existing_mimes['woff2'] = 'application/x-font-woff2';
            $existing_mimes['ttf'] = 'application/x-font-ttf';
            $existing_mimes['svg'] = 'image/svg+xml';
            $existing_mimes['eot'] = 'application/vnd.ms-fontobject';
            $existing_mimes['json'] = 'application/json';
            return $existing_mimes;
        }

    }
}

Xpro_Bundle_Lite_For_WP_Init::init();
