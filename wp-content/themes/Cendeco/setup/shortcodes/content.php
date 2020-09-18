<?php
if(!function_exists('content_sc')) :

    function content_sc($atts) {

        $args = shortcode_atts(
            array(
                'name' => '',
                'id'   => ''
            ), $atts
        );
        ob_start();
            if(!$id && !empty($args['id'])){
                set_query_var('post_id',$args['id']);
            }

            get_template_part('single-content/'.$args['name']);	

        $out = ob_get_clean();

        return $out;
    }

endif;

add_shortcode('content', 'content_sc');