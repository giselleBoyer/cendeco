<?php
if(!function_exists('print_menu_sc')) :

    function print_menu_sc($atts) {

        $args = shortcode_atts(
            array(
                'name' => '',
                'class' => '',
            ), $atts
        );

        return wp_nav_menu([
            'menu' => esc_attr($args['name']),
            'menu_class' => 'menu ' . esc_attr($args['class']),
            'echo' => false
        ]);
            
    }
        
endif;

add_shortcode('printmenu', 'print_menu_sc');
    