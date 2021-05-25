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
            "type"          => "checkbox",
            "admin_label"   => true,
            "weight"        => 10,
            "heading"       => __( "Hide and Show this box", "js_composer" ),
            "description"   => __("Check to Show and Uncheck to hide", "js_composer"),
            //"value"         => array('On/Off'   => 'true' ),
			"value" => __( "", "lc" ),
            "param_name"    => "hideshow1",
			'group' => 'Box 1',
        ),
        array(
            "type"          => "checkbox",
            "admin_label"   => true,
            "weight"        => 10,
            "heading"       => __( "Hide and Show EnrollNow Button", "js_composer" ),
            "description"   => __("Check to Show and Uncheck to hide", "js_composer"),
            //"value"         => array('On/Off'   => 'true' ),
			"value" => __( "", "lc" ),
            "param_name"    => "showenroll",
			'group' => 'Box 1',
        ),
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
					
					/*  array(
                        'type' => 'textfield',
                        'holder' => 'span',
                        //'class' => 'title-class',
                        'heading' => __( 'Course Price', 'lc' ),
                        'param_name' => 'courseprice',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Courese Price here', 'lc' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 1',
                    ),
                    array(
                        'type' => 'textfield',
//                         'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Self Paced Course ID', 'lc' ),
                        'param_name' => 'buttonurl',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Self Paced Variation ID here', 'lc' ),
                        'admin_label' => true,
                        'weight' => 0,
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
	/**
	Box 2
	**/	
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
                        'type' => 'textfield',
                        'holder' => 'span',
                        //'class' => 'title-class',
                        'heading' => __( 'Course Price', 'lc' ),
                        'param_name' => 'courseprice2',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Courese Price here', 'lc' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 2',
                    ),
                    array(
                        'type' => 'textfield',
//                         'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Button Link', 'lc2' ),
                        'param_name' => 'buttonurl2',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Button Link here please add http://www.', 'lc2' ),
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
		
		
		/** Box 3	**/	
		   array(
            "type"          => "checkbox",
            "admin_label"   => true,
            "weight"        => 10,
            "heading"       => __( "Hide and Show this box", "js_composer" ),
            "description"   => __("hide and show this box", "js_composer"),
            //"value"         => array('On/Off'   => 'true' ),
			"value" => __( "", "lc" ),
            "param_name"    => "hideshow3",
			'group' => 'Box 3',
        ),
		  array(
                        'type' => 'attach_image',
                        'heading' => __( 'Service Icon', 'lc2' ),
                        'param_name' => 'courseimg3',
                        //'value' => __( 'Default value', 'lc2' ),
                        'description' => __( 'Box Icon here', 'lc2' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Box 3',
                    ),    
					  array(
                        'type' => 'textfield',
                        'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Service Title', 'lc2' ),
                        'param_name' => 'courseheading3',
                        //'value' => __( 'Default value', 'lc2' ),
                        'description' => __( 'Box Title here', 'lc2' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 3',
                    ),
                    array(
                        'type' => 'textfield',
//                         'holder' => 'h5',
                        //'class' => 'title-class',
                        'heading' => __( 'Contact Link', 'lc2' ),
                        'param_name' => 'buttonurl3',
                        //'value' => __( 'Default value', 'lc' ),
                        'description' => __( 'Contact Url here', 'lc2' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'Box 3',
                    ),
                   array(
                  "type" => "param_group",
                  "holder" => "",
                  "class" => "",
                  "heading" => __("List Items", 'lc2'),
                  "param_name" => "courselisting3",
                  'params' => array(
                      array(
             'type' => 'textfield',
             'value' => '',
             'heading' => __( 'List Items', 'lc2' ),
             'param_name' => 'list_items3',)
			 ),
			 'group' => 'Box 3',
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
			  'showenroll'=>'',
			'courselist' => '',
			'listitem' => '',
			'courseimg2' => '',
			'courseheading2' => '',
			'hideshow' => '',
			'courseimg3' => '',
			'courseheading3' => '',
			'hideshow3' => '',
), $listitems = vc_param_group_parse_atts( $atts["courselist"] ), $lists_item = vc_param_group_parse_atts( $atts["courselisting"] ), $lists_item3 = vc_param_group_parse_atts( $atts["courselisting3"] ),  $atts));
/*print_r($atts[hideshow]);*/
/*echo $atts[hideshow];*/
//Fetching Image by ID
$imgID = $atts[courseimg];
$heading = $atts[courseheading]; 
$crsprice = $atts[courseprice];

//Box 2 attributes
$imgID2 = $atts[courseimg2];
$heading2 = $atts[courseheading2];
$buttonurl2 = $atts[buttonurl2];
$crsprice2 = $atts[courseprice2];

//Box 2 attributes
$imgID3 = $atts[courseimg3];
$heading3 = $atts[courseheading3];
$buttonurl3 = $atts[buttonurl3];


$images = wp_get_attachment_image_src( $imgID, 'full' );
$images2 = wp_get_attachment_image_src( $imgID2, 'full' );
$images3 = wp_get_attachment_image_src( $imgID3, 'full' );

        // Fill $html var with data
		foreach( $listitems as $item ){
		foreach( $item as $items ){
		$output_li .= '<li>';
		$output_li .= $items ;
		$output_li .= '</li>';
		}
  }
  //Listing of 2nd box
   if($atts[hideshow] === 'true'){
  		foreach( $lists_item as $item2 ){
		foreach( $item2 as $items ){
		$output_li_two .= '<li>';
		$output_li_two .= $items ;
		$output_li_two .= '</li>';
		}
  }
   }
  //Listing of 3rd box
  if($atts[hideshow3] === 'true'){
  		foreach( $lists_item3 as $item3 ){
		foreach( $item3 as $items3 ){
		$output_li_three .= '<li>';
		$output_li_three .= $items3 ;
		$output_li_three .= '</li>';
		}
  }
   }
   if(!empty($crsprice2)){
	   $cprice2 = '<span class="propricing">$'.$crsprice2.'</span>';
   }
   else{
	   $cprice2 = ' ';
   }
  if($atts[showenroll]=='true')
        {
             $cenroll_btn = '<p><a href="#event" class="#event polyFirst poly3">Enroll Now</a></p>';
        }
        else{
            $cenroll_btn = 'Coming Soon';
        }
 
   
$html .= '<div id="optionboxes">';
  if($atts[hideshow1] === 'true'){
$html .= '<div class="price-plan">
<figure class="text-center training_option_figure pb-2"><img src="'.$images[0].'" /></figure>
    <h5>'.$heading .'</h5>
    <p class="price">Features include</p>
    <ul class="price-points">'.$output_li.'</ul>
    '.$cenroll_btn.' </div>';
  
   }
if($atts[hideshow] === 'true'){
$html.='<div class="price-plan2">
  <figure class="text-center training_option_figure pb-2"><img src="'.$images2[0].'" /></figure>
    <h5>'.$heading2.'</h5>
	'.$cprice2.'
    <p class="price">Features include</p>
    <ul class="price-points">
      '.$output_li_two.'
    </ul>

    <a href="'.$buttonurl2.'" class="'.$buttonurl2 .' polyFirst poly3">View Schedule</a>
  </div>';
}
if($atts[hideshow3] === 'true'){
$html.='<div class="price-plan ">
  <figure class="text-center training_option_figure pb-2"><img src="'.$images3[0].'" /></figure>
    <h5>'.$heading3.'</h5>
    <p class="price">Features include</p>
    <ul class="price-points">
      '.$output_li_three.'
    </ul>

    <a href="#" class="popmake-6687 polyFirst poly3 pum-trigger ">Contact us</a>
  </div>';
}
 $html .= '</div>';
 return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcEnroll();    
?>