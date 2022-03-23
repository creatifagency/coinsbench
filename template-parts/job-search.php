<h3>Find What You are Looking For</h3>
<?php
$jobs_types = get_terms( array(
    'taxonomy' => 'jobstype',
    'parent'   => 0
) );
$jobs_cities = get_terms( array(
    'taxonomy' => 'jobscity',
    'parent'   => 0
) );
$fresh_releases = get_terms( array(
    'taxonomy' => 'category',
    'parent'   => 0
) );
?>
<div class="job_search1">
<select id="job_type_sel">
    <option value="" disabled selected>Jobs by Type</option>
<?php
foreach ($jobs_types as $jt) {
    echo '<option value="'.$jt->slug.'">'.$jt->name.'</option>';
}
?>
</select>
<select id="job_city_sel">
    <option value="" disabled selected>Jobs by Location</option>
    <?php
    foreach ($jobs_cities as $jc) {
        echo '<option value="'.$jc->slug.'">'.$jc->name.'</option>';
    }
    ?>
</select>
<select id="fresh_releases_sel">
    <option value="" disabled selected>Fresh Releases</option>
    <?php
    foreach ($fresh_releases as $fr) {
        echo '<option value="'.$fr->slug.'">'.$fr->name.'</option>';
    }
    ?>
</select>
</div>
<div class="job_search2">
    <span>Can’t find what you are looking for? Try a keyword job serach.</span><br>
    <input type="text" id="job_search_all" placeholder="Search for your job">
    <input type="button" id="job_search_all_btn" value="Search job">
    <div class="job_search_results"></div>
</div>


<script type="text/javascript">
    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }
    jQuery(document).ready(function ($) {
        $('#job_search_all_btn').on('click',function () {
           window.location.href = '/job-search?q='+$('#job_search_all').val()
        });
        $('#job_type_sel').on('change',function () {
            let opt_val = this.value;
            window.location.href = '/job/type/'+opt_val;
        });
        $('#job_city_sel').on('change',function () {
            let opt_val = this.value;
            window.location.href = '/job/city/'+opt_val;
        });
        $('#fresh_releases_sel').on('change',function () {
            let opt_val = this.value;
            window.location.href = '/category/'+opt_val;
        });
        $('#job_search_all').on('keyup',delay(function () {
            $('.job_search_results').empty();
            let keyword = this.value;
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: {
                    'action':  'job_search_all',
                    'keyword': keyword
                },
                success: function (data) {
                    if (data == 0) {
                        $('.job_search_results').append('<span class="no_results_search">No results! Try another search.</span>');
                    }
                    let res = JSON.parse(data);
                    $.each(res,function (i,v) {
                        $('.job_search_results').append(
                            '<a href="'+v.post_uri+'">'+v.post_name+'</a> - <span>'+v.post_excerpt+'</span><a href="'+v.post_uri+'">[...]</a><br>'
                        )
                    })
                }
            })
        },1000))
    })
</script>
    