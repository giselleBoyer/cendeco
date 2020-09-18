<?php
if(!function_exists('toggle_sc')) :

    function toggle_sc($atts) {

        $args = shortcode_atts(
            array(
                'text' => '',
                'title' => ''
            ), $atts
        );

        ob_start();
            echo do_shortcode('
			[et_pb_toggle
				title="'.$args['title'].'"
				icon_color="#6b6b6b"
				module_class="
				toggle_custom"
				_builder_version="3.18.9"
				title_font="||||||||"
				title_text_color="#404040"
				body_font="||||||||"
				body_text_align="justify"
				border_radii="on|13px|13px|13px|13px"
				max_width="85%"
				module_alignment="center"
				custom_padding="25px||25px||true"
			]'.html_entity_decode($args['text']).'[/et_pb_toggle]
            ');
        $out = ob_get_clean();

        return $out;

    }

endif;

add_shortcode('toggle', 'toggle_sc');
