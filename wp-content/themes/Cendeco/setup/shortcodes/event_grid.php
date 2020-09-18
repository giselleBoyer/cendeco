<?php
if(!function_exists('event_grid_sc')) :

    function event_grid_sc($atts) {

        $args = shortcode_atts(
            array(
                'limit' => -1,

            ), $atts
        );

        $posts = get_posts(array(
            'numberposts' => $args['limit'],
            'post_type'	=> 'evento',
            'meta_key' => 'fecha',
            'orderby' => 'meta_value',
            'order' => 'DESC'
        ));


        $out= '';
        foreach ($posts as $post) {
            
            $custom_fields = get_post_custom($post->ID);
            $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0];
            $post_date = (empty($custom_fields['fecha']))? get_the_date($post->ID): $custom_fields['fecha'][0];

            $out .='[event
                id="'.$post->ID.'"
                title="'.$post->post_title.'"
                date="'.$post_date.'"
                image="'.$post_image.'"
            ][/event]
            ';
        }

        return do_shortcode($out);
    }
endif;

add_shortcode('eventgrid', 'event_grid_sc');