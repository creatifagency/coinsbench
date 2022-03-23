<?php
/*
Template Name: Search page
*/
get_header();

$kw = $_GET['q'];
?>
<div class="search_hero">
    <span>Job Search:</span><br><span class="search_kw">"<?php echo $kw;?>"</span>
</div>
    <div class="jobs_listing">
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
    <div class="sj_search">
        <?php get_template_part('/template-parts/job','search');?>
    </div>
<?php
get_template_part('/template-parts/jobs', 'top');

get_footer();