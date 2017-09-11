<?php
/**
 * Template Name: Content Page
 * The template for displaying content pages
 */

global $post; $thispage = $post->ID; // grabs the current post id from global and then assigns it to thispage

get_header(); ?>

	<?php
	if(is_page() & !is_home()) {
		$thumbnail_id = get_post_thumbnail_id($post->ID);
		$thumbnail_object = get_post($thumbnail_id);

		$mypages = get_pages( array( 'child_of' => $thispage, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );
		$total = count($mypages);
	}
	?>

		<div class="image text-center" style="background-image: url('<?php echo $thumbnail_object->guid ?>');">
			<div class="pointer"></div>

			<div class="content">
				<div class="container">
					<div class="breadcrumbs">
						<?php if($total > 0) { ?>
							<h1><?php echo get_the_title($post->post_parent) ?></h1>
							<h2><?php echo $post->post_title ?></h2>
						<?php } else { ?>
							<h2><?php echo $post->post_title ?></h2>
						<?php } ?>
					</div>
					<?php if($total > 0) { ?>
						<ul class="nav nav-tabs">
						<?php
							//$mypages = get_pages( array( 'child_of' => $thispage, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );
							foreach( $mypages as $page ) {
						?>
								<li><a href="#<?php echo sanitize_title_with_dashes(remove_accents($page->post_title,'','save')); ?>" data-toggle="tab"><?php echo $page->post_title; ?></a></li>
						<?php }	?>
						</ul>

						<div class="tab-content">
						<?php
							foreach( $mypages as $page ) {
								$args=array(
							  		'page_id' => $page->ID,
							  		'post_type' => 'page',
							  		'post_status' => 'publish',
							  		'posts_per_page' => 1,
							  		'caller_get_posts'=> 1
								);
								$my_query = null;
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
							  		while ($my_query->have_posts()) : $my_query->the_post(); ?>
										<div class="tab-pane" id="<?php echo sanitize_title_with_dashes(remove_accents(get_the_title(),'','save')); ?>">
											<div class="column full">
												<?php if ( get_post_meta( get_the_ID(), 'postitid', true ) ) : 
												$postit = get_post(get_post_meta( get_the_ID(), 'postitid', true )); ?>
								                  <div class="post-it">
								                    <div class="tips">
								                      <h4>Tips</h4>
								                      <?php echo $postit->post_content; ?>
								                    </div>
								                  </div>
												<?php endif; ?>
												<?php the_content(); ?>									
											</div>
										</div>
								  		<?php
										endwhile;
									}
									wp_reset_query();  // Restore global post data stomped by the_post().
						  		}
							?>
	 					</div>
	 				<?php } else { ?>
	 					<div class="tab-content">
							<div class="column full" id="post-<?php the_ID(); ?>">
								<?php the_content(); ?>
	 						</div>
	 					</div>
	 				<?php } ?>
				</div>
			</div>
		</header>

		<div class="packages">
			<div class="overlay">
				<div class="container">
					<ul class="pricing row">

					<?php
					$myposts = get_posts(array(
					    'showposts' => 2, 
					    'post_type' => 'ontslag_pakketten', 
					    'tax_query' => array(
					        array(
					        'taxonomy' => 'pakketten_category', 
					        'field' => 'slug', 
					        'terms' => array('Home'))
					    ), 
					    'orderby' => 'menu_order', 
					    'order' => 'ASC')
					);
					 
					foreach ($myposts as $mypost) {
					    echo '<li id="'.$mypost->ID.'" class="package">';
					    	echo '<h3>'.$mypost->post_title.'</h3>';
					    	echo $mypost->post_content;
					    echo '</li>';
					}
					?>
					</ul>
				</div>
			</div>
		</div>

<?php
get_footer();