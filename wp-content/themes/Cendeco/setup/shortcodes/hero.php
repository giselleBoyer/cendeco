<?php
if(!function_exists('hero_sc')) :

    function hero_sc($atts) {

        $args = shortcode_atts(
            array(
                'id' => '',
                'title' => '',
                'image' => '/wp-content/uploads/2019/05/hero-placeholder.jpg'
            ), $atts
        );

        if(!empty($args['id'])){
            $post = get_post($args['id']);
            $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($args['id']), 'full')[0];
            $args['image'] = (empty($post_image))? $args['image'] : $post_image;
            $args['title'] = (empty($post->post_title))? $args['title'] : $post->post_title;
        }

        ob_start();
        ?>
            <style type="text/css">
                .hero
                {
                    background-image: url(<?= $args['image'] ?>) !important;
                }
            </style>
        <?php
            echo do_shortcode('
                [et_pb_section
                    fb_built="1"
                    fullwidth="on"
                    _builder_version="3.18.9"
                ]
                    [et_pb_fullwidth_header
                        title="'.$args['title'].'"
                        text_orientation="center"
                        _builder_version="3.18.9"
                        module_class="hero"
                    ]
                    [/et_pb_fullwidth_header]
                [/et_pb_section]
            ');
        $out = ob_get_clean();

        return $out;

    }

endif;

add_shortcode('hero', 'hero_sc');
