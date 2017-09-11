<?php
/**
 * The template for displaying the contact page
 * Template Name: Contact Page
 */

get_header(); ?>

	<?php
	if(is_page() & !is_home()) {
		$thumbnail_id = get_post_thumbnail_id($post->ID);
		$thumbnail_object = get_post($thumbnail_id);
	}
	?>

		<div class="image text-center" style="background-image: url('<?php echo $thumbnail_object->guid ?>');">
        	<div class="pointer"></div>

			<div class="contact">
				<div class="container">
					<div class="row">
						<?php the_content(); ?>
            		</div>
          		</div>
        	</div>
      	</div>
	</header>

<?php
get_footer();