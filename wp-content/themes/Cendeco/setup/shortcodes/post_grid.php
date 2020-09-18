<?php
if(!function_exists('post_grid_sc')) :

    function post_grid_sc($atts) {

        $args = shortcode_atts(
            array(
                'limit' => 0,
                'type' => '',
                'button-text' => 'Ver Detalles',
                'active' => false,
                'primary'=>false

            ), $atts
        );

        $conditions = array(
            'posts_per_page'=>-1,
            'numberposts'=>-1,
            'post_type'=> $args['type']
        );

        if(!empty($args['primary'])):
            $conditions['meta_key']     = 'primary';
            $conditions['meta_value']   = 1;
        endif;

        $posts = get_posts($conditions);

        if(!empty($args['active']) && empty($args['primary'])):
            $posts = array_filter($posts, function($post){
                if(!empty(get_field( "primary", $post->ID ))) return true;
                $childs = get_posts(array(
                    'post_type' =>  'any',
                    'meta_query'	=> array(
                        'relation'		=> 'AND',
                        array(
                            'key'	 	=> 'active',
                            'value'	  	=> '1',
                            'compare' 	=> '==',
                        ),
                        array(
                            'key'	  	=> 'parent',
                            'value'	  	=> $post->ID,
                            'compare' 	=> '=',
                        ),
                    ),
                ));
                return !empty($childs);
            });
        endif;

        $posts = (empty($args['limit']))? $posts : array_slice($posts, 0, $args['limit'], true);

        $out= '';
        foreach ($posts as $post) {
            $custom_fields = get_post_custom($post->ID);
            $post_image = wp_get_attachment_image_src($custom_fields['icono'][0], 'thumbnail')[0];

            $out .='[card
                title="'.$post->post_title.'"
                text="'.$post->post_content.'"
                image="'.$post_image.'"
                button-text="'.$args['button-text'].'"
                button-url="'.get_permalink($post->ID).'"
            ][/card]
            ';
        }

        return do_shortcode($out);
    }
endif;

add_shortcode('postgrid', 'post_grid_sc');