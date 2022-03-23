<?php
$top_type = get_field('top_jobs_by_type','option');
$top_city = get_field('top_jobs_by_city','option');
?>
<div class="top_jobs">
    <div class="top_jobs_city">
        <span>Top Web3 Jobs by City</span><br>
        <?php
        foreach ($top_city as $tc) {
            ?>
            <a class="top_item" href="<?php echo get_term_link($tc['select_job_category']);?>"><?php echo $tc['title_tjbc']?></a>
        <?php
        }
        ?>
    </div>
    <div class="top_jobs_type">
        <span>Top Web3 Jobs by Type</span><br>
        <?php
        foreach ($top_type as $tt) {
            ?>
            <a class="top_item" href="<?php echo get_term_link($tt['select_job_category']);?>"><?php echo $tt['title_tjbt']?></a>
            <?php
        }
        ?>
    </div>
</div>
