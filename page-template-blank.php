<?php
/*
    Template Name: Blog Page
*/
get_header(); ?>

<div class='row'>
    <div class='col-md-8'>
        <?php the_content(); ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>