<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/swiper-bundle.min.css"/>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/swiper-bundle.min.js"></script>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <?php
        $featured = $args['featured'];
        if ($featured) {
            $args_fp = array(
                'post_type'              => array( 'post' ),
                'post_status'            => array( 'publish' ),
                'nopaging'               => false,
                'posts_per_page'         => '10',
                'meta_query' => array(
                    array(
                        'key'    =>  'featured',
                        'value'  =>  true
                    )
                ),
                'order'                  => 'DESC',
                'orderby'                => 'date',
            );
        } else {
            $args_fp = array(
                'post_type'              => array( 'post' ),
                'post_status'            => array( 'publish' ),
                'nopaging'               => false,
                'posts_per_page'         => '10',
                'order'                  => 'DESC',
                'orderby'                => 'date',
            );
        }

        $fp = new WP_Query( $args_fp );

        if ( $fp->have_posts() ) {
            while ( $fp->have_posts() ) {
                $fp->the_post();
                get_template_part('/template-parts/post', 'card', array('query_var' => $fp,'featured' => true));
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
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>