<?php
/*
Template Name: Post Job
*/
get_header();

$job_types = get_terms( array(
    'taxonomy' => 'jobstype',
    'hide_empty' => false,
) );
$job_cities = get_terms( array(
    'taxonomy' => 'jobscity',
    'hide_empty' => false,
) );

//$post_id = 15;
//$jobtype_id = 2;
//$taxonomy = 'jobstype';
//wp_set_object_terms( $post_id, intval( $jobtype_id ), $taxonomy, true );
?>
<h2>Post a Job</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<input type="text" name="job_role" class="p_job_role required" placeholder="Job Role*">
<input type="text" name="job_desc" class="p_job_desc required" placeholder="Job Description*">
<select name="job_type" class="p_job_type required">
    <option value="" disabled selected>Job Type*</option>
<?php
foreach ($job_types as $job_type) {
    echo '<option value="'.$job_type->term_id.'">'.$job_type->name.'</option>';
}
?>
</select>
    <select name="job_city" class="p_job_city required">
        <option value="" disabled selected>Job City*</option>
        <?php
        foreach ($job_cities as $job_city) {
            echo '<option value="'.$job_city->term_id.'">'.$job_city->name.'</option>';
        }
        ?>
    </select>
Salary:
<input type="number" name="job_salary_from" class="p_job_salary" placeholder="From">
<input type="number" name="job_salary_to" class="p_job_salary" placeholder="To">
<input type="email" name="job_email" class="p_job_email required" placeholder="Email*">
<input type="text" name="job_company_name" class="p_job_company_name required" placeholder="Company Name*">
<input type="text" name="job_company_about" class="p_job_company_about required" placeholder="About Your Company*">
<input type="text" name="job_company_web" class="p_job_company_web" placeholder="Company Website (Optional)">
<input type="text" name="job_company_linkedin" class="p_job_company_linkedin" placeholder="Company LinkedIn (Optional)">
<input type="text" name="job_company_twitter" class="p_job_company_twitter" placeholder="Company Twitter (Optional)">
<input type="text" name="job_company_fb" class="p_job_company_fb" placeholder="Company Facebook (Optional)">
<input type="text" name="job_company_insta" class="p_job_company_insta" placeholder="Company Instagram (Optional)">
<div class="p_sponsored_options">
    <?php
    $sticky_option = get_field('sticky_option_pj','option');
    $tags_option = get_field('tags_option_pj','option');
    $logo_option = get_field('logo_option_pj','option');
    ?>
    <h4>Sponsored Options</h4>
    <span class="pso_title">Sticky your job listing on top</span>
    <p>Your listing will be on top of others with a more proeminent design </p>
    <input type="radio" name="job_option_sticky" value="0">No sticky
    <input type="radio" name="job_option_sticky" value="<?php echo $sticky_option['24h_sticky_opt'];?>">24h sticky
    <span class="pj_option_price">$<?php echo $sticky_option['24h_sticky_opt'];?></span>
    <input type="radio" name="job_option_sticky" value="<?php echo $sticky_option['7_days_sticky_opt'];?>">7 days
    <span class="pj_option_price">$<?php echo $sticky_option['7_days_sticky_opt'];?></span>
    <input type="radio" name="job_option_sticky" value="<?php echo $sticky_option['14_days_sticky_opt'];?>">14 days
    <span class="pj_option_price">$<?php echo $sticky_option['14_days_sticky_opt'];?></span>
    <span class="pj_option_more">12x More views</span>
    <input type="radio" name="job_option_sticky" value="<?php echo $sticky_option['30_days_sticky_opt'];?>">30 days
    <span class="pj_option_price">$<?php echo $sticky_option['30_days_sticky_opt'];?></span>
    <span class="pj_option_more">12x More views</span>
    <br>

    <span class="pso_title">Add tags to your job listing</span>
    <p>Adding tags to your job listing will make it pop up in search results</p>
    <input type="radio" name="job_option_tags">No tags
    <input type="radio" name="job_option_tags" value="<?php echo $tags_option;?>">Add tags
    <span class="pj_option_price">$<?php echo $tags_option;?></span>
    <input type="text" name="pj_addtag1" class="pj_addtag" placeholder="Your Tag">
    <input type="text" name="pj_addtag2" class="pj_addtag" placeholder="Your Tag">
    <input type="text" name="pj_addtag3" class="pj_addtag" placeholder="Your Tag">
    <br>

    <span class="pso_title">Add logo to your job post</span>
    <input type="radio" name="job_option_logo">No logo
    <input type="radio" name="job_option_logo" value="<?php echo $logo_option;?>">Add logo
    <span class="pj_option_price">$<?php echo $logo_option;?></span>
    <span class="pj_option_more">12x More views</span>
</div>

<?php
do_shortcode('[wp_cart_button name="Test Product" price="29.95"]');
get_footer();