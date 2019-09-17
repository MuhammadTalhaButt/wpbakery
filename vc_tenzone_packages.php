<?php 
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcPackages extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_packages_mapping' ) );
        add_shortcode( 'vc_packages', array( $this, 'vc_packages_html' ) );
    }
     
    // Element Mapping
    public function vc_packages_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Packages Infobox', '10zone'),
                'base' => 'vc_packages',
                'description' => __('Packages box', '10zone'), 
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
                        'description' => __( 'Packages Box Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
                     
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Text Content', '10zone' ),
                        'param_name' => 'text',
                        'value' => __( '', '10zone' ),
                        'description' => __( 'Packages Box Content', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ), 
                     
                    array(
                        'type' => 'vc_link',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Packages Anchor / Button Link', '10zone' ),
                        'param_name' => 'servlink',
                        //'value' => __( 'Default value', 'day-one' ),
                        //'description' => __( 'Box Title', 'day-one' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),				
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_packages_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'text' => '',
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
        <div class="packages-wrap text-center">
         
             <div class="packages-box-title"><h3 class="packagess-box__title headbold500 text-center">' . $title . '</h3></div>
             
            <div class="packages-box-text text-center">' . $text . '</div>
         <a class="btn btn-orange mx-auto d-block text-center" href="'.$a_link.'" title="" target="'.$a_target.'">'.$b_linktitle.'</a>
        </div>';
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcPackages();    
?>