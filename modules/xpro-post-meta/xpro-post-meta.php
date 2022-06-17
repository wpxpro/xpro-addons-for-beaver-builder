<?php

/**
 * @class XPROPostMetaModule
 *
 */
if (!class_exists('XPROPostMetaModule')) {

    class XPROPostMetaModule extends FLBuilderModule
    {
        /**
         * @method __construct
         *
         */
        public function __construct()
        {
            parent::__construct(array(
                'name'          => __('Post Meta', 'xpro-addons'),
                'description'   => __('An example for coding new modules.', 'xpro-addons'),
                'group'         => XPRO_Plugins_Helper::$branding_modules,
                'category'      => XPRO_Plugins_Helper::$themer_modules,
                'dir'           => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-post-meta/',
                'url'           => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-post-meta/',
                'partial_refresh'     => true,
            ));
        }

        /**
         * @method enqueue_scripts
         *
         */
        public function enqueue_scripts()
        {
            // Already registered
            $this->add_css('font-awesome');
            $this->add_css('font-awesome-5');
            $this->add_css('foundation-icons');
            $this->add_css('ultimate-icons');
        }


        /**
         * Get First/Current Post id
         *
         * @method @get_post_id
         */
        public static function get_post_id($i)
        {

            global $wpdb;
            global $post;

            $post_type = $post->post_type;
            //fetching first post id if post type is 'xpro-themer'
            if ($post_type == "xpro-themer") {
                $type = 'post';
                $first_posts = $wpdb->get_results($wpdb->prepare("
                SELECT ID FROM {$wpdb->posts}
                WHERE post_type = %s AND post_status = 'publish' 
                ORDER BY post_date ASC limit 1", $type));

                foreach ($first_posts as $f_post) {
                    $f_post_id = $f_post->ID;
                }
            }

            if ($post->post_type == "xpro-themer") {
                $post_id = $f_post_id;
            } else {
                $post_id = $post->ID;
            }

            return $post_id;
        }
    }

    /**
     * Register the module and its form settings.
     */
    FLBuilder::register_module('XPROPostMetaModule', array(
        'general'       => array(
            'title'         => __('General', 'xpro-addons'),
            'sections'      => array(
                'content'       => array(
                    'title'         => __('', 'xpro-addons'),
                    'fields'        => array(
                        'display_date'         => array(
                            'type'       => 'select',
                            'label'      => __('Display Date?', 'xpro'),
                            'default' => 'yes',
                            'options' => array(
                                'yes' => __('Yes', 'xpro'),
                                'no'  => __('No', 'xpro'),
                            ),
                        ),
                        'display_taxonomy'         => array(
                            'type'       => 'select',
                            'label'      => __('Display Taxonomy?', 'xpro'),
                            'default' => 'yes',
                            'options' => array(
                                'yes' => __('Yes', 'xpro'),
                                'no'  => __('No', 'xpro'),
                            ),
                        ),
                        'display_comment'         => array(
                            'type'       => 'select',
                            'label'      => __('Display Comment?', 'xpro'),
                            'default' => 'yes',
                            'options' => array(
                                'yes' => __('Yes', 'xpro'),
                                'no'  => __('No', 'xpro'),
                            ),
                        ),
                        'display_author'         => array(
                            'type'       => 'select',
                            'label'      => __('Display Author?', 'xpro'),
                            'default' => 'yes',
                            'options' => array(
                                'yes' => __('Yes', 'xpro'),
                                'no'  => __('No', 'xpro'),
                            ),
                        ),
                        'meta_color' => array(
                            'type'        => 'color',
                            'connections' => array('color'),
                            'label'       => __('Meta Color', 'xpro'),
                            'show_reset'  => true,
                            'show_alpha'  => true,
                        ),
                        'meta_link_color' => array(
                            'type'        => 'color',
                            'connections' => array('color'),
                            'label'       => __('Meta Link Color', 'xpro'),
                            'show_reset'  => true,
                            'show_alpha'  => true,
                        ),
                        'border_color' => array(
                            'type'        => 'color',
                            'connections' => array('color'),
                            'label'       => __('Border Color', 'xpro'),
                            'show_reset'  => true,
                            'show_alpha'  => true,
                        ),
                        'space_btw' => array(
                            'type'       => 'unit',
                            'label'      => __('Space Between', 'xpro'),
                            'units'      => array('px'),
                            'slider'     => true,
                        ),
                    ),
                ),
            )
        ),
        'typo'       => array(
            'title'         => __('Typography', 'xpro-addons'),
            'sections'      => array(
                'title'       => array(
                    'title'         => __('Typography', 'xpro-addons'),
                    'fields'        => array(
                        'meta_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Meta Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-post-meta-cls li',
                            ),
                        ),
                        'meta_typography_link' => array(
                            'type'       => 'typography',
                            'label'      => 'Meta Link Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-post-meta-cls li a',
                            ),
                        ),
                    )
                ),
            )
        ),
    ));
}
