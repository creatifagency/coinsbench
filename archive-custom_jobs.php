<?php
get_header();
?>
<div class="ja_hero" style="background-image: url('<?php the_field('jobs_archive_page_hero_image','option');?>')">
    <h2>Jobs Overview</h2>
    <div class="ja_search">
        <?php get_template_part('/template-parts/job','search');?>
    </div>
</div>
<div class="ja_trending">
    <h3>Trending Jobs</h3>
    <div class="ja_trending_cont">
        <?php
        $args = array(
            'post_type'              => array( 'custom_jobs' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'paged'                  => '1',
            'posts_per_page'         => '9',
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
</div>
<div class="ja_latest" id="ja_latest">
    <h3>Latest Jobs</h3>
    <div class="ja_latest_cont">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args_l = array(
            'post_type'              => array( 'custom_jobs' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'paged'                  => $paged,
            'posts_per_page'         => '2',
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
        <div class="search_pagination">
            <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $jobs_l->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<span class="page_prev">%1$s</span>', __( '<', 'coinsbench' ) ),
                'next_text'    => sprintf( '<span class="page_next">%1$s</span>', __( '>', 'coinsbench' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
            ?>
        </div>
    </div>
</div>

<?php
get_template_part('/template-parts/jobs', 'top');

get_footer();
?>
<script type="text/javascript">
    var url = window.location.href;
    if(url.indexOf("page") > -1) {
        document.getElementById('ja_latest').scrollIntoView();
    }
</script>
