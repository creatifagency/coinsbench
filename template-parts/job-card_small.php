<?php

$args['query_var'] = $query_var;

if ($query_var) {
    $job_city_tax = get_the_terms($query_var->ID, 'jobscity');
} else {
    $job_city_tax = get_the_terms(get_the_ID(), 'jobscity');
}
$job_cities = '';
if ( ! empty( $job_city_tax ) && ! is_wp_error( $job_city_tax ) ) {
$job_cities = wp_list_pluck( $job_city_tax, 'name' );
}
?>
<div class="swiper-slide job_card_small">
    <?php if (has_post_thumbnail() ){ ?>
        <img src="<?php echo get_the_post_thumbnail_url(null,'thumbnail');?>" alt="">
    <?php } else { ?>
        <img src="<?php the_field('job_card_small_default_image','option');?>" alt="">
    <?php } ?>
    <div class="job_cities">
        <?php
        foreach ($job_cities as $job_city) {
            ?>
            <span class="job_city"><?php echo esc_html($job_city);?></span>
            <?php
        }
        ?>
    </div>
    <span class="job_date"><?php echo get_the_date('d-M-Y')?></span>
    <span class="job_title"><?php the_field('job_role');?></span>
    <span class="job_company">@<?php the_field('company_name');?></span>
    <a href="<?php the_permalink();?>">Apply Now</a>
</div>
