<?php

function add_custom_meta_boxes(){
    add_meta_box( 'moviesInfo', 'More Movies Info', 'moviesInfoCallback', 'movie', 'normal', 'default', null );
    add_meta_box( 'moviesCustomImage', 'More Custom Image', 'addImageCallback', 'movie', 'normal', 'default', null );
}

add_action('add_meta_boxes', 'add_custom_meta_boxes');

function moviesInfoCallback($post){
    // echo '<div>';
    //     echo '<label>Movie Year</label>';
    //     echo '<input type="number" min="0" max="9999">';
    // echo '</div>';

    ?>
        <!-- <div class="">
            <label for="">Year Released</label>
            <input type="number" min="0" max="9999" name="" value="">
        </div> -->

    <?php

    require_once get_template_directory() . '/inc/moviesInfoForm.php';
}

function addImageCallback(){
    require_once get_template_directory() . '/inc/customMediaUploader.php';
}


function save_moviesInfo_meta_boxes($post_id){
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }

    $fields = [
        '1902_year',
        'customImage'
    ];

    foreach($fields as $field){
        if(array_key_exists($field, $_POST)){
            update_post_meta($post_id, $field, $_POST[$field]);
        }
    }

}

add_action('save_post', 'save_moviesInfo_meta_boxes');
