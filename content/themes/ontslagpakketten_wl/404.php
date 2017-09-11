<?php
/**
 * The template for displaying 404 pages (Not Found)
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
					<div class="breadcrumbs">
						<h1><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
					</div>
					<div class="tab-pane" id="tabs-<?php the_ID(); ?>">
						<div class="column full">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
