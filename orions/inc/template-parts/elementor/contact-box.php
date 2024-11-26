<?php
    $item = $args['item'];
    $box_icon = $item['r_box_icon'];
?>
<div class="app-feature-single app-feature-single-1">
    <div class="app-feature-single-wrapper">
                <?php //orions_render_icon( $item['image_box_icon'] ); ?>
                <?php if($box_icon != '') {?>
                <div class="icon">
                    <i class="las <?php echo wp_kses( $item['r_box_icon'], 'elementor-general' ); ?>"></i>
                </div>
                <?php } else { ?>
                <div class="icon">
                    <i class="las <?php echo wp_kses( $item['image_box_icon']['value'], 'elementor-general' ); ?>"></i>
                </div>
                <?php }?>
                <h3 class="c-dark"><?php echo esc_html( $item['image_box_title'] ); ?></h3>
                <?php echo wp_kses_post( $item['image_box_content'] ); ?>
    </div>
</div>