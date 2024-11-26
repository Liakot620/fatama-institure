<?php

    get_header();

    get_template_part( 'inc/template-parts/page', 'header' );

    while ( have_posts() ):
        the_post();
?>  
    <div class="feature-detail">                      
                        <?php the_content(); ?>
    </div>

    
<?php
    get_template_part( 'inc/template-parts/content', 'related-projects' );

    endwhile;

    get_footer();