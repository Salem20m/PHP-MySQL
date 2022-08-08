<?php 
/**
 * Plugin Name: Email Plugin
 * Description: Sends an Email to the author once a post is inserted
 * Version: 1.0.0
 */


// function email_post_author( $post_id, $post, $update ) {          
//     $email = 'salemebrahim48@gmail.com';  
//     $subject = 'New Post Published';  
//     $message = 'A new post was published, use this link to view it: ' . get_permalink( $post->ID );  
//     var_dump($email, $subject, $message);
//     // die;
// }
// add_action( 'wp_insert_post', 'email_post_author', 10, 3 ); 

add_filter( 'login_errors', 'modify_login_errors' );  
function modify_login_errors() {  
    // return 'Login unsuccessful, try again'; 
    global $errors;
    $err = $errors->get_error_codes()[0]; 
    return str_replace('_',' ',$err);
} 


//function add_social_icons() {
//    echo   "<img src='".plugin_dir_url(__FILE__)."img.jpg'></img>";
//}
//add_action( 'wp_footer', 'add_social_icons', 10, 3 );

function initializeFunction() {          
    // var_dump('Hello');
    // die;
}
add_action( 'init', 'initializeFunction');