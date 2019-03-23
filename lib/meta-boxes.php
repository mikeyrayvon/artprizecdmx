<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

  $home_page = get_page_by_path('home');

  if(!empty($home_page)) {

    $home_metabox = new_cmb2_box( array(
  		'id'            => $prefix . 'home_metabox',
  		'title'         => esc_html__( 'Fields', 'cmb2' ),
  		'object_types'  => array( 'page' ), // Post type
      'show_on'      => array(
        'key' => 'id',
        'value' => array($home_page->ID)
      ),
  	) );

    $home_metabox->add_field( array(
  		'name'         => esc_html__( 'Image carousel', 'cmb2' ),
  		'desc'         => esc_html__( 'Upload or add multiple images', 'cmb2' ),
  		'id'           => $prefix . 'carousel_images',
  		'type'         => 'file_list',
  		'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
  	) );

    $home_metabox->add_field( array(
      'name'       => esc_html__( 'Prize', 'cmb2' ),
      'id'         => $prefix . 'home_prize',
      'type'       => 'wysiwyg',
      'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 16), // rows="..."
        'editor_class' => 'cmb2-qtranslate'
      ),
    ) );

    $judges_group = $home_metabox->add_field( array(
      'id'          => $prefix . 'home_judges',
      'type'        => 'group',
      'description' => esc_html__( 'Judges', 'cmb2' ),
      'options'     => array(
        'group_title'   => esc_html__( 'Judge {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => esc_html__( 'Add Another Judge', 'cmb2' ),
        'remove_button' => esc_html__( 'Remove Judge', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
    ) );

    $home_metabox->add_group_field( $judges_group, array(
      'name'       => esc_html__( 'Name', 'cmb2' ),
      'id'         => 'name',
      'type'       => 'text',
      'description' => esc_html__( '', 'cmb2' ),
    ) );

    $home_metabox->add_group_field( $judges_group, array(
      'name'       => esc_html__( 'Bio', 'cmb2' ),
      'id'         => 'bio',
      'type'       => 'textarea',
      'description' => esc_html__( '', 'cmb2' ),
      'attributes' => array(
        'class' => 'cmb2-qtranslate',
      ),
    ) );

    $home_metabox->add_field( array(
      'name'       => esc_html__( 'Apply', 'cmb2' ),
      'id'         => $prefix . 'home_apply',
      'type'       => 'wysiwyg',
      'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 16), // rows="..."
        'editor_class' => 'cmb2-qtranslate'
      ),
    ) );

    $home_metabox->add_field( array(
      'name'       => esc_html__( 'Dates', 'cmb2' ),
      'id'         => $prefix . 'home_dates',
      'type'       => 'wysiwyg',
      'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 8), // rows="..."
        'editor_class' => 'cmb2-qtranslate'
      ),
    ) );

    $home_metabox->add_field( array(
      'name'       => esc_html__( 'Contact', 'cmb2' ),
      'id'         => $prefix . 'home_contact',
      'type'       => 'wysiwyg',
      'options' => array(
        'textarea_rows' => get_option('default_post_edit_rows', 8), // rows="..."
        'editor_class' => 'cmb2-qtranslate'
      ),
    ) );

  }
}
?>
