<?php
get_header();
?>
<div class="pa_hero" style="background-image: url('<?php the_field('posts_archive_page_hero_image','option');?>')">
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
    <?php
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        echo '<h2>'.esc_html( $categories[0]->name ).'</h2>';
    }
    get_template_part('/template-parts/template', 'ads', array('ad_type' => 'hero'));
    ?>
</div>
<div class="pa_featured">
    <h3>Featured articles</h3>
    <div class="pa_featured_cont">
        <?php
        $args = array(
            'post_type'              => array( 'post' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'posts_per_page'         => '2',
            'meta_query' => array(
                array(
                    'key'    =>  'featured',
                    'value'  =>  true
                )
            ),
            'order'                  => 'DESC',
            'orderby'                => 'date',
        );

        $featured_posts = new WP_Query( $args );

        if ( $featured_posts->have_posts() ) {
            while ( $featured_posts->have_posts() ) {
                $featured_posts->the_post();
                get_template_part('/template-parts/post', 'card', array('query_var' => $featured_posts,'featured' => true));

            }
        } else {
            // no posts found
        }
        ?>
    </div>
</div>
<div class="pa_latest" id="pa_latest">
    <h3>Latest articles</h3>
    <div class="ja_latest_cont">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args_l = array(
            'post_type'              => array( 'post' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'paged'                  => $paged,
            'posts_per_page'         => '3',
            'order'                  => 'DESC',
            'orderby'                => 'date',
        );

        $latest_posts = new WP_Query( $args_l );

        if ( $latest_posts->have_posts() ) {
            $counter = 0;
            while ( $latest_posts->have_posts() ) {
                $latest_posts->the_post();

                get_template_part('/template-parts/post', 'card', array('query_var' => $latest_posts));

                if ($counter%3 == 2) {
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
                'total'        => $latest_posts->max_num_pages,
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
        document.getElementById('pa_latest').scrollIntoView();
    }
</script>
