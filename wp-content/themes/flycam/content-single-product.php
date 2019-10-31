<?php defined( 'ABSPATH' ) || exit; global $product; ?>

<?php get_header();?>

    <div class="breadcrumb-area">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </div>


    <div class="main-product-thumbnail dark-white-bg ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-all-40">

                    <div id="product-thumb-carousel" class="tab-content">
                        <?php
                            $attachment_ids = $product->get_gallery_image_ids();
                            if ( $attachment_ids && $product->get_image_id() ) {
                            	foreach ( $attachment_ids as $key => $attachment_id ) { ?>
                                    <div id="thumb<?php echo $key + 1 ?>" class="tab-pane fade show <?php if ($key == 0) echo 'active'?>">
                                        <a data-fancybox="images" href="<?php echo wp_get_attachment_url($attachment_id,  'thumnail'); ?>">
                                            <img src="<?php echo wp_get_attachment_url($attachment_id, 'thumnail'); ?>" alt="<?php echo $product->get_name() ?>">
                                        </a>
                                    </div>
                            	<?php }
                            }
                        ?>
                    </div>

                    <div class="product-thumbnail">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                            <?php
                                if ( $attachment_ids && $product->get_image_id() ) {
                                    foreach ( $attachment_ids as $childKey => $attachment_id ) {?>
                                        <a <?php if ($childKey == 0) echo 'class="active" ' ?> data-toggle="tab" href="#thumb<?php echo $childKey + 1 ?>"><img src="<?php echo wp_get_attachment_url($attachment_id, "thumnail"); ?>" alt="<?php echo $product->get_name(); ?>"></a>
                                    <?php }
                                }
                            ?>

                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="thubnail-desc ">
                        <h3 class="product-header"><?php echo $product->get_name() ?></h3>

                        <div class="pro-thumb-price mt-20">
                            <p>
                                <span class="special-price"><?php echo number_format($product->get_regular_price(),0, ",", ","); ?></span>
                                <del class="old-price"><?php echo number_format($product->get_sale_price(), 0, ",", ","); ?></del>
                            </p>
                        </div>

                        <p class="pro-desc-details">
                            <?php echo $product->get_short_description(); ?>
                        </p>

                        <div class="quatity-stock">
                            <label>Số lượng</label>
                                <ul class="d-flex flex-wrap">
                                    <li class="box-quantity">
                                        <input class="quantity" type="number" name="quantity" min="1" value="1"/>
                                        <input type="hidden" class="product_id" name="product_id" value="<?php echo $product->get_id(); ?>">
                                    </li>
                                    <li>
                                        <button class="pro-cart" type="submit">add to cart</button>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end main product -->

    <div class="thumnail-desc dark-white-bg">
        <div class="container">
            <div class="thumb-desc-inner">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#dtail">Mô tả</a>
                            </li>
                        </ul>

                        <div class="tab-content thumb-content">
                            <div id="dtail" class="tab-pane fade show active">
                                <p>
                                    <?php echo $product->get_description(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </row>
                <!-- end row -->
            </div>
            <!-- end thumb-desc-inner -->
        </div>
        <!-- end container -->
    </div>
    <!-- end thumnail-desc -->


    <div class="amazing-pro dark-white-bg ptb-80">
        <div class="container">
            <div class="section-title">
                <span></span>
                <h2>Sản phẩm liên quan</h2>
            </div>

            <div id="product-carousel" class="product-carousel owl-carousel">


                <?php
                    $query = new WC_Product_Query( array(
                        'limit' => 10,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ) );
                    $products = $query->get_products();

                    if(count($products) > 0) :
                    foreach($products as $product) : ?>

				 <div class="product-item">
					<div class="product-thumb">
                        <?php echo get_the_post_thumbnail($product->get_id(), 'thumbnail') ?>
					</div>
					<div class="cart">
						<a href="<?php echo get_permalink($product->get_id()); ?>" class="default-btn">Chi tiết</a>
					</div>
					<div class="product-content text-center">
						<h3><a href="<?php echo get_permalink($product->get_id()); ?>"><?php echo $product->get_name(); ?></a></h3>
                        <p>Tình trạng: <span class="stock"><?php echo $product->get_stock_status()?></span></p>
                        <span class="price"><?php echo number_format($product->get_regular_price(), 0, ",", ","); ?></span>
                        <ul class="rattings">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
					</div>
				</div><!-- Product-1 -->

                <?php endforeach; endif; ?>
			</div>
        </div>
    </div>
    <!-- end amazing-pro dark-white-bg ptb-80 -->



<?php get_footer(); ?>
