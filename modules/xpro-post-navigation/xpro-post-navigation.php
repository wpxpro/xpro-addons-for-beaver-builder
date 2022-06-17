<?php

/**
 * @class XPROIconBoxModule
 *
 */

if ( ! class_exists( 'XPROPostNavigationModule' ) ) {

    class XPROPostNavigationModule extends FLBuilderModule {

        /**
         * @method __construct
         *
         */  
        public function __construct()
        {
            parent::__construct(array(
                'name'          => __('Post Navigation', 'xpro-addons'),
                'description'   => __('An example for coding new modules.', 'xpro-addons'),
                'group'         => XPRO_Plugins_Helper::$branding_modules,
				'category'      => XPRO_Plugins_Helper::$themer_modules,
                'dir'           => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-post-navigation/',
                'url'           => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-post-navigation/',
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
            $this->add_css('foundation-icons');
            $this->add_css('ultimate-icons');
        }
    
    }
    
    /**
     * Register the module and its form settings.
     */
    FLBuilder::register_module('XPROPostNavigationModule', array(
        'general'       => array(
            'title'         => __('General', 'xpro-addons'),
            'sections'      => array(
                'post'       => array(
                    'title'         => __('Post Navigation', 'xpro-addons'),
                    'fields'        => array(
                        'show_label' => array(
                            'type'          => 'select',
                            'label'         => __( 'Enable Label', 'xpro-addons' ),
                            'default'       => 'yes',
                            'options'       => array(
                                'yes'      => __( 'Show', 'xpro-addons' ),
                                'no'      => __( 'Hide', 'xpro-addons' )
                            ),
                            'toggle'        => array(
                                'yes'      => array(
                                    'fields'        => array( 'prev_label', 'next_label' ),
                                ),
                            )
                        ),
                        'prev_label' => array(
                            'type'          => 'text',
                            'label'         => __( 'Prev Label', 'xpro-addons' ),
                            'default'       => 'Prev Label',
                            'placeholder'   => __( '', 'xpro-addons' ),
                        ),
                        'next_label' => array(
                            'type'          => 'text',
                            'label'         => __( 'Next Label', 'xpro-addons' ),
                            'default'       => 'Next Label',
                            'placeholder'   => __( '', 'xpro-addons' ),
                        ),
                        'show_arrow' => array(
                            'type'          => 'select',
                            'label'         => __( 'Arrows Type', 'xpro-addons' ),
                            'default'       => 'fas fa-arrow-left',
                            'options'       => array(
                                'none'      => __( 'Show', 'xpro-addons' ),
                                'fas fa-arrow-left'      => __( 'Arrow', 'xpro-addons' ),
                                'fas fa-arrow-circle-left'      => __( 'Arrow Circle', 'xpro-addons' ),
                                'fas fa-angle-left'      => __( 'Angle', 'xpro-addons' ),
                                'fas fa-angle-double-left'      => __( 'Angle Circle', 'xpro-addons' ),
                                'fas fa-chevron-left'      => __( 'Chevron', 'xpro-addons' ),
                                'fas fa-chevron-circle-left'      => __( 'Chevron Circle', 'xpro-addons' ),
                                'fas fa-caret-left'      => __( 'Caret', 'xpro-addons' ),
                                'xi xi-long-arrow-left'      => __( 'Long Arrow', 'xpro-addons' ),
                            ),
                        ),
                        'show_title' => array(
                            'type'          => 'select',
                            'label'         => __( 'Enable Post Title', 'xpro-addons' ),
                            'default'       => 'yes',
                            'options'       => array(
                                'yes'      => __( 'Show', 'xpro-addons' ),
                                'no'      => __( 'Hide', 'xpro-addons' )
                            ),
                        ),
                        'show_separator' => array(
                            'type'          => 'select',
                            'label'         => __( 'Enable Separator', 'xpro-addons' ),
                            'default'       => 'yes',
                            'options'       => array(
                                'yes'      => __( 'Show', 'xpro-addons' ),
                                'no'      => __( 'Hide', 'xpro-addons' )
                            ),
                        ),
                    )
                ),
            )
        ),
        'style'       => array(
            'title'         => __('Style', 'xpro-addons'),
            'sections'      => array(
                'label'       => array(
                    'title'         => __('Label', 'xpro-addons'),
                    'fields'        => array(
                        'label_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => 'span.xpro-post-navigation-prev-label, span.xpro-post-navigation-next-label',
                            ),
                        ),
                        'label_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-prev-label, .xpro-post-navigation-next-label',
                                'property'      => 'color',
                            ),
                        ),
                        'label_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color Hover', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-link > a:hover .xpro-post-navigation-prev-label, .xpro-post-navigation-link > a:hover .xpro-post-navigation-next-label',
                                'property'      => 'color',
                            ),
                        ),
                    )
                ),
                'title'       => array(
                    'title'         => __('Title', 'xpro-addons'),
                    'collapsed' => true,
                    'fields'        => array(
                        'title_typography' => array(
                            'type'       => 'typography',
                            'label'      => 'Typography',
                            'responsive' => true,
                            'preview'    => array(
                                'type'      => 'css',
                                'selector'  => 'span.xpro-post-navigation-prev-title, span.xpro-post-navigation-next-title',
                            ),
                        ),
                        'title_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => 'span.xpro-post-navigation-prev-title, span.xpro-post-navigation-next-title',
                                'property'      => 'color',
                            ),
                        ),
                        'title_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color Hover', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-link > a:hover .xpro-post-navigation-prev-title, .xpro-post-navigation-link > a:hover .xpro-post-navigation-next-title',
                                'property'      => 'color',
                            ),
                        ),
                    )
                ),
                'arrow'       => array(
                    'title'         => __('Arrow', 'xpro-addons'),
                    'collapsed' => true,
                    'fields'        => array(
                        'arrow_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-prev > i, .xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-next > i',
                                'property'      => 'color',
                            ),
                        ),
                        'arrow_hv_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color Hover', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-link > a:hover .xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-prev > i, .xpro-post-navigation-link > a:hover .xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-next > i',
                                'property'      => 'color',
                            ),
                        ),
                        'arrow_size' => array(
                            'type'         => 'unit',
                            'label'        => 'Size',
                            'units'          => array( 'px' ),
                            'default_unit' => 'px',
                            'responsive' => true,
                            'slider' => true,
                            'preview'    => array(
                                'type'          => 'css',
                                'selector'      => '.xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-prev > i, .xpro-post-navigation-arrow-wrapper.xpro-post-navigation-arrow-next > i',
                                'property'      => 'font-size',
                            ),
                        ),
                        'arrow_gap' => array(
                            'type'         => 'unit',
                            'label'        => 'Gap',
                            'units'          => array( 'px' ),
                            'default_unit' => 'px',
                            'slider' => true,
                            'responsive' => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'rules'           => array(
                                    array(
                                        'selector'     => '.xpro-post-navigation-arrow-next',
                                        'property'     => 'padding-right'
                                    ),
                                    array(
                                        'selector'     => '.xpro-post-navigation-arrow-prev',
                                        'property'     => 'padding-left'
                                    ),
                                ),
                            ),
                        ),
                    )
                ),
                'separator'       => array(
                    'title'         => __('Separator', 'xpro-addons'),
                    'collapsed' => true,
                    'fields'        => array(
                        'separator_color' => array(
                            'type'          => 'color',
                            'label'         => __( 'Color', 'xpro-addons' ),
                            'default'       => '',
                            'show_reset'    => true,
                            'show_alpha'    => true,
                            'preview'       => array(
                                'type'          => 'css',
                                'rules'           => array(
                                    array(
                                        'selector'     => '.xpro-post-navigation-separator',
                                        'property'     => 'background-color'
                                    ),
                                    array(
                                        'selector'     => '.xpro-post-navigation-navigation',
                                        'property'     => 'color'
                                    ),
                                ),
                            ),
                        ),
                        'separator_size' => array(
                            'type'         => 'unit',
                            'label'        => 'Size',
                            'units'          => array( 'px' ),
                            'default_unit' => 'px',
                            'slider' => true,
                        ),
                    )
                ),
            )
        ),
    ));
}
