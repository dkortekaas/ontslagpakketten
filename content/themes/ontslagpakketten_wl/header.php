<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="stylesheet" id="bootstrap" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" id="main" href="<?php bloginfo('stylesheet_url'); ?>">

    <link href="http://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51889606-1', 'ontslagpakketten.nl');
  ga('send', 'pageview');

</script>
  </head>

<body <?php body_class(); ?>>

	<div class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="search pull-right">
				<?php get_search_form(); ?>
			</div>
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a>
			</div>
			<div class="navbar-collapse collapse">
				<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 2, 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>
				<?php
            		wp_nav_menu( array(
                		'menu'              => 'primary',
                		'theme_location'    => 'primary',
                		'depth'             => 2,
                		'container'         => 'div',
                		'container_class'   => 'collapse navbar-collapse',
        				'container_id'      => 'bs-example-navbar-collapse-1',
                		'menu_class'        => 'nav navbar-nav navbar-right',
                		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                		'walker'            => new wp_bootstrap_navwalker())
            		);
        		?>				
    		</div>
  		</div>
	</div>
	<div class="clearfix"></div>
	<header>