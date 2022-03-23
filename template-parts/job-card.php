<?php
$args['query_var'] = $query_var;

$job_city_tax_l = get_the_terms( $query_var->ID, 'jobscity' );
$job_cities_l = '';
if ( ! empty( $job_city_tax_l ) && ! is_wp_error( $job_city_tax_l ) ) {
    $job_cities_l = wp_list_pluck( $job_city_tax_l, 'name' );
}
?>
<div class="job_card">
    <?php if (has_post_thumbnail() ){ ?>
        <img src="<?php echo get_the_post_thumbnail_url(null,'thumbnail');?>" alt="">
    <?php } else { ?>
        <img src="<?php the_field('job_card_default_image','option');?>" alt="">
    <?php } ?>
    <div class="job_cities">
        <?php
        foreach ($job_cities_l as $job_city_l) {
            ?>
            <span class="job_city"><?php echo esc_html($job_city_l);?></span>
            <?php
        }
        ?>
    </div>
    <span class="job_date"><?php echo get_the_date('d-M-Y')?></span>
    <span class="job_title"><?php the_field('job_role');?></span>
    <span class="job_company">@<?php the_field('company_name');?></span>
    <span class="job_salary_from">$<?php the_field('salary_from');?> - </span>
    <span class="job_salary_to">$<?php the_field('salary_to');?></span>
    <a href="<?php the_permalink();?>">Apply Now</a>
    <?php
    $job_tags_tax_l = get_the_terms( $query_var->ID, 'jobstag' );
    $job_tags_l = '';
    if ( ! empty( $job_tags_tax_l ) && ! is_wp_error( $job_tags_tax_l ) ) {
        $job_tags_l = wp_list_pluck( $job_tags_tax_l, 'name' );
    }
    if (!empty($job_tags_l)){
        ?>
        <div class="job_tags">
            <?php
            foreach ($job_tags_l as $job_tag_l) {
                ?>
                <span class="job_tag"><?php echo esc_html($job_tag_l);?></span>
                <?php
            }
            ?>
        </div>
    <?php } ?>
</div>
