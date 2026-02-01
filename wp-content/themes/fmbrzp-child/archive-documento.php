<?php
get_header();

$post_type = 'documento';
$title = post_type_archive_title('', false);
$description = get_the_archive_description();

$docs_query = new WP_Query([
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'no_found_rows' => true,
]);

get_template_part('template-parts/transparencia/documentos-table', null, [
    'query' => $docs_query,
    'title' => $title,
    'description' => $description,
]);

get_footer();
