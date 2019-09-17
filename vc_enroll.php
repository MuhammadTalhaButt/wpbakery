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
                        'admin_label' => false,
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
), $listitems = vc_param_group_parse_atts( $atts["courselist"] ), $lists_item = vc_param_group_parse_atts( $atts["courselisting"] ),  $atts));
//print_r($atts);
//Fetching Image by ID
$imgID = $atts[courseimg];
$heading = $atts[courseheading];
$images = wp_get_attachment_image_src( $imgID, 'full' );

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
if(!empty($courseheading2)){
$html.='<div class="price-plan2">
  <figure class="text-center pt-5 pb-2"><img src="https://wordpress-256654-883503.cloudwaysapps.com/wp-content/uploads/2018/06/Asset-2.png" /><figure>
    <h5>Open Enrollment</h5>
    <p class="price">Features include</p>
    <ul class="price-points">
      <li>Everything in Self-Paced Learning, Plus</li>
<li>Live online instructor-led class</li>
<li>Flexible online class access for 90 days</li>
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