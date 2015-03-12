<?php
/*
    Template Name: Blog Page
*/

get_header(); ?>

<div class='row'>
    <div class='col-md-8 col-md-offset-2'>
    <?php
        $args = array(
            'post_type' => 'post'
        );

        $the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


      <div class='module post-module clearfix'>
        <?php if ( has_post_thumbnail() ) { ?>
            <div class='featured-image'>
              <?php the_post_thumbnail('full'); ?>
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
            <a href='<?php the_permalink(); ?>'>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class='post-meta'>
          by
          <a href='<?php the_author_url(); ?>'><?php the_author(); ?></a>
          |
          <?php the_category(', '); ?>
        </div>
        <div class='post-content'>
        <?php
            $content = get_the_content();
            if ( strlen($content) > 400 ) {
                echo substr($content, 0, 400)."...";
            } else {
                the_content();
            }
        ?>
        </div>
        <a class='btn btn-primary' href='<?php the_permalink(); ?>'>Read More</a>
      </div>
    <?php endwhile; ?>
<?php else : ?>

<?php endif;
wp_reset_postdata();
?>
    </div>
</div>

<?php get_footer(); ?>