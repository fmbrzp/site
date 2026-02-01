<?php
get_header();

$term = get_queried_object();
$title = single_term_title('', false);
$description = term_description();

$tax_query = [];
if ($term && !is_wp_error($term) && !empty($term->taxonomy)) {
    $tax_query[] = [
        'taxonomy' => $term->taxonomy,
        'field' => 'term_id',
        'terms' => $term->term_id,
    ];
}

$docs_query = new WP_Query([
    'post_type' => 'documento',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'no_found_rows' => true,
    'tax_query' => $tax_query,
]);

get_template_part('template-parts/transparencia/documentos-table', null, [
    'query' => $docs_query,
    'title' => $title,
    'description' => $description,
]);

get_footer();
