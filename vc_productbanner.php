<?php 
/*
Element Description: VC Bannl
*/
 
// Element Class 
class vcBannl extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_sliderbanner_mapping' ) );
        add_shortcode( 'vc_sliderbanner', array( $this, 'vc_sliderbanner_html' ) );
    }
     
    // Element Mapping
    public function vc_sliderbanner_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Slider Banner', 'lc'),
                'base' => 'vc_sliderbanner',
                'description' => __('Slider boxes', 'lc'), 
                'category' => __('Learning Cert', 'lc'),   
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png',   
		  			
                'params' => array(   
				  array(

                        'type' => 'attach_image',
                        'class' => 'slide_img',
                        'heading' => __( 'Background Image', 'lc' ), 
                        'param_name' => 'slideimg',  
                        'description' => __( 'Background Image here', 'lc' ), 
                        'admin_label' => false,  
                        'group' => 'Slider Details',

                    ), 
                    array(

                        'type' => 'attach_image',
                        'class' => 'prodt_img',
                        'heading' => __( 'Product logo', 'lc' ), 
                        'param_name' => 'prodtimg',  
                        'description' => __( 'product Image here', 'lc' ), 
                        'admin_label' => false,  
                        'group' => 'Product logo',

                    ),
  
				array(

                  "type" => "param_group",
                  "holder" => "",
                  "class" => "",
                  "heading" => __("List Items", 'lc'),
				  'admin_label' => false,
                  "param_name" => "slidelist",
				  'group' => 'Slider Details',
                  'params' => array(
				  array(
				  'type' => 'textfield',
				  'value' => '',
				  'heading' => __( 'Slider List Item', 'lc' ),
				  'param_name' => 'slidelistitem',
				  'admin_label' => false,
				  )

			 ),
             ),
             array(

                'type' => 'textfield',
                'class' => 'prodt_offer',
                'heading' => __( 'Offer One', 'lc' ), 
                'param_name' => 'prodoff1',  
                //'description' => __( 'product Image here', 'lc' ), 
                'admin_label' => false,  
                'group' => 'Product Offers',

           ),
           array(

            'type' => 'textfield',
            'class' => 'prodt_offer',
            'heading' => __( 'Offer two', 'lc' ), 
            'param_name' => 'prodoff2',  
            //'description' => __( 'product Image here', 'lc' ), 
            'admin_label' => false,  
            'group' => 'Product Offers',

       ),
       array(

        'type' => 'textfield',
        'class' => 'prodt_offer',
        'heading' => __( 'Offer three', 'lc' ), 
        'param_name' => 'prodoff3',  
        //'description' => __( 'product Image here', 'lc' ), 
        'admin_label' => false,  
        'group' => 'Product Offers',

   ),
  array(
        'type' => 'textfield',
        'class' => 'prodt_video',
        'heading' => __( 'Youtube Link', 'lc' ), 
        'param_name' => 'youtubelink',  
        //'description' => __( 'product Image here', 'lc' ), 
        'admin_label' => false,  
        'group' => 'Youtube Link',

   ),	
           ), )  
        );                                
        
    }
     
     
    // Element HTML
    public function vc_sliderbanner_html( $atts ) {
          
        // Params extraction
 extract(   shortcode_atts( array( 'prodoff1' => '','prodoff2' => '','prodoff3' => '','youtubelink' => '','slideimg' => '', 'prodtimg' => '', 'slidelist' => ''), $slidelistitems = vc_param_group_parse_atts( $atts["slidelist"] ), $atts));
 
//Fetching Image by ID
$slider_img = $atts[slideimg]; 
$productimg = $atts[prodtimg];

$prdtoff1 = $atts[prodoff1];
$prdtoff2 = $atts[prodoff2];
$prdtoff3 = $atts[prodoff3];

$linkvideo = $atts[youtubelink];
        
$images = wp_get_attachment_image_src( $slider_img, 'full' );
$proimg = wp_get_attachment_image_src( $productimg, 'full' );
		foreach($slidelistitems as $item ){
			foreach( $item as $items ){
				$output_li .= '<li>';
				$output_li .= $items ;
				$output_li .= '</li>';

		}
		}

$html .= '<div class="w-100 background_header">
<div class="container"> 
   <div class="bg_header_content w-100"> 
    <div class="row"> 
<div class="col-lg-6 slider-lft">
<div class="w-100 bg_header_title">
<span class="background_header_title breadcrumbss">'.products_breadcrumb().'</span>
</div> 
 <div class="bg_header_heading">

    <h1><span class="background_header_heading">'.get_the_title().'</span></h1></div>
    <ul class="background_header_points mb-md-2">'.$output_li.'</ul>
	<div class="row w-100"> 
 <section class="btn_enroll_now col-md-6">  <a href="#tdm" class="btn bg_header_button"> ENROLL NOW  </a></section> 
 <figure class="pt-md-3 pl-md-0 col-md-6 brandlogo"><img class="brandlogo_img" src="'.$proimg[0].'" alt="logo here" /></figure>
 </div>
</div>
<div class="col-lg-6 slider-rht" style="background:url('.$images[0].') right top no-repeat;background-size:contain;">
';
if(!empty($linkvideo)){
    $html .='<section class="ply_btn_wrap w-100"><a data-youtube="'.$linkvideo.'" id="" class="youtube_play_btn"> <i class="fa fa-play fa-2x bg_play_button"></i></a></section>';
}

$html .=' 
</div>
</div><!--.row-->
</div><!--.bg_header_content-->
</div>
</div> 
</div> 
<div class="w-100 banner-offers">
<div class="container">
<div class="row">
<section class="col-12">
<ul>
<li>'.$prdtoff1.'</li>
<li>'.$prdtoff2.'</li>';
if(!empty($prdtoff3)){ $html .= '<li>'.$prdtoff3.'</li>'; }
$html .= '</ul>
</section>
</div><!--.row-->
</div><!--.container-->
</div>

';
 return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcBannl();    
?>