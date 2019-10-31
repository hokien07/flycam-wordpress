<?php global $woocommerce; $items = $woocommerce->cart->get_cart();?>
<div class="breadcrumb-area">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>
<!-- end page header -->

<div class="checkout-area white-bg pb-80 pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox-form mb-sm-40">
                    <h3>Địa chỉ thanh toán</h3>
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="your-order">

                    <h3>Hoá đơn của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                               <tr>
                                   <th class="product-name">Sản phẩm</th>
                                   <th class="product-total">Tổng</th>
                               </tr>
                           </thead>

                           <tbody>
                               <?php foreach($items as $item => $values) {
                                   $product =  wc_get_product( $values['data']->get_id()); ?>

                                <tr class="cart_item">
                                    <td class="product-name">
                                        <?php echo $product->get_name(); ?> <span class="product-quantity"> × <?php echo $values["quantity"] ?></span>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount"><?php echo number_format($values['line_total'], 0, ",", ","); ?></span>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>

                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Hoá đơn</th>
                                    <td><span class="amount"><?php echo number_format($woocommerce->cart->total, 0, ",", ","); ?></span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Thanh toán</th>
                                    <td><span class=" total amount"><?php echo number_format($woocommerce->cart->total, 0, ",", ","); ?></span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <a href="<?php echo get_site_url()?>/gio-hang" class="btn-card">Giỏ hàng</a>
                        <button class="btn-checkout">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
