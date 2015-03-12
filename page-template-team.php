<?php
/*
    Template Name: Team Page
*/

get_header(); ?>

<div class='row'>
<?php
$allUsers = get_users('orderby=post_count&order=DESC');

$users = array();

$i=1;

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
    if(!in_array( 'subscriber', $currentUser->roles ))
    {
        $users[] = $currentUser;
    }
}

foreach($users as $user)
{
    ?>
    <div class='col-md-4'>
      <div class='author-profile' <?php if(is_int($i/2)) { echo "data-sr='enter top wait .2s ease 90px'"; } else if(is_int($i/3)) { echo "data-sr='enter top wait .3s ease 90px'"; } else { echo "data-sr='enter top wait .1s ease 90px'"; }?>>
        <div class='author-picture'>
          <?php echo get_avatar( $user->user_email, 512 ); ?>
        </div>
        <div class='author-info'>
        <h3 class='author-title'><?php echo $user->display_name; ?></h3>
          <span class='author-position'><?php echo get_user_meta($user->ID, 'gently_position', true); ?></span>
            <?php get_user_meta($user_id, $key, $single); ?>
          <p class='author-bio'><?php echo get_user_meta($user->ID, 'description', true); ?></p>
          <ul class='author-social'>
            <?php

            $website = $user->user_url;
            if($user->user_url != '')
            {
                printf('<li><a href="%s">%s</a></li>', $user->user_url, '<i class="fa fa-chain"></i>');
            }

            $rss = get_user_meta($user->ID, 'rss_url', true);
            if($rss != '')
            {
                printf('<li><a href="%s">%s</a></li>', $rss, '<i class="fa fa-rss"></i>');
            }

            $google = get_user_meta($user->ID, 'google_profile', true);
            if($google != '')
            {
                printf('<li><a href="%s">%s</a></li>', $google, '<i class="fa fa-google-plus"></i>');
            }

            $twitter = get_user_meta($user->ID, 'twitter_profile', true);
            if($twitter != '')
            {
                printf('<li><a href="%s">%s</a></li>', $twitter, '<i class="fa fa-twitter"></i>');
            }

            $facebook = get_user_meta($user->ID, 'facebook_profile', true);
            if($facebook != '')
            {
                printf('<li><a href="%s">%s</a></li>', $facebook, '<i class="fa fa-facebook"></i>');
            }

            $linkedin = get_user_meta($user->ID, 'linkedin_profile', true);
            if($linkedin != '')
            {
                printf('<li><a href="%s">%s</a></li>', $linkedin, '<i class="fa fa-linkedin"></i>');
            }

            $behance = get_user_meta($user->ID, 'behance_profile', true);
            if($behance != '')
            {
                printf('<li><a href="%s">%s</a></li>', $behance, '<i class="fa fa-behance"></i>');
            }

            $dribbble = get_user_meta($user->ID, 'dribbble_profile', true);
            if($dribbble != '')
            {
                printf('<li><a href="%s">%s</a></li>', $dribbble, '<i class="fa fa-dribbble"></i>');
            }

            $codepen = get_user_meta($user->ID, 'codepen_profile', true);
            if($codepen != '')
            {
                printf('<li><a href="%s">%s</a></li>', $codepen, '<i class="fa fa-codepen"></i>');
            }

            $github = get_user_meta($user->ID, 'github_profile', true);
            if($github != '')
            {
                printf('<li><a href="%s">%s</a></li>', $github, '<i class="fa fa-github"></i>');
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
<?php
$i++;
}
?>
</div>

<?php get_footer(); ?>