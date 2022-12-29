<?php
/**
 * The template for displaying single movie reviews. Adapted from Mekatron theme.
 */

get_header(); ?>	
	<div class="blog-column">
		<div id="blog-container">
			<div class="singlealign">
				<div class="blog-content">
					<?php the_post(); ?>
					<div <?php post_class(); ?>>
						<h3 class="blog-title">
							<?php the_title(); ?>
						</h3>
						<h4>THIS IS THE NEW TEMPLATE!</h4>
						<?php
							//Get the data from all custom fields: https://developer.wordpress.org/reference/functions/get_post_meta/
							function get_post_meta( $post_id, $key = '', $single = false ) {
								return get_metadata( 'post', $post_id, $key, $single );
							}
							?>
						<div class="main">
							<div class="scontent"><?php the_content(); ?></div>
							<?php wp_link_pages(); ?>
						</div>
					</div>

					<?php comments_template(); ?>
					<div class="postnav">
					<?php 
					if ( is_single() ) :
						the_post_navigation(
							array(
								'prev_text' => '&#171; %title',
								'next_text' => '%title &#187;',
							) 
						); 
					endif;
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

