<?php

/**
 * Get all type posts
 *
 * @return void
 * @author alispx/dompl
 **/
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

add_action('vc_before_init', 'alispx_post_finder_integrateWithVC');
function alispx_post_finder_integrateWithVC()
{
  vc_map(array(
    'name'              => esc_html__('Alispx Post Finder', 'alispx'),
    'base'              => 'alispx_post_finder',
    'class'             => 'alispx-ico',
    'icon'              => 'alispx-ico',
    'category'          => esc_html__('Learning Cert', 'lc'),
    'admin_enqueue_css' => array(get_template_directory_uri . '/your-path/alispxvc.css'),
    'description'       => esc_html__('Alispx Post Finder', 'lc'),
    'params'            => array(
      array(
        'type'       => 'autocomplete',
        'class'      => '',
        'heading'    => esc_html__('Post Name', 'lc'),
        'param_name' => 'id',
        'settings'   => array(
          'values'         => alispx_get_type_posts_data(),
          'multiple'       => false,
          'sortable'       => false,
          'min_length'     => 1,
          'no_hide'        => false, // In UI after select doesn't hide an select list
          'groups'         => true,  // In UI show results grouped by groups
          'unique_values'  => true,  // In UI show results except selected. NB! You should manually check values in backend
          'display_inline' => false, // In UI show results inline view),
        ),
      ),
    ));
  }