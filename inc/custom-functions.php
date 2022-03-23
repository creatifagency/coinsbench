<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'menu_title' => 'SITE OPTIONS',
        'menu_slug' => 'site-options',
        'capability' => 'edit_posts',
        'redirect' => true,
        'icon_url' => 'dashicons-edit-large',
        'position' => '3.3',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Header',
        'menu_title' => 'Header',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Social Media',
        'menu_title' => 'Socials',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Footer',
        'menu_title' => 'Footer',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Home page',
        'menu_title' => 'Home',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'About us page',
        'menu_title' => 'About Us',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Advertise with us page',
        'menu_title' => 'Advertise With Us',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Create Ads',
        'menu_title' => 'ADS',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'FAQ',
        'menu_title' => 'FAQ',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Others',
        'menu_title' => 'Others',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Airdrops',
        'menu_title' => 'Airdrops',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Post job options',
        'menu_title' => 'Post job',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'TOP Jobs',
        'menu_title' => 'TOP Jobs',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Coins Add/Update',
        'menu_title' => 'Coins Add/Update',
        'parent_slug' => 'site-options',
        'capability' => 'manage_options',
        'menu_slug' => 'coin-links',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Disclaimer',
        'menu_title' => 'Disclaimer',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Research Data',
        'menu_title' => 'Research Data',
        'parent_slug' => 'site-options',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Add NFT Collection',
        'menu_title' => 'Add NFT Collection',
        'parent_slug' => 'site-options',
        'capability' => 'manage_options',
        'menu_slug' => 'nft-col',
    ));
}
/**
 * Custom Post - JOBS
 */
if ( ! function_exists('post_jobs') ) {

    function post_jobs() {

        $labels = array(
            'name'                  => _x( 'Jobs', 'Post Type General Name', 'coinsbench' ),
            'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'coinsbench' ),
            'menu_name'             => __( 'Jobs', 'coinsbench' ),
            'name_admin_bar'        => __( 'Job', 'coinsbench' ),
            'archives'              => __( 'Jobs Archives', 'coinsbench' ),
            'attributes'            => __( 'Jobs Attributes', 'coinsbench' ),
            'parent_item_colon'     => __( 'Parent Job:', 'coinsbench' ),
            'all_items'             => __( 'All Jobs', 'coinsbench' ),
            'add_new_item'          => __( 'Add New Job', 'coinsbench' ),
            'add_new'               => __( 'Add New', 'coinsbench' ),
            'new_item'              => __( 'New Job', 'coinsbench' ),
            'edit_item'             => __( 'Edit Job', 'coinsbench' ),
            'update_item'           => __( 'Update Job', 'coinsbench' ),
            'view_item'             => __( 'View Job', 'coinsbench' ),
            'view_items'            => __( 'View Jobs', 'coinsbench' ),
            'search_items'          => __( 'Search Jobs', 'coinsbench' ),
            'not_found'             => __( 'Not found', 'coinsbench' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'coinsbench' ),
            'featured_image'        => __( 'Featured Image', 'coinsbench' ),
            'set_featured_image'    => __( 'Set featured image', 'coinsbench' ),
            'remove_featured_image' => __( 'Remove featured image', 'coinsbench' ),
            'use_featured_image'    => __( 'Use as featured image', 'coinsbench' ),
            'insert_into_item'      => __( 'Insert into job', 'coinsbench' ),
            'uploaded_to_this_item' => __( 'Uploaded to this job', 'coinsbench' ),
            'items_list'            => __( 'Jobs list', 'coinsbench' ),
            'items_list_navigation' => __( 'Jobs list navigation', 'coinsbench' ),
            'filter_items_list'     => __( 'Filter jobs list', 'coinsbench' ),
        );
        $rewrite = array(
            'slug' => 'jobs',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label'                 => __( 'Jobs', 'coinsbench' ),
            'description'           => __( 'Jobs Description', 'coinsbench' ),
            'labels'                => $labels,
            'supports'              => array( 'title','editor','thumbnail' ),
            'hierarchical'          => false,
            'taxonomies'            => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-money-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'custom_jobs', $args );
        flush_rewrite_rules();

    }
    add_action( 'init', 'post_jobs', 0 );

}
// Register Jobs Type Taxonomy
function jobs_type() {

    $labels = array(
        'name'                       => _x( 'Job Type', 'Taxonomy General Name', 'coinsbench' ),
        'singular_name'              => _x( 'Job Type', 'Taxonomy Singular Name', 'coinsbench' ),
        'menu_name'                  => __( 'Types', 'coinsbench' ),
        'all_items'                  => __( 'All Job Types', 'coinsbench' ),
        'parent_item'                => __( 'Parent Job Type', 'coinsbench' ),
        'parent_item_colon'          => __( 'Parent Job Type:', 'coinsbench' ),
        'new_item_name'              => __( 'New Job Type', 'coinsbench' ),
        'add_new_item'               => __( 'Add New Job Type', 'coinsbench' ),
        'edit_item'                  => __( 'Edit Job Type', 'coinsbench' ),
        'update_item'                => __( 'Update Job Type', 'coinsbench' ),
        'view_item'                  => __( 'View Job Type', 'coinsbench' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'coinsbench' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'coinsbench' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'coinsbench' ),
        'popular_items'              => __( 'Popular Items', 'coinsbench' ),
        'search_items'               => __( 'Search Items', 'coinsbench' ),
        'not_found'                  => __( 'Not Found', 'coinsbench' ),
        'no_terms'                   => __( 'No items', 'coinsbench' ),
        'items_list'                 => __( 'Items list', 'coinsbench' ),
        'items_list_navigation'      => __( 'Items list navigation', 'coinsbench' ),
    );
    $rewrite = array(
        'slug'                       => 'job/type',
//        'with_front'                 => true,
//        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'meta_box_cb' => 'post_categories_meta_box'
    );
    register_taxonomy( 'jobstype', array( 'custom_jobs' ), $args );

}
add_action( 'init', 'jobs_type', 0 );

// Register Jobs City Taxonomy
function jobs_city() {

    $labels = array(
        'name'                       => _x( 'Job City', 'Taxonomy General Name', 'coinsbench' ),
        'singular_name'              => _x( 'Job City', 'Taxonomy Singular Name', 'coinsbench' ),
        'menu_name'                  => __( 'Cities', 'coinsbench' ),
        'all_items'                  => __( 'All Job Cities', 'coinsbench' ),
        'parent_item'                => __( 'Parent Job City', 'coinsbench' ),
        'parent_item_colon'          => __( 'Parent Job City:', 'coinsbench' ),
        'new_item_name'              => __( 'New Job City', 'coinsbench' ),
        'add_new_item'               => __( 'Add New Job City', 'coinsbench' ),
        'edit_item'                  => __( 'Edit Job City', 'coinsbench' ),
        'update_item'                => __( 'Update Job City', 'coinsbench' ),
        'view_item'                  => __( 'View Job City', 'coinsbench' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'coinsbench' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'coinsbench' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'coinsbench' ),
        'popular_items'              => __( 'Popular Items', 'coinsbench' ),
        'search_items'               => __( 'Search Items', 'coinsbench' ),
        'not_found'                  => __( 'Not Found', 'coinsbench' ),
        'no_terms'                   => __( 'No items', 'coinsbench' ),
        'items_list'                 => __( 'Items list', 'coinsbench' ),
        'items_list_navigation'      => __( 'Items list navigation', 'coinsbench' ),
    );
    $rewrite = array(
        'slug'                       => 'job/city',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'meta_box_cb' => 'post_categories_meta_box'
    );
    register_taxonomy( 'jobscity', array( 'custom_jobs' ), $args );

}
add_action( 'init', 'jobs_city', 0 );

// Register Jobs Tags Taxonomy
function jobs_tags() {

    $labels = array(
        'name'                       => _x( 'Job Tags', 'Taxonomy General Name', 'coinsbench' ),
        'singular_name'              => _x( 'Job Tag', 'Taxonomy Singular Name', 'coinsbench' ),
        'menu_name'                  => __( 'Tags', 'coinsbench' ),
        'all_items'                  => __( 'All Job Tags', 'coinsbench' ),
        'parent_item'                => __( 'Parent Job Tag', 'coinsbench' ),
        'parent_item_colon'          => __( 'Parent Job Tag:', 'coinsbench' ),
        'new_item_name'              => __( 'New Job Tag', 'coinsbench' ),
        'add_new_item'               => __( 'Add New Job Tag', 'coinsbench' ),
        'edit_item'                  => __( 'Edit Job Tag', 'coinsbench' ),
        'update_item'                => __( 'Update Job Tag', 'coinsbench' ),
        'view_item'                  => __( 'View Job Tag', 'coinsbench' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'coinsbench' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'coinsbench' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'coinsbench' ),
        'popular_items'              => __( 'Popular Items', 'coinsbench' ),
        'search_items'               => __( 'Search Items', 'coinsbench' ),
        'not_found'                  => __( 'Not Found', 'coinsbench' ),
        'no_terms'                   => __( 'No items', 'coinsbench' ),
        'items_list'                 => __( 'Items list', 'coinsbench' ),
        'items_list_navigation'      => __( 'Items list navigation', 'coinsbench' ),
    );
    $rewrite = array(
        'slug'                       => 'job/tags',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'meta_box_cb' => 'post_categories_meta_box'
    );
    register_taxonomy( 'jobstag', array( 'custom_jobs' ), $args );

}
add_action( 'init', 'jobs_tags', 0 );
/**
 * Custom Post - JOBS Applications
 */
if ( ! function_exists('post_jobs_applications') ) {

    function post_jobs_applications() {

        $labels = array(
            'name'                  => _x( 'Applications', 'Post Type General Name', 'coinsbench' ),
            'singular_name'         => _x( 'Application', 'Post Type Singular Name', 'coinsbench' ),
            'menu_name'             => __( 'Applications', 'coinsbench' ),
            'name_admin_bar'        => __( 'Job Applications', 'coinsbench' ),
            'archives'              => __( 'Jobs Applications', 'coinsbench' ),
            'attributes'            => __( 'Jobs Applications', 'coinsbench' ),
            'parent_item_colon'     => __( 'Parent Application:', 'coinsbench' ),
            'all_items'             => __( 'All Applications', 'coinsbench' ),
            'add_new_item'          => __( 'Add New Application', 'coinsbench' ),
            'add_new'               => __( 'Add New', 'coinsbench' ),
            'new_item'              => __( 'New Application', 'coinsbench' ),
            'edit_item'             => __( 'Edit Application', 'coinsbench' ),
            'update_item'           => __( 'Update Application', 'coinsbench' ),
            'view_item'             => __( 'View Application', 'coinsbench' ),
            'view_items'            => __( 'View Applications', 'coinsbench' ),
            'search_items'          => __( 'Search Applications', 'coinsbench' ),
            'not_found'             => __( 'Not found', 'coinsbench' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'coinsbench' ),
            'featured_image'        => __( 'Featured Image', 'coinsbench' ),
            'set_featured_image'    => __( 'Set featured image', 'coinsbench' ),
            'remove_featured_image' => __( 'Remove featured image', 'coinsbench' ),
            'use_featured_image'    => __( 'Use as featured image', 'coinsbench' ),
            'insert_into_item'      => __( 'Insert into application', 'coinsbench' ),
            'uploaded_to_this_item' => __( 'Uploaded to this application', 'coinsbench' ),
            'items_list'            => __( 'Applications list', 'coinsbench' ),
            'items_list_navigation' => __( 'Applications list navigation', 'coinsbench' ),
            'filter_items_list'     => __( 'Filter applications list', 'coinsbench' ),
        );
        $rewrite = array(
            'slug' => 'jobs/applications',
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        );
        $args = array(
            'label'                 => __( 'Applications', 'coinsbench' ),
            'description'           => __( 'Application Description', 'coinsbench' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            'hierarchical'          => false,
            'taxonomies'            => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => 'edit.php?post_type=custom_jobs',
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-money-alt',
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
            'capabilities' => array(
                'create_posts' => false,
            ),
            'map_meta_cap' => true,
        );
        register_post_type( 'jobs_applications', $args );
        flush_rewrite_rules();

    }
    add_action( 'init', 'post_jobs_applications', 0 );

}
/**
 * Socials
 */
function ca_get_socials($reddit = false, $twitter = false, $telegram = false, $facebook = false, $instagram = false, $youtube = false, $linkedin = false)
{
    $socials = get_field('socials_g', 'option');
    $social_link = '';
    if ($socials) :
        if ($reddit) {
            if ($socials['reddit']){
                $social_link .= '<a href="' . esc_url( $socials['reddit'] ) . '" class="reddit" target="_blank" rel="noreferrer" title="Coinsbench reddit"><i class="fab fa-reddit"></i></a>';
            }
        }
        if ($twitter) {
            if ($socials['twitter']) {
                $social_link .= '<a href="' . esc_url( $socials['twitter'] ) . '" class="twitter" target="_blank" rel="noreferrer" title="Coinsbench twitter"><i class="fab fa-twitter"></i></a>';
            }
        }
        if ($telegram) {
            if ($socials['telegram']) {
                $social_link .= '<a href="' . esc_url( $socials['telegram'] ) . '" class="telegram" target="_blank" rel="noreferrer" title="Coinsbench telegram"><i class="fab fa-telegram"></i></a>';
            }
        }
        if ($facebook) {
            if ($socials['facebook']) {
                $social_link .= '<a href="' . esc_url( $socials['facebook'] ) . '" class="facebook" target="_blank" rel="noreferrer" title="Coinsbench facebook"><i class="fab fa-facebook"></i></a>';
            }
        }
        if ($instagram) {
            if ($socials['instagram']) {
                $social_link .= '<a href="' . esc_url( $socials['instagram'] ) . '" class="instagram" target="_blank" rel="noreferrer" title="Coinsbench instagram"><i class="fab fa-instagram"></i></a>';
            }
        }
        if ($youtube) {
            if ($socials['youtube']) {
                $social_link .= '<a href="' . esc_url( $socials['youtube'] ) . '" class="youtube" target="_blank" rel="noreferrer" title="Coinsbench youtube"><i class="fab fa-youtube"></i></a>';
            }
        }
        if ($linkedin) {
            if ($socials['linkedin']) {
                $social_link .= '<a href="' . esc_url( $socials['linkedin'] ) . '" class="linkedin" target="_blank" rel="noreferrer" title="Coinsbench youtube"><i class="fab fa-linkedin"></i></a>';
            }
        }

        return $social_link;

    endif;
}

add_action('wp_ajax_nopriv_ajax_applyjob', 'form_applyjob');
add_action('wp_ajax_ajax_applyjob', 'form_applyjob');
function form_applyjob () {

    $app_name = $_POST['sjf_name'];
    $app_email = $_POST['sjf_email'];
    $app_tel = $_POST['sjf_phone'];
    $app_msg = $_POST['sjf_message']??'No message!';
    $app_role = $_POST['sjf_role'];
    $app_comp = $_POST['sjf_comp'];
    $app_comp_email = $_POST['sjf_comp_em'];
    $app_guid = $_POST['sjf_guid'];
    $app_pid = $_POST['sjf_pid'];

    $app_exists = array("post_type" => "jobs_applications", "s" => $app_name .' ['.$app_email.'] - ' . $app_role);
    $app_exists_q = get_posts( $app_exists );

    if ($app_exists_q) {
        echo 'You already applied for this job!';
    } else {

        $app_post = array(
//        'post_title'    => wp_strip_all_tags('#'.$app_pid.' '.$app_name.' - '.$app_role ),
            'post_type' => 'jobs_applications',
            'post_status' => 'publish',
        );

        $postID = wp_insert_post($app_post);
        $app_post_update = array(
            'ID' => $postID,
            'post_title' => wp_strip_all_tags('#' . $postID . ' ' . $app_name .' ['.$app_email.'] - ' . $app_role),
        );
        wp_update_post($app_post_update);

        $filename = $_FILES["sjf_resume"]["name"];
        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $new_filename = 'ID' . $postID . '_' . strtolower(str_replace(' ', '_', $app_name)) . '_' . $app_role . '_' . date('Ymd') . '.' . $file_ext;
        $file = wp_upload_dir()['baseurl'] . '/resume/' . $new_filename;

        $app_details = array(
            'company_app' => $app_comp,
            'company_email_app' => $app_comp_email,
            'job_role_app' => $app_role,
            'app_name_app' => $app_name,
            'app_email_app' => $app_email,
            'app_phone_app' => $app_tel,
            'app_message_app' => $app_msg,
            'job_app' => $app_guid,
            'resume_app' => $file
        );
        update_field('field_622e545e7d4d8', $app_details, $postID);

        $upload_dir = wp_upload_dir()['basedir'];
        if (!file_exists($upload_dir . '/resume')) {
            mkdir($upload_dir . '/resume', 0777, true);
        }
        $resume_dir = $upload_dir . '/resume/';
//    $target_file = $resume_dir . basename($_FILES["sjf_resume"]["name"]);
        $target_file = $resume_dir . $new_filename;

        $uploadOk = 1;
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["sjf_resume"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars($new_filename) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    wp_die();
}
function ca_acf_job_link_field_link( $field ) {
    echo '<a href="'.$field['value'].'">View Job</a>';
}
 add_action('acf/render_field/key=field_622e558c7d4df', 'ca_acf_job_link_field_link');
function ca_acf_job_link_hide( $field ) {

        $field['type'] = 'hidden';
    return $field;
}
 add_filter('acf/prepare_field/key=field_622e558c7d4df', 'ca_acf_job_link_hide');
function ca_acf_job_resume_field_link( $field ) {
    $filename = explode('/',$field['value']);
    echo '<span style="font-weight: bold;">'.end($filename).'</span><br><a href="'.$field['value'].'" download>Download Resume</a>';
}
add_action('acf/render_field/key=field_622e609d56e37', 'ca_acf_job_resume_field_link');
function ca_acf_job_resume_hide( $field ) {

    $field['type'] = 'hidden';
    return $field;
}
add_filter('acf/prepare_field/key=field_622e609d56e37', 'ca_acf_job_link_hide');
/**
 *	Jobs Applications Columns
 *
 */
function ca_add_job_app_columns ( $columns ) {
    unset($columns['date']);
    $columns['app_company'] = 'Company';
    $columns['app_role'] = 'Role';
    $columns['app_link'] = 'Link';
    $columns['app_resume'] = 'Resume';
    $columns['date'] = 'Date';
    return $columns;
}
add_filter ( 'manage_jobs_applications_posts_columns', 'ca_add_job_app_columns' );
/*
* Add columns to Jobs Applications CPT
*/
function ca_jobs_app_custom_column ( $column, $post_id ) {
    switch ( $column ) {
        case 'app_company':
            echo get_post_meta ( $post_id, 'appdetails_company_app', true );
            break;
        case 'app_role':
            echo get_post_meta ( $post_id, 'appdetails_job_role_app', true );
            break;
        case 'app_link':
            echo '<a href="'.get_post_meta ( $post_id, 'appdetails_job_app', true ).'">View Job</a>';
            break;
        case 'app_resume':
            echo '<a href="'.get_post_meta ( $post_id, 'appdetails_resume_app', true ).'" download>Download resume</a>';
            break;
    }
}
add_action ( 'manage_jobs_applications_posts_custom_column', 'ca_jobs_app_custom_column', 10, 2 );
/*
* Add Jobs Applications Sortable columns
*/
function ca_jobs_app_column_sortable( $columns ) {
    $columns['app_company'] = 'app_company';
    $columns['app_role'] = 'app_role';
    return $columns;
}
add_filter('manage_edit-jobs_applications_sortable_columns', 'ca_jobs_app_column_sortable' );
/*
 * Remove 'View' from Jobs Application table
 */
add_filter( 'post_row_actions', 'ca_remove_job_app_view', 10, 1 );
function ca_remove_job_app_view( $actions )
{
    if( get_post_type() === 'jobs_applications' )
        unset( $actions['view'] );
    return $actions;
}
/*
 * JOBS Search All
 */
add_action('wp_ajax_nopriv_job_search_all', 'job_search_all');
add_action('wp_ajax_job_search_all', 'job_search_all');
function job_search_all() {
    $keyword = $_REQUEST['keyword'];
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'custom_jobs',
        's' => $keyword
    );

    $query = new WP_Query($args);
    $posts_obj = new stdClass();
    $i=0;
    foreach($query->posts as $post){
        $posts_obj->$i->post_name = $post->post_title;
        $posts_obj->$i->post_excerpt = substr(get_post_meta($post->ID,'job_description',true),0,50);
        $posts_obj->$i->post_uri = $post->guid;
        $i++;
    }
    if (empty((array)$posts_obj)){
        echo 0;
    } else {
        echo json_encode($posts_obj);
    }
    wp_die();
}
/*
 * Number of post in loop
 */
function wpse214084_max_post_queries( $query ) {

    if(is_tax()){
        $query->set('posts_per_page', 8);
    }
}
add_action( 'pre_get_posts', 'wpse214084_max_post_queries' );
/**
 *	Jobs CPT Columns
 *
 */
function ca_add_job_cpt_columns ( $columns ) {
    unset($columns['date']);
    $columns['job_promo_sponsored'] = 'Sponsored';
    $columns['job_promo_trending'] = 'Trending';
    $columns['date'] = 'Date';
    return $columns;
}
add_filter ( 'manage_custom_jobs_posts_columns', 'ca_add_job_cpt_columns' );
/*
* Add columns to Jobs CPT
*/
function ca_jobs_cpt_custom_column ( $column, $post_id ) {
    switch ( $column ) {
        case 'job_promo_sponsored':
            $pm = get_post_meta ( $post_id, 'sponsored_job', true );
            if ($pm){
                echo '<span style="color: red">Yes</span>';
            } else {echo 'No';}
            break;
        case 'job_promo_trending':
            $pm2 = get_post_meta ( $post_id, 'trending_job', true );
            if ($pm2){
                echo '<span style="color: red">Yes</span>';
            } else {echo 'No';}
            break;
    }
}
add_action ( 'manage_custom_jobs_posts_custom_column', 'ca_jobs_cpt_custom_column', 10, 2 );
/*
* Add Jobs CPT Sortable columns
*/
function ca_jobs_cpt_column_sortable( $columns ) {
    $columns['job_promo_sponsored'] = 'job_promo_sponsored';
    $columns['job_promo_trending'] = 'job_promo_trending';
    return $columns;
}
add_filter('manage_edit-custom_jobs_sortable_columns', 'ca_jobs_cpt_column_sortable' );
/**
 *	Posts CPT Columns
 *
 */
function ca_add_posts_cpt_columns ( $columns ) {
    unset($columns['date']);
    $columns['post_featured'] = 'Featured';
    $columns['date'] = 'Date';
    return $columns;
}
add_filter ( 'manage_post_posts_columns', 'ca_add_posts_cpt_columns' );
/*
* Add columns to Posts CPT
*/
function ca_posts_cpt_custom_column ( $column, $post_id ) {
    switch ( $column ) {
        case 'post_featured':
            $pm = get_post_meta ( $post_id, 'featured', true );
            if ($pm){
                echo '<span style="color: red">Yes</span>';
            } else {echo 'No';}
            break;
    }
}
add_action ( 'manage_post_posts_custom_column', 'ca_posts_cpt_custom_column', 10, 2 );
/*
* Add Posts CPT Sortable columns
*/
function ca_posts_cpt_column_sortable( $columns ) {
    $columns['post_featured'] = 'post_featured';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'ca_posts_cpt_column_sortable' );
add_action( 'pre_get_posts', 'ca_posts_custom_orderby' );
function ca_posts_custom_orderby( $query ) {
    if ( ! is_admin() )
        return;
    $orderby = $query->get( 'orderby');

    if ( 'post_featured' == $orderby ) {
        $query->set( 'meta_key', 'featured' );
        $query->set( 'orderby', 'meta_value_num' );
    }
    if ( 'job_promo_sponsored' == $orderby ) {
        $query->set( 'meta_key', 'sponsored_job' );
        $query->set( 'orderby', 'meta_value_num' );
    }
    if ( 'job_promo_trending' == $orderby ) {
        $query->set( 'meta_key', 'trending_job' );
        $query->set( 'orderby', 'meta_value_num' );
    }
    if ( 'app_company' == $orderby ) {
        $query->set( 'meta_key', 'appdetails_company_app' );
        $query->set( 'orderby', 'meta_value_num' );
    }
    if ( 'app_role' == $orderby ) {
        $query->set( 'meta_key', 'appdetails_job_role_app' );
        $query->set( 'orderby', 'meta_value_num' );
    }
}