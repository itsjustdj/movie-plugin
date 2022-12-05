<?php

//Custom Fields
function Custom_Fields(){
    add_meta_box(
        'movie_review_cf',
        'Pre Watch Thoughts',       //Title of Custom Field
        'CF',                       //custom fields function
        'movie_reviews',             //custom post type
        'normal',
        'low'
    );
}

function CF(){
    ?>
        <input type="text" name="prewatch">
    <?php
}

function save_custom_fields($post_ID) {
    $prewatch = $_POST['prewatch'];

    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix.'prewatch_thoughts',
        [
            'prewatch_ID' => '10',
            'title' => $prewatch
        ]
    );
}
add_action('save_post', 'save_custom_fields');