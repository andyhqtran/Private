<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
	    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Varela+Round'>
	    <link rel='stylesheet prefetch' href='<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css'>
	    <link rel='stylesheet prefetch' href='<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css'>

	    <link type='text/css' rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" />
	    <link type="image/x-icon" rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
	    <link type="image/x-icon" rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
	    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">
	    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-72x72.png">
	    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div class='hero'>
		  <header class='header'>
		    <div class='container'>
		      <div class='col-md-12'>
		        <div class='navbar clearfix'>
		          <h2 class='logo'>
		            <a href='<?php echo esc_url( home_url( '/' ) ); ?>'><?php bloginfo( 'name' ); ?></a>
		          </h2>
		          <nav class='nav'>
		            <ul>
		              <li>
		                <a class='active' href='#'>Home</a>
		              </li>
		              <li>
		                <a href='#'>Team</a>
		              </li>
		              <li>
		                <a href='#'>Blog</a>
		              </li>
		              <li>
		                <a href='#'>Freebies</a>
		              </li>
		              <li>
		                <a class='nav-btn' href='#'>Let's Talk</a>
		              </li>
		            </ul>
		          </nav>
		        </div>
		      </div>
		    </div>
		  </header>
		  <div class='hero-text' data-sr='scale up 30%'>
		    <div class='container'>
		      <div class='row'>
		        <div class='col-md-12'>
		          <h2>Two heads are better than one.</h2>
		          <p>We need to think of a sick tagline right here, because I can’t think of shit right now</p>
		          <div class='btn-group' data-sr='enter bottom wait .3s ease 60px'>
		            <a class='btn btn-hero' href='#featured'>
		              <div class='fa fa-long-arrow-down'></div>
		            </a>
		            <span>See our case studies</span>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gently' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'gently' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
