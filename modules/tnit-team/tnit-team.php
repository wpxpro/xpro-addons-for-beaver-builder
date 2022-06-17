<?php
/**
 * @class TNITTeamModule
 *
 */

class TNITTeamModule extends FLBuilderModule {

    /**
     * @method __construct
     *
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Team', 'xpro-bb-addons' ),
            'description' 	  => __( 'An awesome addition by Xpro team!', 'xpro-bb-addons' ),
            'group'           => XPRO_Plugins_Helper::$branding_modules,
            'category'        => XPRO_Plugins_Helper::$content_modules,
            'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/tnit-team/',
            'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/tnit-team/',
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

        // Register and enqueue your own
        $this->add_css('animate', XPRO_ADDONS_FOR_BB_URL . 'assets/css/animate.css');
    }

    /**
     * Function that renders Image
     *
     * @method render_image
     */
    public function render_image()
    {
        if ( ( 'library' == $this->settings->photo_source && !empty( $this->settings->photo_src )) || ( 'url' == $this->settings->photo_source && !empty( $this->settings->photo_url )) )
        {
            $output = '';
            $thumb_classes = 'tnit-thumb';

            // Add figure classes
            if ( '1' == $this->settings->team_style || '4' == $this->settings->team_style )
            {
                // image circle class
                if ( 'circle' == $this->settings->image_style )
                {
                    $thumb_classes .= ' thumb-radius';
                }
                // image square class
                else if ( 'square' == $this->settings->image_style )
                {
                    $thumb_classes .= ' thumb-square';
                }
            }
            else if ( '3' == $this->settings->team_style )
            {
                // image clip class
                $thumb_classes .= ' tnit-clipImage';
            }

            // Start <figure>
            if ( '5' != $this->settings->team_style && '6' != $this->settings->team_style )
            {
                $output .= '<figure class="' . $thumb_classes . '">';
            }

            // get image from media library
            if ( 'library' == $this->settings->photo_source ){
                $output .= '<img src="' . esc_url( $this->settings->photo_src ) . '" alt="">';
            }
            // get image external URL
            else if ( 'url' == $this->settings->photo_source ){
                $output .= '<img src="' . esc_url( $this->settings->photo_url ) . '" alt="">';
            }

            // Close <figure>
            if ( '5' != $this->settings->team_style && '6' != $this->settings->team_style )
            {
                $output .= '</figure>';
            }

            echo $output;
        }
    }

    /**
     * Function that renders Member Name
     *
     * @method render_member_name
     */
    public function render_member_name()
    {
        if ( '' !== $this->settings->member_name ) {

            $output = '<' . $this->settings->name_tag . ' class="title">';
            $output .= $this->settings->member_name;
            $output .= '</' . $this->settings->name_tag . '>';

            echo $output;
        }
    }

    /**
     * Function that renders Designation
     *
     * @method render_designation
     */
    public function render_designation()
    {
        if ( '' !== $this->settings->designation ) {

            $output = '<span class="desination">';
            $output .= $this->settings->designation;
            $output .= '</span>';

            echo $output;
        }
    }

    /**
     * Function that renders Description
     *
     * @method render_description
     */
    public function render_description()
    {
        if ( '' !== $this->settings->description ) {

            global $wp_embed;
            echo wpautop( $wp_embed->autoembed( $this->settings->description ) );
        }
    }

    /**
     * Function that renders Social Icons
     *
     * @method render_social_icons
     */
    public function render_social_icons()
    {
        if ( 'yes' === $this->settings->enable_social_icons ) {

            $icon_count = 1;
            foreach ( $this->settings->icons as $icon ) {

                (!empty($icon->link_nofollow == 'yes')) ? $link_nofollow = 'rel="nofollow"' : $link_nofollow = '';
                $output = '<li class="social-btn social-btn-' . $icon_count . '">';
                $output .= '<a href="' . esc_url( $icon->link ) . '" '. $link_nofollow .' target="' . esc_attr( $icon->link_target ) . '">';
                $output .= '<i class="' . $icon->icon . '" aria-hidden="true"></i>';
                $output .= '</a>';
                $output .= '</li>';

                echo $output;
                $icon_count++;
            }
        }
    }

    /**
     * Function that renders Separator
     *
     * @method render_separator
     */
    public function render_separator( $pos )
    {
        if ( 'yes' == $this->settings->enable_separator && ( $pos == $this->settings->separator_pos ) )
        {
            echo '<span class="tnit-separator"></span>';
        }
    }

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'TNITTeamModule', array(
    'imageicon' 	=> array(
        'title'    => __( 'Image', 'xpro-bb-addons' ),
        'sections' => array(
            'box_layouts' => array(
                'title'         => 'Layouts',
                'fields'        => array(
                    'team_style' => array(
                        'type'    		=> 'select',
                        'label'   		=> __( 'Choose Style', 'xpro-bb-addons' ),
                        'default' 		=> '1',
                        'options' 		=> array(
                            '1'      	=> 'Style 1',
                            '2' 		=> 'Style 2',
                            '3' 		=> 'Style 3',
                            '4' 		=> 'Style 4',
                            '5' 		=> 'Style 5',
                            '6' 		=> 'Style 6',
                        ),
                        'toggle'  		=> array(
                            '1' 	=> array(
                                'fields' 	=> array( 'img_size', 'box_bg_color', 'box_shadow' ),
                                'sections' 	=> array( 'img_styles', 'structure_style' ),
                            ),
                            '2' 	=> array(
                                'fields' 	=> array( 'overall_hvr_color','box_bg_color', 'box_bg_overlay_color', 'box_shadow' ),
                                'sections' 	=> array( 'structure_style' ),
                            ),
                            '3' 	=> array(
                                'fields' 	=> array( 'img_size', 'box_bg_color', 'box_shadow' ),
                                'sections' 	=> array('structure_style' ),
                            ),
                            '4' 	=> array(
                                'fields' 	=> array( 'overall_hvr_color','img_size', 'box_bg_color', 'box_bg_overlay_color', 'box_shadow' ),
                                'sections' 	=> array( 'img_styles', 'structure_style' ),
                            ),
                            '5' 	=> array(
                                'fields' 	=> array( 'box_bg_overlay_color', 'box_overlay_border_color' ),
                                'sections' 	=> array( 'structure_style' ),
                            ),
                            '6' 	=> array(
                                'fields' 	=> array( 'overall_hvr_color', 'box_bg_color', 'box_bg_overlay_color', 'content_padding' ),
                                'sections' 	=> array( 'structure_style' ),
                            ),
                        ),
                    ),
                    'team_alignment'    => array(
                        'type'        	=> 'align',
                        'label'       	=> __( 'Alignment', 'xpro-bb-addons' ),
                        'default' 		=> 'center',
                    ),
                ),
            ),
            'image'  => array(
                'title'  => __( 'Image', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'photo_source' => array(
                        'type'    => 'select',
                        'label'   => __( 'Member Image Source', 'xpro-bb-addons' ),
                        'default' => 'library',
                        'options' => array(
                            'library' => __( 'Media Library', 'xpro-bb-addons' ),
                            'url'     => __( 'URL', 'xpro-bb-addons' ),
                        ),
                        'toggle'  => array(
                            'library' => array(
                                'fields' => array( 'photo' ),
                            ),
                            'url'     => array(
                                'fields' => array( 'photo_url' ),
                            ),
                        ),
                    ),
                    'photo'        => array(
                        'type'        	=> 'photo',
                        'label'       	=> __( 'Member Image', 'xpro-bb-addons' ),
                        'show_remove' 	=> true,
                        'connections' 	=> array( 'photo' ),
                    ),
                    'photo_url'    => array(
                        'type'        	=> 'text',
                        'label'       	=> __( 'Photo URL', 'xpro-bb-addons' ),
                        'placeholder' 	=> 'http://www.example.com/my-photo.webp',
                    ),
                ),
            ),
            'member_info' => array(
                'title' => 'Member Information',
                'collapsed' => true,
                'fields' => array(
                    'member_name' => array(
                        'type'          => 'text',
                        'label'         => __( 'Name', 'xpro-bb-addons' ),
                        'default'       => __( 'Sarah Smiths', 'xpro-bb-addons' ),
                    ),
                    'designation' => array(
                        'type'          => 'text',
                        'label'         => __( 'Designation', 'xpro-bb-addons' ),
                        'default'       => __( 'UI/UX Designer', 'xpro-bb-addons' ),
                    ),
                    'description' => array(
                        'type'          => 'textarea',
                        'label'         => __( 'Description', 'xpro-bb-addons' ),
                        'default'       => 'Use this space to tell a little about your team member.',
                        'rows'          => '6'
                    ),
                ),
            ),
            'separator'   => array(
                'title'  => __( 'Separator', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'enable_separator'        => array(
                        'type'    	=> 'select',
                        'label'   	=> __( 'Enable Separator', 'xpro-bb-addons' ),
                        'default' 	=> 'yes',
                        'options' 	=> array(
                            'yes' => __( 'Yes', 'xpro-bb-addons' ),
                            'no'  => __( 'No', 'xpro-bb-addons' ),
                        ),
                        'toggle'  	=> array(
                            'yes' => array(
                                'fields'   => array( 'separator_pos', 'separator_color', 'separator_thickness', 'separator_style', 'separator_width', 'separator_alignment', 'separator_margin_top', 'separator_margin_bottom' ),
                            ),
                        ),
                    ),
                    'separator_pos'           => array(
                        'type'    => 'select',
                        'label'   => __( 'Position', 'xpro-bb-addons' ),
                        'default' => 'below_desg',
                        'options' => array(
                            'below_name' => __( 'Below Name', 'xpro-bb-addons' ),
                            'below_desg' => __( 'Below Designation', 'xpro-bb-addons' ),
                            'below_desc' => __( 'Below Description', 'xpro-bb-addons' ),
                        ),
                    ),
                ),
            ),
            'social_links'        => array(
                'title'  => __( 'Social Icons', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'enable_social_icons' => array(
                        'type'    => 'select',
                        'label'   => __( 'Enable Social Icons', 'xpro-bb-addons' ),
                        'default' => 'yes',
                        'options' => array(
                            'yes' => 'Yes',
                            'no'  => 'No',
                        ),
                        'toggle'  => array(
                            'yes' => array(
                                'fields' => array( 'icons' ),
                                'sections' => array( 'icon_style' ),
                            ),
                        ),
                    ),
                    'icons' => array(
                        'type'         => 'form',
                        'label'        => __( 'Icon', 'xpro-bb-addons' ),
                        'form'         => 'tnit_team_social_icon_form2',
                        'preview_text' => 'icon',
                        'multiple'     => true,
                    ),
                ),
            ),
        ),
    ),
    'style'      => array(
        'title'         => __( 'Style', 'xpro-bb-addons' ),
        'sections'      => array(
            'general' => array(
                'title'         => 'General',
                'fields'        => array(
                    'overall_hvr_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Overall Hover Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'box_bg_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'box_bg_overlay_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Background Overlay Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'box_overlay_border_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Overlay Border Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'box_shadow' => array(
                        'type'        => 'shadow',
                        'label'       => 'Box Shadow',
                        'show_spread' => true,
                    ),
                    'box_padding' => array(
                        'type'        	=> 'dimension',
                        'label'       	=> 'Box Padding',
                        'units' 		=> array('px'),
                        'slider' 		=> true,
                        'responsive' 	=> true,
                    ),
                    'content_padding' => array(
                        'type'        	=> 'dimension',
                        'label'       	=> 'Content Padding',
                        'units' 		=> array('px'),
                        'slider' 		=> true,
                        'responsive' 	=> true,
                        'placeholder'   => array(
                            'top'        => '50',
                            'right'      => '40',
                            'bottom'     => '50',
                            'left'       => '40',
                        ),
                    ),
                ),
            ),
            'img_styles' => array(
                'title'  => __( 'Image Style', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'image_style'     => array(
                        'type'    => 'select',
                        'label'   => __( 'Image Type', 'xpro-bb-addons' ),
                        'default' => 'circle',
                        'help'    => __( 'Circle and Square style will crop your image in 1:1 ratio', 'xpro-bb-addons' ),
                        'options' => array(
                            'circle' => __( 'Circle', 'xpro-bb-addons' ),
                            'square' => __( 'Square', 'xpro-bb-addons' ),
                        ),
                    ),
                    'img_bg_color'  => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                    ),
                    'img_size'     => array(
                        'type'    		=> 'unit',
                        'label'   		=> __( 'Size', 'xpro-bb-addons' ),
                        'slider'  		=> true,
                        'units'   		=> array( 'px' ),
                        'placeholder'   => 150,
                        'responsive' 	=> true,
                    ),
                    'img_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'slider' 		=> true,
                        'placeholder'   => 0,
                        'responsive' 	=> true,
                    ),
                    'img_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'slider' 		=> true,
                        'placeholder'   => 20,
                        'responsive' 	=> true,
                    ),
                ),
            ),
            'separator' => array(
                'title'  => __( 'Separator', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'separator_style'         => array(
                        'type'    => 'select',
                        'label'   => __( 'Style', 'xpro-bb-addons' ),
                        'default' => 'solid',
                        'help'    => __( 'The type of border to use. Double borders must have a height of at least 3px to render properly.', 'xpro-bb-addons' ),
                        'options' => array(
                            'solid'  => __( 'Solid', 'xpro-bb-addons' ),
                            'dashed' => __( 'Dashed', 'xpro-bb-addons' ),
                            'dotted' => __( 'Dotted', 'xpro-bb-addons' ),
                            'double' => __( 'Double', 'xpro-bb-addons' ),
                        ),
                    ),
                    'separator_color'         => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                    ),
                    'separator_thickness'        => array(
                        'type'    		=> 'unit',
                        'label'   		=> __( 'Thickness', 'xpro-bb-addons' ),
                        'slider'  		=> true,
                        'units'   		=> array( 'px' ),
                        'placeholder' 	=> 2,
                        'help'    		=> __( 'Adjust thickness of border.', 'xpro-bb-addons' ),
                    ),
                    'separator_width'     => array(
                        'type'        => 'unit',
                        'label'       => __( 'Width', 'xpro-bb-addons' ),
                        'placeholder' => 50,
                        'slider'      => true,
                        'units'       => array( 'px',  '%' ),
                    ),
                    'separator_margin_top'    => array(
                        'type'    		=> 'unit',
                        'label'   		=> __( 'Margin Top', 'xpro-bb-addons' ),
                        'slider'  		=> true,
                        'units'   		=> array( 'px' ),
                        'placeholder' 	=> 0,
                        'responsive' 	=> true,
                    ),
                    'separator_margin_bottom' => array(
                        'type'    		=> 'unit',
                        'label'   		=> __( 'Margin Bottom', 'xpro-bb-addons' ),
                        'slider'  		=> true,
                        'units'   		=> array( 'px' ),
                        'placeholder' 	=> 15,
                        'responsive' 	=> true,
                    ),
                ),
            ),
            'icon_style' => array(
                'title' => __( 'Social Icon', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' => array(
                    'icon_size' => array(
                        'type'   		=> 'unit',
                        'label'  		=> __( 'Size', 'xpro-bb-addons' ),
                        'slider' 		=> true,
                        'units'  		=> array( 'px' ),
                        'placeholder' 	=> '14',
                    ),
                    'icon_spacing'   => array(
                        'type'   => 'unit',
                        'label'  => __( 'Spacing Between Icons', 'xpro-bb-addons' ),
                        'slider' => true,
                        'units'  => array( 'px' ),
                        'placeholder' 	=> '4',
                    ),
                    'icon_style' => array(
                        'type'    => 'select',
                        'label'   => __( 'Icon Background Style', 'xpro-bb-addons' ),
                        'default' => 'circle',
                        'options' => array(
                            'circle' => __( 'Circle Background', 'xpro-bb-addons' ),
                            'square' => __( 'Square Background', 'xpro-bb-addons' ),
                            'custom' => __( 'Design your own', 'xpro-bb-addons' ),
                        ),
                        'toggle'  => array(
                            'custom' => array(
                                'fields' => array( 'icon_bg_size', 'icon_border', 'icon_border_hover_color' ),
                            ),
                        ),
                    ),
                    'icon_bg_size' 	=> array(
                        'type'   		=> 'unit',
                        'label'  		=> __( 'Background Size', 'xpro-bb-addons' ),
                        'help'   		=> __( 'Spacing between Icon & Background edge', 'xpro-bb-addons' ),
                        'slider' 		=> true,
                        'units'  		=> array( 'px' ),
                        'placeholder' 	=> '35',
                    ),
                    'icon_color'              => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Icon Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                    ),
                    'icon_hover_color'        => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Icon Hover Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                    ),
                    'icon_bg_color'           => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Background Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                    ),
                    'icon_bg_hover_color'     => array(
                        'type'        => 'color',
                        'connections' => array( 'color' ),
                        'label'       => __( 'Background Hover Color', 'xpro-bb-addons' ),
                        'show_reset'  => true,
                        'show_alpha'  => true,
                    ),
                    'icon_border_hover_color' => array(
                        'type'        	=> 'color',
                        'connections' 	=> array( 'color' ),
                        'label'       	=> __( 'Border Hover Color', 'xpro-bb-addons' ),
                        'show_reset'  	=> true,
                        'show_alpha'  => true,
                    ),
                    'icon_border' => array(
                        'type'       => 'border',
                        'label'      => 'Icon Border',
                    ),
                ),
            ),
        ),
    ),
    'typography' 	=> array(
        'title' 	  => __('Typography', 'xpro-bb-addons'),
        'sections'    => array(
            'member_name' 	=> array(
                'title'  	=> __( 'Name', 'xpro-bb-addons' ),
                'fields' 	=> array(
                    'name_tag' => array(
                        'type'    	=> 'select',
                        'label'   	=> __( 'HTML Tag', 'xpro-bb-addons' ),
                        'default' 	=> 'h4',
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
                    'name_font'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'name_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'name_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder'   => 0,
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'name_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> 10,
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'designation' 	=> array(
                'title'  	=> __( 'Designation', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' 	=> array(
                    'designation_font'     => array(
                        'type'       	=> 'typography',
                        'label'      	=> __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' 	=> true,
                    ),
                    'designation_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'designation_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder'   => 0,
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'designation_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> 15,
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                ),
            ),
            'description' 	=> array(
                'title'  	=> __( 'Description', 'xpro-bb-addons' ),
                'collapsed' => true,
                'fields' 	=> array(
                    'description_font'     => array(
                        'type'       => 'typography',
                        'label'      => __( 'Typography', 'xpro-bb-addons' ),
                        'responsive' => true,
                    ),
                    'description_color' => array(
                        'type'          => 'color',
                        'label'         => __( 'Color', 'xpro-bb-addons' ),
                        'show_reset'    => true,
                        'show_alpha'    => true,
                    ),
                    'description_margin_top' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Top',
                        'units'	       	=> array('px'),
                        'placeholder'   => 0,
                        'responsive' 	=> true,
                        'slider' 		=> true,
                    ),
                    'description_margin_bottom' => array(
                        'type'         	=> 'unit',
                        'label'        	=> 'Margin Bottom',
                        'units'	       	=> array('px'),
                        'placeholder' 	=> 15,
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
FLBuilder::register_settings_form( 'tnit_team_social_icon_form2', array(
    'title' => __( 'Add Icon', 'xpro-bb-addons' ),
    'tabs'  => array(
        'general' => array(
            'title'    => __( 'General', 'xpro-bb-addons' ),
            'sections' => array(
                'general' => array(
                    'title'  => 'Social Icon',
                    'fields' => array(
                        'icon' => array(
                            'type'        => 'icon',
                            'label'       => __( 'Icon', 'xpro-bb-addons' ),
                            'default'     => 'fab fa-facebook-f',
                            'show_remove' => true,
                        ),
                        'link' => array(
                            'type'          => 'link',
                            'label'         => __( 'Link', 'xpro-bb-addons' ),
                            'show_target'   => true,
                            'show_nofollow' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
));