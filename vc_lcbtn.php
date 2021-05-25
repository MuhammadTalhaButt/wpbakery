<?php
/*
Element Description: VC Button
*/

// Element Class
class vc_lcbtn_button extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_lcbtn_button_mapping' ) );
        add_shortcode( 'vc_lcbtn_button', array( $this, 'vc_lcbtn_button_html' ) );
    }

    // Element Mapping
    public function vc_lcbtn_button_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }


        // Map the block with vc_map()
        vc_map(

            array(
                'name' => __('LC Button', 'lc'),
                'base' => 'vc_lcbtn_button',
                //'description' => __('Navigation and Search for Top Header', 'lc'),
                 'category' => __('Learning Cert', 'lc'),   
                'icon' => get_template_directory_uri().'/vc-elements/lc-logo-icon.png', 
                'params' => array(

                   array(
                        'type' => 'textfield',
                        //'holder' => 'h3',
                        //'class' => '',
                        'heading' => __( 'Title', 'lc' ),
                        'param_name' => 'titlelinkname',
                        'value' => __( '', 'lc' ),
                        'description' => __( 'Link Title', 'lc' ),
                        'admin_label' => true,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type' => 'vc_link',
                        //'holder' => 'h3',
                        //'class' => 'title-class',
                        'heading' => __( 'Anchor / Button Link', 'lc' ),
                        'param_name' => 'prolink',
                        //'value' => __( 'Default value', 'lc' ),
                        //'description' => __( 'Box Title', 'lc' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'heading' => __( 'Extra Classes', 'lc' ),
                        'param_name' => 'aclasses',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),

  array(
  'type' => 'css_editor',
  'heading' => __( 'Css', 'lc' ),
  'param_name' => 'css',
  'group' => __( 'Design options', 'lc' ),
  ),
                )
            )
        );



    }





    // Element HTML
    public function vc_lcbtn_button_html( $atts ) {

// Params extraction
        extract(
            shortcode_atts(
                array(
                   'titlelinkname'   => '',
                    'prolink' => '',
                    'aclasses' => '',
                ),
                $atts
            )
        );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
        $prolink = ($prolink=='||') ? '' : $prolink;
		$prolink = vc_build_link( $prolink );
		$a_link = $prolink['url'];
		$a_title = ($prolink['titlelinkname'] == '') ? '' : 'title="'.$prolink['titlelinkname'].'"';
		$a_target = ($prolink['target'] == '') ? '' : 'target="'.$prolink['target'].'"';
	/*	//extractVcUrl2Anchor($prolink, $aclasses);
		*/
//Anchor Tag
    $prolink_rendered = $a_link ? '<a itemprop="url" target="_self" href="'.$a_link. '" class="eltdf-btn eltdf-btn-small eltdf-btn-outline eltdf-btn-arrow lc_cus_btn '.$css_class.' '.$aclasses.'" ><span class="eltdf-btn-text">'.$titlelinkname.'</span></a>' : '';


        $html = $prolink_rendered;



        return $html;

    }





} // End Element Class

// Element Class Init
new vc_lcbtn_button();