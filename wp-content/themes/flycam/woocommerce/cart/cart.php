<?php global $woocommerce; $items = $woocommerce->cart->get_cart();?>
<div class="breadcrumb-area">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<div class="cart-main-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form action="#">
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-remove">Bỏ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item => $values) {

                                     $product =  wc_get_product( $values['data']->get_id()); ?>
                                     <tr id="<?php echo $values['key'] ?>">
                                         <td class="product-thumbnail">
                                             <a href="<?php get_permalink( $product->get_id() ) ?>">
                                                 <?php echo get_the_post_thumbnail($product->get_id(), 'thumbnail') ?>
                                             </a>
                                         </td>
                                         <td class="product-name"><a href="<?php get_permalink( $product->get_id() ) ?>"><?php echo $product->get_name(); ?></a></td>
                                         <td class="product-price"><span class="amount"><?php echo number_format($product->get_regular_price(), 0, ",", ","); ?></span></td>
                                         <td class="product-quantity"><input type="number" value="<?php echo $values['quantity'] ?>" /></td>
                                         <td class="product-subtotal"><?php echo number_format($values['line_total'], 0, ",", ","); ?></td>
                                         <td class="product-remove" key="<?php echo $values['key'] ?>" admin-url="<?php echo admin_url('admin-ajax.php') ?>"> <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                     </tr>

                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                       <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <input type="submit" value="Cập nhật thay đổi" />
                                <a href="#">Tới trang sản phẩm</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng đơn hàng</h2>
                                <br />
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Đơn hàng</th>
                                            <td><span class="amount"><?php echo number_format($woocommerce->cart->total, 0, ",", ","); ?></span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Thanh toán</th>
                                            <td>
                                                <strong><span class="amount"><?php echo number_format($woocommerce->cart->total, 0, ",", ","); ?></span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="<?php echo get_site_url()?>/thanh-toan">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
