<?php
    $member = $args['member'];
    //$count = $args['count'];
?>
<div class="team-single drop-shadow-team-1">
    <div class="team-single-wrapper">
        <div class="image">
            <div class="image-wrapper">
                <div class="image-inner">
                    <?php
                        echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( 
                            $member, 
                            'full', 
                            'team_image' 
                        ); 
                    ?>
                </div>
            </div>
        </div>
        <h3><?php echo esc_html( $member['team_name'] ); ?></h3>
        <p><?php echo esc_html( $member['team_designation'] ); ?></p>
        <div class="social social-1">
            <ul>
                <?php                    
                    //if ( empty( $member['team_social_link_1']['url'] ) ) continue;
                    $target = $member['team_social_link_1']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $member['team_social_link_1']['nofollow'] ? ' rel="nofollow"' : '';
                    $url = !empty( $member['team_social_link_1']['url'] ) ? ' href='.esc_url( $member['team_social_link_1']['url'] ) : '';
                    $icon = $member['team_social_icon_1']['value'];
                if ($url != '') {
                ?>
                <li>
                    <a 
                    <?php echo esc_attr($url); ?>
                    <?php echo esc_attr($target); ?>
                    <?php echo esc_attr($nofollow); ?>
                    >
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                        
                    </a>
                </li>
                <?php }?>
                <?php                    
                    //if ( empty( $member['team_social_link_1']['url'] ) ) continue;
                    $target = $member['team_social_link_2']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $member['team_social_link_2']['nofollow'] ? ' rel="nofollow"' : '';
                    $url = !empty( $member['team_social_link_2']['url'] ) ? ' href='.esc_url( $member['team_social_link_2']['url'] ) : '';
                    $icon = $member['team_social_icon_2']['value'];
                if ($url != '') {
                ?>
                <li>
                    <a 
                    <?php echo esc_attr($url); ?>
                    <?php echo esc_attr($target); ?>
                    <?php echo esc_attr($nofollow); ?>
                    >
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                        
                    </a>
                </li>
                <?php }?>
                <?php                    
                    //if ( empty( $member['team_social_link_1']['url'] ) ) continue;
                    $target = $member['team_social_link_3']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $member['team_social_link_3']['nofollow'] ? ' rel="nofollow"' : '';
                    $url = !empty( $member['team_social_link_3']['url'] ) ? ' href='.esc_url( $member['team_social_link_3']['url'] ) : '';
                    $icon = $member['team_social_icon_3']['value'];
                if ($url != '') {
                ?>
                <li>
                    <a 
                    <?php echo esc_attr($url); ?>
                    <?php echo esc_attr($target); ?>
                    <?php echo esc_attr($nofollow); ?>
                    >
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                        
                    </a>
                </li>
                <?php }?>
                <?php                    
                    //if ( empty( $member['team_social_link_1']['url'] ) ) continue;
                    $target = $member['team_social_link_4']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $member['team_social_link_4']['nofollow'] ? ' rel="nofollow"' : '';
                    $url = !empty( $member['team_social_link_4']['url'] ) ? ' href='.esc_url( $member['team_social_link_4']['url'] ) : '';
                    $icon = $member['team_social_icon_4']['value'];
                if ($url != '') {
                ?>
                <li>
                    <a 
                    <?php echo esc_attr($url); ?>
                    <?php echo esc_attr($target); ?>
                    <?php echo esc_attr($nofollow); ?>
                    >
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                        
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>        
    </div>
</div>