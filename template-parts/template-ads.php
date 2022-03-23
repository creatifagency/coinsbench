<?php
if ($args['ad_type'] == 'hero') {
    ?>
    <div class="hero_coinsbench">
        <a href="<?php the_field('ad_link_heroad','option');?>">
        <img src="<?php the_field('logo_heroad','option');?>" alt="">
        <span><?php the_field('ad_text_heroad','option');?></span>
        </a>
    </div>
<?php
}
if ($args['ad_type'] == 'fw') {
    ?>
    <div class="fw_coinsbench">
        <img src="<?php the_field('logo_fwad','option');?>" alt="">
        <span><?php the_field('ad_text_fwad','option');?></span>
        <a href="<?php the_field('ad_link_fwad','option');?>">Get Yours Now</a>
    </div>
    <?php
}
if ($args['ad_type'] == 'side') {
    ?>
    <div class="side_coinsbench">
        <a href="<?php the_field('ad_link_sidead','option');?>">
        <img src="<?php the_field('logo_sidead','option');?>" alt="">
        <span><?php the_field('ad_text_sidead','option');?></span>
        </a>
    </div>
    <?php
}
if ($args['ad_type'] == 'post') {
    ?>
    <div class="post_coinsbench">
        <a href="<?php the_field('ad_link_postad','option');?>">
        <img src="<?php the_field('logo_postad','option');?>" alt="">
        <span><?php the_field('ad_text_postad','option');?></span>
        </a>
    </div>
    <?php
}