<?php
/**
 * @package Easy Movie Reviews
 * @version 1.0
 */
/*
Plugin Name: Easy Movie Reviews
Plugin URI: 
Description: Allows you to easily create review posts about movies. More functions to come.
Author: D.J. Billings
Version: 1.0
Author URI: http://itsjustdj.com
*/

//Security
if( ! defined ('ABSPATH')){
    echo 'Nothing I can do when called directly!';
    die;
}

//Call single movie post template — filter the single_template with our custom function*/

add_filter('single_template', 'movie_template');

function movie_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'cpt_mr' ) {
        if ( file_exists( PLUGIN_PATH . '/templates/single-movie.php' ) ) {
            return PLUGIN_PATH . '/templates/single-movie.php';
        }
    }

    return $single;

}

// Custom Post Type
include('functions/CPT.php');
add_action( 'init', 'cpt_mr');

// Custom Fields
include('functions/CF.php');
add_action( 'admin_init', 'Custom_Fields');

// Create a Table in the DB
function mr_create_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    
    $table_name = $wpdb->prefix . 'prewatch_thoughts';
    $sql = "CREATE TABLE $table_name (
        prewatch_ID     INTEGER     NOT NULL AUTO_INCREMENT,
        prewatch        text    NOT NULL,
        PRIMARY KEY     (prewatch_ID)

    ) $charset_collate;";

    dbDelta($sql);

}

register_activation_hook(__FILE__, 'mr_create_table');