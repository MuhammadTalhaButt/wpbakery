<?php
/*
Element Description: VC Info Box
*/

// Element Class
class vc_avion_service extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_avion_service_mapping' ) );
        add_shortcode( 'vc_avion_service', array( $this, 'vc_avion_service_html' ) );
    }

    // Element Mapping
    public function vc_avion_service_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }


        // Map the block with vc_map()
        vc_map(

            array(
                'name' => __('Avion Test', 'avion'),
                'base' => 'vc_avion_service',
                //'description' => __('Navigation and Search for Top Header', 'avion'),
                'category' => __('Avion', 'avion'),
                'icon' => get_template_directory_uri().'/function-bundle/vc-elements/logo.png',
                'params' => array(

                    array(
                        'type' => 'textfield',
                        //'holder' => 'h3',
                        'class' => 'title-service',
                        'heading' => __( 'Service Title', 'avion' ),
                        'param_name' => 'servicetitle',
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
                    ),*/
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
                    ),


                )
            )
        );



    }





    // Element HTML
    public function vc_avion_service_html( $atts ) {



        // Params extraction
        extract(
            shortcode_atts(
                array(
'servicetitle' => '',
'serviceimg' => '',
                    'servicetext' => '',
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

// for($v=0;$v<9;$v++){
//     $html .= '<p>'.$servicetext.'</p>';
// }

        $html = '<div class="album-item">
        <a href="#">
            <img src="'.bloginfo( 'template_url' ).'/images/home/recent-album3.jpg" class="img-responsive" alt="album">
            <div class="overlay base-gradient-bg"></div>
            <h3 class="heading">Sound of Silence</h3>
        </a>
    </div><!--/.album-item-->
</div>';



        return $html;

    }





} // End Element Class

// Element Class Init
new vc_avion_service();