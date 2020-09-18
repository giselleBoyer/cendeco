<?php
if(!function_exists('parent_list_sc')) :

    function parent_list_sc($atts) {

        $args = shortcode_atts(
            array(
                'type' => '',
                'child' => '',
                'empty' => 0
            ), $atts
        );

        $conditions = array(
            'posts_per_page'=>-1,
            'numberposts'=>-1,
            'post_type'=> $args['type']
        );

        $posts = get_posts($conditions);

        $out= '';
        foreach ($posts as $post) {
            $out .='[childlist
                parent="'.$post->ID.'"
                title="'.$post->post_title.'"
                type="'.$args['child'].'"
                empty="'.$args['empty'].'"
                child="true"
            ][/childlist]
            ';
        }

        return do_shortcode($out);
    }
endif;

add_shortcode('parentlist', 'parent_list_sc');