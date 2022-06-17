<?php
/**
 * @class TNITBlogPostsModule
 *
 */

class TNITBlogPostsModule extends FLBuilderModule {

    /**
     * @method __construct
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Posts', 'xpro-bb-addons' ),
            'description' 	  => __( 'An awesome addition by Xpro team!', 'xpro-bb-addons' ),
            'group'           => XPRO_Plugins_Helper::$branding_modules,
            'category'        => XPRO_Plugins_Helper::$creative_modules,
            'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/tnit-blog-posts/',
            'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/tnit-blog-posts/',
            'partial_refresh' 	=> true,
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

        // Register and enqueue your own
        $this->add_css('animate', XPRO_ADDONS_FOR_BB_URL . 'assets/css/animate.css');
    }

    /**
     * Renders the featured image for a post.
     *
     * @since 1.0.28
     * @param string|array $position
     * @return void
     */
    public function render_featured_image() {

        $settings = $this->settings;
        $fallback = ! has_post_thumbnail() && '' !== $settings->image_fallback && $settings->show_image ? true : false;

        if ( ( has_post_thumbnail() || $fallback ) && $settings->show_image ) {

            include $this->dir . 'includes/featured-image.php';
        }
    }

    /**
     * Renders the_content for a post.
     *
     * @since 1.0.28
     * @return void
     */
    public function render_content() {
        ob_start();
        the_content();
        $content = ob_get_clean();

        if ( ! empty( $this->settings->content_length ) ) {
            $content = wpautop( wp_trim_words( $content, $this->settings->content_length, '...' ) );
        }

        echo $content;
    }

    /**
     * Renders the_excerpt for a post.
     *
     * @since 1.0.28
     * @return void
     */
    public function render_excerpt() {
        if ( ! empty( $this->settings->content_length ) ) {
            add_filter( 'excerpt_length', array( $this, 'set_custom_excerpt_length' ), 9999 );
        }

        the_excerpt();

        if ( ! empty( $this->settings->content_length ) ) {
            remove_filter( 'excerpt_length', array( $this, 'set_custom_excerpt_length' ), 9999 );
        }
    }

    /**
     * Renders the excerpt for a post.
     *
     * @since 1.0.28
     * @return void
     */
    public function set_custom_excerpt_length( $length ) {
        return $this->settings->content_length;
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'TNITBlogPostsModule', array(
    'general'      => array(
        'title'      => __( 'General', 'xpro-bb-addons' ),
        'sections'     => array(
            'general'       => array(
                'title'         => 'General Settings',
                'fields'        => array(
                    'layout_style' => array(
                        'type'    		=> 'select',
                        'label'   		=> __( 'Layout Style', 'xpro-bb-addons' ),
                        'default' 		=> '1',
                        'options' 		=> array(
                            '1' 	=> __( 'Style 1', 'xpro-bb-addons' ),
                            '2' 	=> __( 'Style 2', 'xpro-bb-addons' ),
                            '3' 	=> __( 'Style 3', 'xpro-bb-addons' ),
                            '4' 	=> __( 'Style 4', 'xpro-bb-addons' ),
                        ),
                        'toggle'		=> array(
                            '1' 	=> array(
                                'fields' 	=> array( 'overall_alignment' ),
                                'sections' 	=> array( 'meta_info' ),
                            ),
                            '2' 	=> array(
                                'fields' 	=> array( 'overall_alignment' ),
                                'sections' 	=> array( 'meta_info' ),
                            ),
                            '3' 	=> array(
                                'sections' 	=> array( 'categories', 'author', 'separator' ),
                            ),
                            '4' 	=> array(
                                'fields' 	=> array( 'post_height' ),
                                'sections' 	=> array( 'categories', 'author', 'meta_date' ),
                            ),
                        ),
                    ),
                    'post_height' 		=> array(
                        'type' 			=> 'unit',
                        'label'       	=> __( 'Height', 'xpro-bb-addons' ),
                        'units'        	=> array('px'),
                        'placeholder'   => '400',
                        'slider'      	=> true,
                        'responsive'    => true,
                    ),
                    'number_of_posts' 		=> array(
                        'type' 			=> 'unit',
                        'label'       	=> __( 'Number of Posts', 'xpro-bb-addons' ),
                        'units'        	=> array('px'),
                        'placeholder'   => '3',
                        'slider'      	=> true,
                        'responsive'    => true,
                        'help' 			=> __( 'This is how many posts you want to show in a row on desktop, tablet and mobile.', 'xpro-bb-addons' ),
                    ),
                    'posts_spacing' 		=> array(
                        'type' 			=> 'unit',
                        'label'       	=> __( 'Spacing', 'xpro-bb-addons' ),
                        'units'        	=> array('px'),
                        'placeholder'   => '30',
                        'slider'      	=> true,
                        'responsive'    => true,
                        'help' 			=> __( 'Spacing between posts.', 'xpro-bb-addons' ),
                    ),
                ),
            ),
            'featured_image'   => array(
                'title'  => __( 'Featured Image', 'xpro-bb-addons' ),
                'fields' => array(
                    'show_image'          => array(
                        'type'    => 'select',
                        'label'   => __( 'Image', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                        'toggle'		=> array(
                            '1' 	=> array(
                                'fields' 		=> array( 'image_size', 'image_fallback' ),
                            ),
                        ),
                    ),
                    'image_size'          => array(
                        'type'    => 'photo-sizes',
                        'label'   => __( 'Image Size', 'xpro-bb-addons' ),
                        'default' => 'medium',
                    ),
                    'image_fallback'      => array(
                        'default'     => '',
                        'type'        => 'photo',
                        'show_remove' => true,
                        'label'       => __( 'Fallback Image', 'xpro-bb-addons' ),
                    ),
                ),
            ),
            'post_info'    => array(
                'title'  => __( 'Post Info', 'xpro-bb-addons' ),
                'fields' => array(
                    'show_author'        => array(
                        'type'    => 'select',
                        'label'   => __( 'Author', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                    ),
                    'show_date'          => array(
                        'type'    => 'select',
                        'label'   => __( 'Date', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                        'toggle'  => array(
                            '1' => array(
                                'fields' => array( 'date_format' ),
                            ),
                        ),
                    ),
                    'date_format'        => array(
                        'type'    => 'select',
                        'label'   => __( 'Date Format', 'xpro-bb-addons' ),
                        'default' => 'default',
                        'options' => array(
                            'default' => __( 'Default', 'xpro-bb-addons' ),
                            'M j, Y'  => date( 'M j, Y' ),
                            'F j, Y'  => date( 'F j, Y' ),
                            'm/d/Y'   => date( 'm/d/Y' ),
                            'm-d-Y'   => date( 'm-d-Y' ),
                            'd M Y'   => date( 'd M Y' ),
                            'd F Y'   => date( 'd F Y' ),
                            'Y-m-d'   => date( 'Y-m-d' ),
                            'Y/m/d'   => date( 'Y/m/d' ),
                        ),
                    ),
                    'show_categories' => array(
                        'type'    => 'select',
                        'label'   => __( 'Categories', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                    ),
                    'show_comments'      => array(
                        'type'    => 'select',
                        'label'   => __( 'Comments', 'xpro-bb-addons' ),
                        'default' => '0',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                    ),
                ),
            ),
            'content' => array(
                'title'  => __( 'Post Content', 'xpro-bb-addons' ),
                'fields' => array(
                    'show_content'   => array(
                        'type'    => 'select',
                        'label'   => __( 'Content', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                        'toggle'		=> array(
                            '1' 	=> array(
                                'fields' => array( 'content_type', 'content_length' ),
                            ),
                        ),
                    ),
                    'content_type'   => array(
                        'type'    => 'select',
                        'label'   => __( 'Content Type', 'xpro-bb-addons' ),
                        'default' => 'excerpt',
                        'options' => array(
                            'excerpt' => __( 'Excerpt', 'xpro-bb-addons' ),
                            'full'    => __( 'Full Text', 'xpro-bb-addons' ),
                        ),
                    ),
                    'content_length' => array(
                        'type'    => 'unit',
                        'label'   => __( 'Content Length', 'xpro-bb-addons' ),
                        'default' => '25',
                        'units'   => array( 'words' ),
                        'slider'  => true,
                    ),
                    'show_more_link' => array(
                        'type'    => 'select',
                        'label'   => __( 'More Link', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                        'toggle'  => array(
                            '1' => array(
                                'fields' => array( 'more_link_settings' ),
                            ),
                        ),
                    ),
                    'more_link_settings' => array(
                        'type'    		=> 'form',
                        'label'   		=> __( 'More Link Settings', 'xpro-bb-addons' ),
                        'form'          => 'tnit_more_link_form',
                        'preview_text'  => 'more_link_text',
                    ),
                ),
            ),
        ),
    ),
    'posts_query' => array(
        'title' => __( 'Query', 'xpro-bb-addons' ),
        'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
    ),
    'pagination' => array(
        'title'    => __( 'Pagination', 'xpro-bb-addons' ),
        'sections' => array(
            'pagination'       => array(
                'title'  => __( 'Pagination', 'xpro-bb-addons' ),
                'fields' => array(
                    'pagination'         => array(
                        'type'    => 'select',
                        'label'   => __( 'Pagination Style', 'xpro-bb-addons' ),
                        'default' => 'numbers',
                        'options' => array(
                            'numbers'   => __( 'Numbers', 'xpro-bb-addons' ),
                            'none'      => _x( 'None', 'Pagination style.', 'xpro-bb-addons' ),
                        ),
                        'toggle'  => array(
                            'numbers' => array(
                                'sections' => array( 'page_numbers_colors', 'page_numbers_border' ),
                            ),
                        ),
                    ),
                    'posts_per_page'     => array(
                        'type'    => 'unit',
                        'label'   => __( 'Posts Per Page', 'xpro-bb-addons' ),
                        'default' => '10',
                        'slider'  => true,
                    ),
                    'no_results_message' => array(
                        'type'    => 'textarea',
                        'label'   => __( 'No Results Message', 'xpro-bb-addons' ),
                        'default' => __( "Sorry, we couldn't find any posts. Please try a different search.", 'xpro-bb-addons' ),
                        'rows'    => 6,
                    ),
                    'show_search'        => array(
                        'type'    => 'select',
                        'label'   => __( 'Show Search', 'xpro-bb-addons' ),
                        'default' => '1',
                        'options' => array(
                            '1' => __( 'Show', 'xpro-bb-addons' ),
                            '0' => __( 'Hide', 'xpro-bb-addons' ),
                        ),
                        'help'    => __( 'Shows the search form if no posts are found.' ),
                    ),
                ),
            ),
            'page_numbers_colors' => array(
                'title'  => __( 'Pagination Numbers Colors', 'xpro-bb-addons' ),
                'fields' => array(
                    'numbers_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'numbers_active_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Active Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'numbers_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'numbers_bg_active_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Active Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                ),
            ),
            'page_numbers_border' => array(
                'title'  => __( 'Pagination Numbers Border', 'xpro-bb-addons' ),
                'fields' => array(
                    'numbers_border' 	=> array(
                        'type'       => 'border',
                        'label'      => __( 'Numbers Border', 'xpro-bb-addons' ),
                        'responsive' => true,
                    ),
                    'numbers_border_active_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Border Active Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                ),
            ),
        ),
    ),
    'style'      => array(
        'title'         => __( 'Style', 'xpro-bb-addons' ),
        'sections'      => array(
            'structure'       => array(
                'title'         => 'Structure',
                'fields'        => array(
                    'overall_alignment'    => array(
                        'type'        	=> 'align',
                        'label'       	=> __( 'Overall Alignment', 'xpro-bb-addons' ),
                        'default' 		=> '',
                        'responsive' 	=> true,
                    ),
                    'post_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'content_padding' => array(
                        'type'        	=> 'dimension',
                        'label'       	=>  __( 'Content Padding', 'xpro-bb-addons' ),
                        'units' 		=> array('px'),
                        'slider' 		=> true,
                        'responsive' 	=> array(
                            'placeholder' 	=> array(
                                'default'	 => array(
                                    'top'	 => '30',
                                    'right'	 => '30',
                                    'bottom' => '30',
                                    'left'	 => '30',
                                ),
                            ),
                        ),
                    ),
                    'post_padding' => array(
                        'type'        	=> 'dimension',
                        'label'       	=>  __( 'Overall Padding', 'xpro-bb-addons' ),
                        'units' 		=> array('px'),
                        'slider' 		=> true,
                        'responsive' 	=> array(
                            'placeholder' 	=> array(
                                'default'	 => array(
                                    'top'	 => '0',
                                    'right'	 => '0',
                                    'bottom' => '0',
                                    'left'	 => '0',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'categories'   => array(
                'title'         => 'Categories',
                'collapsed'     => true,
                'fields'        => array(
                    'cat_color' 	=> array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'cat_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'cat_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'cat_bg_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'cat_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Category Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'cat_border' => array(
                        'type'       => 'border',
                        'label'      => __( 'Category Border', 'xpro-bb-addons' ),
                    ),
                    'cat_border_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Border Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'cat_padding' => array(
                        'type'        	=> 'dimension',
                        'label'       	=>  __( 'Category Padding', 'xpro-bb-addons' ),
                        'units' 		=> array('px'),
                        'slider' 		=> true,
                        'responsive' 	=> array(
                            'placeholder' 	=> array(
                                'default'	 => array(
                                    'top'	 => '8',
                                    'right'	 => '12',
                                    'bottom' => '8',
                                    'left'	 => '12',
                                ),
                            ),
                        ),
                    ),
                    'cat_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '0',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'author'       => array(
                'title'         => __( 'Author', 'xpro-bb-addons' ),
                'collapsed'     => true,
                'fields'        => array(
                    'author_color' 	=> array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'author_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'author_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'author_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '15',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'separator'    => array(
                'title'         => __( 'Separator', 'xpro-bb-addons' ),
                'collapsed'     => true,
                'fields'        => array(
                    'separator_style' => array(
                        'type'          => 'select',
                        'label'         => __( 'Separator Style', 'xpro-bb-addons' ),
                        'default'       => 'solid',
                        'options'       => array(
                            'solid'       => __( 'Solid', 'xpro-bb-addons' ),
                            'dashed'      => __( 'Dashed', 'xpro-bb-addons' ),
                            'dotted'      => __( 'Dotted', 'xpro-bb-addons' ),
                            'double'      => __( 'Double', 'xpro-bb-addons' ),
                        ),
                    ),
                    'separator_size' => array(
                        'type'         	=> 'unit',
                        'label'        	=> __( 'Separator Size', 'xpro-bb-addons' ),
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '1',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'separator_color' 	=> array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'separator_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'separator_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '5',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'separator_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '5',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'meta_date'    => array(
                'title'         => __( 'Date', 'xpro-bb-addons' ),
                'collapsed'     => true,
                'fields'        => array(
                    'meta_date_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'meta_date_color' 	=> array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'meta_date_bg_color' 	=> array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'meta_date_border' => array(
                        'type'       => 'border',
                        'label'      => __( 'Date Border', 'xpro-bb-addons' ),
                    ),
                ),
            ),
        ),
    ),
    'typography' 	=> array(
        'title' 	  => __('Typography', 'xpro-bb-addons'),
        'sections'    => array(
            'post_title' 	=> array(
                'title'  	=> __( 'Title', 'xpro-bb-addons' ),
                'fields' 	=> array(
                    'title_tag' => array(
                        'type'    	=> 'select',
                        'label'   	=> __( 'HTML Tag', 'xpro-bb-addons' ),
                        'default' 	=> 'h3',
                        'options' 	=> array(
                            'h1'   => __( 'H1', 'xpro-bb-addons' ),
                            'h2'   => __( 'H2', 'xpro-bb-addons' ),
                            'h3'   => __( 'H3', 'xpro-bb-addons' ),
                            'h4'   => __( 'H4', 'xpro-bb-addons' ),
                            'h5'   => __( 'H5', 'xpro-bb-addons' ),
                            'h6'   => __( 'H6', 'xpro-bb-addons' ),
                            'div'  => __( 'Div', 'xpro-bb-addons' ),
                            'p'    => __( 'p', 'xpro-bb-addons' ),
                            'span' => __( 'span', 'xpro-bb-addons' ),
                        ),
                    ),
                    'title_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'title_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'title_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'title_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '20',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'title_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '10',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'content' 	=> array(
                'title'  	=> __( 'Content', 'xpro-bb-addons' ),
                'fields' 	=> array(
                    'content_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'content_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'content_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'content_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '10',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'content_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '10',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'meta_info' => array(
                'title'  	=> __( 'Post Info', 'xpro-bb-addons' ),
                'fields' 	=> array(
                    'meta_typography'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'meta_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'meta_link_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Link Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'meta_link_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Link Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                    ),
                    'meta_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '10',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'meta_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> '10',
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
        ),
    ),
) );

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form( 'tnit_more_link_form', array(
    'title' => __( 'More Link Settings', 'xpro-bb-addons' ),
    'tabs'  => array(
        'general' => array(
            'title'    => __( 'General', 'xpro-bb-addons' ),
            'sections' => array(
                'general' => array(
                    'title'  => __( 'Basics', 'xpro-bb-addons' ),
                    'fields' => array(
                        'link_type' => array(
                            'type'          => 'select',
                            'label'         => __( 'Link Type', 'xpro-bb-addons' ),
                            'default'       => 'button',
                            'options'       => array(
                                'text' 	=> __( 'Text', 'xpro-bb-addons' ),
                                'button' 	=> __( 'Button', 'xpro-bb-addons' )
                            ),
                            'toggle'        => array(
                                'button'      	=> array(
                                    'fields'        => array( 'button_bg_color', 'button_bg_hvr_color', 'button_border_hvr_color' ),
                                    'sections'      => array( 'button_structure' ),
                                ),
                            )
                        ),
                        'more_link_text' => array(
                            'type'          => 'text',
                            'label'         => __( 'More Link Text', 'xpro-bb-addons' ),
                            'default'       => __( 'Read More', 'xpro-bb-addons' ),
                            'connections' 	=> array( 'string', 'html' ),
                        ),
                        'more_link_icon' => array(
                            'type'        	=> 'icon',
                            'label'       	=> __( 'More Link Icon', 'xpro-bb-addons' ),
                            'default'     	=> 'fas fa-arrow-right',
                            'show_remove' 	=> true,
                            'show'	   		=> array(
                                'fields'  => array( 'more_link_icon_position' ),
                            ),
                        ),
                        'more_link_icon_position' => array(
                            'type'          => 'select',
                            'label'         => __( 'Icon Position', 'xpro-bb-addons' ),
                            'default'       => 'after',
                            'options'       => array(
                                'before' => __( 'Before', 'xpro-bb-addons' ),
                                'after'  => __( 'After', 'xpro-bb-addons' )
                            ),
                        ),
                    ),
                ),
                'button_colors' 	=> array(
                    'title'  	=> __( 'Colors', 'xpro-bb-addons' ),
                    'fields' 	=> array(
                        'button_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color', 'xpro-bb-addons' ),
                            'show_reset'    => true,
                        ),
                        'button_hvr_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Hover Color', 'xpro-bb-addons' ),
                            'show_reset'    => true,
                        ),
                        'button_bg_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                            'show_reset'    => true,
                            'default'    	=> '',
                            'show_alpha'    => true,
                        ),
                        'button_bg_hvr_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Background Hover Color', 'xpro-bb-addons' ),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                        ),
                    ),
                ),
                'button_structure' 	=> array(
                    'title'  	=> __( 'Structure', 'xpro-bb-addons' ),
                    'fields' 	=> array(
                        'button_width' => array(
                            'type'         	=> 'unit',
                            'label'        	=> 'Button Width',
                            'units'	       	=> array( 'px', '%' ),
                            'default_unit'	=> 'px',
                            'placeholder'	=> 'auto',
                            'slider'	   	=> true,
                            'responsive' 	=> true,
                        ),
                        'button_border' => array(
                            'type'       	=> 'border',
                            'label'      	=> __( 'Border', 'xpro-bb-addons' ),
                        ),
                        'button_border_hvr_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Border Hover Color', 'xpro-bb-addons' ),
                            'show_reset'    => true,
                            'show_alpha'    => true,
                        ),
                        'button_padding' => array(
                            'type'        	=> 'dimension',
                            'label'       	=> 'Padding',
                            'units' 		=> array('px'),
                            'slider' 		=> true,
                            'responsive' 	=> true,
                            'placeholder' 	=> array(
                                'top'	 => '8',
                                'right'	 => '20',
                                'bottom' => '8',
                                'left'	 => '20',
                            ),
                        ),
                    ),
                ),
                'button_margins' 	=> array(
                    'title'  	=> __( 'Margins', 'xpro-bb-addons' ),
                    'fields' 	=> array(
                        'button_margin_top' => array(
                            'type'         	=> 'unit',
                            'label'        	=> 'Top',
                            'units'	       	=> array('px'),
                            'placeholder'	=> '10',
                            'responsive' 	=> true,
                            'slider' 		=> true,
                        ),
                        'button_margin_bottom' => array(
                            'type'         	=> 'unit',
                            'label'        	=> 'Bottom',
                            'units'	       	=> array('px'),
                            'placeholder'	=> '0',
                            'responsive' 	=> true,
                            'slider' 		=> true,
                        ),
                    ),
                ),
            ),
        ),
        'typography' => array(
            'title'    => __( 'Typography', 'xpro-bb-addons' ),
            'sections' => array(
                'general' => array(
                    'title'  => __( '', 'xpro-bb-addons' ),
                    'fields' => array(
                        'more_link_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
) );
