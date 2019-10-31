<?php get_header(); ?>

    <?php
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'banners',
        'orderby' => 'title',
        'order' =>'ASC',
        'no_found_rows' => true,
    );
    $topBannerQuery = new WP_Query( $args  );

    if ( $topBannerQuery->have_posts() ) :

    while ( $topBannerQuery->have_posts() ) : $topBannerQuery->the_post();
    $post_id = get_the_ID();
    $banner_data = get_post_meta( $post_id, '_banner', true );
    if($banner_data["banner_position"] == "top") : ?>

	<section class="hero-section d-flex align-items-center" style="background-image: url(<?php  echo get_the_post_thumbnail_url($post_id, 'full') ?>)">
		<div class="container">
			<div class="hero-content text-center">
				<h1><?php the_excerpt() ?></h1>
				<p><?php echo get_the_title() ?></p>
				<!-- <a href="#"><i class="arrow_triangle-right_alt2"></i>Watch Video</a> -->
			</div>
		</div>
		<div class="hero-pro"></div>
	</section><!-- hero-section -->

    <?php endif; endwhile; endif; ?>



    <!-- get testimonial -->
    <?php
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'testimonials',
        'orderby' => "DESC",
        'no_found_rows' => true,
    );
    $aboutQuery = new WP_Query( $args  );
    ?>

    <?php if ( $aboutQuery->have_posts() ) : ?>

	<section class="promo-section bd-bottom padding">
		<div class="container">
			<div class="promo-wrap row">
                <?php
                    while ( $aboutQuery->have_posts() ) : $aboutQuery->the_post();
                    $post_id = get_the_ID();
                    $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
                    if($testimonial_data["client_type"] == "about") :
                ?>

				<div class="col-lg-3 col-sm-6 sm-padding">
					<div class="promo-content text-center">
						<i class="<?php echo $testimonial_data['client_name'] ?>"></i>
						<h3><?php echo get_the_title(); ?></h3>
						<p><?php the_excerpt() ?></p>
					</div>
				</div>

                <?php endif; endwhile; ?>

			</div>
		</div>
	</section><!-- promo-section-->

    <?php  endif; ?>


        <?php
        $args = array(
            'posts_per_page' => 10,
            'post_type' => 'banners',
            'orderby' => 'title',
            'order' =>'ASC',
            'no_found_rows' => true,
        );
        $centerBannerQuery = new WP_Query( $args  );

        if ( $centerBannerQuery->have_posts() ) :

    while ( $centerBannerQuery->have_posts() ) : $centerBannerQuery->the_post();
    $post_id = get_the_ID();
    $banner_data = get_post_meta( $post_id, '_banner', true );
    if($banner_data["banner_position"] == "center") : ?>


	<section class="pro-details-section bg-grey bd-bottom">
		<div class="container">
		   <div class="details-cam d-none d-md-block"></div>
			<div class="row pro-details">
				<div class="col-md-6">
					<div class="pro-content">
						<h2><?php echo get_the_title() ?></h2>
						<p><?php the_excerpt() ?></p>
						<a href="<?php echo get_site_url() ?>/san-pham" class="default-btn">Đến trang sản phẩm</a>
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php endif; endwhile; endif; ?>

    <?php
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'testimonials',
        'orderby' => "DESC",
        'no_found_rows' => true,
    );
    $aboutQuery = new WP_Query( $args  );
    ?>

    <?php if ( $aboutQuery->have_posts() ) : ?>



	<section class="feature-section padding">
		<div class="container">

			<div class="section-heading text-center mb-40">
				<h2>Tính năng nổi bật</h2>
				<p>Vượt trội với những tính năng ưu việt của chúng tôi</p>
			</div>
			<div class="row feature-wrap">
                <?php
                    while ( $aboutQuery->have_posts() ) : $aboutQuery->the_post();
                    $post_id = get_the_ID();
                    $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
                    if($testimonial_data["client_type"] == "feature") :
                ?>
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="feature-content text-center">
                            <i class="<?php echo $testimonial_data['client_name']?>"></i>
                            <h3><?php echo get_the_title() ?></h3>
                            <p><?php the_excerpt() ?></p>
                        </div>
                    </div>
                    <?php endif; endwhile; ?>
			</div>
		</div>
	</section>

    <?php  endif; ?>


	<?php
		$args = array(
			'posts_per_page' => 10,
			'post_type' => 'sliders',
			'orderby' => "DESC",
			'no_found_rows' => true,
		);
		$sliderQuery = new WP_Query( $args  );
	?>

	<?php if ( $sliderQuery->have_posts() ) : ?>

	<div class="photo-gallery-section">
		<div class="remote d-none d-md-block"></div>
		<div id="photo-gallery" class="photo-gallery owl-carousel">
			<?php while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();
				$post_id = get_the_ID();
				$slider_data = get_post_meta( $post_id, '_slider', true );
				echo the_post_thumbnail( 'full' );
			endwhile; wp_reset_postdata();
			?>
		</div>
	</div><!-- photo-gallery-section-->

<?php endif; ?>

	<?php
	$query = new WC_Product_Query( array(
		'limit' => 10,
		'orderby' => 'date',
		'order' => 'DESC'
		) );
		$products = $query->get_products();
	?>

	<?php if(count($products) > 0) : ?>

	<section id="products" class="product-section bg-grey bd-bottom padding">
		<div class="container">
			<div class="section-heading text-center mb-40">
				<h2>Sản phẩm mới nhất</h2>
				<p>Thông tin những sản phẩm mới nhất của công ty chúng tôi</p>
			</div><!-- Section Heading -->

			<div id="product-carousel" class="product-carousel owl-carousel">

				<!-- Get 10 most recent product IDs in date descending order. -->
					<?php foreach($products as $product) : ?>
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
				<?php endforeach; ?>
			</div>

		</div>
	</section><!-- Product Section -->

	<?php endif; ?>



	<!-- get testimonial -->
	<?php
		$args = array(
			'posts_per_page' => 100,
			'post_type' => 'testimonials',
			'orderby' => "DESC",
			'no_found_rows' => true,
		);
		$testimonialQuery = new WP_Query( $args  );
	?>

	<?php if ( $testimonialQuery->have_posts() ) : ?>

	<section id="testimonial" class="testimonial-section bd-bottom padding">
		<div class="container">
			<div class="section-heading text-center mb-40">
				<h2>Đánh giá khách hàng.</h2>
				<p>Mang nhưng điều tốt đẹp nhất cho khách hàng</p>
			</div>
			<div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
				<?php while ( $testimonialQuery->have_posts() ) : $testimonialQuery->the_post();
					$post_id = get_the_ID();
					$testimonial_data = get_post_meta( $post_id, '_testimonial', true );
                    if($testimonial_data["client_type"] == "testimonials") :
				?>
				<div class="testi-item">
					<div class="testi-thumb">
						<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail') ?>
					</div>
					<div class="testi-details">
						<p><?php echo get_the_content() ?></p>
						<div class="reviews">
							<h3><?php echo $testimonial_data['client_name']; ?></h3>
						</div>
					</div>
				</div>
				<?php endif; endwhile; wp_reset_postdata();?>
			</div>
		</div>
	</section><!-- testimonial-section -->
	<?php endif; ?>

    <!-- get questions -->
    <?php
    $args = array(
        'posts_per_page' => 10,
        'post_type' => 'banners',
        'orderby' => 'title',
        'order' =>'ASC',
        'no_found_rows' => true,
    );
    $bottomBannerQuery = new WP_Query( $args  );

    ?>

    <?php if ( $bottomBannerQuery->have_posts() ) :

        while ( $bottomBannerQuery->have_posts() ) : $bottomBannerQuery->the_post();
					$post_id = get_the_ID();
					$banner_data = get_post_meta( $post_id, '_banner', true );
					if($banner_data["banner_position"] == "bottom") : ?>


	<section class="cta-section padding" style="background-image:url(<?php  echo get_the_post_thumbnail_url($post_id, 'full') ?>)">
		<div class="container">
			<div class="cta-content text-center">
				<h2><?php echo get_the_title() ?></h2>
				<p><?php echo get_the_content() ?></p>
			</div>
		</div>
	</section><!-- cta-section -->

    <?php endif; endwhile; endif; ?>



	<!-- get questions -->
	<?php
		$args = array(
			'posts_per_page' => 10,
			'post_type' => 'testimonials',
			'orderby' => 'title',
			'order' =>'ASC',
			'no_found_rows' => true,
		);
		$questionsQuery = new WP_Query( $args  );
	?>

	<?php if ( $questionsQuery->have_posts() ) : ?>

	<section id="faq" class="faq-section padding">
		<div class="container">
			<div class="section-heading text-center mb-40">
				<h2>Câu hỏi thường gặp</h2>
				<p>Flypro camera is an optical instrument for capturing super images.</p>
			</div>
			<div class="faq-wrap row">
				<?php while ( $questionsQuery->have_posts() ) : $questionsQuery->the_post();
					$post_id = get_the_ID();
					$questions_data = get_post_meta( $post_id, '_testimonial', true );
					if($questions_data["client_type"] == "question") :
				?>
					<div class="col-md-6 padding-15">
						<h3><?php echo get_the_title() ?></h3>
						<p><?php echo get_the_content() ?></p>
					</div>

				<?php endif; endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section><!-- faq-section -->

	<?php endif; ?>

	<div class="subscribe-section text-center">
		<div class="container">
			<div class="subscribe-box clearfix">
				<div class="subscribe-wrap">
					<form action="#" class="subscribe-form">
						<input type="email" name="email" id="subs-email" class="form-input" placeholder="Enter Your Email Address...">
						<button type="submit" class="submit">Subscribe</button>
						<div id="subscribe-result">
							<p class="subscription-success"></p>
							<p class="subscription-error"></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- subscribe-section -->



<?php get_footer(); ?>
