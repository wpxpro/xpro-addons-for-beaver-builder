<?php

/**
 * @class XPROIconBoxModule
 *
 */

if (!class_exists('XPROPostContentModule')) {

    class XPROPostContentModule extends FLBuilderModule
    {

        /**
         * @method __construct
         *
         */
        public function __construct()
        {
            parent::__construct(array(
                'name'          => __('Post Content', 'xpro-addons'),
                'description'   => __('An example for coding new modules.', 'xpro-addons'),
                'group'         => XPRO_Plugins_Helper::$branding_modules,
                'category'      => XPRO_Plugins_Helper::$themer_modules,
                'dir'           => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-post-content/',
                'url'           => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-post-content/',
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
    FLBuilder::register_module('XPROPostContentModule', array(
        'general'       => array(
            'title'         => __('General', 'xpro-addons'),
            'sections'      => array(
                'content'       => array(
                    'title'         => __('General', 'xpro-addons'),
                    'fields'        => array(
                        'content_type' => array(
                            'type'          => 'select',
                            'label'         => __('Content Type', 'xpro-addons'),
                            'default'       => 'full',
                            'options'       => array(
                                'excerpt'      => __('Excerpt', 'xpro-addons'),
                                'full'      => __('Full Content', 'xpro-addons')
                            ),
                            'toggle'        => array(
                                'excerpt'      => array(
                                    'fields'        => array('limit'),
                                ),
                            )
                        ),
                        'limit' => array(
                            'type'         => 'unit',
                            'label'        => __('Excerpt', 'xpro-addons'),
                            'responsive' => true,
                            'default' => 10,
                            'slider' => true,
                            'ms'    => array(
                                'min' => 0,
                                'max' => 100,
                                'step'    => 1,
                            ),
                        ),
                        'align' => array(
                            'type'    => __('align', 'xpro-addons'),
                            'label'   => 'Alignment',
                            'default' => 'left',
                            'responsive' => true,
                        ),
                    )
                ),
            )
        ),
        'style'       => array(
            'title'         => __('Style', 'xpro-addons'),
            'sections'      => array(
                'title'       => array(
                    'title'         => __('Title', 'xpro-addons'),
                    'fields'        => array(
                        'content_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-post-content',
                            ),
                        ),
                        'content_color' => array(
                            'type'          => 'color',
                            'label'         => __('Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'     => '.xpro-post-content',
                                'property'     => 'color'
                            ),
                        ),
                        'link_content_type' => array(
                            'type'          => 'select',
                            'label'         => __('Color Type', 'xpro-addons'),
                            'default'       => 'before-title',
                            'options'       => array(
                                'normal'      => __('Normal', 'xpro-addons'),
                                'hover'      => __('Hover', 'xpro-addons')
                            ),
                            'toggle'        => array(
                                'normal'      => array(
                                    'fields'        => array('link_color'),
                                ),
                                'hover'      => array(
                                    'fields'        => array('link_hv_color'),
                                ),
                            )
                        ),
                        'link_color' => array(
                            'type'          => 'color',
                            'label'         => __('Link Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'     => 'a',
                                'property'     => 'color'
                            ),
                        ),
                        'link_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __('Link Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'selector'     => 'a:hover',
                                'property'     => 'color'
                            ),
                        ),
                    )
                ),
            )
        ),
    ));
}
