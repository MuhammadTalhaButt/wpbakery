<?php 
/*
Element Description: VC Inner Box
*/
 
// Element Class 
class vcInnerbox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_innerboxes_mapping' ) );
        add_shortcode( 'vc_innerboxes', array( $this, 'vc_innerboxes_html' ) );
    }
     
    // Element Mapping
    public function vc_innerboxes_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Innerbox Infobox', '10zone'),
                'base' => 'vc_innerboxes',
                'description' => __('Innerbox box', '10zone'), 
                'category' => __('10Zone Options', '10zone'),   
                'icon' => get_template_directory_uri().'/vc-elements/10zone-logo.png',            
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Heading', '10zone' ),
                        'param_name' => 'title',
                        'value' => __( '', '10zone' ),
                        'description' => __( 'Innerbox Box Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
                     
                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Text Content', '10zone' ),
                        'param_name' => 'text',
                        'value' => __( '', '10zone' ),
                        'description' => __( 'Innerbox Box Content', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ), 
					     array(
                        'type' => 'vc_link',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Innerbox Anchor / Button Link', '10zone' ),
                        'param_name' => 'servlink',
                        //'value' => __( 'Default value', '10zone' ),
                        //'description' => __( 'Box Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                     
              		array(
                        'type' => 'dropdown',
                        'heading' => __( 'Link Layout Type',  "10zone" ),
                        'param_name' => 'bgclass',
                        'group' => 'General',
                        'value' => array(
                            __( 'Select Link Layout',  "10zone"  ) => '',
                            __( 'Layout 1',  "10zone"  ) => 'btn-orange-link',
                            __( 'Layout 2',  "10zone"  ) => 'btn-10zone',
                            __( 'Layout 3',  "10zone"  ) => 'btn-orange',
                            
                        )
                    ),
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_innerboxes_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'text' => '',
					'bgclass' => '',
					'servlink' => '',
                ), 
                $atts
            )
        );
         //print_r($atts);
		 $linkup = vc_build_link( $servlink );
		 $a_link = $linkup['url'];
		 $b_linktitle = $linkup['title'];
		 $a_target = ($prolink['target'] == '') ? '' : 'target="'.$prolink['target'].'"';
        // Fill $html var with data
        $html = '
        <div class="innerboxes-wrap text-center">
         
             <div class="innerboxes-box-title"><h6 class="innerboxes-box__title headbold500 text-center">' . $title . '</h6></div>
             
            <div class="innerboxes-box-text text-center">' . $text . '</div>
         <a class="'.$bgclass.' btn mx-auto d-block text-center pt-3" href="'.$a_link.'" title="" target="'.$a_target.'">'.$b_linktitle.'</a>
        </div>';
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcInnerbox();    
?>