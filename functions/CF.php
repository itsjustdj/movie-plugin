<?php

//Custom Fields
function Custom_Fields(){
    add_meta_box(
        'movie_review_cf',
        'Pre Watch Thoughts',       //Title of Custom Field
        'CF',                       //custom fields function
        'movie_reviews',             //custom post type
        'normal',
        'high'
    );
}

function CF(){
    ?>
        <input type="text" name="title">
    <?php
}