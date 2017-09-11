<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

		<div class="image text-center">
			<div class="pointer"></div>

			<div class="content">
				<div class="container">
					<?php if ( have_posts() ) : ?>
					<div class="breadcrumbs">
						<?php printf( __( '<h1>Zoekresultaten voor </h1> %s', 'twentyfourteen' ), '<h2>'.get_search_query().'</h2>' ); ?>
					</div>

					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_post_format();
							get_template_part( 'content', get_post_format() );
							echo "<hr>";

						endwhile;
						// Previous/next post navigation.
						twentyfourteen_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>

      		</div>
    	</div>
    </header>
<?php
get_footer();
