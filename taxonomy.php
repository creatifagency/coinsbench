<?php
get_header();
?>
<div class="tax_hero" style="background-image: url('<?php the_field('jobs_archive_page_hero_image','option');?>')">
    <h2><?php echo single_term_title(); ?> Jobs</h2>
    <div class="tax_search">
        <?php get_template_part('/template-parts/job','search');?>
    </div>
</div>

<div class="tax_latest">
        <?php

        if ( have_posts() ) {
            $counter = 0;
            while ( have_posts() ) {
                the_post();

                get_template_part('/template-parts/job', 'card', array('query_var' => false));

                if ($counter%2 == 1) {
                    get_template_part('/template-parts/template', 'ads', array('ad_type' => 'fw'));
                }
                $counter++;
            }
        } else {
            // no posts found
        }
        ?>
        <div class="search_pagination">
            <?php
            $args = array(
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<span class="page_prev">%1$s</span>', __( '<', 'coinsbench' ) ),
                'next_text'    => sprintf( '<span class="page_next">%1$s</span>', __( '>', 'coinsbench' ) ),
            )
            ?>
            <?php the_posts_pagination($args); ?>
        </div>
</div>
<div class="tax_faq">
    <h3>F.A.Q</h3>
    <?php
    if(is_tax('jobstype')){
        $faq = get_field('questions_faq','option');
    } elseif (is_tax('jobscity')){
        $faq = get_field('questions_faq_2','option');
    }
    foreach ($faq as $qa) {
        ?>
        <div class="faq_single">
            <span class="faq_single_q"><?php echo $qa['q_faq'];?></span><br>
            <p class="faq_single_a" style="display: none"><?php echo $qa['a_faq'];?></p>
            <div class="faq_arrow"><i class="fa-solid fa-arrow-down"></i></div>
        </div>
    <?php
    }
    ?>
</div>

<?php
get_template_part('/template-parts/jobs', 'top');

get_footer();
?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.faq_single').each(function () {
            $('.faq_arrow',this).on('click',function () {
                $(this).prev('p').fadeToggle(1000);
            })
        })
    })
</script>