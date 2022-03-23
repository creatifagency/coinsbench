<?php

get_header();
?>
<div class="sj_hero" style="background-image: url('<?php the_field('job_single_hero_image','option');?>')">
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
    <div class="sj_hero_left">
        <span class="job_date"><?php echo get_the_date('d-M-Y')?></span>
        <?php
        if (get_field('sponsored_job')){
            ?>
            <span class="job_sponsored">Sponsored</span>
        <?php
        }
        ?>
        <span class="job_title"><?php the_field('job_role');?></span>
        <span class="job_company">@<?php the_field('company_name');?></span>
        <a class="applynow_btn" href="#sj_apply_job">Apply Now</a>
    </div>
    <div class="sj_hero_right">
        <?php if (has_post_thumbnail() ){ ?>
            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
        <?php } else { ?>
            <img src="<?php the_field('job_card_default_image','option');?>" alt="">
        <?php } ?>
    </div>
</div>
<div class="sj_main">
    <div class="sj_main_left">
        <div class="sj_desc">
            <?php
            the_field('job_description');
            ?>
        </div>
        <div class="sj_al">
            <?php get_template_part('/template-parts/template','ads',array('ad_type'=>'post'));?>
        </div>
        <div class="sj_apply_job" id="sj_apply_job">
            <h4>Apply for job</h4>
            <form id="sjf" method="post" enctype="multipart/form-data">
                <input type="text" name="sjf_name" class="cb_input" required placeholder="Name*">
                <input type="email" name="sjf_email" class="cb_input" required placeholder="Email*">
                <input type="tel" name="sjf_phone" class="cb_input" required placeholder="Phone*">
                <input type="text" name="sjf_role" class="cb_input" readonly id="sjf_role" value="<?php the_field('job_role');?>">
                <label for="sjf_resume" class="">Upload resume</label>
                <input type="file" name="sjf_resume" id="sjf_resume" required accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                <div class="sjf_file_preview"></div>
                <input type="text" name="sjf_message" class="cb_input" placeholder="Message">
                <input type="checkbox" required>You agree with our <a href="#">Privacy Policy</a>
                <input type="hidden" name="sjf_comp" class="cb_input" value="<?php the_field('company_name');?>">
                <input type="hidden" name="sjf_comp_em" class="cb_input" value="<?php the_field('email');?>">
                <input type="hidden" name="sjf_guid" class="cb_input" value="<?php the_permalink();?>">
                <input type="hidden" name="sjf_pid" class="cb_input" value="<?php the_ID();?>">
                <input type="submit" value="Send your Application" name="sjf_submit">
            </form>
        </div>
    </div>
    <div class="sj_main_right">
        <div class="sj_job_info">
            <div class="sj_job_type">
                <span class="sj_job_info_title">Job type</span>
                <?php
                $job_type_tax = get_the_terms( get_the_ID(), 'jobstype' );
                $job_types = '';
                if ( ! empty( $job_type_tax ) && ! is_wp_error( $job_type_tax ) ) {
                $job_types = wp_list_pluck( $job_type_tax, 'name' );
                }
                ?>
                    <div class="job_types">
                        <?php
                        foreach ($job_types as $job_type) {
                            ?>
                            <span class="sj_job_info_value"><?php echo esc_html($job_type);?></span>
                            <?php
                        }
                        ?>
                    </div>
            </div>
            <div class="sj_job_city">
                <span class="sj_job_info_title">Job city</span>
                <?php
                $job_city_tax = get_the_terms( get_the_ID(), 'jobscity' );
                $job_cities = '';
                if ( ! empty( $job_city_tax ) && ! is_wp_error( $job_city_tax ) ) {
                    $job_cities = wp_list_pluck( $job_city_tax, 'name' );
                }
                ?>
                <div class="job_cities">
                    <?php
                    foreach ($job_cities as $job_city) {
                        ?>
                        <span class="sj_job_info_value"><?php echo esc_html($job_city);?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="sj_job_role">
                <span class="sj_job_info_title">Role</span>
                <span class="sj_job_info_title"><?php the_field('job_role');?></span>
            </div>
            <div class="sj_job_salary">
                <span class="sj_job_info_title">Compensation</span>
                <span class="sj_job_info_title"><?php echo '$'.get_field('salary_from').' - $'.get_field('salary_to');?> /y</span>
            </div>
        </div>
        <div class="sj_about_comp">
            <h4>About the company</h4>
            <p><?php the_field('company_description');?></p>
        </div>
        <hr>
        <div class="sj_comp_socials">
            <a href="<?php echo esc_url( the_field('company_facebook') );?>" class="facebook" target="_blank" rel="noreferrer" title="Company facebook"><i class="fab fa-facebook"></i></a>
            <a href="<?php echo esc_url( the_field('company_instagram') );?>" class="instagram" target="_blank" rel="noreferrer" title="Company instagram"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo esc_url( the_field('company_linkedin') );?>" class="linkedin" target="_blank" rel="noreferrer" title="Company linkedin"><i class="fab fa-linkedin"></i></a>
            <a href="<?php echo esc_url( the_field('company_twitter') );?>" class="twitter" target="_blank" rel="noreferrer" title="Company twitter"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo esc_url( the_field('company_website') );?>" class="c_web" target="_blank" rel="noreferrer" title="Company web">Website</a>
        </div>
        <div class="sj_tags">
            <span class="sj_tags_title">Tags: </span>
            <?php
            $job_tag_tax = get_the_terms( get_the_ID(), 'jobstag' );
            $job_tags = '';
            if ( ! empty( $job_tag_tax ) && ! is_wp_error( $job_tag_tax ) ) {
                $job_tags = wp_list_pluck( $job_tag_tax, 'name' );
            }
            ?>
            <div class="job_tags">
                <?php
                foreach ($job_tags as $job_tag) {
                    ?>
                    <span class="job_tag"><?php echo esc_html($job_tag);?></span>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="sj_ar">
            <?php get_template_part('/template-parts/template','ads',array('ad_type'=>'side'));?>
        </div>
        <a class="applynow_btn" href="#sj_apply_job">Apply Now</a>
    </div>
</div>
<div class="sj_trending">
    <h3>Trending Jobs</h3>
    <?php get_template_part('/template-parts/jobs','slider');?>
</div>
<div class="sj_search">
    <?php get_template_part('/template-parts/job','search');?>
</div>

<?php
get_template_part('/template-parts/jobs', 'top');

get_footer();
?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#sjf').on('submit',function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("action", "ajax_applyjob");
            // for (var [key, value] of formData.entries()) {
            //     console.log(key, value);
            // }
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            })
        })
    })
    //form
    const input = document.querySelector('#sjf_resume');
    const preview = document.querySelector('.sjf_file_preview');
    input.style.opacity = 0;
    input.addEventListener('change', updateImageDisplay);
    function updateImageDisplay() {
        while(preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }
        const curFiles = input.files;
        if(curFiles.length === 0) {
            const para = document.createElement('p');
            para.textContent = 'No file currently selected for upload';
            preview.appendChild(para);
        } else {

            for(const file of curFiles) {
                const para = document.createElement('p');
                if(validFileType(file) && (file.size < 2103741)) {
                    para.textContent = `${file.name} - ${returnFileSize(file.size)}`;
                    preview.appendChild(para);
                } else {
                    para.textContent = `${file.name}: Not a valid file type or file too big. Update your selection.`;
                    preview.appendChild(para);
                }
            }
        }
    }
    const fileTypes = [
        "application/msword",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        "image/jpeg",
        "image/pjpeg",
        "image/png",
        "application/vnd.oasis.opendocument.text",
        "application/pdf",
    ];

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }
    function returnFileSize(number) {
        if(number < 1024) {
            return number + 'bytes';
        } else if(number >= 1024 && number < 1048576) {
            return (number/1024).toFixed(1) + 'KB';
        } else if(number >= 1048576) {
            return (number/1048576).toFixed(1) + 'MB';
        }
    }


</script>