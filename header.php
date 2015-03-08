<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
			          			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			          		</nav>
			        	</div>
			      	</div>
			    </div>
		  	</header>
		  	<div class='<?php if ( is_page_template('page-template-home.php') ) { echo 'hero-text'; } elseif ( is_page() ) { echo 'page-header'; } ?>' data-sr='scale up 30%'>
		    	<div class='container'>
		      		<div class='row'>
		        		<div class='col-md-12'>
		        			<?php if ( is_page_template('page-template-home.php') ) : ?>
		          			<h1><?php the_title(); ?></h1>
		          			<p>
	          				<?php
	          					if (have_posts()) : while (have_posts()) : the_post();
									the_content();
								endwhile; endif;
							?>
							</p>
		          			<div class='btn-group' data-sr='enter bottom wait .3s ease 60px'>
		            			<a class='btn btn-hero' href='#featured'>
		              				<div class='fa fa-long-arrow-down'></div>
		            			</a>
		            			<span>See our case studies</span>
		          			</div>
		          			<?php elseif ( is_page() ) :?>
		          			<h1><?php the_title(); ?></h1>
		          			<p>
	          				<?php
	          					if (have_posts()) : while (have_posts()) : the_post();
									the_content();
								endwhile; endif;
							?>
							</p>
		          			<?php endif; ?>
		        		</div>
		      		</div>
		    	</div>
		  	</div>
		</div>
		<?php
		if ( is_page_template( 'page-template-home.php' ) ) : ?>
			<div class='container mp-container' id='featured'>
		<?php else : ?>
			<div class='container'>
		<?php endif; ?>