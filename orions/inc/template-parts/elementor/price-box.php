<?php
    $item = $args['item'];
?>
<div class="pricing-single basic">
    <h5 class="plan" style="color:<?php echo esc_html( $item['p_title_color'] ); ?>"><?php echo esc_html( $item['price_box_title'] ); ?></h5>
    <div class="price price-month">
        <div class="month"><?php echo esc_html( $item['price_unit'] ); ?><span class="number"><?php echo esc_html( $item['monthly_price'] ); ?></span><sup>/mo</sup></div>
        <div class="year"><?php echo esc_html( $item['price_unit'] ); ?><span class="number"><?php echo esc_html( $item['annual_price'] ); ?></span><sup>/yr</sup></div>
    </div>
    <a href="<?php echo esc_html( $item['price_box_link']['url'] ); ?>" class="button <?php echo esc_html( $item['price_box_bg_color'] ); ?>">
        <div class="button-inner">
            <div class="button-content">
                <h4><?php echo esc_html( $item['price_box_link_text'] ); ?></h4>
            </div>
        </div>
    </a>
    <?php echo wp_kses_post($item['price_box_content']); ?>
    <h6><?php echo esc_html( $item['price_box_bottom_text']);?></h6>
</div>