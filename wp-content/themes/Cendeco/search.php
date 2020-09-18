<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area" class="grid-search">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$type = get_post_type();

						switch (get_post_type()) {
							case 'facultad':
									$custom_fields = get_post_custom();
									$post_image = wp_get_attachment_image_src($custom_fields['icono'][0], 'thumbnail')[0];

									echo do_shortcode('[card
										title="'.get_the_title().'"
										text="'.get_the_content().'"
										image="'.$post_image.'"
										button-text="Ver Detalles"
										button-url="'.get_permalink().'"
									][/card]');
								break;
							case 'evento':
									$custom_fields = get_post_custom();
									$post_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
									$post_date = (empty($custom_fields['fecha']))? get_the_date(): $custom_fields['fecha'][0];

									echo do_shortcode('[event
											id="'.get_the_ID().'"
											title="'.get_the_title().'"
											date="'.$post_date.'"
											image="'.$post_image.'"
										][/event]');
								break;
							default:
									if(in_array(get_post_type(), array('diplomado','curso'))):
										$custom_fields = get_post_custom();
										$post_content = $custom_fields['objetivos'][0];
									else:
										$post_content =  get_the_content();
									endif;

									echo do_shortcode('[card
											title="'.get_the_title().'"
											text="'.$post_content.'"
											button-text="Ver Detalles"
											button-url="'.get_permalink().'"
										][/card]');
								break;
						}


					endwhile;

					if ( function_exists( 'wp_pagenavi' ) ):
						wp_pagenavi();
					else:
						get_template_part( 'includes/navigation', 'index' );
					endif;

				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php // get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php
echo do_shortcode('[showmodule id="121"]' );

get_footer();
