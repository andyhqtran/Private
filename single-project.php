<?php
/**
 * The template for displaying all single posts.
 *
 * @package Gently
 */

get_header(); ?>
	<div class='col-md-8'>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class='module single-module clearfix'>
	        <?php if ( has_post_thumbnail() ) { ?>
            <div class='featured-image'>
                <a href='<?php the_permalink(); ?>'>
                    <?php the_post_thumbnail('full'); ?>
                </a>
            </div>
	        <?php } ?>
	        <div class='post-date'>
	          	<div class='month'>
	            	<?php the_time('M'); ?>
	          	</div>
	          	<div class='day'>
	            	<?php the_time('d'); ?>
	          	</div>
	        </div>
	        <h2 class='post-title'>
	            <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
	        </h2>
	        <div class='post-meta'>
	          	by <a href='<?php the_author_url(); ?>'><?php the_author(); ?></a> |  <?php the_taxonomies(array( 'template' => '<span class="label">%s</span> %l.' )); ?>
	        </div>
	        <div class='post-content'>
	        	<?php the_content(); ?>
	        </div>
        	<a class='btn btn-primary pull-left' href='<?php the_permalink(); ?>'><i class='fa fa-arrow-left'></i> Prev</a>
        	<a class='btn btn-primary' href='<?php the_permalink(); ?>'>Next <i class='fa fa-arrow-right'></i></a>
		</div>
			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
