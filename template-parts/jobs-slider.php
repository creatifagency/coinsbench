<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/swiper-bundle.min.css"/>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <?php
        $args = array(
            'post_type'              => array( 'custom_jobs' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'paged'                  => '1',
            'posts_per_page'         => '10',
            'meta_query' => array(
                array(
                    'key'    =>  'trending_job',
                    'value'  =>  true
                )
            ),
            'order'                  => 'DESC',
            'orderby'                => 'date',
        );

        $jobs = new WP_Query( $args );

        if ( $jobs->have_posts() ) {
            while ( $jobs->have_posts() ) {
                $jobs->the_post();
                get_template_part('/template-parts/job', 'card_small', array('query_var' => $jobs));

            }
        } else {
            // no posts found
        }
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<?php
wp_reset_postdata();

?>

<script src="<?php echo get_stylesheet_directory_uri();?>/js/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>