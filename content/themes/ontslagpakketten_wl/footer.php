	<footer>
		<header>
			<div class="container">
				<p class="text-center">Dè ontslagspecialist voor werknemers: betrouwbaar, kundig, snel en goedkoop</p>
				<!--<a class="pull-right" href="/aanvraagformulier" title="Schrijf je nu in en word ook lid">Schrijf je nu in en word ook lid <span class="glyphicon glyphicon-play"></span></a>-->
			</div>
		</header>

		<div class="container">
			<div class="row clearfix">
			<?php
				$args = array( 'posts_per_page' => 3, 'category' => 12 );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<blockquote>
						<?php the_content(); ?>
					</blockquote>
				<?php endforeach; 
				wp_reset_postdata();?>
			</div>

			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 1, 'menu_class' => '' ) ); ?>
			</nav>

			<ul class="copyright">
				<li>&copy; 2014 Ontslagpakketten.nl</li>
				<li>Ontwerp: <a href="http://www.studioubique.nl" title="Ontwerp: Studio Ubique" target="_blank">Studio Ubique</a></li>
				<li>Realisatie: <a href="http://weblogiq.nl" title="Realisatie: Weblogiq" target="_blank">Weblogiq</a></li>
			</ul>
		</div>
	</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
		function getUrlTab() {
		    var tab = "";
		    if(window.location.href.indexOf('?') > -1) {
		    	var tab = window.location.href.slice(window.location.href.indexOf('?')+1);
		    }
		    return tab;
		}
    	$("document").ready(function () {
    		$tabid = getUrlTab();
    		if($tabid != "") {
				$('.nav-tabs a[href="#'+$tabid+'"]').tab('show');
			} else {
				$('.nav-tabs a:first').tab('show')
			}
			$('.search-field').prop('required',true);
		});
    </script>
    <!--[if lte IE 9]>
    <script src="<?php echo get_template_directory_uri() . '/scripts/jquery.placeholder.js';?>"></script>
    <script>
      $(function() {
        $('input, textarea').placeholder();
      });      
    </script>
    <![endif]-->
    <?php wp_footer(); ?>
  </body>
</html>