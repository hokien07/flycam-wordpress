<?php while ( have_posts() ) : the_post(); ?>

<?php if (is_product_category(  )) {

    wc_get_template_part( 'content', 'product-category' );
    break;

}else{

    wc_get_template_part( 'content', 'single-product' );

} ?>

<?php endwhile;?>
