<div class="partners_head">
    <h3>Partners</h3>
    <p>Trusted by World's leading Blockchain Companies</p>
</div>
<?php
$partners = get_field('partners_r','option');
foreach ($partners as $partner) {
    ?>
    <div class="partner_card">
        <a href="<?php echo $partner['link_partner'];?>">
        <img src="<?php echo $partner['logo_partners'];?>" alt="">
        </a>
    </div>
<?php
}
?>
<div class="partners_footer">
    <p>Interested in becoming a partner?</p>
    <a href="#">Reach Out ></a>
</div>
