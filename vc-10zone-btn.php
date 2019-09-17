<?php
/*
Element Description: VC Info Box
*/

// Element Class
class vc_10zone_link_button extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_10zone_link_button_mapping' ) );
        add_shortcode( 'vc_10zone_link_button', array( $this, 'vc_10zone_link_button_html' ) );
    }

    // Element Mapping
    public function vc_10zone_link_button_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }


        // Map the block with vc_map()
        vc_map(

            array(
                'name' => __('10zone Button', 'day-one'),
                'base' => 'vc_10zone_link_button',
                //'description' => __('Navigation and Search for Top Header', 'day-one'),
                'category' => __('10Zone Options', '10zone'), 
                'icon' => get_template_directory_uri().'/vc-elements/10zone-logo.png',
                'params' => array(

                   /* array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'day-one' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'day-one' ),
                        'description' => __( 'Box Title', 'day-one' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),

                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'day-one' ),
                        'param_name' => 'text',
                        'value' => __( 'Default value', 'day-one' ),
                        'description' => __( 'Box Text', 'day-one' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),*/
                    
                    array(
                        'type' => 'vc_link',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Anchor / Button Link', 'day-one' ),
                        'param_name' => 'prolink',
                        //'value' => __( 'Default value', 'day-one' ),
                        //'description' => __( 'Box Title', 'day-one' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'heading' => __( 'Extra Classes', 'day-one' ),
                        'param_name' => 'aclasses',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),


                )
            )
        );



    }





    // Element HTML
    public function vc_10zone_link_button_html( $atts ) {



        // Params extraction
        extract(
            shortcode_atts(
                array(
//                    'title'   => 'Info Box',
//                    'text' => 'Info Box text',
                    'prolink' => '',
                    'aclasses' => '',
                ),
                $atts
            )
        );
/*
        $prolink = ($prolink=='||') ? '' : $prolink;
		$prolink = vc_build_link( $prolink );
		$a_link = $prolink['url'];
		$a_title = ($prolink['title'] == '') ? '' : 'title="'.$prolink['title'].'"';
		$a_target = ($prolink['target'] == '') ? '' : 'target="'.$prolink['target'].'"';
//Anchor Tag
    $prolink_rendered = $a_link ? '<a href="'.$a_link. '" class="mh_ui button stroke dark '.$aclasses.'" '.$a_title.' '.$a_target.'>'.$prolink['title'].'</a>' : '';
*/

        $html = extractVcUrl2Anchor($prolink,'mh_ui button stroke dark '.$aclasses);



        return $html;

    }





} // End Element Class

// Element Class Init
new vc_10zone_link_button();