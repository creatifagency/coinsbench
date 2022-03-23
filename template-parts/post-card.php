<?php
$query_var = $args['query_var'];
$featured = $args['featured'];
?>
<div class="post_card swiper-slide">
    <?php if (has_post_thumbnail() ){ ?>
        <img src="<?php echo get_the_post_thumbnail_url(null,'thumbnail');?>" alt="">
    <?php } else { ?>
        <img src="<?php the_field('post_card_default_image','option');?>" alt="">
    <?php } ?>
    <div class="post_tags_date">
        <?php
        if ($featured) {
            ?>
            <div class="post_cat">
                <?php
                $post_categories = get_categories();
                echo esc_html($post_categories[0]->name);
                ?>
            </div>
        <?php
        }
        ?>
        <div class="post_tags">
            <?php
            $post_tags = get_the_tags();
            if ($post_tags && !empty($post_tags)) {
                foreach ($post_tags as $post_tag) {
                    ?>
                    <span class="post_tag"><?php echo esc_html($post_tag->name);?></span>
                    <?php
                }
            }
            ?>
        </div>
        <span class="post_date"><?php echo get_the_date('d-M-Y')?></span>
    </div>
    <a class="post_title" href="<?php the_permalink();?>"><?php the_title();?></a>
    <div class="post_content">
        <?php
        $trimmed_content = wp_trim_words(get_the_content(), 20, '... <a href="' . get_permalink() . '">more</a>');
        echo $trimmed_content;
        ?>
    </div>

</div>
