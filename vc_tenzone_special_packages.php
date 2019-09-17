<?php 
/*
Element Description: VC Inner Box
*/
 function alispx_get_type_posts_data($post_type = 'post')
{

  $posts = get_posts(array(
    'posts_per_page' => -1,
    'post_type'      => $post_type,
  ));

  $result = array();
  foreach ($posts as $post)
  {
    $result[] = array(
      'value' => $post->ID,
      'label' => $post->post_title,
    );
  }
  return $result;
}
// Element Class 
class vcSpecialPackages extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_SpecialPackageses_mapping' ) );
        add_shortcode( 'vc_SpecialPackageses', array( $this, 'vc_SpecialPackageses_html' ) );
    }
     
    // Element Mapping
    public function vc_SpecialPackageses_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('SpecialPackages Infobox', '10zone'),
                'base' => 'vc_SpecialPackageses',
                'description' => __('SpecialPackages box', '10zone'), 
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
                        'description' => __( 'SpecialPackages Box Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
					   array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Sub Heading', '10zone' ),
                        'param_name' => 'subtitle',
                        'value' => __( '', '10zone' ),
                        'description' => __( 'SpecialPackages Sub Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
					
					   array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'price-class',
                        'heading' => __( 'Pricing', '10zone' ),
                        'param_name' => 'pricing',
                        'value' => __( '', '10zone' ),
                        'description' => __( 'SpecialPackages Price', '10zone' ),
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
                        'description' => __( 'SpecialPackages Box Content', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ), 
					 array(
                        'type' => 'vc_link',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'SpecialPackages Anchor / Button Link', '10zone' ),
                        'param_name' => 'servlink',
                        //'value' => __( 'Default value', '10zone' ),
                        //'description' => __( 'Box Title', '10zone' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
					array(
                        'type' => 'dropdown',
                        'heading' => __( 'Box Height',  "10zone" ),
                        'param_name' => 'bxheight',
                        'group' => 'Container Height',
                        'value' => array(
                            __( 'Select Box Height', "10zone"  ) => 'auto',
                            __( 'Box Height 150px',  "10zone"  ) => '150px',
                            __( 'Box Height 160px',  "10zone"  ) => '160px',
                            __( 'Box Height 170px',  "10zone"  ) => '170px',
							__( 'Box Height 180px',  "10zone"  ) => '180px',
							__( 'Box Height 190px',  "10zone"  ) => '190px',
							__( 'Box Height 200px',  "10zone"  ) => '200px',
							__( 'Box Height 215px',  "10zone"  ) => '215px',
							__( 'Box Height 220px',  "10zone"  ) => '220px',
							__( 'Box Height 230px',  "10zone"  ) => '230px',
							__( 'Box Height 240px',  "10zone"  ) => '240px',
							__( 'Box Height 250px',  "10zone"  ) => '250px',
							__( 'Box Height 260px',  "10zone"  ) => '260px',
							__( 'Box Height 270px',  "10zone"  ) => '270px',
							__( 'Box Height 280px',  "10zone"  ) => '280px',
							__( 'Box Height 290px',  "10zone"  ) => '290px',
							__( 'Box Height 300px',  "10zone"  ) => '300px',
                            
                        )
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
    public function vc_SpecialPackageses_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
					'subtitle' =>'',
                    'text' => '',
					'bgclass' => '',
					'servlink' => '',
					'bxheight' => '',
					'pricing' => '',
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
        <div class="SpecialPackageses-wrap text-center">
         
            <div class="SpecialPackageses-box-title">
			<h3 style="text-align: center;"><strong><span style="font-size: 24px;">' . $title . '</span></strong></h3></div>
            <p style="text-align: center;"><strong>'. $pricing . '<br>' . $subtitle . '</strong></p>
            <div class="SpecialPackageses-box-text text-center" style="height:'.$bxheight.';">' . $text . '</div>
            <a class="'.$bgclass.' btn mx-auto d-block text-center pt-3" href="'.$a_link.'" title="" target="'.$a_target.'">'.$b_linktitle.'</a>
        </div>';
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcSpecialPackages();    
?>