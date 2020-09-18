<?php
if(!function_exists('card_sc')) :

    function card_sc($atts) {

        $args = shortcode_atts(
            array(
                'text' => '',
                'title' => '',
                'image' => '',
                'button-text' => '',
                'button-url' => '',
            ), $atts
        );

        $button = (!empty($args['button-url']))?
            '[et_pb_button
                button_url="'.$args['button-url'].'"
                button_text="'.$args['button-text'].'"
                button_alignment="center"
                _builder_version="3.18.9"
                custom_button="on"
                button_text_size="16px"
                button_bg_color="#ef7d29"
                button_border_width="0px"
                button_border_radius="13px"
                button_font="||||||||"
                button_use_icon="off"
                background_layout="dark"
                custom_padding="|1rem||1rem||true"
            ]
            [/et_pb_button]'
        : '';

        $args['text'] = (strlen($args['text']) > 150 )?  substr($args['text'], 0 , 150 ).'...' : $args['text'];

        return do_shortcode('
            [et_pb_blurb
                module_class="card"
                title="'.$args['title'].'"
                image="'.$args['image'].'"
                image_max_width="50%"
                _builder_version="3.18.9"
                header_level="h2"
                header_font="|600|||||||"
                header_text_align="center"
                header_text_color="#132633 !important"
                header_line_height="1.5em"
                body_font="||||||||"
                body_text_align="center"
                body_font_size="16px"
                box_shadow_style="preset3"
                box_shadow_spread="1px"
                box_shadow_color="rgba(0,0,0,0.15)"
                custom_padding="40px|30px|40px|30px|true|true"
            ]
                '.$args['text'].'
                '.$button.'
            [/et_pb_blurb]
        ');
    }

endif;

add_shortcode('card', 'card_sc');


    // [et_pb_section fb_built="1"
    //     _builder_version="3.18.9"
    //     module_alignment="center"
    //     custom_css_main_element="display: flex;"
    // ]
    //     [et_pb_row custom_padding="0|0px|0|0px|true|false"
    //         padding_top_bottom_link_1="true"
    //         padding_left_right_link_1="true"
    //         padding_top_1="1rem"
    //         padding_right_1="1rem"
    //         padding_bottom_1="1rem"
    //         padding_left_1="1rem"
    //         _builder_version="3.18.9"
    //         border_radii="on|5px|5px|5px|5px"
    //         box_shadow_style="preset2"
    //     ]
    //         [et_pb_column type="4_4"
    //             _builder_version="3.18.9"
    //             padding_bottom="1rem"
    //             padding_left="1rem"
    //             padding_right="1rem"
    //             padding_top="1rem"
    //             parallax="off"
    //             parallax_method="on"
    //         ]
    //             [et_pb_image
    //                 src="'.$args['image'].'"
    //                 align="center"
    //                 _builder_version="3.18.9"
    //                 max_width="35%"
    //             ]
    //             [/et_pb_image]
    //             [et_pb_text 
    //                 _builder_version="3.18.9"
    //                 text_font="||||||||"
    //                 text_text_color="#6b6b6b"
    //                 header_font="||||||||"
    //                 header_text_color="#132633"
    //                 header_line_height="1.5em"
    //             ]
    //                 <h1 style="text-align: center;">'.$args['title'].'</h1>
    //                 <p style="text-align: center;">'.$args['text'].'</p>
    //             [/et_pb_text]
    //             '.$button.'
    //         [/et_pb_column]
    //     [/et_pb_row]
    // [/et_pb_section]