<?php
/*
Element Description: VC Info Box
*/

// Element Class
class vc_avion_heading extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_avion_heading_mapping' ) );
        add_shortcode( 'vc_avion_heading', array( $this, 'vc_avion_heading_html' ) );
    }

    // Element Mapping
    public function vc_avion_heading_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }


        // Map the block with vc_map()
        vc_map(

            array(
                'name' => __('Avion Inner Heading', 'avion'),
                'base' => 'vc_avion_heading',
                //'description' => __('Navigation and Search for Top Header', 'avion'),
                'category' => __('Avion', 'avion'),
                'icon' => get_template_directory_uri().'/function-bundle/vc-elements/logo.png',
                'params' => array(

                    array(
                        'type' => 'textfield',
                        //'holder' => 'h3',
                        'class' => 'title-inner',
                        'heading' => __( 'Inner Title', 'avion' ),
                        'param_name' => 'innertitle',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    
                   /* array(
                        'type' => 'attach_image',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Image', 'avion' ),
                        'param_name' => 'serviceimg',
                        //'value' => __( 'Default value', 'avion' ),
                        //'description' => __( 'Box Title', 'avion' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type' => 'textarea',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Post Ids', 'avion' ),
                        'param_name' => 'servicetext',
                        //'value' => __( 'Default value', 'avion' ),
                        //'description' => __( 'Box Title', 'avion' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'heading' => __( 'Extra Classes', 'avion' ),
                        'param_name' => 'aclasses',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),*/


                )
            )
        );



    }





    // Element HTML
    public function vc_avion_heading_html( $atts ) {



        // Params extraction
        extract(
            shortcode_atts(
                array(
'innertitle' => '',
                ),
                $atts
            )
        );
      $spntext =  multistyle($innertitle,1);

        $html = '<h2>'.$spntext.'</h2>';



        return $html;

    }





} // End Element Class

// Element Class Init
new vc_avion_heading();