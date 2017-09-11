<?php
/**
 * Template Name: Home Page
 * The template for displaying the home page
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
				<div class="container">
					<?php if ( get_post_meta( get_the_ID(), 'Home-H1', true ) ) : 
						$h1text = get_post_meta( get_the_ID(), 'Home-H1', true ); ?>
						<h1><?php echo $h1text ?></h1>
					<?php endif; ?>
					<?php if ( get_post_meta( get_the_ID(), 'Home-H2', true ) ) : 
						$h2text = get_post_meta( get_the_ID(), 'Home-H2', true ); ?>
						<h2><?php echo $h2text ?></h2>
					<?php endif; ?>
					<?php if ( get_post_meta( get_the_ID(), 'Home-infolink', true ) ) : 
						$infolink = get_post_meta( get_the_ID(), 'Home-infolink', true ); ?>
						<a href="<?php echo $infolink ?>" class="btn btn-primary btn-large">Meer info</a>
					<?php endif; ?>
				</div>
				<div class="info">
					<div class="container">
						<div class="column">
							<i class="icon icon-scale pull-left"></i>
							<?php
								$post1 = get_post(21); 
								$title = $post1->post_title;
								$content = $post1->post_content;
							?>
							<h2 class="pull-left"><?php echo $title ?></h2>
							<?php echo $content ?>
						</div>
						<div class="column">
							<i class="icon icon-people pull-left"></i>
							<?php
								$post2 = get_post(23); 
								$title = $post2->post_title;
								$content = $post2->post_content;
							?>						
							<h2 class="pull-left"><?php echo $title ?></h2>
							<?php echo $content ?>
						</div>
						<div class="column">
							<i class="icon icon-envelop pull-left"></i>
							<?php
								$post3 = get_post(25); 
								$title = $post3->post_title;
								$content = $post3->post_content;
							?>						
							<h2 class="pull-left"><?php echo $title ?></h2>
							<?php echo $content ?>
						</div>
					</div>
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
