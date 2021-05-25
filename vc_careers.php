<?php 
/*
Element Description: VC Career
*/
 
// Element Class 
class vcCareer extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_Careersection_mapping' ) );
        add_shortcode( 'vc_Careersection', array( $this, 'vc_Careersection_html' ) );
    }
     
    // Element Mapping
    public function vc_Careersection_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Careers', 'lc'),
                'base' => 'vc_Careersection',
                'description' => __('Employee Benefits', 'lc'), 
                'category' => __('Learning Cert', 'lc'),   
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png',            
                'params' => array(   
                   array(
                        'type' => 'attach_image', 
                        'heading' => __( 'Benefits Image', 'lc' ),
                        'param_name' => 'slideimg', 
                        'description' => __( 'Slide Imager here', 'lc' ),
                        'admin_label' => false,
                        'weight' => 0, 
                    ), 
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'heading' => __( 'Benefits heading', 'lc' ),
                        'param_name' => 'headingcontent',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Slide Heading here', 'lc' ),
                        'admin_label' => true,
                       
                    ),
					  array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __( 'Benefits Content', 'lc' ),
                        'param_name' => 'textcontent',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Slide Content here', 'lc' ),
                        'admin_label' => true,
                       
                    ),),) );                                
        
    }
     
     
    // Element HTML
public function vc_Careersection_html( $atts ) {
          
        // Params extraction
 extract(  shortcode_atts( array( 'slideimg' => '', 'headingcontent' => '', 'textcontent' => '', ), $atts));

//Fetching Image by ID
$imgID = $atts[slideimg];
$benefitcontent = $atts[textcontent]; 
$headingcontent = $atts[headingcontent]; 
        
$iconimg = wp_get_attachment_image_src( $imgID, 'full' ); 
$html ='<div class="benefits-wrapper w-100">
<div class="container-fluid p-0"> 
<div class="row"> 
  <div class="col-lg-3 benefits-wrapper-lft">
  <section><figure><img src="'.$iconimg[0].'" /></figure></section>
  </div>
  <div class="col-lg-9 benefits-wrapper-content">
  <section><h3>'.$headingcontent.'</h3><p>'.$benefitcontent.'</p></section>
  </div><!-- .benefits-wrapper-->
  </div><!--.row-->
</div><!--.container-fluid-->
</div> <!--.benefits-wrapper-->';
 
 return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcCareer();    
?>