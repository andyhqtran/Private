<?php
/*
    Template Name: Home Page
*/

    get_header(); ?>

    <div class='row'>
        <div class='col-md-12'>
            <div class='mp-page-header'>
                <h2 data-sr='enter top wait .3s ease 90px'>
                    This is what we do and we <i class='fa fa-heart'></i> it.
                </h2>
            </div>
        </div>
    </div>
    <div class='mp-featured'>
        <?php
            $i=1;
            $args = array('order' => 'asc', 'v_sortby' => 'views', 'post_type' => 'project', 'showposts' => '3');
            $latest = new WP_Query( $args );

            while( $latest->have_posts() ) : $latest->the_post();
        ?>
        <div class='featured-project'>
        <?php if(is_int($i/2)) { ?>
            <div class='row'>
                <div class='col-md-7' data-sr='enter left ease 90px'>
                     <div class='featured-project-thumbnail'>
                        <div class='browser'>
                            <div class='browser-screen'>
                                <?php the_post_thumbnail( 'large', array('class' => 'img-responsive') ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-5' data-sr='enter right ease 90px'>
                    <h3 class='project-title'><?php the_title(); ?></h3>
                    <div class='project-meta'>
                        <?php the_taxonomies(array( 'template' => '<span class="label">%s</span> %l.' )); ?>
                    </div>
                    <div class='project-description'>
                        <?php
                            $content = get_the_content();
                            if ( strlen($content) > 250 ) {
                                echo substr($content, 0, 250)."...";
                            } else {
                                the_content();
                            }
                        ?>
                     </div>
                    <a class='btn btn-danger' href='<?php the_permalink(); ?>'>View Project</a>
                </div>
            </div>
        <?php } else { ?>
            <div class='row'>
                <div class='col-md-7 col-md-push-5' data-sr='enter right ease 90px'>
                     <div class='featured-project-thumbnail'>
                        <div class='macbook'>
                            <div class='macbook-screen'>
                                <?php the_post_thumbnail( 'large' , array('class' => 'img-responsive') ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-5 col-md-pull-7' data-sr='enter left ease 90px'>
                    <h3 class='project-title'><?php the_title(); ?></h3>
                    <div class='project-meta'>
                        <?php the_taxonomies(array( 'template' => '<span class="label">%s</span> %l.' )); ?>
                    </div>
                    <div class='project-description'>
                        <?php
                            $content = get_the_content();
                            if ( strlen($content) > 250 ) {
                                echo substr($content, 0, 250)."...";
                            } else {
                                the_content();
                            }
                        ?>
                     </div>
                    <a class='btn btn-danger' href='<?php the_permalink(); ?>'>View Project</a>
                </div>
            </div>
        <?php } ?>
        </div>
        <?php $i++;
        endwhile; ?>
  </div>
<?php get_footer(); ?>