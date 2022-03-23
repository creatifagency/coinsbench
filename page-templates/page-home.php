<?php
/*
Template Name: Home page
*/
get_header();

$hero_img_dark = get_field('image_dark_hero','option');
$hero_img_light = get_field('image_light_hero','option');
?>
<div class="hero_home" style="background-image: url('<?php echo $hero_img_dark;?>')">
    <h2><?php echo get_field('title_hero','option');?></h2>
    <p><?php echo get_field('subtitle_hero','option');?></p>
    <div class="hero_btns">
        <a href="#">Explore all Jobs</a>
        <a href="#">Post a Job</a>
    </div>
        <?php get_template_part('/template-parts/template','ads',array('ad_type'=>'hero'));?>
    <div class="hero_stats">
        <span><?php the_field('jobs_number_hero','option');?> Jobs</span>
        <span><?php the_field('applications_number_hero','option');?> Applications</span>
        <span><?php the_field('companies_number_hero','option');?> Companies</span>
        <span><?php the_field('cities_number_hero','option');?> Cities</span>
    </div>
</div>
<div class="jobs_slider">
    <?php get_template_part('/template-parts/jobs','slider');?>
</div>
<div class="jobs_listing">
    <h3>Latest Jobs</h3>
    <a href="#">Explore all Jobs</a>
    <?php
    $args_l = array(
        'post_type'              => array( 'custom_jobs' ),
        'post_status'            => array( 'publish' ),
        'nopaging'               => false,
        'paged'                  => '1',
        'posts_per_page'         => '10',
        'meta_key'               => 'sponsored_job',
        'order'                  => 'DESC',
        'orderby'                => 'meta_value_num date',
    );

    $jobs_l = new WP_Query( $args_l );

    if ( $jobs_l->have_posts() ) {
        $counter = 0;
        while ( $jobs_l->have_posts() ) {
            $jobs_l->the_post();

            get_template_part('/template-parts/job', 'card', array('query_var' => $jobs_l));

            if ($counter%2 == 1) {
                get_template_part('/template-parts/template', 'ads', array('ad_type' => 'fw'));
            }
            $counter++;
        }
    } else {
        // no posts found
    }
    ?>
</div>
<div class="home_search">
    <?php get_template_part('/template-parts/job','search');?>
</div>
<div class="home_latest_art">
    <?php get_template_part('/template-parts/posts','slider', array('featured' => false));?>
</div>
<div class="home_about_us">
    <div class="about_us_left">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="about_us_btns">
            <a href="#">Advertise With us</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
    <div class="about_us_right">
        <img src="#" alt="">
    </div>
</div>
<div class="home_partners">
    <?php get_template_part('template-parts/template','partners');?>
</div>
<div class="home_top">

</div>
<div class="home_bottom_btns">
    <a href="#">Advertise With Us</a>
    <a href="#">Contact</a>
</div>
<?php





get_template_part('/template-parts/jobs', 'top');

get_footer();