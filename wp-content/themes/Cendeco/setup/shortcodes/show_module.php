<?php
if(!function_exists('show_module_sc')) :

    function show_module_sc($atts) {

        $args = shortcode_atts(
            array(
                'id' => ''
            ), $atts
        );

        return do_shortcode('[et_pb_section global_module="'.$args['id'].'"][/et_pb_section]');            
    }
        
endif;

add_shortcode('showmodule', 'show_module_sc');
    