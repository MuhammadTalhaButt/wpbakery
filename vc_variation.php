<?php 
/*
Element Description: VC News Timeline
*/
 
// Element Class 
class vcVariant extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_variant_mapping' ) );
        add_shortcode( 'vc_variant', array( $this, 'vc_variant_html' ) );
    }
     
    // Element Mapping
    public function vc_variant_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Product Variant', 'lc'),
                'base' => 'vc_variant',
                'description' => __('Product Variant boxes', 'lc'), 
                'category' => __('Learning Cert', 'lc'),   
				'show_settings_on_create' => true,
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png',   				
                'params' => array(   
                  array(
                  "type" => "param_group",
                  "holder" => "",
                  "class" => "",
                  "heading" => __("News Boxes here", 'lc'),
                  "param_name" => "newwrapper",
                  'params' => array(
         	  array(
                        'type' => 'textfield',
                        'holder' => 'h5',
                        'class' => 'newstitle',
                        'heading' => __( 'News Title', 'lc' ),
                        'param_name' => 'newsheading',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Box Title here', 'lc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'News Box',
                    ),
			 
			 array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Content", 'lc'),
                  "param_name" => "newscontent",
                  //"value" => __("<ul><li>list item 1</li><li>list item 2</li><li>list item 3</li><li>list item 4</li></ul>", 'lc'),
                  "description" => __("Enter your content.", 'lc'),
				  'group' => 'News Box',
        ),
			array(
				'type'        => 'wpc_date',
				'heading'     => 'Date Format (month/date/year)',
				'class' => 'newsdate',
				'id' => 'newsdate',
				'param_name'  => 'date',
				'admin_label' => true,
				'value'       => '',
				'group' => 'News Box',
			),
			
			 ),
			 'group' => 'News Box',
        ),
				
    
	
			
		 ), 
	   )
       );                                
        
    }
     
    // Element HTML
    public function vc_variant_html( $atts ) {
          
        // Params extraction
        extract(
		
            shortcode_atts( array(
			'newsheading' => '',
			$timelineitem = vc_param_group_parse_atts( $atts["newwrapper"] ),
			), $atts));
//print_r($atts);
$i = 0;
		foreach( $timelineitem as $timeline ){
			//print_r($timeline);
		$year = date('F', strtotime($timeline['date']));
		$output_wrap .= '   <div class="timeline-item '.(++$i%2 ? "odd" : "even").'">
		<div class="timeline-img"></div>
		<div class="timeline-content  '.(++$i%2 ? "js--fadeInRight" : "js--fadeInLeft").'">
        <h2>'.$timeline['newsheading'].'</h2>
        <div class="date">'.$year.'</div>
        <p>'.$timeline['newscontent'].'</p>
      
      </div>
    </div> ';
	 $i++;
  }
  
        $html .= '
<section class="timeline">
  <div class="container">   Test
   </div>
</section>';
$available_variations = $product->get_available_variations();

	foreach($available_variations as $vari){
									foreach($vari as $variations){
									//var_dump($variations);
									echo $vari['attribute_pa_filament'].'<br>';
										}
								}
return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcVariant();  

?>
