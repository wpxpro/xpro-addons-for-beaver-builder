<?php

class Xpro_Beaver_Modules_List
{


    /**
     * Instance
     *
     * @since 1.5.0
     * @access private
     * @static
     *
     * @var Xpro_Beaver_Modules_List The single instance of the class.
     */

    private static $instance = null;
    private static $list = array(
        'tnit-advanced-menu' => array(
            'slug' => 'tnit_advanced_menu',
            'title' => 'Menu',
            'package' => 'free',
        ),
        'tnit-adv-infobox' => array(
            'slug' => 'tnit_adv_infobox',
            'title' => 'Info Box',
            'package' => 'free',
        ),
        'xpro-simple-heading' => array(
            'slug' => 'xpro_simple_heading',
            'title' => 'Heading',
            'package' => 'free',
        ),
        'tnit-blog-posts' => array(
            'slug' => 'tnit_blog+posts',
            'title' => 'Posts',
            'package' => 'free',
        ),
        'tnit-button' => array(
            'slug' => 'tnit_button',
            'title' => 'Buttons',
            'package' => 'free',
        ),
        'tnit-contact-form' => array(
            'slug' => 'tnit_contact_form',
            'title' => 'Pricing',
            'package' => 'free',
        ),
        'tnit-flipbox' => array(
            'slug' => 'tnit_flipbox',
            'title' => 'Flipbox',
            'package' => 'free',
        ),
        'tnit-hover-card' => array(
            'slug' => 'Hover Card',
            'title' => 'Lottie',
            'package' => 'free',
        ),
        'tnit-icon-list' => array(
            'slug' => 'tnit_icon_list',
            'title' => 'Icon List',
            'package' => 'free',
        ),
        'tnit-photo' => array(
            'slug' => 'tnit-photo',
            'title' => 'Photo',
            'package' => 'free',
        ),
        'tnit-progress-bar' => array(
            'slug' => 'tnit_progress_bar',
            'title' => 'Progress Bar',
            'package' => 'free',
        ),
        'tnit-social-icons' => array(
            'slug' => 'tnit_social_icons',
            'title' => 'Social Icons',
            'package' => 'free',
        ),
        'tnit-spacer' => array(
            'slug' => 'tnit_spacer',
            'title' => 'Spacer',
            'package' => 'free',
        ),
        'xpro-drop-cap' => array(
            'slug' => 'xpro_drop_cap',
            'title' => 'Drop Cap',
            'package' => 'free',
        ),
        'tnit-team' => array(
            'slug' => 'tnit_team',
            'title' => 'Team',
            'package' => 'free',
        ),
        'xpro-info-list' => array(
            'slug' => 'xpro_info_list',
            'title' => 'Info List',
            'package' => 'free',
        ),
        'xpro-logo-grid' => array(
            'slug' => 'xpro_logo_grid',
            'title' => 'Logo Grid',
            'package' => 'free',
        ),
        'xpro-testimonial' => array(
            'slug' => 'xpro_testimonial',
            'title' => 'Testimonial',
            'package' => 'free',
        ),
        'xpro-author-bio' => array(
            'slug' => 'xpro_author_bio',
            'title' => 'Author Bio',
            'package' => 'free',
        ),
        'xpro-featured-image' => array(
            'slug' => 'xpro_featured_image',
            'title' => 'Featured Image',
            'package' => 'free',
        ),
        'xpro-post-comments' => array(
            'slug' => 'xpro_post_comments',
            'title' => 'Post Comments',
            'package' => 'free',
        ),
        'xpro-post-content' => array(
            'slug' => 'xpro_post_content',
            'title' => 'Post Content',
            'package' => 'free',
        ),
        'xpro-post-meta' => array(
            'slug' => 'xpro-post-meta',
            'title' => 'Post Meta',
            'package' => 'free',
        ),
        'xpro-post-navigation' => array(
            'slug' => 'xpro_post_navigation',
            'title' => 'Post Navigation',
            'package' => 'free',
        ),
        'xpro-post-title' => array(
            'slug' => 'xpro_post_title',
            'title' => 'Post Title',
            'package' => 'free',
        ),
        'xpro-woo-cart-button' => array(
            'slug' => 'xpro_woo_cart_button',
            'title' => 'Woo - Cart Button',
            'package' => 'free',
        ),
        'xpro-woo-product-description' => array(
            'slug' => 'xpro_woo_product_description',
            'title' => 'Woo - Product Description',
            'package' => 'free',
        ),
        'xpro-woo-product-meta' => array(
            'slug' => 'xpro_woo_product_meta',
            'title' => 'Woo - Product Meta',
            'package' => 'free',
        ),
        'xpro-woo-product-rating' => array(
            'slug' => 'xpro_woo_product_rating',
            'title' => 'Woo - Product Ratings',
            'package' => 'free',
        ),
        'xpro-woo-product-tabs' => array(
            'slug' => 'xpro_woo_product_tabs',
            'title' => 'Woo - Product Tabs',
            'package' => 'free',
        ),
        'xpro-woo-product-upsells' => array(
            'slug' => 'xpro_woo_product_upsells',
            'title' => 'Woo - Product Upsells',
            'package' => 'free',
        ),
        'xpro-woo-related-products' => array(
            'slug' => 'xpro_woo_related_products',
            'title' => 'Woo - Related Products',
            'package' => 'free',
        ),
        'xpro-woo-product-price' => array(
            'slug' => 'xpro_woo_product_price',
            'title' => 'Testimonial',
            'package' => 'free',
        ),
        'tnit-accordion' => array(
            'slug' => 'tnit_accordion',
            'title' => 'Accordion',
            'package' => 'pro-disabled',
        ),
        'tnit-before-after' => array(
            'slug' => 'tnit_before_after',
            'title' => 'Before After',
            'package' => 'pro-disabled',
        ),
        'tnit-counter' => array(
            'slug' => 'tnit_counter',
            'title' => 'Counter',
            'package' => 'pro-disabled',
        ),
        'tnit-dual-button' => array(
            'slug' => 'tnit_dual_button',
            'title' => 'Dual Button',
            'package' => 'pro-disabled',
        ),
        'tnit-dual-color-heading' => array(
            'slug' => 'tnit_dual_color_heading',
            'title' => 'Dual Color Heading',
            'package' => 'pro-disabled',
        ),
        'tnit-hamburger' => array(
            'slug' => 'tnit_hamburger',
            'title' => 'Advanced Heading',
            'package' => 'pro-disabled',
        ),
        'tnit-image-scroll' => array(
            'slug' => 'tnit_image_scroll',
            'title' => 'Image Scroll',
            'package' => 'pro-disabled',
        ),
        'tnit-restaurant-menu' => array(
            'slug' => 'tnit_restaurant_menu',
            'title' => 'Restaurant Menu',
            'package' => 'pro-disabled',
        ),
        'tnit-search-form' => array(
            'slug' => 'tnit_search_form',
            'title' => 'Search Form',
            'package' => 'pro-disabled',
        ),
        'tnit-sticky-button' => array(
            'slug' => 'tnit_sticky_button',
            'title' => 'Sticky Button',
            'package' => 'pro-disabled',
        ),
        'tnit-subscribe-form' => array(
            'slug' => 'tnit_subscribe_form',
            'title' => 'Subscribe Form',
            'package' => 'pro-disabled',
        ),
        'tnit-table' => array(
            'slug' => 'tnit_table',
            'title' => 'Table',
            'package' => 'pro-disabled',
        ),
        'tnit-team-carousel' => array(
            'slug' => 'tnit_team_carousel',
            'title' => 'Team Carousel',
            'package' => 'pro-disabled',
        ),
        'xpro-advance-tabs' => array(
            'slug' => 'xpro_advance_tabs',
            'title' => 'Dual Button',
            'package' => 'pro-disabled',
        ),
        'xpro-announcement-bar' => array(
            'slug' => 'xpro_announcement_bar',
            'title' => 'Announcement Bar',
            'package' => 'pro-disabled',
        ),
        'xpro-blog-posts' => array(
            'slug' => 'xpro_blog_posts',
            'title' => 'Blog Posts',
            'package' => 'pro-disabled',
        ),
        'xpro-contact-form7' => array(
            'slug' => 'xpro_contact_form7',
            'title' => 'Contact Form 7',
            'package' => 'pro-disabled',
        ),
        'xpro-content-toggle' => array(
            'slug' => 'xpro_content_toggle',
            'title' => 'Content Toggle',
            'package' => 'pro-disabled',
        ),
        'xpro-countdown' => array(
            'slug' => 'xpro_countdown',
            'title' => 'Countdown',
            'package' => 'pro-disabled',
        ),
        'xpro-device-slider' => array(
            'slug' => 'xpro_device_slider',
            'title' => 'Device Slider',
            'package' => 'pro-disabled',
        ),
        'xpro-horizontal-menu' => array(
            'slug' => 'xpro_horizontal_menu',
            'title' => 'Horizontal Menu',
            'package' => 'pro-disabled',
        ),
        'xpro-horizontal-timeline' => array(
            'slug' => 'xpro_horizontal_timeline',
            'title' => 'Horizontal Timeline',
            'package' => 'pro-disabled',
        ),
        'xpro-hot-spot' => array(
            'slug' => 'xpro_hot_spot',
            'title' => 'Hot Spot',
            'package' => 'pro-disabled',
        ),
        'xpro-icon-box' => array(
            'slug' => 'xpro_icon_box',
            'title' => 'Icon Box',
            'package' => 'pro-disabled',
        ),
        'xpro-image-masking' => array(
            'slug' => 'xpro_image_masking',
            'title' => 'Image Masking',
            'package' => 'pro-disabled',
        ),
        'xpro-logo-carousel' => array(
            'slug' => 'xpro_logo_carousel',
            'title' => 'Logo Carousel',
            'package' => 'pro-disabled',
        ),
        'xpro-lottie' => array(
            'slug' => 'xpro_lottie',
            'title' => 'Lottie',
            'package' => 'pro-disabled',
        ),
        'xpro-modal-popup' => array(
            'slug' => 'xpro_modal_popup',
            'title' => 'Modal Popup',
            'package' => 'pro-disabled',
        ),
        'xpro-news-ticker' => array(
            'slug' => 'xpro_news_ticker',
            'title' => 'News Ticker',
            'package' => 'pro-disabled',
        ),
        'xpro-ninja-form' => array(
            'slug' => 'xpro_ninja_form',
            'title' => 'Post Tiles',
            'package' => 'pro-disabled',
        ),
        'xpro-one-page-navigation' => array(
            'slug' => 'xpro_one_page_navigation',
            'title' => 'One Page Navigation',
            'package' => 'pro-disabled',
        ),
        'xpro-pricing-table' => array(
            'slug' => 'xpro_pricing_table',
            'title' => 'Pricing Table',
            'package' => 'pro-disabled',
        ),
        'xpro-social-share' => array(
            'slug' => 'xpro_social_share',
            'title' => 'Social Share',
            'package' => 'pro-disabled',
        ),
        'xpro-testimonial-carousel' => array(
            'slug' => 'xpro_testimonial_carousel',
            'title' => 'Testimonial Carousel',
            'package' => 'pro-disabled',
        ),
        'xpro-unfold' => array(
            'slug' => 'xpro_unfold',
            'title' => 'Unfold',
            'package' => 'pro-disabled',
        ),
        'xpro-vertical-menu' => array(
            'slug' => 'xpro_vertical_menu',
            'title' => 'Vertical Menu',
            'package' => 'pro-disabled',
        ),
        'xpro-vertical-timeline' => array(
            'slug' => 'xpro_vertical_timeline',
            'title' => 'Vertical Timeline',
            'package' => 'pro-disabled',
        ),
        'xpro-video' => array(
            'slug' => 'xpro_video',
            'title' => 'Video',
            'package' => 'pro-disabled',
        ),
        'xpro-wpforms' => array(
            'slug' => 'xpro-wpforms',
            'title' => 'WP Forms',
            'package' => 'pro-disabled',
        ),
    );

    /**
     * Check if a widget is active or not, free package are considered inactive
     *
     *
     * @param $widget - widget slug
     *
     * @return bool
     */
    public function is_active($widget)
    {

        $act = self::instance()->get_list(true, $widget, 'active');

        return empty($act['package']) ? false : (('free' === $act['package'] || 'pro-disabled' === $act['package']));
    }

    /**
     *
     * Usage :
     *  get full list >> get_list() []
     *  get full list of active widgets >> get_list(true, '', 'active') // []
     *  get specific widget data >> get_list(true, 'image-accordion') [] or false
     *  get specific widget data (if active) >> get_list(true, 'image-accordion', 'active') [] or false
     *
     * @param bool $filtered
     * @param string $widget
     * @param string $check_method - active|list
     *
     * @return array|bool|mixed
     */
    public function get_list($filtered = true, $widget = '', $check_method = 'list')
    {
        $all_list = self::$list;

        if (true === $filtered) {
            $all_list = apply_filters('xpro_elementor_addons_widgets_list', self::$list);
        }

        if (did_action('xpro_addons_for_bb_pro_loaded')) {
            $widget_pro =Xpro_Beaver_Modules_Pro_List::instance()->get_list();
            $all_list = array_merge($all_list, $widget_pro);
        }

        if ('active' === $check_method) {
            $active_list = Xpro_Beaver_Dashboard::instance()->utils->get_option('Xpro_Beaver_Modules_List', array_keys($all_list));

            foreach ($all_list as $widget_slug => $info) {
                if (!in_array($widget_slug, $active_list, true)) {
                    unset($all_list[$widget_slug]);
                }
            }
        }

        if ('' !== $widget) {
            return (isset($all_list[$widget]) ? $all_list[$widget] : false);
        }

        return $all_list;
    }

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @return Xpro_Beaver_Modules_List An instance of the class.
     * @since 1.2.0
     * @access public
     *
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
