<?php

/**
 * @class XPROIconBoxModule
 *
 */

if (!class_exists('XPROAuthorBioModule')) {

    class XPROAuthorBioModule extends FLBuilderModule
    {

        /**
         * @method __construct
         *
         */
        public function __construct()
        {
            parent::__construct(array(
                'name'          => __('Author Bio', 'xpro-addons'),
                'description'   => __('An example for coding new modules.', 'xpro-addons'),
                'group'           => XPRO_Plugins_Helper::$branding_modules,
                'category'        => XPRO_Plugins_Helper::$themer_modules,
                'dir'           => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-author-bio/',
                'url'           => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-author-bio/',
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

        public function render_image()
        {
            $settings = $this->settings;

            $output = '';
            $alt = '';
            $image_src = '';

            $photo = FLBuilderPhoto::get_attachment_data($settings->general_image);

            if (!empty($photo->alt)) {
                $alt = htmlspecialchars($photo->alt);
            } else if (!empty($photo->description)) {
                $alt = htmlspecialchars($photo->description);
            } else if (!empty($photo->caption)) {
                $alt = htmlspecialchars($photo->caption);
            } else if (!empty($photo->title)) {
                $alt = htmlspecialchars($photo->title);
            }

            // get image from media library
            if ('custom' == $settings->source && !empty($settings->author_avatar_src)) {
                $image_src = $settings->author_avatar_src;
            } else {
                $image_src = XPRO_ADDONS_FOR_BB_URL . 'assets/images/placeholder-sm.webp';
            }

            $output .= '<img src="' . esc_url($image_src) . '" alt="' . $alt . '">';

            echo $output;
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
    FLBuilder::register_module('XPROAuthorBioModule', array(
        'general'       => array(
            'title'         => __('General', 'xpro-addons'),
            'sections'      => array(
                'content'       => array(
                    'title'         => __('General', 'xpro-addons'),
                    'fields'        => array(
                        'source' => array(
                            'type'          => 'select',
                            'label'         => __('Source', 'xpro-addons'),
                            'default'       => 'current',
                            'options'       => array(
                                'current'      => __('Current Author', 'xpro-addons'),
                                'custom'      => __('Custom', 'xpro-addons'),
                            ),
                            'toggle'        => array(
                                'current'      => array(
                                    'fields'        => array('show_avatar', 'show_name', 'link_to', 'show_biography'),
                                ),
                                'custom'      => array(
                                    'fields'        => array(
                                        'author_avatar', 'author_name', 'author_website',
                                        'author_bio', 'posts_url'
                                    ),
                                ),
                            )
                        ),
                        'show_avatar' => array(
                            'type'          => 'select',
                            'label'         => __('Avatar', 'xpro-addons'),
                            'default'       => '1',
                            'render_type' => 'template',
                            'options'       => array(
                                '1'      => __('Show', 'xpro-addons'),
                                '0'      => __('Hide', 'xpro-addons'),
                            ),
                        ),
                        'author_avatar' => array(
                            'type'          => 'photo',
                            'label'         => __('Avatar Image', 'xpro-addons'),
                            'show_remove'   => true,
                        ),
                        'show_name' => array(
                            'type'          => 'select',
                            'label'         => __('Name', 'xpro-addons'),
                            'default'       => '1',
                            'render_type' => 'template',
                            'options'       => array(
                                '1'      => __('Show', 'xpro-addons'),
                                '0'      => __('Hide', 'xpro-addons'),
                            ),
                        ),
                        'author_name' => array(
                            'type'          => 'text',
                            'label'         => __('Title', 'xpro-addons'),
                            'default'       => __('John Walker', 'xpro-addons'),
                            'placeholder'   => __('Write Your Name', 'xpro-addons'),
                        ),
                        'title_tag' => array(
                            'type'          => 'select',
                            'label'         => __('HTML Title Tag', 'xpro-addons'),
                            'default'       => 'h3',
                            'options'       => array(
                                'h1'      => __('H1', 'xpro-addons'),
                                'h2'      => __('H2', 'xpro-addons'),
                                'h3'      => __('H3', 'xpro-addons'),
                                'h4'      => __('H4', 'xpro-addons'),
                                'h5'      => __('H5', 'xpro-addons'),
                                'h6'      => __('H6', 'xpro-addons'),
                            ),
                        ),
                        'show_biography' => array(
                            'type'          => 'select',
                            'label'         => __('Biography', 'xpro-addons'),
                            'default'       => '1',
                            'options'       => array(
                                '1'      => __('Show', 'xpro-addons'),
                                '0'      => __('Hide', 'xpro-addons'),
                            ),
                        ),
                        'author_bio' => array(
                            'type'          => 'textarea',
                            'label'         => __('Biography', 'xpro-addons'),
                            'default'       => 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor',
                            'maxlength'       => '255',
                            'rows'          => '3'
                        ),
                        'show_link' => array(
                            'type'          => 'select',
                            'label'         => __('Archive Button', 'xpro-addons'),
                            'default'       => '0',
                            'options'       => array(
                                '1'      => __('Show', 'xpro-addons'),
                                '0'      => __('Hide', 'xpro-addons'),
                            ),
                            'toggle'        => array(
                                '1'      => array(
                                    'fields'        => array('link_text', 'posts_url'),
                                ),
                            )
                        ),
                        'link_text' => array(
                            'type'          => 'text',
                            'label'         => __('Button Text', 'xpro-addons'),
                            'default'       => 'View All Posts',
                        ),
                        'posts_url' => array(
                            'type'          => 'link',
                            'label'         =>  __('Archive Link', 'xpro-addons'),
                            'show_target'   => true,
                            'show_nofollow' => true,
                            'placeholder'   => __('https://beaver.wpxpro.com', 'xpro-addons'),
                        ),
                        'align' => array(
                            'type'          => 'select',
                            'label'         => __('Alignment', 'xpro-addons'),
                            'default'       => 'left',
                            'options'       => array(
                                'left'      => __('Left', 'xpro-addons'),
                                'center'      => __('Above', 'xpro-addons'),
                                'right'      => __('Right', 'xpro-addons'),
                            ),
                        ),
                    )
                ),
            )
        ),
        'style'       => array(
            'title'         => __('Style', 'xpro-addons'),
            'sections'      => array(
                'image'       => array(
                    'title'         => __('Image', 'xpro-addons'),
                    'fields'        => array(
                        'author_width' => array(
                            'type'         => 'unit',
                            'label'        => 'Width',
                            'responsive' => 'true',
                            'units'          => array('px', '%'),
                            'default_unit' => 'px',
                            'slider' => array(
                                'px'    => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step'    => 1,
                                ),
                                '%'    => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step'    => 1,
                                ),
                            ),
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-author-box-avatar > img',
                                'property'      => 'width',
                            ),
                        ),
                        'author_Height' => array(
                            'type'         => 'unit',
                            'label'        => 'Height',
                            'responsive' => 'true',
                            'units'          => array('px', '%'),
                            'default_unit' => 'px',
                            'slider' => array(
                                'px'    => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step'    => 1,
                                ),
                                '%'    => array(
                                    'min' => 0,
                                    'max' => 1000,
                                    'step'    => 1,
                                ),
                            ),
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-author-box-avatar > img',
                                'property'      => 'Height',
                            ),
                        ),
                        'author_border' => array(
                            'type'       => 'border',
                            'label'      => 'Border',
                            'units'          => array('px', '%'),
                            'responsive' => true,
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-avatar > img',
                                'property' => 'border'
                            ),
                        ),
                        'author_margin' => array(
                            'type'        => 'dimension',
                            'label'       => 'Margin',
                            'responsive' => 'true',
                            'units'          => array('px', '%'),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-avatar > img',
                                'property'     => 'margin'
                            )
                        ),
                    )
                ),
                'title'       => array(
                    'title'         => __('Title', 'xpro-addons'),
                    'collapsed'     => true,
                    'fields'        => array(
                        'title_color' => array(
                            'type'          => 'color',
                            'label'         => __('Text Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-name',
                                'property' => 'color',
                            ),
                        ),
                        'title_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-name',
                            ),
                        ),
                        'title_margin' => array(
                            'type'        => 'dimension',
                            'label'       => 'Margins',
                            'units'       => array('px', '%'),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-name',
                                'property'     => 'margin'
                            ),
                        ),
                    ),
                ),
                'biography'       => array(
                    'title'         => __('Biography', 'xpro-addons'),
                    'collapsed'     => true,
                    'fields'        => array(
                        'Bio_color' => array(
                            'type'          => 'color',
                            'label'         => __('Text Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-bio',
                                'property' => 'color',
                            ),
                        ),
                        'Bio_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-bio',
                            ),
                        ),
                        'Bio_margin' => array(
                            'type'        => 'dimension',
                            'label'       => 'Margins',
                            'units'       => array('px', '%'),
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-bio',
                                'property'     => 'margin'
                            ),
                        ),
                    )
                ),
                'button'       => array(
                    'title'         => __('Button', 'xpro-addons'),
                    'collapsed'     => true,
                    'fields'        => array(
                        'button_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button',
                            ),
                        ),
                        'button_bg_type' => array(
                            'type'          => 'select',
                            'label'         => __('Background Type', 'xpro-addons'),
                            'default'       => 'normal',
                            'options'       => array(
                                'normal'      => __('Normal', 'xpro-addons'),
                                'hover'      => __('Hover', 'xpro-addons')
                            ),
                            'toggle'        => array(
                                'normal'      => array(
                                    'fields'        => array('button_color', 'button_bg_color'),
                                ),
                                'hover'      => array(
                                    'fields'        => array('button_hv_color', 'button_bg_hv_color', 'button_border_hv_color'),
                                ),
                            )
                        ),
                        'button_color' => array(
                            'type'          => 'color',
                            'label'         => __('Text Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button',
                                'property' => 'color',
                            ),
                        ),
                        'button_bg_color' => array(
                            'type'          => 'color',
                            'label'         => __('Background Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button',
                                'property' => 'background-color',
                            ),
                        ),
                        'button_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __('Text Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button:hover, .xpro-author-box-button:focus',
                                'property' => 'color',
                            ),
                        ),
                        'button_bg_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __('Background Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button:hover, .xpro-author-box-button:focus',
                                'property' => 'background-color',
                            ),
                        ),
                        'button_border_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __('Border Color', 'xpro-addons'),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => '.xpro-author-box-button:hover, .xpro-author-box-button:focus',
                                'property' => 'border-color',
                            ),
                        ),
                        'button_border' => array(
                            'type'       => 'border',
                            'label'      => 'Border',
                            'responsive' => true,
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-button',
                                'property' => 'border'
                            ),
                        ),
                        'button_padding' => array(
                            'type'        => 'dimension',
                            'label'       => 'Padding',
                            'responsive' => 'true',
                            'units'          => array('px', '%'),
                            'slider' => true,
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-button',
                                'property'     => 'padding'
                            ),
                        ),
                        'button_margin' => array(
                            'type'        => 'dimension',
                            'label'       => 'Margin',
                            'responsive' => 'true',
                            'units'          => array('px', '%'),
                            'slider' => true,
                            'preview'    => array(
                                'type'     => 'css',
                                'selector' => '.xpro-author-box-button',
                                'property'     => 'margin'
                            ),
                        ),
                    ),
                ),
            )
        ),
    ));
}
