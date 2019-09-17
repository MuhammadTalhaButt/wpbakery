<?php 
/*
Element Description: VC Info Box
*/
 
// Element Class 
class vcLcBlog extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_innerbox_mapping' ) );
        add_shortcode( 'vc_innerbox', array( $this, 'vc_innerbox_html' ) );
    }
     
    // Element Mapping
    public function vc_innerbox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Blog Post LC', 'lc'),
                'base' => 'vc_innerbox',
                'description' => __('Blog Post boxes', 'lc'), 
                'category' => __('Learning Cert', 'lc'),   
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png',            
                'params' => array(   
                       array(
        'type'       => 'autocomplete',
        'class'      => '',
        'heading'    => esc_html__('Post Name', 'lc'),
        'param_name' => 'postid',
        'settings'   => array(
          'values'         => lc_get_type_posts_data(),
          'multiple'       => false,
          'sortable'       => false,
          'min_length'     => 1,
          'no_hide'        => false, // In UI after select doesn't hide an select list
          'groups'         => true,  // In UI show results grouped by groups
          'unique_values'  => true,  // In UI show results except selected. NB! You should manually check values in backend
          'display_inline' => false, // In UI show results inline view),
        ),
		'group' => 'General',
      ),     
                   
        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function vc_innerbox_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts( array('postid' => '', ),  $atts));
         //print_r($atts);
        // Fill $html var with data
		$curr_postid = $postid;//This is page id or post id
        $content_post = get_post($curr_postid);
		$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
$url = wp_get_attachment_url( get_post_thumbnail_id($curr_postid), 'full' );
        $html = '
        <div class="blog-post-wrap">
		<figure><img src="'.$url.'" height="100" /></figure>
		<section>'.$content.'</section>
		</div>';
        return $html;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new vcLcBlog();    
?>