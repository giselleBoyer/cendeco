<?php 

//$prev = history.go(-1);

$prev = $_SERVER['HTTP_REFERER'];

if (strpos($prev, 'catalogo') !== false){ //es catàlogo

	$sc = '
	[hero id="'.$id.'"]
	[et_pb_section
		fb_built="1"
		_builder_version="3.18.9"
	]
		[et_pb_row
			_builder_version="3.18.9"
		]
			[et_pb_column
				type="1_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [card 
	                title=""
	                image="/wp-content/uploads/2019/05/Diplomado.png"
					text="Otros Diplomados de la oferta académica"
					button-text="Ver"
	                button-url="/diplomados/"
				]
	            [/card]
			[/et_pb_column]
			[et_pb_column
				type="2_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [childlist parent="'.$id.'" title="Diplomados" type="diplomado" catalogo="true"]
	            [/childlist]
			[/et_pb_column]
		[/et_pb_row]
	[/et_pb_section]
	[et_pb_section
		fb_built="1"
	    _builder_version="3.18.9"
	    custom_padding="0|0px|54px|0px|false|false"
	]
		[et_pb_row
			_builder_version="3.18.9"
		]
			[et_pb_column
				type="1_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [card 
	                title=""
	                image="/wp-content/uploads/2019/05/cursos.png"
					text="Otros Cursos de la oferta académica"
					button-text="Ver"
	                button-url="/cursos/"
				]
	            [/card]  
			[/et_pb_column]
			[et_pb_column
				type="2_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [childlist parent="'.$id.'" title="Cursos" type="curso" catalogo="true"]
	            [/childlist]
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
			]
				[et_pb_text
					text_font_size="16px"
					text_orientation="center"
					_builder_version="3.18.9"
					text_font="||||on||||"
				]
					<a
						class="button-custom"
	                    href="#"
	                    onclick="history.go(-1)"
					> Volver a Inicio</a>
				[/et_pb_text]
			[/et_pb_column]
		[/et_pb_row]
	[/et_pb_section]

	';

}else{

	$sc = '
	[hero id="'.$id.'"]
	[et_pb_section
		fb_built="1"
		_builder_version="3.18.9"
	]
		[et_pb_row
			_builder_version="3.18.9"
		]
			[et_pb_column
				type="1_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [card 
	                title=""
	                image="/wp-content/uploads/2019/05/Diplomado.png"
					text="Otros Diplomados de la oferta académica"
					button-text="Ver"
	                button-url="/diplomados/"
				]
	            [/card]
			[/et_pb_column]
			[et_pb_column
				type="2_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [childlist parent="'.$id.'" title="Diplomados" type="diplomado" catalogo="false"]
	            [/childlist]
			[/et_pb_column]
		[/et_pb_row]
	[/et_pb_section]
	[et_pb_section
		fb_built="1"
	    _builder_version="3.18.9"
	    custom_padding="0|0px|54px|0px|false|false"
	]
		[et_pb_row
			_builder_version="3.18.9"
		]
			[et_pb_column
				type="1_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [card 
	                title=""
	                image="/wp-content/uploads/2019/05/cursos.png"
					text="Otros Cursos de la oferta académica"
					button-text="Ver"
	                button-url="/cursos/"
				]
	            [/card]  
			[/et_pb_column]
			[et_pb_column
				type="2_3"
				_builder_version="3.18.9"
				parallax="off"
				parallax_method="on"
	        ]
	            [childlist parent="'.$id.'" title="Cursos" type="curso" catalogo="false"]
	            [/childlist]
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
			]
				[et_pb_text
					text_font_size="16px"
					text_orientation="center"
					_builder_version="3.18.9"
					text_font="||||on||||"
				]
					<a
						class="button-custom"
	                    href="#"
	                    onclick="history.go(-1)"
					> Volver a Inicio</a>
				[/et_pb_text]
			[/et_pb_column]
		[/et_pb_row]
	[/et_pb_section]

	';

}

echo do_shortcode($sc);
?>