<?php
/**
 * Template Name: Package Page
 * The template for displaying Package pages
 */

global $post; $thispage = $post->ID; // grabs the current post id from global and then assigns it to thispage

get_header(); ?>

	<?php
	if(is_page() & !is_home()) {
		$thumbnail_id = get_post_thumbnail_id($post->ID);
		$thumbnail_object = get_post($thumbnail_id);
	}
	?>

		<div class="image text-center" style="background-image: url('<?php echo $thumbnail_object->guid ?>');">
			<div class="pointer"></div>
			<div class="content">
				<div class="pack">
					<ul class="nav nav-tabs container">
				  	<?php
            			$mypages = get_pages('child_of='.$post->ID.'&sort_order=asc&parent='.$post->ID);
					  	foreach( $mypages as $page ) {
					?>
					<li><a href="#<?php echo sanitize_title_with_dashes(remove_accents($page->post_title,'','save')); ?>" data-toggle="tab"><?php echo $page->post_title; ?></a></li>
					<?php }	?>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="pack">
		<div class="tab-content">
			<?php
				foreach( $mypages as $page ) { ?>
          			<div class="tab-pane <?php echo $class ?>" id="<?php echo sanitize_title_with_dashes(remove_accents($page->post_title,'','save')); ?>">
            			<div class="container description">
              				<?php echo $page->post_content; ?>
            			</div>
            			<?php
  							$args=array(
  				  				'page_id' => $page->ID,
  				  				'post_type' => 'page',
  				  				'post_status' => 'publish',
  				  				'posts_per_page' => 1,
                				'orderby' => 'menu_order title',
                				'order' => 'ASC',
  				  				'caller_get_posts'=> 1
  							);
  							$my_query = null;
  							$my_query = new WP_Query($args);
            				$current_page_id = $my_query->post->ID;
  							if( $my_query->have_posts() ) { ?>
                  				<div class="packages">
                    				<div class="overlay">
                      					<div class="container">
                        					<ul class="pricing row">
                        					<?php while ($my_query->have_posts()) : $my_query->the_post();
                          						$subpages = get_pages('child_of='.$current_page_id.'&sort_column=menu_order&sort_order=asc&parent='.$current_page_id);
                          						foreach( $subpages as $sub ) {
                            						$args=array(
                                						'page_id' => $sub->ID,
                                						'post_type' => 'page',
                                						'post_status' => 'publish',
                                						'posts_per_page' => 1,
		                                				'caller_get_posts'=> 1
                            						);
                            						$my_query = null;
                            						$my_query = new WP_Query($args);
                            						$current_page_id = $my_query->post->ID;
                            						if( $my_query->have_posts() ) {
                              							while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                						<li class="package">
  						                    				<?php the_content(); ?>
                                						</li>
                              							<?php
                              							endwhile;
                            							}
                          								wp_reset_query();  // Restore global post data stomped by the_post().
                          							}
  						          			endwhile;
                        					wp_reset_query();
  					           				}?>
                  							</ul>
                						</div>
              						</div>
            					</div>
          					</div>
        				<?php
  							wp_reset_query();
		    			}?>					
					</div>
  				</div>
<?php
get_footer();