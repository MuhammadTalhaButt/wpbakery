<?php 
/*
Element Description: VC Enroll Boxes
*/
 
// Element Class 
class vcEnroll extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_enrollbox_mapping' ) );
        add_shortcode( 'vc_enrollbox', array( $this, 'vc_enrollbox_html' ) );
    }
     
    // Element Mapping
    public function vc_enrollbox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Highlight boxes', 'lc'),
                'base' => 'vc_enrollbox',
                'description' => __('Highlight boxes', 'lc'), 
                'category' => __('Learning Cert', 'lc'),   
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png',            
                'params' => array(   
                   array(
                        'type' => 'attach_image',
                        //holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Icon', 'lc' ),
                        'param_name' => 'courseimg',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Box Icon here', 'lc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Box 1',
                    ),    
					  array(
                        'type' => 'textfield',
                        'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Title', 'lc' ),
                        'param_name' => 'courseheading',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Box Title here', 'lc' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 1',
                    ),
                   /*array(
                  "type" => "textarea_html",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Content", 'lc'),
                  "param_name" => "coursecontent",
                  "value" => __("<ul><li>list item 1</li><li>list item 2</li><li>list item 3</li><li>list item 4</li></ul>", 'lc'),
                  "description" => __("Enter your content.", 'lc'),
				  'group' => 'Box 1',
        ),*/
		 array(
                  "type" => "param_group",
                  "holder" => "",
                  "class" => "",
                  "heading" => __("List Items", 'lc'),
				  'admin_label' => false,
                  "param_name" => "courselist",
                  'params' => array(
          array(
             'type' => 'textfield',
             'value' => '',
             'heading' => __( 'List Items', 'lc' ),
             'param_name' => 'listitem',
			 'admin_label' => true,
			 )
			 ),
			 'group' => 'Box 1',
        ),
		
		   array(
            "type"          => "checkbox",
            "admin_label"   => true,
            "weight"        => 10,
            "heading"       => __( "Hide and Show this box", "js_composer" ),
            "description"   => __("hide and show this box", "js_composer"),
            //"value"         => array('On/Off'   => 'true' ),
			"value" => __( "", "lc" ),
            "param_name"    => "hideshow",
			'group' => 'Box 2',
        ),
		  array(
                        'type' => 'attach_image',
                        'heading' => __( 'Service Icon', 'lc2' ),
                        'param_name' => 'courseimg2',
                        //'value' => __( 'Default value', 'lc2' ),
                        'description' => __( 'Box Icon here', 'lc2' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Box 2',
                    ),    
					  array(
                        'type' => 'textfield',
                        'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Title', 'lc2' ),
                        'param_name' => 'courseheading2',
                        //'value' => __( 'Default value', 'lc2' ),
                        'description' => __( 'Box Title here', 'lc2' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 2',
                    ),
                   array(
                  "type" => "param_group",
                  "holder" => "",
                  "class" => "",
                  "heading" => __("List Items", 'lc2'),
                  "param_name" => "courselisting",
                  'params' => array(
          array(
             'type' => 'textfield',
             'value' => '',
             'heading' => __( 'List Items', 'lc2' ),
             'param_name' => 'list_items',)
			 ),
			 'group' => 'Box 2',
        ),
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_enrollbox_html( $atts ) {
          
        // Params extraction
        extract(
		
            shortcode_atts( array(
			'courseimg' => '',
			'courseheading' => '',
			'courselist' => '',
			'listitem' => '',
			'courseimg2' => '',
			'courseheading2' => '',
			'hideshow' => '',
), $listitems = vc_param_group_parse_atts( $atts["courselist"] ), $lists_item = vc_param_group_parse_atts( $atts["courselisting"] ),  $atts));
/*print_r($atts[hideshow]);
echo $atts[hideshow];*/
//Fetching Image by ID
$imgID = $atts[courseimg];
$heading = $atts[courseheading];

//Box 2 attributes
$imgID2 = $atts[courseimg2];
$heading2 = $atts[courseheading2];

$images = wp_get_attachment_image_src( $imgID, 'full' );
$images2 = wp_get_attachment_image_src( $imgID2, 'full' );

        // Fill $html var with data
		foreach( $listitems as $item ){
		foreach( $item as $items ){
		$output_li .= '<li>';
		$output_li .= $items ;
		$output_li .= '</li>';
		}
  }
  //Listing of 2nd box
  		foreach( $lists_item as $item2 ){
		foreach( $item2 as $items ){
		$output_li_two .= '<li>';
		$output_li_two .= $items ;
		$output_li_two .= '</li>';
		}
  }

$html .= '<div id="optionboxes">
<div class="price-plan">
<figure class="text-center pt-5 pb-2"><img src="'.$images[0].'" /><figure>
    <h5>'.$heading .'</h5>
    <p class="price">Features include</p>
    <ul class="price-points">'.$output_li.'</ul>
          <p class="price"><strong>Coming Soon</strong></p>
</div>';
if($atts[hideshow] === 'true'){
$html.='<div class="price-plan2">
  <figure class="text-center pt-5 pb-2"><img src="'.$images2[0].'" /><figure>
    <h5>'.$heading2.'</h5>
    <p class="price">Features include</p>
    <ul class="price-points">
      '.$output_li_two.'
    </ul>

    <a href="#" class="polyFirst poly2">Register Here</a>
  </div>';
}
 $html .= '</div>';
 return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcEnroll();    
?>
