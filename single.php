<?php

get_header();

if (has_post_thumbnail() ){ ?>
    <div class="sp_hero" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')">
<?php } else { ?>
    <div class="sp_hero" style="background-image: url('<?php the_field('post_single_hero_image','option');?>')">
<?php }
?>
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
    <span class="post_date"><?php echo get_the_date('d-M-Y')?></span>
<?php
global $post;
$author_id = $post->post_author;;
?>
    <span class="post_author"><?php echo get_the_author_meta('first_name',$author_id).' '.get_the_author_meta('last_name',$author_id);?></span>
    <div class="post_title">
        <?php the_title('<h2>','</h2>');?>
    </div>
    <div class="post_subtitle">
        <?php the_field('subtitle');?>
    </div>
<?php get_template_part('/template-parts/template', 'ads', array('ad_type' => 'hero')); ?>
</div>
<div class="sp_main">
    <div class="sp_main_left">
        <div class="sp_desc">
            <?php
            the_content();
            ?>
        </div>
        <div class="sp_al">
            <?php get_template_part('/template-parts/template','ads',array('ad_type'=>'post'));?>
        </div>
    </div>
    <div class="sp_main_right">
        <?php
        $post_url = urlencode(esc_url(get_permalink()));
        $post_title = urlencode(get_the_title());

        $facebook_link = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s&amp;t=%2$s', $post_url, $post_title);
        $twitter_link = sprintf('https://twitter.com/intent/tweet?text=%1$s&url=%2$s', $post_title, $post_url);
        $linkedin_link = sprintf('https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s', $post_url, $post_title);

        $output = '<div id="share-buttons">';
        echo '<p class="share-btn">Share</p>';
        $output .= '<a target="_blank" href="' . esc_url($facebook_link) . '" class="share-button facebook"><i class="fab fa-facebook"></i></a>';
        $output .= '<a target="_blank" href="' . esc_url($linkedin_link) . '" class="share-button linkedin"><i class="fab fa-linkedin"></i></a>';
        $output .= '<a target="_blank" href="' . esc_url($twitter_link) . '" class="share-button twitter"><i class="fab fa-twitter"></i></a>';
        $output .= '</div>';
        echo $output;
        get_template_part('/template-parts/template', 'ads', array('ad_type' => 'side'));
        ?>
        <div class="sp_main_right_menu">
            <?php
            $categories = get_categories();
            ?>
            <span class="sp_side_menu_title">Discover</span>
            <ul>
            <?php
            foreach ($categories as $category) {
                echo '<li><a href="'.get_category_link($category).'">'.esc_html($category->name).'</a></li>';
            }
            ?>
            </ul>
        </div>
    </div>
</div>
<div class="sp_featured">
    <h3>Featured articles</h3>
    <?php get_template_part('/template-parts/posts','slider', array('featured' => true));?>
</div>

<?php
get_template_part('/template-parts/jobs', 'top');

get_footer();
?>