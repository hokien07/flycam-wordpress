<?php


add_theme_support('menus');

// register css and scripts.
function registerStyleAndScript () {

    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style('font-awesome');

    wp_register_style('themify-icons', get_template_directory_uri() . '/css/themify-icons.css', array(), '1.0', 'all');
    wp_enqueue_style('themify-icons');

    wp_register_style('elegant-font-icons', get_template_directory_uri() . '/css/elegant-font-icons.css', array(), '1.0', 'all');
    wp_enqueue_style('elegant-font-icons');
    
    wp_register_style('elegant-line-icons', get_template_directory_uri() . '/css/elegant-line-icons.css', array(), '1.0', 'all');
    wp_enqueue_style('elegant-line-icons');
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10', 'all');
    wp_enqueue_style('slicknav');

    wp_register_style('animate', get_template_directory_uri() . '/css/animate.min.css', array(), '1.0', 'all');
    wp_enqueue_style('animate');

    wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0', 'all');
    wp_enqueue_style('owl-carousel');

    wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all');
    wp_enqueue_style('responsive');

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style');


    wp_register_style('product', get_template_directory_uri() . '/css/product.css', array(), '1.0', 'all');
    wp_enqueue_style('product');

    wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), false, false);
    wp_enqueue_script('modernizr');

    
    wp_register_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-1.12.4.min.js', array(), false, true);
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '4.0.0', true);
    wp_enqueue_script('bootstrap');

    wp_register_script('tether', get_template_directory_uri() . '/js/vendor/tether.min.js', array(), false, true);
    wp_enqueue_script('tether');

    wp_register_script('slicknav', get_template_directory_uri() . '/js/vendor/jquery.slicknav.min.js', array(), false, true);
    wp_enqueue_script('slicknav');

    wp_register_script('owl-carousel', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), false, true);
    wp_enqueue_script('owl-carousel');

    wp_register_script('smooth-scroll', get_template_directory_uri() . '/js/vendor/smooth-scroll.min.js', array(), false, true);
    wp_enqueue_script('smooth-scroll');

    wp_register_script('venobox', get_template_directory_uri() . '/js/vendor/venobox.min.js', array(), false, true);
    wp_enqueue_script('venobox');
   
    wp_register_script('ajaxchimp', get_template_directory_uri() . '/js/vendor/jquery.ajaxchimp.min.js', array(), false, true);
    wp_enqueue_script('ajaxchimp');

    wp_register_script('wow-min', get_template_directory_uri() . '/js/vendor/wow.min.js', array(), false, true);
    wp_enqueue_script('wow-min');
    
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
    wp_enqueue_script('main');
    
    wp_register_script('ajax-add-to-cart', get_template_directory_uri() . '/js/ajax-add-to-cart.js', array(), '1.0', true);
    wp_enqueue_script('ajax-add-to-cart');

}
add_action( 'wp_enqueue_scripts', 'registerStyleAndScript' );


// Change default script of wordpress.
add_filter( 'wp_default_scripts', 'change_default_jquery' );
function change_default_jquery( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        //$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}



// Register Navigation
function register_menu() {
    register_nav_menus(array(
        'header-menu' => __('Menu chính', 'html5blank'),
        'sidebar-menu' => __('Menu bên', 'html5blank'),
        'extra-menu' => __('Menu chân', 'html5blank')
    ));
}
add_action( 'init', 'register_menu' );


add_action( 'wp_before_admin_bar_render', 'custom_before_admin_bar_render', 999 );
function custom_before_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('my-account');
    $wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_menu('delete-cache');
    $wp_admin_bar->remove_menu('updraft_admin_node');
    $wp_admin_bar->remove_menu('w3tc');
}


// add woocommerce to theme
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );

   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size( 150, 150, true );
   add_image_size( 'product-list-thumb', 400, 400, true);

    // remove woocommerce style.
    if (class_exists('Woocommerce')){
       add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    }

}
add_action( 'after_setup_theme', 'woocommerce_support' );


// update cart data

add_action( 'wp_ajax_remove_cart_item', 'remove_cart_item_init' );
add_action( 'wp_ajax_nopriv_remove_cart_item', 'remove_cart_item_init' );
function remove_cart_item_init() {

    $key = (isset($_POST['cart_item_key'])) ? $_POST['cart_item_key'] : '';

    if( !isset( WC()->cart->get_cart()[ $key ] ) ){
        die();
    }

    WC()->cart->remove_cart_item($key);

    die();
}

// Add link for breadcrumb product page
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return get_site_url();
}





// Testimonial Custom
add_action( 'init', 'testimonials_post_type' );
function testimonials_post_type() {
    $labels = array(
        'name' => 'Trang chủ',
        'singular_name' => 'Trang chủ',
        'add_new' => 'Thêm mới',
        'add_new_item' => 'Thêm mới',
        'edit_item' => 'Sửa đánh giá',
        'new_item' => 'Đánh điá mới',
        'view_item' => 'Xem đánh giá',
        'search_items' => 'Tìm',
        'not_found' =>  'Không có thông tin',
        'not_found_in_trash' => 'Không có thông tin',
        'parent_item_colon' => '',
    );

    register_post_type( 'testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite'  => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array( 'editor', 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-format-quote',
        'register_meta_box_cb' => 'testimonials_meta_boxes',
    ));
}


// Adding a Metabox Testimonial Custom
function testimonials_meta_boxes() {
    add_meta_box( 'testimonials_form', 'Thông tin chi tiết', 'testimonials_form', 'testimonials', 'normal', 'high' );
}

function testimonials_form() {

    $post_id = get_the_ID();
    $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
    $client_name = ( empty( $testimonial_data['client_name'] ) ) ? '' : $testimonial_data['client_name'];
    wp_nonce_field( 'testimonials', 'testimonials');
    ?>

    <p>
        <label>Loại hiển thị(*)</label><br />
        <select name="testimonial[client_type]">
            <option value="testimonials">Đánh giá khách hàng</option>
            <option value="feature">Tính năng nổi bật</option>
            <option value="about">Giới thiệu sản phẩm</option>
            <option value="question">Câu hỏi thường gặp</option>
        </select>
    </p>

    <p>
        <label>Tên(*)</label><br />
        <input type="text" value="<?php echo $client_name; ?>" name="testimonial[client_name]" placeholder="Nhập tên"/>
    </p>

    <?php
}


add_action( 'save_post', 'testimonials_save_post');
function testimonials_save_post( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( ! empty( $_POST['testimonials'] ) && ! wp_verify_nonce( $_POST['testimonials'], 'testimonials' ) )
        return;

    if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }

    if ( ! wp_is_post_revision( $post_id ) && 'testimonials' == get_post_type( $post_id ) ) {
        remove_action( 'save_post', 'testimonials_save_post' );

        $customPost  = get_post( $post_id );
        wp_update_post( array(
            'ID' => $post_id,
            'post_title' => $customPost->post_title
        ) );

        add_action( 'save_post', 'testimonials_save_post' );
    }

    if(!empty($_POST['testimonial'])) {

        $testimonial_data['client_name'] = ( empty( $_POST['testimonial']['client_name'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['client_name'] );
        $testimonial_data['client_type'] = ( empty( $_POST['testimonial']['client_type'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['client_type'] );

        update_post_meta( $post_id, '_testimonial', $testimonial_data );

    }else {
        delete_post_meta( $post_id, '_testimonial' );
    }

}



//Customizing the List View Testimonial Custom
add_filter( 'manage_edit-testimonials_columns', 'testimonials_edit_columns' );
function testimonials_edit_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Tiêu đề',
        'testimonial-image' => 'Hình ảnh',
        'testimonial' => 'Nội dung',
        'testimonial-client-name' => 'Tên',
        'testimonial-client-type' => 'Loại hiển thị',
        'author' => 'Người đăng',
        'date' => 'Ngày đăng'
    );
    return $columns;
}

add_action( 'manage_posts_custom_column', 'testimonials_columns', 10, 2 );
function testimonials_columns( $column, $post_id ) {
    $testimonial_data = get_post_meta( $post_id, '_testimonial', true );

    switch ( $column ) {
        case 'testimonial':
            the_excerpt();
            break;

        case 'testimonial-image' :
            the_post_thumbnail(array(100, 100));
            break;

        case 'testimonial-client-name':
            if ( ! empty( $testimonial_data['client_name'] ) )
                echo $testimonial_data['client_name'];
            break;

        case 'testimonial-client-type':
            if ( ! empty( $testimonial_data['client_type'] ) )
                echo $testimonial_data['client_type'];
            break;
    }
}







// Slider Custom
add_action( 'init', 'sliders_post_type' );
function sliders_post_type() {
    $labels = array(
        'name' => 'Sliders',
        'singular_name' => 'Slider',
        'add_new' => 'Thêm mới',
        'add_new_item' => 'Thêm mới',
        'edit_item' => 'Sửa',
        'new_item' => '',
        'view_item' => 'Xem',
        'search_items' => 'Tìm',
        'not_found' =>  'Không có thông tin',
        'not_found_in_trash' => 'Không có thông tin',
        'parent_item_colon' => '',
    );

    register_post_type( 'sliders', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite'  => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array( 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-format-quote'
    ));
}

add_action( 'save_post', 'sliders_save_post');
function sliders_save_post( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( ! empty( $_POST['sliders'] ) && ! wp_verify_nonce( $_POST['sliders'], 'sliders' ) )
        return;

    if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }

    if ( ! wp_is_post_revision( $post_id ) && 'sliders' == get_post_type( $post_id ) ) {
        remove_action( 'save_post', 'sliders_save_post' );

        $customPost  = get_post( $post_id );
        wp_update_post( array(
            'ID' => $post_id,
            'post_title' => $customPost->post_title
        ) );

        add_action( 'save_post', 'sliders_save_post' );
    }
}

//Customizing the List View Testimonial Custom
add_filter( 'manage_edit-sliders_columns', 'sliders_edit_columns' );
function sliders_edit_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Tiêu đề',
        'slider-image' => 'Hình ảnh',
        'author' => 'Người đăng',
        'date' => 'Ngày đăng'
    );
    return $columns;
}

add_action( 'manage_posts_custom_column', 'sliders_columns', 10, 2 );
function sliders_columns( $column, $post_id ) {

    switch ( $column ) {
        case 'slider-image' :
            the_post_thumbnail(array(100, 100));
            break;
    }
}




// Banner Custom
add_action( 'init', 'banners_post_type' );
function banners_post_type() {
    $labels = array(
        'name' => 'Banners',
        'singular_name' => 'Banner',
        'add_new' => 'Thêm mới',
        'add_new_item' => 'Thêm mới',
        'edit_item' => 'Sửa',
        'new_item' => '',
        'view_item' => 'Xem',
        'search_items' => 'Tìm',
        'not_found' =>  'Không có thông tin',
        'not_found_in_trash' => 'Không có thông tin',
        'parent_item_colon' => '',

    );

    register_post_type( 'banners', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite'  => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array( 'thumbnail', 'title', 'editor' ),
        'menu_icon' => 'dashicons-format-quote',
        'register_meta_box_cb' => 'banners_meta_boxes',
    ));
}


// Adding a Metabox Testimonial Custom
function banners_meta_boxes() {
    add_meta_box( 'banners_form', 'Vị trí', 'banners_form', 'banners', 'normal', 'high' );
}

function banners_form() {

    $post_id = get_the_ID();
    $banner_data = get_post_meta( $post_id, '_banner', true );
    $client_name = ( empty( $banner_data['banner_position'] ) ) ? '' : $banner_data['banner_position'];
    wp_nonce_field( 'banners', 'banners');
    ?>

    <p>
        <label>Vị trí(*)</label><br />
        <select name="banner[banner_position]">
            <option value="top">Top</option>
            <option value="center">Center</option>
            <option value="bottom">Bottom</option>
        </select>
    </p>

    <?php
}



add_action( 'save_post', 'banners_save_post');
function banners_save_post( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( ! empty( $_POST['banners'] ) && ! wp_verify_nonce( $_POST['banners'], 'banners' ) )
        return;

    if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }

    if ( ! wp_is_post_revision( $post_id ) && 'banners' == get_post_type( $post_id ) ) {
        remove_action( 'save_post', 'banners_save_post' );

        $customPost  = get_post( $post_id );
        wp_update_post( array(
            'ID' => $post_id,
            'post_title' => $customPost->post_title
        ) );

        add_action( 'save_post', 'banners_save_post' );
    }

    if(!empty($_POST['banner'])) {

        $banner_data['banner_position'] = ( empty( $_POST['banner']['banner_position'] ) ) ? '' : sanitize_text_field( $_POST['banner']['banner_position'] );

        update_post_meta( $post_id, '_banner', $banner_data );

    }else {
        delete_post_meta( $post_id, '_banner' );
    }

}



//Customizing the List View Testimonial Custom
add_filter( 'manage_edit-banners_columns', 'banners_edit_columns' );
function banners_edit_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Tiêu đề',
        'banner-image' => 'Hình ảnh',
        'banner-content'=>'Nội dung',
        'banner-position'=>'Vị trí',
        'author' => 'Người đăng',
        'date' => 'Ngày đăng'
    );
    return $columns;
}

add_action( 'manage_posts_custom_column', 'banner_columns', 10, 2 );
function banner_columns( $column, $post_id ) {
    $banner_data = get_post_meta( $post_id, '_banner', true );
    switch ( $column ) {
        case 'banner-image' :
            the_post_thumbnail(array(100, 100));
            break;
        case 'banner-content' :
            the_excerpt();
            break;

        case 'banner-position' :
            if(!empty($banner_data['banner_position'])) {
                echo $banner_data["banner_position"];
            }
            break;
    }
}




?>
