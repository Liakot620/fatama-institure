<?php

$footer_id = $args['footer_id'];
$footer_post = null;

$args = [
    'post_type' => 'footer',
    'p'			=> $footer_id
];

$query = new WP_Query( $args );

while ( $query->have_posts() ) {
    $query->the_post();
    the_content();
} wp_reset_postdata();

?>