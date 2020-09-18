<?php
if(!function_exists('child_list_sc')) :

    function child_list_sc($atts) {

        $args = shortcode_atts(
            array(
                'parent' => '',
                'type' => '',
                'title' => '',
                'empty' => 0,
                'catalogo' => 'false',
                'child' => 'false'
            ), $atts
        );

        $conditions = array(
            'posts_per_page'=>-1,
            'numberposts'=>-1,
            'post_type'		=> $args['type']
        );

        if(!empty($args['parent'])):
            $conditions['meta_key']     = 'parent';
            $conditions['meta_value']	= $args['parent'];
        endif;

        $posts = get_posts($conditions);


        if(empty($posts) && $args['empty']):
            return false;
        endif;

        $child_links = '';

        if(!empty($posts)):
            foreach ($posts as $i => $post) {
                if ($args['catalogo'] == 'false' ){ //es oferta academica
                    $id = $post->ID;
                    $custom_fields = get_post_custom($id);
                    if ($custom_fields['active'][0] == '1' ){
                        $child_links .= '
                            <li>
                                <a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">
                                    '.$post->post_title.'
                                </a>
                            </li>
                        ';
                    }  
                }else{ //es catalogo
                    $child_links .= '
                        <li>
                            <a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">
                                '.$post->post_title.'
                            </a>
                        </li>
                    ';
                } 
            }
            //$child_links = '<ul>'.$child_links.'</ul>';
            if(empty($child_links)):  
                if ($args['child'] == 'false' ):
                    $child_links = "<p style='color:#6b6b6b; padding-left: 2rem; font-size: 18px;'>No se encuentran {$args['type']}s disponibles.</p>";
                endif;
            else:
                $child_links = '<ul>'.$child_links.'</ul>';
            endif; 
        else:
            $child_links = "<p style='color:#6b6b6b; padding-left: 2rem; font-size: 18px;'>No se encuentran {$args['type']}s disponibles.</p>";
        endif;

        if(!empty($child_links)):
            return do_shortcode('
                [et_pb_text
                    _builder_version="3.18.9"
                    ul_position="inside"
                    ul_item_indent="2rem"
                    ul_font_size="18px"
                    ul_line_height="1.9em"
                    text_font="||||||||"
                    header_font="||||||||"
                    header_text_color="#ef7d29"
                    ul_font="||||||||"
                    ul_text_align="left"
                    ul_text_color="#ef7d29"
                    text_text_color="#000000"
                    header_line_height="1.3em"
                    module_class="child-list"
                ]
                    <h1>'.$args['title'].'</h1>
                    '.$child_links.'
                [/et_pb_text]
            ');
        endif;
    }

endif;

add_shortcode('childlist', 'child_list_sc');
