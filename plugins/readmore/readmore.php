<?php
/*
Plugin Name: Read more
Version: 1.0.0
*/

add_filter('the_content' , 'tr_read_more');

function tr_read_more($content) {

    $authors_posts = get_posts([
        'author' => get_the_author_ID(),
        'post__not_in' => [ get_the_id() ],
        'posts_per_page' => 2,
        'orderby'   => 'date',
        'order'     => 'DESC'
    ]
    );

    $links = '';
    foreach($authors_posts AS $authors_post){
        $links .= sprintf(
            '<li><a href="%s">%s</a></li>',
            get_permalink( $authors_post->ID ),
            get_the_title( $authors_post->ID )
        );
    }
   
    return sprintf('%s <p>Weitere Beiträge:</p><ul>%s</ul>', $content, $links);
}
