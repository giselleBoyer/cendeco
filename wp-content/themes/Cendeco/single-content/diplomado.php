<?php
$post = get_post($id);
$custom_fields = get_post_custom($id);

$content = '[et_pb_text
header_2_line_height="1.5em"
_builder_version="3.18.9"
header_font="||||||||"
header_2_font="||||||||"
header_2_text_color="#ef7d29"
header_3_line_height="1.5em"
header_font="||||||||"
header_3_font="||||||||"
header_3_text_color="#ef7d29"
module_class="details"
]';

if(!empty($custom_fields['objetivos'][0])):
    $content .= '<h2>Objetivos:</h2><span>'.$custom_fields['objetivos'][0].'</span>';
endif;

if(!empty($custom_fields['dirigido'][0])):
    $content .= '<h2>Dirigido a:</h2><span>'.$custom_fields['dirigido'][0].'</span>';
endif;

if(!empty($custom_fields['contenido'][0])):
    $content .= '<h2>Contenido:</h2><span>'.$custom_fields['contenido'][0].'</span>';
endif;

if(!empty($custom_fields['docente'][0])):
    $content .= '<h3>Docentes: <span>'.$custom_fields['docente'][0].'</span></h3><br/>';
endif;

if(!empty($custom_fields['duracion'][0])):
    $content .= '<h3>Duración: <span>'.$custom_fields['duracion'][0].' horas académicas</span></h3><br/>';
endif;

if(!empty($custom_fields['modalidad'][0])):
    $content .= '<h3>Modalidad: <span>'.ucwords(str_replace('_', ' ', $custom_fields['modalidad'][0])).'</span></h3><br/>';
endif;

if(!empty($custom_fields['fecha'][0])):
    $content .= '<h3>Fecha: <span>'.$custom_fields['fecha'][0].'</span></h3><br/>';
endif;

if(!empty($custom_fields['horario'][0])):
    $content .= '<h3>Horario: <span>'.$custom_fields['horario'][0].'</span></h3><br/>';
endif;

if(!empty($custom_fields['precio'][0])):
    $content .= '<h3>Precio: <span>'.$custom_fields['precio'][0].'</span></h3><br/>';
endif;

$content .= '[/et_pb_text]';

if(!empty($custom_fields['recaudos'][0])):
    $content .= '[toggle title="Recaudos" text="'.htmlspecialchars($custom_fields['recaudos'][0]).'"][/toggle]';
endif;

if(!empty($custom_fields['formas_pago'][0])):
    $content .= '[toggle title="Formas de Pago" text="'.htmlspecialchars($custom_fields['formas_pago'][0]).'"][/toggle]';
endif;

if(!empty($custom_fields['descuentos'][0])):
    $content .= '[toggle title="Descuentos" text="'.htmlspecialchars($custom_fields['descuentos'][0]).'"][/toggle]';
endif;

if(!empty($custom_fields['terminos_condiciones'][0])):
    $content .= '[toggle title="Términos y Condiciones" text="'.htmlspecialchars($custom_fields['terminos_condiciones'][0]).'"][/toggle]';
endif;

$button = '';
if($custom_fields['active'][0] == 1 && !empty($custom_fields['planilla'][0])):
    $button = ' [et_pb_button
                    module_class="button-custom"
                    button_url="'.$custom_fields['planilla'][0].'"
                    button_text="Postularme"
                    button_alignment="center"
                    _builder_version="3.18.9"
                    custom_button="on"
                    button_text_size="16px"
                    button_bg_color="#ef7d29"
                    button_border_width="0px"
                    button_border_radius="13px"
                    custom_padding="0.5rem|2rem|0.5rem|2rem|false|false"
                    button_font="||||||||"
                    button_use_icon="off"
                    background_layout="dark"
                    url_new_window="on"
                ]
                [/et_pb_button]';
endif;

$sc = '
[hero id="'.$custom_fields['parent'][0].'"]
[/hero]
[et_pb_section
	fb_built="1"
	_builder_version="3.18.9"
	custom_padding="||0px"
]
	[et_pb_row
		make_fullwidth="on"
		_builder_version="3.18.9"
	]
		[et_pb_column
			type="4_4"
			_builder_version="3.18.9"
			parallax="off"
			parallax_method="on"
		]
            [et_pb_text
                _builder_version="3.18.9"
                text_font="||||||||"
                text_text_color="#d6d6d6"
                header_font="||||||||"
                header_text_color="#ef7d29"
            ]
                <h1 class="title-line">'.$post->post_title.'</h1>
            [/et_pb_text]

		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]
[et_pb_section
	fb_built="1"
    _builder_version="3.18.9"
    custom_padding="0|0px|0|0px|false|false"
]
	[et_pb_row
	_builder_version="3.18.9"
	]
		[et_pb_column
			type="4_4"
			_builder_version="3.18.9"
			parallax="off"
			parallax_method="on"
        ]
        '. $content.'
		[/et_pb_column]
    [/et_pb_row]
	[et_pb_row
		_builder_version="3.18.9"
	]
		[et_pb_column
			type="4_4"
			_builder_version="3.18.9"
			parallax="off"
            parallax_method="on"
            custom_padding="0|0px|54px|0px|false|false"
		]
            '.$button.'
			[et_pb_text
				text_font_size="16px"
				text_orientation="center"
				_builder_version="3.18.9"
				text_font="||||on||||"
				text_text_color="#132633"
			]
				<a
                    href="#"
                    onclick="history.go(-1)"
					style="color: #132633"
				> Volver Atrás</a>
			[/et_pb_text]
		[/et_pb_column]
	[/et_pb_row]
[/et_pb_section]
';
echo do_shortcode($sc);
?>