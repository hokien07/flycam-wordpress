<?php get_header();?>

<div class="breadcrumb-area">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<div class="main-product-thumbnail dark-white-bg ptb-80">
    <div class="container">
        <div class="shop-area mb-all-40">

            <div class="tab-content">
                <div id="grid-view" class="tab-pane fade show active">

                    <div class="row border-hover-effect ">

                        <?php

                        $taxonomy     = 'product_cat';
                        $orderby      = 'name';
                        $show_count   = 0;
                        $pad_counts   = 0;
                        $hierarchical = 1;
                        $title        = '';
                        $empty        = 0;
                        $catSlug = '';

                        $args = array(
                            'taxonomy'     => $taxonomy,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                        );
                        $all_categories = get_categories( $args );

                        foreach ($all_categories as $cat) {
                            if($cat->category_parent == 0) {
                                $category_id = $cat->term_id;
                                $catSlug = $cat->slug;
                                break;
                            }
                        }

                        $args1 = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                            'product_cat'    => $catSlug
                        );

                        $loop = new WP_Query( $args1 );

                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">

                                <!-- Single Product Start -->
                                <div class="single-elomous-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="<?php echo get_permalink() ?>">
                                            <?php the_post_thumbnail(array(200, 200, true), array('class'=>'primary-img')) ?>
                                            <?php the_post_thumbnail(array(200, 200, true), array('class'=>'secondary-img')) ?>
                                        </a>
                                    </div>

                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h4>
                                                <a href="<?php echo get_permalink() ?>"><?php echo $product->get_name(); ?></a>
                                            </h4>
                                            <p>
                                                <span class="special-price"><?php echo number_format($product->get_regular_price(), 0, ",", ","); ?></span>
                                                <del class="old-price"><?php echo number_format($product->get_sale_price(), 0, ",", ","); ?></del>
                                            </p>
                                        </div>
                                        <div class="pro-add-cart">
                                            <a href="<?php echo get_site_url()  ?>/?add-to-cart=<?php echo $product->get_id() ?>" title="Mua ngay">Mua ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
