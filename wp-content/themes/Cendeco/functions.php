<?php 

function cendeco_parent_theme_style() 
{
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'cendeco_parent_theme_style' );

function cendeco_child_theme_style() 
{
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'cendeco_child_theme_style', 100 );

function cendeco_child_theme_scripts() 
{
 wp_enqueue_script( 'child-js', get_stylesheet_directory_uri() . '/assets/js/main.js');
}
add_action('wp_enqueue_scripts','cendeco_child_theme_scripts');

function cendeco_autoload($dirs = Array()) {
    foreach($dirs as $dir) {
        foreach (scandir(dirname(__FILE__).$dir) as $filename) {
            $path = dirname(__FILE__) . $dir . $filename;
            $pathinfo = pathinfo($path);
            if (array_key_exists('extension', $pathinfo) && $pathinfo["extension"] == "php" && is_file($path)) {
                require_once $path;
            }elseif($pathinfo['filename'] != "" && $pathinfo['filename'] != "." && $pathinfo['filename'] != ".."){
                if(is_dir(dirname(__FILE__).$dir.$pathinfo['filename'])){
                    foreach (scandir(dirname(__FILE__).$dir.$pathinfo['filename']) as $filename) {

                        $path = dirname(__FILE__) . $dir . $pathinfo['filename'] . '/' . $filename;
                        $pathinfo_sc = pathinfo($path);

                        if (array_key_exists('extension', $pathinfo_sc) && $pathinfo_sc["extension"] == "php" && is_file($path)) {
                            require_once $path;
                        }
                    }
                }
            }
        }
    }
}

$autoload_dirs = array(
    '/setup/shortcodes/'
);
cendeco_autoload($autoload_dirs);

function ajax_content_sc(){
    ob_start();
        echo do_shortcode('[content name="'.$_REQUEST['name'].'" id="'.$_REQUEST['id'].'"]');
    die();
}
add_action('wp_ajax_nopriv_ajax_content', 'ajax_content_sc');
add_action('wp_ajax_ajax_content', 'ajax_content_sc');
