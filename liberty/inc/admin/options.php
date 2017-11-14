<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "liberty_theme_options_master";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'        => $theme->get('Name') . ' ' . esc_html__('Options', 'liberty'),
        'page_title'        => $theme->get('Name') . ' ' . esc_html__('Options', 'liberty'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    /*
    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
    */

    /*
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
    */

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    /*
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );
    */

    /*
    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );
    */


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
    // -> START Basic Fields

    // THEME OPTIONS   
            /**



            // GENERAL OPTIONS



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General Settings', 'liberty'),
                'fields' => array(
                    array(
                        'id' => 'main-logo',
                        'type' => 'media',
                        'title' => esc_html__('Logo', 'liberty'),
                        'subtitle' => esc_html__('Please use image file.', 'liberty'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => array(
                            'url' => PARENT_URL . "/images/logo_small.png",
                            // 'url' => PARENT_URL . "/images/logo.png",
                            'width' => '70',
                            'height' => '70'
                        )   
                    ),
                    array(
                        'id' => 'main-logo-small',
                        'type' => 'media',
                        'title' => esc_html__('Small Logo', 'liberty'),
                        'subtitle' => esc_html__('Please use image file.', 'liberty'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => array(
                            'url' => PARENT_URL . "/images/logo_small.png",
                            'width' => '70',
                            'height' => '70'
                        )   
                    ),
                    array(
                        'id' => 'logo-margins',
                        'type' => 'spacing',
                        'compiler' => array('#main-logo'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'title' => esc_html__('Logo Margins', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default' => array('margin-top' => '5px', 'margin-right' => "0px", 'margin-bottom' => '5px', 'margin-left' => '0px')
                    ),
                    array(
                        'id' => 'logo-width',
                        'type' => 'spinner',
                        'title' => esc_html__('Logo Area Width', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default'  => '300',
                        'min'      => '50',
                        'step'     => '10',
                        'max'      => '800',
                    ),
                    array(
                        'id' => 'logo-width-small',
                        'type' => 'spinner',
                        'title' => esc_html__('Logo Area Width - Small Screens', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default'  => '70',
                        'min'      => '50',
                        'step'     => '10',
                        'max'      => '700',
                    ),
                    array(
                        'id' => 'logo-area-background',
                        'type' => 'background',
                        'compiler' => array('#main-logo-area'),
                        'title' => esc_html__('Logo Area Background', 'liberty'),
                        'default' => array(
                            'background-color' => '',
                            'background-image' => PARENT_URL . "/images/logo_stars.png",
                            'background-position' => 'center center',
                            'background-repeat' => 'no-repeat'
                        ),
                    ),
                    array(
                        'id' => 'text-logo',
                        'type' => 'text',
                        'title' => esc_html__('Site Slogan', 'liberty'),
                        'desc' => esc_html__('It wil be used if you didn\'t define graphic logo previously.', 'liberty'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'title' => esc_html__('Favicon', 'liberty'),
                        'subtitle' => esc_html__('Please use 16x16 ICO or PNG file.', 'liberty'),
                        'url' => true,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'apple_touch_icon',
                        'type' => 'media',
                        'title' => esc_html__('Apple Touch Icon', 'liberty'),
                        'subtitle' => esc_html__('Please use 57x57 PNG file.', 'liberty'),
                        'url' => true,
                        'output' => false,
                        'default' => ""
                    ),
                    array(
                        'id' => 'custom-css-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code', 'liberty'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'liberty'),
                        'desc' => esc_html__('It will be in head of page.', 'liberty'),
                        'default' => "",
                        'mode' => 'css',
                    ),
                    array(
                        'id' => 'custom-xs-css-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('CSS Code - for mobile phones and tablets only', 'liberty'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'liberty'),
                        'desc' => esc_html__('It will be in head of page.', 'liberty'),
                        'default' => "",
                        'mode' => 'css',
                    ),
                    array(
                        'id' => 'custom-js-code',
                        'type' => 'ace_editor',
                        'title' => esc_html__('JS Code', 'liberty'),
                        'subtitle' => esc_html__('Paste your JS code here.', 'liberty'),
                        'desc' => esc_html__('It will be processed in wp_footer.', 'liberty'),
                        'default' => "",
                        'mode' => 'javascript',
                        'theme' => 'chrome'
                    ),
                )
            ) );


    
            
            /**



            // STYLING OPTIONS



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-brush',
                'title' => esc_html__('Styling Settings', 'liberty'),
                'id' => 'styling-section',
                'fields' => array(
                    array(
                        'id' => 'body-background',
                        'type' => 'background',
                        'compiler' => array('body'),
                        'title' => esc_html__('Body Background', 'liberty'),
                        'subtitle' => esc_html__('Body background with image, color, etc.', 'liberty'),
                        'default' => array('background-color' => '#F9F9F9'),
                    ),
                    array(
                        'id' => 'content-background',
                        'type' => 'background',
                        'compiler' => array('#main-content, #content, #main tbody, #breadcrumbs, .tribe-events-list-separator-month span, #issues-list-content > div:nth-child(odd)'),
                        'title' => esc_html__('Content Background', 'liberty'),
                        'default' => array('background-color' => '#f9f9f9'),
                    ),              
                    array(
                        'id' => 'switch-use-animation',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use animation effect?', 'liberty'),
                        'default' => 1,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'switch-use-prettyPhoto',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use prettyPhoto lightbox effect?', 'liberty'),
                        'default' => true,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'link-color',
                        'type' => 'link_color',
                        'compiler' => array('a'),
                        'title' => esc_html__('Links Color Option', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#0d8ad9',
                            'hover' => '#0860ba',
                        )
                    ),
                    array(
                        'id' => 'heading-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#main h1 a', '#main h2 a', '#main h1 a', '#main h3 a', '#main h4 a', '#main h5 a', '#main h6 a'),
                        'title' => esc_html__('Title Links Color Option', 'liberty'),
                        'desc' => esc_html__('It will be used in the main content area.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#043174',
                            'hover' => '#281A70',
                        )
                    ),  
                    array(
                        'id' => 'title-spacer',
                        'type' => 'background',
                        'compiler' => array('.title-with-spacer:before, .title-with-center-spacer:before, .title-with-right-spacer:before'),
                        'title' => esc_html__('Title Spacers', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-color' => '#043174'),
                    ),
                )
            ) );      

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-brush',
                'title' => esc_html__('Styling Settings', 'liberty'),
                'id' => 'styling-section',
            ) );

            /**
            BUTTONS
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Buttons', 'liberty' ),
                'id'         => 'buttons-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'default-button-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Primary Button Link Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-tb-primary', '.woocommerce .button.btn-tb-primary'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'default-button-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Primary Button Background Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#281a70',
                            'hover' => '#1e125d',
                        )
                    ),
                    array(
                        'id' => 'secondary-button-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Secondary Button Link Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-tb-secondary', '.woocommerce .button.btn-tb-secondary'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'secondary-button-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Secondary Button Background Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#B2081D',
                            'hover' => '#cc0a21',
                        )
                    ),
                    array(
                        'id' => 'border-button1-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 1 Link Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-border1'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#281a70',
                        )
                    ), 
                    array(
                        'id' => 'border-button1-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 1 Background Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#281a70',
                            'hover' => '#FFFFFF',
                        )
                    ),  
                    array(
                        'id' => 'border-button1-border-color',
                        'type' => 'border',
                        'compiler' => array('.btn-border1'),
                        'title' => esc_html__('Border Button 1 Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#ffffff', 
                            'border-style'  => 'solid', 
                            'border-width'   => '2px'
                        ),
                    ),
                    array(
                        'id' => 'border-button2-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 2 Link Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'compiler' => array('.btn-border2'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#B2081D',
                        )
                    ), 
                    array(
                        'id' => 'border-button2-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Border Button 2 Background Color', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#B2081D',
                            'hover' => '#FFFFFF',
                        )
                    ),  
                    array(
                        'id' => 'border-button2-border-color',
                        'type' => 'border',
                        'compiler' => array('.btn-border2'),
                        'title' => esc_html__('Border Button 2 Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#ffffff', 
                            'border-style'  => 'solid', 
                            'border-width'   => '2px'
                        ),
                    ),
                )
            ) );

            /**
            FORMS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Forms', 'liberty' ),
                'id'         => 'forms-subsection',
                'subsection' => true,
                'fields'     => array(    
                    array(
                        'id' => 'default-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('input[type="button"]', 'input[type="reset"]', 'input[type="submit"]'),
                        'title' => esc_html__('Default - Submit Buttons Color', 'liberty'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'default-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Default - Submit Buttons Background', 'liberty'),
                        'default' => array(
                            'regular' => '#D20921',
                            'active' => '#F30A26',
                            'hover' => '#F30A26',
                        )
                    ),   
                    array(
                        'id' => 'style1-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('.liberty_form_style1 input[type="button"]', '.liberty_form_style1 input[type="reset"]', '.liberty_form_style1 input[type="submit"]'),
                        'title' => esc_html__('Style 1 - Submit Buttons Color', 'liberty'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),                
                    array(
                        'id' => 'style1-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Submit Buttons Background', 'liberty'),
                        'default' => array(
                            'regular' => '#372C95',
                            'active' => '#251B78',
                            'hover' => '#251B78',
                        )
                    ),         
                    array(
                        'id' => 'style1-input-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Input fields color', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'style1-input-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Style 1 - Input fields Background', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#B2081D',
                            'hover' => '#D20921',
                        )
                    ),   
                    array(
                        'id' => 'style1-input-border-color',
                        'type' => 'border',
                        'compiler' => array('.liberty_form_style1 .wrap-forms input[type="text"], .liberty_form_style1 .wrap-forms input[type="email"], .liberty_form_style1 .wrap-forms input[type="password"], .liberty_form_style1 .wrap-forms textarea, .liberty_form_style1 .wrap-forms select, .liberty_form_style1 .wrap-forms .selectize-input, .liberty_form_style1 .wrap-forms .selectize-dropdown'),
                        'title' => esc_html__('Style 1 - Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#910011', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),                  
                )
            ) );

            /**
            NEWSLETTER
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Newsletter', 'liberty' ),
                'id'         => 'newsletter-subsection',
                'subsection' => true,
                'fields'     => array(    
                    array(
                        'id' => 'newsletter-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('.widget_newsletterwidget input[type="submit"].newsletter-submit'),
                        'title' => esc_html__('Default - Submit Buttons Color', 'liberty'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'newsletter-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Newsletter - Submit Buttons Background', 'liberty'),
                        'default' => array(
                            'regular' => '#B2081D',
                            'active' => '#cc0a21',
                            'hover' => '#cc0a21',
                        )
                    ),        
                    array(
                        'id' => 'newsletter-input-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Newsletter - Input fields color', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#A9A3C6',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'newsletter-input-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Newsletter - Input fields Background', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#281A70',
                            'hover' => '#180B58',
                        )
                    ),   
                    array(
                        'id' => 'newsletter-input-border-color',
                        'type' => 'border',
                        'compiler' => array('.widget_newsletterwidget  input[type="text"], .widget_newsletterwidget input[type="email"], .widget_newsletterwidget input[type="password"], .widget_newsletterwidget textarea, .widget_newsletterwidget select, .widget_newsletterwidget .selectize-input, .widget_newsletterwidget .selectize-dropdown'),
                        'title' => esc_html__('Newsletter - Input Fields Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#281A70', 
                            'border-style'  => 'solid', 
                            'border-width'   => '0px'
                        ),
                    ),  
                    array(
                        'id' => 'newsletter-background',
                        'type' => 'background',
                        'compiler' => array('.widget_newsletterwidget, #secondary .widget_newsletterwidget h3.widget-title, .widget_newsletterwidget .widget-title'),
                        'title' => esc_html__('Newsletter Widget Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-color' => '#ffffff'),
                    ),         
                    array(
                        'id' => 'newsletter-border',
                        'type' => 'border',
                        'title' => esc_html__('Newsletter Border', 'liberty'),
                        'compiler' => array('#secondary .widget_newsletterwidget'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#e8e8e8', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),          
                    array(
                        'id' => 'newsletter-color',
                        'type' => 'color',
                        'title' => esc_html__('Newsletter Text/Title Color', 'liberty'),
                        'compiler' => array('.widget_newsletterwidget p, #secondary .widget_newsletterwidget h3.widget-title, .widget_newsletterwidget .widget-title'),
                        'default' => "#5b5b5b"
                    ),                  
                )
            ) );

            /**
            DONATIONS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Donations', 'liberty' ),
                'id'         => 'donations-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'donations-background',
                        'type' => 'background',
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section'),
                        'title' => esc_html__('Donation Section Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#ffffff'),
                    ),     
                    array(
                        'id' => 'donations-border-color',
                        'type' => 'border',
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section'),
                        'title' => esc_html__('Donation Section - Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#CCCCCC', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),          
                    array(
                        'id' => 'donations-color',
                        'type' => 'color',
                        'title' => esc_html__('Donation Section Text/Title Color', 'liberty'),
                        'compiler' => array('#dgx-donate-container .dgx-donate-form-section p, #dgx-donate-container .dgx-donate-form-section h2'),
                        'default' => "#282828"
                    ),                  
                )
            ) );

            /**
            BREADCRUMBS
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Breadcrumbs', 'liberty' ),
                'id'         => 'breadcrumbs-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id'       => 'show-breadcrumbs',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show Breadcrumbs?', 'liberty'),
                        'desc'    => esc_html__('WordPress SEO by Yoast must be installed.', 'liberty'),
                        'default'  => true,
                    ), 
                    array(
                        'id' => 'breadcrumbs-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Breadcrumbs Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#breadcrumbs, .info-line, .info-line a'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#959595",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '20px',
                            'text-transform' => 'none'
                        ),
                    ),   
                    array(
                        'id' => 'breadcrumbs-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#breadcrumbs a', '.info-line a'),
                        'title' => esc_html__('Breadcrumbs Links Color', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#959595',
                            'hover' => '#666666',
                        )
                    ),
                       
                    array(
                        'id'       => 'show-breadcrumbs-prevnext',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show Previous/Next Post Link?', 'liberty'),
                        'desc'    => esc_html__('It will be used on posts, events, projects, etc.', 'liberty'),
                        'default'  => true,
                    ),
                    
                )
            ) );

            /**
            LOADING SCREEN
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Loading Screen', 'liberty' ),
                'id'         => 'loading-screen-subsection',
                'subsection' => true,
                'fields'     => array(               
                    array(
                        'id' => 'show-loading-screen',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to use loading screen?', 'liberty'),
                        'default' => 1,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'loading-screen',
                        'type' => 'background',
                        'compiler' => array('.pace'),
                        'title' => esc_html__('Loading Screen Background', 'liberty'),
                        'transparent' => false,
                        'default' => array('background-color' => '#FFFFFF'),
                    ),
                    array(
                        'id' => 'ls-logo',
                        'type' => 'media',
                        'title' => esc_html__('Loading Screen Logo', 'liberty'),
                        'subtitle' => esc_html__('Please use square image file.', 'liberty'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => array(
                            'url' => PARENT_URL . "/images/logo.png",
                            'width' => '142',
                            'height' => '143'
                        )   
                    ),
                    array(
                        'id' => 'loading-screen-activity',
                        'type' => 'border',
                        'compiler' => array('#themeblossom_loading_screen_logo .loader_ring'),
                        'title' => esc_html__('Loading Screen - Ring Color', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#999999', 
                            'border-style'  => 'solid', 
                            'border-width'   => '10px'
                        ),
                    ),
                )
            ) );

            /**
            ACTION MENU
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Action Menu', 'liberty' ),
                'id'         => 'action-menu-subsection',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id' => 'overlay-menu-trigger',
                        'type' => 'color',
                        'compiler' => array('#overlay-menu.active #overlay-menu-trigger'),
                        'title' => esc_html__('Action Menu Close Button', 'liberty'),
                        'transparent' => false,
                        'default' => '#dddddd',
                    ),
                    array(
                        'id' => 'overlay-menu-holder',
                        'type' => 'background',
                        'compiler' => array('#overlay-menu-holder'),
                        'title' => esc_html__('Action Menu Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#F4F2EE'),
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li',
                        'type' => 'background',
                        'compiler' => array('#overlay-menu-holder .overlay-menu li'),
                        'title' => esc_html__('Action Menu Item Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'transparent' => true,
                        'default' => array('background-color' => '#ffffff'),
                    ),     
                    array(
                        'id' => 'overlay-menu-holder-li-bckg',
                        'type' => 'border',
                        'compiler' => array('#overlay-menu-holder .overlay-menu li'),
                        'title' => esc_html__('Action Menu Item - Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#e8e6e2', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li-a-color',
                        'type' => 'color',
                        'title' => esc_html__('Action Menu Item Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover.', 'liberty'),
                        'compiler' => array('#overlay-menu-holder .overlay-menu li a', '#overlay-menu-holder .overlay-menu li a span'),
                        'default' => '#847B69'
                    ),
                    array(
                        'id' => 'overlay-menu-holder-li-a-color-hover',
                        'type' => 'color',
                        'title' => esc_html__('Action Menu Item Hover Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover.', 'liberty'),
                        'compiler' => array('#overlay-menu-holder .overlay-menu li a:hover', '#overlay-menu-holder .overlay-menu li a:hover span'),
                        'default' => '#aca596'
                    ),   
                )
            ) );

            /**
            RELATED POSTS
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Featured/Related Posts', 'liberty' ),
                'id'         => 'related-posts-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'related-posts-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover. Paragraph and Title', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#281A70',
                            'hover' => '#ffffff',
                        )
                    ),  
                    array(
                        'id' => 'related-posts-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Background Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover. It will be used in posts carousels.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#281A70',
                        )
                    ),  
                    array(
                        'id' => 'related-posts-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Link Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#A02E2F',
                            'hover' => '#ffffff',
                        )
                    ), 
                    array(
                        'id' => 'related-posts-link-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Related Posts Link Background Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#1E125D',
                        )
                    ), 
                    array(
                        'id' => 'related-posts-overlay-bckg-color',
                        'type' => 'color',
                        'title' => esc_html__('Related Posts Overlay Background Color', 'liberty'),
                        'default' => '#000000',
                    ),  
                    array(
                        'id' => 'related-posts-overlay-opacity',
                        'type' => 'slider',
                        'title' => esc_html__('Related Posts Overlay Background Opacity', 'liberty'),
                        "default" => .4,
                        "min" => 0,
                        "step" => .1,
                        "max" => 1,
                        'resolution' => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id' => 'related-posts-overlay-color',
                        'type' => 'color',
                        'title' => esc_html__('Related Posts  Title Color', 'liberty'),
                        'default' => '#ffffff',
                    ),
                )
            ) );

            /**
            Gallery and Issues
            **/
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Gallery/Issues', 'liberty' ),
                'id'         => 'gallery-subsection',
                'subsection' => true,
                'fields'     => array( 
                    array(
                        'id' => 'portfolio-overlay-bckg-color',
                        'type' => 'color',
                        'title' => esc_html__('Portfolio Overlay Background Color', 'liberty'),
                        'default' => '#043174',
                    ), 
                    array(
                        'id' => 'portfolio-overlay-opacity',
                        'type' => 'slider',
                        'title' => esc_html__('Portfolio Overlay Background Opacity', 'liberty'),
                        "default" => .8,
                        "min" => 0,
                        "step" => .1,
                        "max" => 1,
                        'resolution' => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id' => 'portfolio-color',
                        'type' => 'color',
                        'title' => esc_html__('Portfolio Title Color', 'liberty'),
                        'default' => '#ffffff',
                    ),  
                    array(
                        'id' => 'issues-bckg-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Issues Background Color', 'liberty'),
                        'desc' => esc_html__('Inner circle - Outer Circle.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#32288D',
                            'hover' => '#281A70',
                        )
                    ), 
                    array(
                        'id' => 'issues-title-color',
                        'type' => 'color',
                        'title' => esc_html__('Issues Title Color', 'liberty'),
                        'default' => '#ffffff',
                    ), 
                    array(
                        'id' => 'issues-link-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Issues Bar Link Color', 'liberty'),
                        'desc' => esc_html__('Regular - Hover.', 'liberty'),
                        'compiler' => array('#issues-list-bar a'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'issues-overlay-bckg-color',
                        'type' => 'color',
                        'compiler' => array('#issues-list-bar'),
                        'title' => esc_html__('Issues Bar Background Color', 'liberty'),
                        'default' => '#B2081D',
                    ), 
                    array(
                        'id' => 'issues-list-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Issues Bar Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#issues-list-bar'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#ffffff",
                            'font-style' => '400',
                            'font-family' => 'Lora',
                            'font-size' => '14px',
                            'text-align' => 'left',
                            'line-height' => '20px',
                            'text-transform' => 'none'
                        ),
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'issues-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Issues Featured Image', 'liberty'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'liberty'),
                        'url' => true,
                        'compiler' => array('#featured-image.onissues'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'issues-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Issues Featured Image Height', 'liberty'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'liberty'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'liberty'),
                        'width' => false,
                        'compiler' => array('#featured-image.onissues'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),
                )
            ) );


            /**



            HEADER OPTIONS



            **/

            
            /**
            LOGO OPTIONS
            **/

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-picture',
                'title' => esc_html__('Header', 'liberty'),
                'id' => 'header-section',
                'fields' => array(

                    /**
                    SITE BRANDING
                    **/
                    array(
                        'id' => 'header-background',
                        'type' => 'background',
                        'compiler' => array('#site-branding'),
                        'title' => esc_html__('Header Background', 'liberty'),
                        'subtitle' => esc_html__('Header background with image, color, etc.', 'liberty'),
                        'default' => array(
                            'background-color' => '#fefefe',
                            'background-repeat' => 'no-repeat',
                            'background-position' => 'center top'
                        ),
                    ),
                    array(
                        'id' => 'header-border',
                        'type' => 'border',
                        'compiler' => array('#site-branding'),
                        'title' => esc_html__('Header (Navigation) Border', 'liberty'),
                        'all' => true,
                        'default' => array('border-color' => '#f2f2f3', 'border-style' => 'solid', 'border-all' => '1px')
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Featured Image', 'liberty'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'liberty'),
                        'url' => true,
                        'compiler' => array('#featured-image'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Featured Image Height', 'liberty'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'liberty'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'liberty'),
                        'width' => false,
                        'compiler' => array('#featured-image'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),
                    array(
                        'id'          => 'featured-image-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Featured Image Title', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#featured-image h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#fff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '27px', 
                            'line-height' => '38px'
                        ),
                    ),
                    array(
                        'id'          => 'featured-image-typography-sub',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Featured Image Subitle', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#featured-image h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#fff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '27px'
                        ),
                    ),
                )
            ) );      

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-picture',
                'title' => esc_html__('Header', 'liberty'),
                'id' => 'header-section',
            ) );

            /**
            PROMO
            **/  
            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Promo', 'liberty' ),
                'id'         => 'promo-subsection',
                'subsection' => true,
                'fields'     => array( 

                    /**
                    PROMO LINE
                    **/
                    array(
                        'id' => 'switch-promo',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to show a header promo line?', 'liberty'),
                        "default" => 1,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                    ),
                    array(
                        'id' => 'header-promo-background',
                        'type' => 'background',
                        'transparent' => false,
                        'compiler' => array('#promo, .search-box'),
                        'title' => esc_html__('Header Promo Line Background', 'liberty'),
                        'default' => array('background-color' => '#fbfbfb'),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-border',
                        'type' => 'border',
                        'compiler' => array('#promo, .search-box'),
                        'title' => esc_html__('Promo Line Border', 'liberty'),
                        'all' => true,
                        'default' => array('border-color' => '#f4f4f4', 'border-style' => 'solid', 'border-all' => '1px'),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id'          => 'header-promo-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Promo Line Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#promo'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#b1b1b1', 
                            'font-weight'  => '400',
                            'font-family' => 'Noto Serif', 
                            'text-align'  => 'left',
                            'font-size'   => '11px', 
                            'line-height' => '33px',
                            'text-transform' => 'uppercase'
                        ),
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#promo a'),
                        'title' => esc_html__('Promo Line Links', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#d1d1d1',
                            'hover' => '#8b8b8b',
                        ),
                        'required' => array('switch-promo', 'equals', '1')
                    ),


                    array(
                        'id'        => 'header-promo-left',
                        'type'      => 'select',
                        'title'     => esc_html__('Promo Line - Left Content', 'liberty'),
                        'options'   => array(
                            'menu' => 'Top Menu', 
                            'text' => 'Text',
                            'hide' => 'Hide'
                        ),
                        'default'   => 'menu',
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id' => 'header-promo-text',
                        'type' => 'text',
                        'title' => esc_html__('Header Promo Text', 'liberty'),
                        'subtitle' => esc_html__('It will be used only if you chose "text" previously.<br>You can use html elements: a, em, strong, i.', 'liberty'),
                        'validate' => 'html_custom',
                        'allowed_html' => array( 
                            'a' => array( 
                                'href' => array(), 
                                'title' => array(),
                                'class' => array()
                            ), 
                            'em' => array(), 
                            'strong' => array(),
                            'i' => array(
                                'class' => array()
                            )
                        ),
                        'required' => array(
                                array('switch-promo', 'equals', '1'),
                                array('header-promo-left', 'equals', 'text')
                        )
                    ),

                    array(
                        'id' => 'header-promo-right',
                        'type' => 'select',
                        'title' => esc_html__('Do you want to show social network icons and/or search form?', 'liberty'),
                        'options'   => array(
                            'icons' => 'Just Icons', 
                            'search' => 'Icons and Search',
                            'hide' => 'Hide'
                        ),
                        'default'   => 'icons',
                        'required' => array('switch-promo', 'equals', '1')
                    ),
                    array(
                        'id'             => 'search-box-spacing',
                        'type'           => 'spacing',
                        'output'         => array('.search-box'),
                        'mode'           => 'padding',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Search Box Padding', 'liberty'),
                        'default'            => array(
                            'padding-top'     => '32px', 
                            'padding-right'   => '32px', 
                            'padding-bottom'  => '32px', 
                            'padding-left'    => '32px'
                        )
                    ),
                )
            ) );


            /**



            FOOTER OPTIONS



            **/


            /*
            $post_type = 'wpcf7_contact_form';
            
            $args = array (
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            
            $contact_forms = get_posts($args);
            
            $form_ids = array();
            $form_ids[0] = esc_html__('Choose contact form', 'liberty');
            foreach( $contact_forms as $form) {
                $form_ids[$form->ID] = strip_tags($form->post_title);
            }
            */

            
            /**
            FOOTER OPTIONS
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-cog',
                'title' => esc_html__('Footer', 'liberty'),
                'fields' => array(
                    /**
                    FOOTER SOCIAL STREAM WIDGET
                    **/
                    array(
                        'id' => 'switch-footer-wide',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to show wide widget in the footer area?', 'liberty'),
                        "default" => 0,
                        'on' => 'Enabled',
                        'off' => 'Disabled',
                    ),
                    array(
                        'id'    => 'footer_wide_info',
                        'type'  => 'info',
                        'style' => 'info',
                        'title' => __('Note:', 'liberty'),
                        'desc'  => __( 'Secondary wide-fotter styles will be applied on objects with class "wide-footer".', 'liberty')
                    ),
                    array(
                        'id' => 'footer-wide-background',
                        'type' => 'background',
                        'compiler' => array('#wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Background', 'liberty'),
                        'default' => array('background-color' => '#1E125C'),
                    ),
                    array(
                        'id' => 'footer-wide-padding',
                        'type' => 'spacing',
                        'compiler' => array('#wide-footer'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'title' => esc_html__('Footer Wide Widget Area Padding', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'right' => false,
                        'left' => false,
                        'all' => false,
                        'default' => array('padding-top' => '45px', 'padding-bottom' => '30px')
                    ),
                    array(
                        'id' => 'footer-wide-border',
                        'type' => 'border',
                        'compiler' => array('#wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Border', 'liberty'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#302374', 'border-style' => 'solid', 'border-top' => '3px', 'border-bottom' => '0px')
                    ),
                    array(
                        'id' => 'footer-wide-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#wide-footer a'),
                        'title' => esc_html__('Footer Wide Widget Area Links Color Option', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#958DBF',
                        )
                    ),
                    array(
                        'id' => 'footer-wide-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Footer Wide Widget Area Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#wide-footer'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#C2BFD6",
                            'font-style' => '400',
                            'font-family' => 'Lora',
                            'font-size' => '20px',
                            'text-align' => 'left',
                            'line-height' => '25px',
                        ),
                    ),
                    array(
                        'id'          => 'footer-wide-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Footer Wide Widget Area Titles', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#wide-footer h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#ffffff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '20px', 
                            'line-height' => '24px',
                            'text-transform' => 'uppercase'
                        ),
                    ),  
                    array(
                        'id' => 'footer-wide-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('#wide-footer input[type="button"]', '#wide-footer input[type="reset"]', '#wide-footer input[type="submit"]', '#wide-footer .widget_newsletterwidget input[type="submit"].newsletter-submit'),
                        'title' => esc_html__('Wide Footer - Submit Buttons Color', 'liberty'),
                        'default' => array(
                            'regular' => '#3C3174',
                            'active' => '#3C3174',
                            'hover' => '#3C3174',
                        )
                    ),                
                    array(
                        'id' => 'footer-wide-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Submit Buttons Background', 'liberty'),
                        'default' => array(
                            'regular' => '#B3AED2',
                            'active' => '#9894b3',
                            'hover' => '#9894b3',
                        )
                    ),         
                    array(
                        'id' => 'footer-wide-input-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Input fields color', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#A4A0C4',
                            'hover' => '#C2BFD6',
                        )
                    ),         
                    array(
                        'id' => 'footer-wide-input-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Input fields Background', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#443690',
                            'hover' => '#5240ad',
                        )
                    ),   
                    array(
                        'id' => 'footer-wide-input-height',
                        'type' => 'spinner',
                        'title' => esc_html__('Wide Footer - Input Fields Height', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default'  => '50',
                        'min'      => '15',
                        'step'     => '1',
                        'max'      => '120',
                    ),
                    array(
                        'id' => 'footer-wide-input-border-color',
                        'type' => 'border',
                        'compiler' => array('#wide-footer input[type="text"], #wide-footer input[type="email"], #wide-footer input[type="password"], #wide-footer textarea, #wide-footer select, #wide-footer .selectize-input, #wide-footer .selectize-dropdown'),
                        'title' => esc_html__('Wide Footer - Input Fields Border', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#443690', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ), 
                    array(
                        'id' => 'footer-wide-shortcode',
                        'type' => 'text',
                        'title' => esc_html__('Footer Wide Widget Area Shortcode', 'liberty'),
                        'desc' => esc_html__('One shortcode, please.', 'liberty'),
                        'default' => '[newsletter_form form="1"]'
                    ),
                    array(
                        'id' => 'footer-wide-secondary-background',
                        'type' => 'background',
                        'compiler' => array('.wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Background - Secondary', 'liberty'),
                        'default' => array('background-color' => '#D20921'),
                    ),
                    array(
                        'id' => 'footer-wide-secondary-padding',
                        'type' => 'spacing',
                        'compiler' => array('.wide-footer, section.wide-footer'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'title' => esc_html__('Footer Wide Widget Area Padding - Secondary', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'right' => false,
                        'left' => false,
                        'all' => false,
                        'default' => array('padding-top' => '45px', 'padding-bottom' => '30px')
                    ),
                    array(
                        'id' => 'footer-wide-secondary-border',
                        'type' => 'border',
                        'compiler' => array('.wide-footer'),
                        'title' => esc_html__('Footer Wide Widget Area Border - Secondary', 'liberty'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#9F071A', 'border-style' => 'solid', 'border-top' => '0px', 'border-bottom' => '0px')
                    ),
                    array(
                        'id' => 'footer-wide-secondary-link-color',
                        'type' => 'link_color',
                        'compiler' => array('.wide-footer a'),
                        'title' => esc_html__('Footer Wide Widget Area Links Color Option - Secondary', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#AC6B6E',
                        )
                    ),
                    array(
                        'id' => 'footer-wide-secondary-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Footer Wide Widget Area Typography - Secondary', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.wide-footer'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#ffffff",
                            'font-style' => '400',
                            'font-family' => 'Lora',
                            'font-size' => '20px',
                            'text-align' => 'left',
                            'line-height' => '25px',
                        ),
                    ),
                    array(
                        'id'          => 'footer-wide-secondary-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Footer Wide Widget Area Titles - Secondary', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('.wide-footer h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#ffffff', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '20px', 
                            'line-height' => '24px',
                            'text-transform' => 'uppercase'
                        ),
                    ),  
                    array(
                        'id' => 'footer-wide-secondary-submit-color',
                        'type' => 'link_color',
                        'compiler' => array('.wide-footer input[type="button"]', '.wide-footer input[type="reset"]', '.wide-footer input[type="submit"]', '.wide-footer .widget_newsletterwidget input[type="submit"].newsletter-submit'),
                        'title' => esc_html__('Wide Footer - Submit Buttons Color - Secondary', 'liberty'),
                        'default' => array(
                            'regular' => '#ffffff',
                            'active' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),                
                    array(
                        'id' => 'footer-wide-secondary-submit-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Submit Buttons Background - Secondary', 'liberty'),
                        'default' => array(
                            'regular' => '#281A70',
                            'active' => '#180B58',
                            'hover' => '#180B58',
                        )
                    ),         
                    array(
                        'id' => 'footer-wide-secondary-input-color',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Input fields color - Secondary', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),         
                    array(
                        'id' => 'footer-wide-secondary-input-bckg',
                        'type' => 'link_color',
                        'title' => esc_html__('Wide Footer - Input fields Background - Secondary', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#9F071A',
                            'hover' => '#7E000F',
                        )
                    ),   
                    array(
                        'id' => 'footer-wide-secondary-input-height',
                        'type' => 'spinner',
                        'title' => esc_html__('Wide Footer - Input Fields Height - Secondary', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default'  => '50',
                        'min'      => '15',
                        'step'     => '1',
                        'max'      => '120',
                    ),
                    array(
                        'id' => 'footer-wide-secondary-input-border-color',
                        'type' => 'border',
                        'compiler' => array('.wide-footer input[type="text"], .wide-footer input[type="email"], .wide-footer input[type="password"], .wide-footer textarea, .wide-footer select, .wide-footer .selectize-input, .wide-footer .selectize-dropdown'),
                        'title' => esc_html__('Wide Footer - Input Fields Border - Secondary', 'liberty'),
                        'all' => true,
                        'default' => array(
                            'border-color'  => '#9F071A', 
                            'border-style'  => 'solid', 
                            'border-width'   => '1px'
                        ),
                    ),

                    /**
                    MAIN FOOTER
                    **/
                    // show footer
                    array(
                        'id' => 'footer-widgets',
                        'type' => 'radio',
                        'title' => esc_html__('Do you want to show footer widgets?', 'liberty'),
                        'default' => '3cols',
                        'options' => array(
                            'no' => esc_html__('No', 'liberty'),
                            '3cols' => esc_html__('3 Columns', 'liberty'),
                            '4cols' => esc_html__('4 Columns', 'liberty'),
                        )
                    ),
                    array(
                        'id' => 'footer-background',
                        'type' => 'background',
                        'compiler' => array('#main-footer'),
                        'title' => esc_html__('Footer Background', 'liberty'),
                        'default' => array('background-color' => '#271A6B'),
                    ),
                    array(
                        'id' => 'footer-border',
                        'type' => 'border',
                        'compiler' => array('#main-footer'),
                        'title' => esc_html__('Footer Border', 'liberty'),
                        'left' => false,
                        'right' => false,
                        'all' => false,
                        'default' => array('border-color' => '#473E7F', 'border-style' => 'solid', 'border-top' => '1px', 'border-bottom' => '0px')
                    ),
                    array(
                        'id' => 'footer-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#main-footer a'),
                        'title' => esc_html__('Footer Links Color Option', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#CAC5D8',
                        )
                    ),
                    array(
                        'id' => 'footer-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Footer Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#main-footer'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#CAC5D8",
                            'font-style' => '400',
                            'font-family' => 'Lato',
                            'font-size' => '14px',
                            'text-align' => 'left',
                            'line-height' => '18px',
                        ),
                    ),
                    array(
                        'id'          => 'footer-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Footer Titles', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#main-footer h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#CAC5D8', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px',
                            'text-transform' => 'uppercase'
                        ),
                    ), 
                    /**
                    DISCLAIMER LINE
                    **/
                    array(
                        'id' => 'footer-text',
                        'type' => 'editor',
                        'title' => esc_html__('Footer Text', 'liberty'),
                        'default' => 'Copyright &copy; 2014. All Rights Reserved.',
                    ), 
                    array(
                        'id' => 'footer-disclaimer',
                        'type' => 'background',
                        'compiler' => array('#footer-navigation'),
                        'title' => esc_html__('Copyright Line Background', 'liberty'),
                        'transparent' => true,
                        'default' => array('transparent' => true),
                    ),
                    array(
                        'id' => 'disclaimer-border',
                        'type' => 'border',
                        'compiler' => array('#footer-navigation'),
                        'title' => esc_html__('Copyright Line Border', 'liberty'),
                        'left' => false,
                        'right' => false,
                        'bottom' => false,
                        'default' => array('border-color' => '#473E7F', 'border-style' => 'solid', 'border-top' => '1px')
                    ),
                    array(
                        'id' => 'footer-disclaimer-link-color',
                        'type' => 'link_color',
                        'compiler' => array('#footer-navigation a'),
                        'title' => esc_html__('Copyright Line Links', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#9FBBE2',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'footer-disclaimer-padding',
                        'type' => 'spacing',
                        'compiler' => array('#footer-navigation .disclaimer-area'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'left' => false,
                        'right' => false,
                        'title' => esc_html__('Copyright Line Padding', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default' => array('padding-top' => '10px', 'padding-bottom' => '10px')
                    ),   
                    array(
                        'id' => 'footer-disclaimer-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Copyright Line Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#footer-navigation'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#9FBBE2",
                            'font-style' => '400',
                            'font-family' => 'Lato',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '28px',
                            'text-transform' => 'normal'
                        ),
                    ),
                    array(
                        'id' => 'footer-logo',
                        'type' => 'media',
                        'title' => esc_html__('Footer Logo', 'liberty'),
                        'subtitle' => esc_html__('Please use image file.', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'url' => true,
                        'compiler' => false,
                        'output' => false,
                        'default' => array(
                            'url' => PARENT_URL . "/images/logo_footer.png",
                            'width' => '66',
                            'height' => '43'
                        )   
                    ),
                    array(
                        'id' => 'footer-logo-margins',
                        'type' => 'spacing',
                        'compiler' => array('#footer-logo'), 
                        'mode' => 'margin',
                        'units' => 'px',
                        'title' => esc_html__('Footer Logo Margins', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default' => array('margin-top' => '10px', 'margin-right' => "0px", 'margin-bottom' => '10px', 'margin-left' => '0px')
                    ),
                )
            ) );


            /**



            NAVIGATION



            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-th-list',
                'title' => esc_html__('Main Navigation and Breadcrumbs', 'liberty'),
                'fields' => array( 
                    array(
                        'id' => 'navigation-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Main Navigation Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#primary-navigation > div > ul > li > a, #primary-navigation2 > div > ul > li > a, #overlay-menu-holder span'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#535353",
                            'font-style' => '400',
                            'font-family' => 'Noto Serif',
                            'font-size' => '14px',
                            'text-align' => 'center',
                            'line-height' => '80px',
                            'text-transform' => 'uppercase'
                        ),
                    ), 
                    array(
                        'id' => 'navigation-typography2',
                        'type' => 'typography',
                        'title' => esc_html__('Main Navigation Typography - Sticky', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.make-it-sticky #primary-navigation > div > ul > li > a, .make-it-sticky #primary-navigation2 > div > ul > li > a'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#535353",
                            'font-style' => '400',
                            'font-family' => 'Noto Serif',
                            'font-size' => '12px',
                            'text-align' => 'center',
                            'line-height' => '58px',
                            'text-transform' => 'uppercase'
                        ),
                    ),
                    array(
                        'id' => 'navigation-link-color-level1',
                        'type' => 'link_color',
                        'compiler' => array('#primary-navigation > div > ul > li > a', '#primary-navigation2 > div > ul > li > a'),
                        'title' => esc_html__('Main Navigation Links Color', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#535353',
                            'hover' => '#e4161d',
                        )
                    ),
                    array(
                        'id' => 'navigation-link-bckg1',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation > div > ul > li > a, #primary-navigation2 > div > ul > li > a'),
                        'title' => esc_html__('Main Navigation Link Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => 'transparent'),
                    ),
                    array(
                        'id' => 'navigation-link-bckg2',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation > div > ul > li:hover > a, #primary-navigation > div > ul > li.current-menu-item > a, #primary-navigation > div > ul > li.current-menu-ancestor > a, #primary-navigation2 > div > ul > li:hover > a, #primary-navigation2 > div > ul > li.current-menu-item > a, #primary-navigation2 > div > ul > li.current-menu-ancestor > a'),
                        'title' => esc_html__('Main Navigation Link Background Hover State', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#fefefe'),
                    ),  
                    array(
                        'id' => 'navigation-link-padding-level1',
                        'type' => 'spacing',
                        'output' => array('#primary-navigation > div > ul > li > a, #primary-navigation2 > div > ul > li > a'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'top' => false,
                        'bottom' => false,
                        'title' => esc_html__('Main Navigation Links Padding', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default' => array('padding-left' => '35px', 'padding-right' => "35px")
                    ),

                    /**
                    DROPDOWN
                    **/
                    array(
                        'id' => 'navigation-typography-dd',
                        'type' => 'typography',
                        'title' => esc_html__('Dropdown Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#primary-navigation div div li > a, #primary-navigation ul ul a, #primary-navigation2 div div li > a, #primary-navigation2 ul ul a'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#535353",
                            'font-style' => '400',
                            'font-family' => 'Noto Serif',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '22px',
                            'text-transform' => 'none'
                        ),
                    ),
                    array(
                        'id' => 'navigation-link-color-level2',
                        'type' => 'link_color',
                        'output' => array('#primary-navigation div div li > a', '#primary-navigation ul ul a', '#primary-navigation2 div div li > a', '#primary-navigation2 ul ul a'),
                        'title' => esc_html__('Dropdown Links Color', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false,
                        'default' => array(
                            'regular' => '#ffffff',
                            'hover' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'navigation-link-padding-level2',
                        'type' => 'spacing',
                        'output' => array('#primary-navigation div div li > a, #primary-navigation ul ul a, #primary-navigation2 div div li > a, #primary-navigation2 ul ul a'), 
                        'mode' => 'padding',
                        'units' => 'px',
                        'title' => esc_html__('Dropdown Links Padding', 'liberty'),
                        'desc' => esc_html__('Dimensions are in pixels.', 'liberty'),
                        'default' => array('padding-top' => '9px', 'padding-left' => '24px', 'padding-bottom' => '9px', 'padding-right' => "24px")
                    ),
                    array(
                        'id' => 'navigation-link-level2-bckg',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div div li > a, #primary-navigation ul ul a, #primary-navigation div > ul ul, #primary-navigation2 div div li > a, #primary-navigation2 ul ul a, #primary-navigation2 div > ul ul'),
                        'title' => esc_html__('Dropdown Link Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#b2081d'),
                    ),
                    array(
                        'id' => 'navigation-link-level2-bckg-hover',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div > ul ul li > a:hover, #primary-navigation div > ul ul li.current_page_item > a, #primary-navigation div > ul ul li.current_page_ancestor > a, #primary-navigation div > ul ul li.current-menu-item > a, #primary-navigation div > ul ul li.current-menu-ancestor > a, #primary-navigation2 div > ul ul li > a:hover, #primary-navigation2 div > ul ul li.current_page_item > a, #primary-navigation2 div > ul ul li.current_page_ancestor > a, #primary-navigation2 div > ul ul li.current-menu-item > a, #primary-navigation2 div > ul ul li.current-menu-ancestor > a'),
                        'title' => esc_html__('Dropdown Hover Link Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#d20921'),
                    ),
                    array(
                        'id' => 'navigation-link-level2-mm-bckg-hover',
                        'type' => 'background',
                        'compiler' => array('#primary-navigation div.mega-menu a:hover, #primary-navigation div.mega-menu li.current_page_item > a, #primary-navigation div.mega-menu li.current_page_ancestor > a, #primary-navigation div.mega-menu li.current-menu-item > a, #primary-navigation div.mega-menu li.current-menu-ancestor > a, #primary-navigation2 div.mega-menu a:hover, #primary-navigation2 div.mega-menu li.current_page_item > a, #primary-navigation2 div.mega-menu li.current_page_ancestor > a, #primary-navigation2 div.mega-menu li.current-menu-item > a, #primary-navigation2 div.mega-menu li.current-menu-ancestor > a'),
                        'title' => esc_html__('Mega Menu Hover Link Background', 'liberty'),
                        'background-image' => false,
                        'background-repeat' => false,
                        'background-position' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'default' => array('background-color' => '#d20921'),
                    ), 


                    /**
                    STICKY NAVIGATION
                    **/
                    array(
                        'id'       => 'sticky-navigation',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Sticky Navigation', 'liberty'),
                        'default'  => true,
                    ),


                    /**
                    INLINE NAVIGATION
                    **/
                    array(
                        'id'       => 'inline-navigation',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Inline Navigation', 'liberty'),
                        'default'  => true,
                    ),
                )
            ) );   

  

            
            /**



            BLOG OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-book',
                'title' => esc_html__('Blog/Post/Page Settings', 'liberty'),
                'id'    => 'blog-section',
                'fields' => array(
                    array(
                        'id'       => 'archive-date-box',
                        'type'     => 'select', 
                        'title'    => esc_html__('Post - Date Box', 'liberty'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'liberty'),
                        'default'  => 'normal',
                        'options' => array(
                            'no' => esc_html__('Don\'t show date box', 'liberty'),
                            'normal' => esc_html__('Normal Date Box', 'liberty'),
                            //'wide' => esc_html__('Wide Date Box', 'liberty')
                        )
                    ),               
                    array(
                        'id'       => 'date-box-bckg',
                        'type'     => 'color',
                        'title'    => esc_html__('Date Box Background', 'liberty'), 
                        'subtitle' => esc_html__('It will be used for date box background.', 'liberty'),
                        'default'  => '#281A70',
                    ),               
                    array(
                        'id'       => 'date-box-bckg2',
                        'type'     => 'color',
                        'title'    => esc_html__('Date Box Background 2', 'liberty'), 
                        'subtitle' => esc_html__('It will be used for date box background.', 'liberty'),
                        'default'  => '#32288D',
                    ),                
                    array(
                        'id'       => 'date-box-bckg-secondary',
                        'type'     => 'color',
                        'title'    => esc_html__('Date Box Background - Secondary', 'liberty'), 
                        'subtitle' => esc_html__('It will be used for date box background.', 'liberty'),
                        'default'  => '#B1091C',
                    ),               
                    array(
                        'id'       => 'date-box-bckg2-secondary',
                        'type'     => 'color',
                        'title'    => esc_html__('Date Box Background 2 - Secondary', 'liberty'), 
                        'subtitle' => esc_html__('It will be used for date box background.', 'liberty'),
                        'default'  => '#990314',
                    ), 
                    /* 
                    array(
                        'id'       => 'archive-author',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Author Thumbnail', 'liberty'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'liberty'),
                        'default'  => false,
                    ),
                    */
                
                    //pagination
                    
                    /* Uncomment this if you want to have uynstyled older/newer page links instead of number pagination
                    array(
                        'id' => 'blog-navigation-type',
                        'type' => 'radio',
                        'title' => esc_html__('Type of pagination', 'liberty'),
                        'default' => 'paged',
                        'options' => array(
                            'paged' => esc_html__('Show page numbers', 'liberty'),
                            'linked' => esc_html__('Show "older/newer posts" links', 'liberty'),
                        )
                    ),
                    */
                                        
                    // paged navigation
                    array(
                        'id' => 'blog-navigation-paginated-prevnext',
                        'type' => 'switch',
                        'title' => esc_html__('Show Prev/Next button', 'liberty'),
                        'subtitle' => esc_html__('It will be used in blog pagination.', 'liberty'),
                        'default' => true,
                        'on' => 'Yes',
                        'off' => 'No',
                    ),  
                )
            ) );   

            Redux::setSection( $opt_name, array(
                'title' => esc_html__('Blog/Post/Page Settings', 'liberty'),
                'id'    => 'blog-section',
                'icon'  => 'el-icon-book'
            ) );

            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( '404', 'liberty' ),
                'id'         => '404-subsection',
                'subsection' => true,
                'fields'     => array(
                    array(
                        'id' => '404-title',
                        'type' => 'text',
                        'title' => esc_html__('404 Title', 'liberty'),
                        'subtitle' => esc_html__('This title will be used on 404 page.', 'liberty'),
                        'default' => esc_html__('Page not found', 'liberty')
                    ),
                    array(
                        'id' => '404-message',
                        'type' => 'editor',
                        'title' => esc_html__('404 Message', 'liberty'),
                        'default' => esc_html__("The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.", 'liberty')
                    ),
                    array(
                        'id'        => '404-extra',
                        'type'      => 'select',
                        'title'     => esc_html__('404 Extra Content', 'liberty'),
                        'options'   => array(
                            'search' => esc_html__('Search Form', 'liberty'), 
                            'latest' => esc_html__('Latest Posts', 'liberty'),
                            'random' => esc_html__('Random Posts', 'liberty'),
                            'none' => esc_html__('none', 'liberty'),
                        ),
                        'default'   => 'search'
                    ), 
                )
            ) );

            Redux::setSection( $opt_name, array(
                'title'      => esc_html__( 'Special Pages', 'liberty' ),
                'id'         => 'special-pages-subsection',
                'subsection' => true,
                'fields'     => array(
                    // Projects listing page
                    array(
                        'id' => 'issues-page',
                        'type' => 'select',
                        'title' => esc_html__('Issues Page', 'liberty'),
                        'desc' => esc_html__('It will be used for breadcrumbs.', 'liberty'),
                        'data' => 'pages',
                    ), 
                    // Members listing page
                    array(
                        'id' => 'projects-page',
                        'type' => 'select',
                        'title' => esc_html__('Portfolio Page', 'liberty'),
                        'desc' => esc_html__('It will be used for breadcrumbs.', 'liberty'),
                        'data' => 'pages',
                    ), 
                )
            ) );



        
            
            /**



            SIDEBAR OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-pause',
                'title' => esc_html__('Sidebar', 'liberty'),
                'fields' => array(
                    array(
                        'id' => 'switch-sticky-sidebar',
                        'type' => 'switch',
                        'title' => esc_html__('Do you want to have a sticky sidebar?', 'liberty'),
                        'default' => false,
                        'off' => 'No',
                        'on' => 'Yes',
                    ),
                    array(
                        'id' => 'sidebar-link-color1',
                        'type' => 'link_color',
                        'compiler' => array('#secondary a:not(.btn)', '.custom-sidebar-widget a:not(.btn)'),
                        'title' => esc_html__('Sidebar Links Color - Option 1', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#18734A',
                            'hover' => '#138AD7',
                        )
                    ),
                    array(
                        'id' => 'sidebar-link-color2',
                        'type' => 'link_color',
                        'compiler' => array('#secondary li a', '.custom-sidebar-widget li a'),
                        'title' => esc_html__('Sidebar Links Color - Option 1', 'liberty'),
                        'subtitle' => esc_html__('It will be used in lists.', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#138AD7',
                            'hover' => '#18734A',
                        )
                    ),
                    array(
                        'id' => 'sidebar-link-color3',
                        'type' => 'link_color',
                        'compiler' => array('#secondary h3 a', '#secondary h4 a', '#secondary h5 a', '.custom-sidebar-widget h3 a', '.custom-sidebar-widget h4 a', '.custom-sidebar-widget h5 a'),
                        'title' => esc_html__('Sidebar Links Color - Option 3', 'liberty'),
                        'subtitle' => esc_html__('It will be used in titles.', 'liberty'),
                        'desc' => esc_html__('Please choose link colors.', 'liberty'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#1C424B',
                            'hover' => '#398699',
                        )
                    ),
                    array(
                        'id' => 'sidebar-widget-separator',
                        'type' => 'border',
                        'compiler' => array('#secondary aside.widget, .custom-sidebar-widget aside.widget'),
                        'all' => true,
                        'title' => esc_html__('Sidebar Widgets Border', 'liberty'),
                        'default' => array(
                            'border-color' => '#e8e6e8',
                            'border-style' => 'solid',
                            'border-width' => '1px'
                        ),
                    ), 
                    array(
                        'id' => 'sidebar-widget-background',
                        'type' => 'background',
                        'compiler' => array('#secondary aside.widget, .custom-sidebar-widget aside.widget'),
                        'title' => esc_html__('Sidebar Widgets Background', 'liberty'),
                        'background-image' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-color' => '#ffffff'),
                    ), 
                    array(
                        'id' => 'sidebar-list-separator',
                        'type' => 'border',
                        'compiler' => array('#secondary aside.widget h3, #secondary aside.widget li, .custom-sidebar-widget aside.widget li, .custom-sidebar-widget .upw-posts.tb article'),
                        'all' => false,
                        'top' => false,
                        'right' => false,
                        'left' => false,
                        'title' => esc_html__('Sidebar List Item Separator', 'liberty'),
                        'default' => array(
                            'border-color' => '#e8e8e8',
                            'border-style' => 'solid',
                            'border-width' => '1px'
                        ),
                    ),  
                )
            ) );    



            /**



            // PROMO LINE


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-group',
                'title' => esc_html__('Social Networks Settings', 'liberty'),
                'fields' => array(
                    array(
                        'id' => 'promo-text-email',
                        'type' => 'text',
                        'title' => esc_html__('Email', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'email',
                        'msg' => 'Please use valide email address.'
                    ),
                    array(
                        'id' => 'promo-text-facebook',
                        'type' => 'text',
                        'title' => esc_html__('Facebook URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-twitter',
                        'type' => 'text',
                        'title' => esc_html__('Twitter URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-instagram',
                        'type' => 'text',
                        'title' => esc_html__('Instagram URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-linkedin',
                        'type' => 'text',
                        'title' => esc_html__('LinkedIn URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),

                    array(
                        'id' => 'promo-text-googleplus',
                        'type' => 'text',
                        'title' => esc_html__('Google+ URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-pinterest',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled.', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-flickr',
                        'type' => 'text',
                        'title' => esc_html__('Flickr URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-youtube',
                        'type' => 'text',
                        'title' => esc_html__('YouTube URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                    array(
                        'id' => 'promo-text-vimeo',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo URL', 'liberty'),
                        'subtitle' => esc_html__('Social Buttons must be enabled', 'liberty'),
                        'desc' => esc_html__('Leave blank if you don\'t want to use it.', 'liberty'),
                        'validate' => 'no_html',
                    ),
                )
            ) );



            
            /**



            // TYPOGRAPHY OPTIONS


            
            **/
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-pencil',
                'title' => esc_html__('Typography', 'liberty'),
                'fields' => array(
                    array(
                        'id'          => 'tb-body-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Body Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => true,
                        'compiler'    => array('body'),
                        'units'       => 'px',
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '23px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h1-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H1 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h1'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#1d434c', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '42px', 
                            'line-height' => '65px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h1-small-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H1 Typography (smaller)', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h1.smaller'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#1d434c', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '27px', 
                            'line-height' => '45px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h2-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H2 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h2'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '24px', 
                            'line-height' => '40px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H3 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828',
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'left',
                            'font-size'   => '21px', 
                            'line-height' => '35px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h4-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H4 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h4'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '18px', 
                            'line-height' => '30px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h5-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H5 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h5'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '30px'
                        ),
                    ),
                    array(
                        'id'          => 'tb-h6-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('H6 Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('h6'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#282828', 
                            'font-weight'  => '400',
                            'font-family' => 'Lato', 
                            'text-align'  => 'left',
                            'font-size'   => '15px', 
                            'line-height' => '30px'
                        ),
                    ),  
                    array(
                        'id' => 'date-box-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Date Box Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.featured-image-holder.show-date .date-box, .date-box'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#ffffff",
                            'font-style' => '300',
                            'font-family' => 'Oswald',
                            'font-size' => '34px',
                            'text-align' => 'center',
                            'line-height' => '36px',
                            'text-transform' => 'uppercase')
                    ),
                    array(
                        'id'          => 'sidebar-h3-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Sidebar Title Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#secondary h3, .custom-sidebar-widget h3'),
                        'units'       => 'px',
                        'text-transform' => true,
                        'default'     => array(
                            'color'       => '#5b5b5b',
                            'font-weight'  => '400',
                            'font-family' => 'Lora', 
                            'text-align'  => 'center',
                            'font-size'   => '20px', 
                            'line-height' => '30px',
                            'text-transform' => 'uppercase',
                        ),
                    ),  
                    array(
                        'id'          => 'sidebar-h4-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Sidebar Subtitle Typography', 'liberty'),
                        'google'      => true, 
                        'font-backup' => false,
                        'compiler'    => array('#secondary h4, .custom-sidebar-widget h4'),
                        'units'       => 'px',
                        'default'     => array(
                            'color'       => '#1C424B',
                            'font-weight'  => '400',
                            'font-family' => 'PT Sans', 
                            'text-align'  => 'left',
                            'font-size'   => '16px', 
                            'line-height' => '25px'
                        ),
                    ),
                    array(
                        'id' => 'sidebar-typography',
                        'type' => 'typography',
                        'title' => esc_html__('Sidebar Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#secondary, .custom-sidebar-widget'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#777",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '14px',
                            'text-align' => 'left',
                            'line-height' => '20px',
                        ),
                    ),
                    array(
                        'id' => 'primary-font',
                        'type' => 'typography',
                        'title' => esc_html__('Replacement Font 1', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.tb-primary-font'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#282828",
                            'font-style' => '400',
                            'font-family' => 'Lora',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '21px',
                        ),
                    ),
                    array(
                        'id' => 'secondary-font',
                        'type' => 'typography',
                        'title' => esc_html__('Replacement Font 2', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('.tb-secondary-font'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#282828",
                            'font-style' => '400',
                            'font-family' => 'Oswald',
                            'font-size' => '12px',
                            'text-align' => 'left',
                            'line-height' => '21px',
                        ),
                    ),
                )
            ) );   


       
            /**



            WooCommerce OPTIONS


            
            **/

            if (class_exists('WooCommerce')) :

            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-shopping-cart',
                'title' => esc_html__('WooCommerce', 'liberty'),
                'fields' => array(
                    array(
                        'id' => 'woocommerce-price-tg',
                        'type' => 'typography',
                        'title' => esc_html__('WooCommerce Price Typography', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('#tb-product-catalogue span.price, .woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#0D8AD9",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '18px',
                            'text-align' => 'left',
                            'line-height' => '24px',
                            'text-transform' => 'uppercase')
                    ),       
                    array(
                        'id' => 'woocommerce-price-single-product',
                        'type' => 'typography',
                        'title' => esc_html__('WooCommerce Price Typography - Single Product', 'liberty'),
                        'google' => true,
                        'font-backup' => false,
                        'subsets' => false,
                        'compiler' => array('body div.product div#single-product-summary p.price, body div.product div#single-product-summary p.price span.amount'),
                        'units' => 'px',
                        'preview' => false,
                        'text-transform' => true,
                        'default' => array(
                            'color' => "#c9002d",
                            'font-style' => '400',
                            'font-family' => 'PT Sans',
                            'font-size' => '36px',
                            'text-align' => 'left',
                            'line-height' => '44px',
                            'text-transform' => 'uppercase')
                    ), 
                    array(
                        'id' => 'product-onsale-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale'),
                        'title' => esc_html__('On Sale Ribbon', 'liberty'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'liberty'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_sale.png'),
                    ), 
                    array(
                        'id' => 'product-featured-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.featured'),
                        'title' => esc_html__('Featured Ribbon', 'liberty'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'liberty'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_featured.png'),
                    ), 
                    array(
                        'id' => 'product-free-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.free'),
                        'title' => esc_html__('Free Product Ribbon', 'liberty'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'liberty'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_free.png'),
                    ), 
                    array(
                        'id' => 'product-new-background',
                        'type' => 'background',
                        'compiler' => array('span.onsale.new'),
                        'title' => esc_html__('New Product Ribbon', 'liberty'),
                        'subtitle' => esc_html__('Please use 60x60 image.', 'liberty'),
                        'background-color' => false,
                        'transparent' => false,
                        'background-repeat' => false,
                        'background-size' => false,
                        'background-attachment' => false,
                        'background-position' => false,
                        'default' => array('background-image' => PARENT_URL . '/images/ribbon_new.png'),
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'woocommerce-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Shop Pages Featured Image', 'liberty'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'liberty'),
                        'url' => true,
                        'compiler' => array('#featured-image.onshop'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'woocommerce-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Shop Pages Featured Image Height', 'liberty'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'liberty'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'liberty'),
                        'width' => false,
                        'compiler' => array('#featured-image.onshop'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),

                )
            ) );

            endif;

  
            
            /**



            The Events Calendar OPTIONS



            **/

            if (class_exists('Tribe__Events__Main')) :
            
            Redux::setSection( $opt_name, array(
                'icon' => 'el-icon-calendar',
                'title' => esc_html__('The Events Calendar', 'liberty'),
                'fields' => array(
                    // show bar
                    array(
                        'id' => 'tec-show-bar',
                        'type' => 'radio',
                        'title' => esc_html__('Do you want to show Events Calendar navigation bar?', 'liberty'),
                        'desc' => esc_html__('It will be shown across events view pages...', 'liberty'),
                        'default' => 'no',
                        'options' => array(
                            'no' => esc_html__('No', 'liberty'),
                            'yes' => esc_html__('Yes', 'liberty'),
                        )
                    ),                                 
                    array(
                        'id' => 'tec-archive-title-position',
                        'type' => 'select',
                        'title' => esc_html__('Title Position', 'liberty'),
                        'default' => 'below',
                        'options' => array(
                            'above' => esc_html__('Above featured image', 'liberty'),
                            'below' => esc_html__('Below featured image', 'liberty')
                        )
                    ),  
                    array(
                        'id'       => 'tec-archive-date-box',
                        'type'     => 'select', 
                        'title'    => esc_html__('Post - Date Box', 'liberty'),
                        'subtitle'    => esc_html__('It will be shown on top of image thumbnail.', 'liberty'),
                        'default'  => 'normal',
                        'options' => array(
                            'no' => esc_html__('Don\'t show date box', 'liberty'),
                            'normal' => esc_html__('Normal Date Box', 'liberty'),
                            'event_countdown' => esc_html__('With Countdown', 'liberty')
                        )
                    ), 
                    array(
                        'id'       => 'tec-archive-remove-export',
                        'type'     => 'radio', 
                        'title'    => esc_html__('Export Button?', 'liberty'),
                        'default'  => 'no',
                        'options' => array(
                            'no' => esc_html__('Remove it', 'liberty'),
                            'yes' => esc_html__('Keep it', 'liberty'),
                        )
                    ),
                    array(
                        'id' => 'events-calendar-background-image',
                        'type' => 'background',
                        'title' => esc_html__('Month View - Header Background', 'liberty'),
                        'url' => true,
                        'compiler' => array('.tribe-events-calendar thead th'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#990314'
                        )
                    ),

                    /**
                    PROMO IMAGE
                    **/ 
                    array(
                        'id' => 'events-featured-image',
                        'type' => 'background',
                        'title' => esc_html__('Events Featured Image', 'liberty'),
                        'desc' => esc_html__('It will be shown below main navigation.', 'liberty'),
                        'url' => true,
                        'compiler' => array('#featured-image.onevents'),
                        'output' => false,
                        'default' => array(
                            'background-position' => 'center top',
                            'background-attachment' => 'fixed',
                            'background-repeat' => 'no-repeat',
                            'background-color' => '#ffffff'
                        )
                    ),
                    array(
                        'id'       => 'events-featured-image-height',
                        'type'     => 'dimensions',
                        'units'    => array('px'),
                        'title'    => esc_html__('Events Featured Image Height', 'liberty'),
                        'subtitle' => esc_html__('It will be shown only on medium and large devices.', 'liberty'),
                        'desc' => esc_html__('Set to 0 if you don\'t want to use it.', 'liberty'),
                        'width' => false,
                        'compiler' => array('#featured-image.onevents'),
                        'default'  => array(
                            'height'  => '136'
                        ),
                    ),

                )
            ) );

            endif;
       

    /*
     * <--- END SECTIONS
     */


    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {

            if (is_multisite()) :
                $blog_details = get_blog_details();
                $blog_pref = 'site' . $blog_details->blog_id . '-';
            else:
                $blog_pref = '';
            endif;

            $filename = PARENT_DIR . "/inc/admin/" . $blog_pref . "options.css";

            
            global $wp_filesystem;
         
            if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }
         
            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
