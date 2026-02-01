<?php
if (!defined('ABSPATH')) {
    exit;
}

$args = isset($args) && is_array($args) ? $args : [];
$defaults = [
    'forced_tipo' => '',
];
$args = wp_parse_args($args, $defaults);

$post_id = get_the_ID();
$page_slug = $post_id ? get_post_field('post_name', $post_id) : '';

$tipo_from_page = '';
if ($post_id) {
    if (function_exists('get_field')) {
        $tipo_from_page = get_field('tipo_documento_associado', $post_id);
    }
    if ($tipo_from_page === '' || $tipo_from_page === null) {
        $tipo_from_page = get_post_meta($post_id, 'tipo_documento_associado', true);
    }
}

$slug_map = [
    'comunicados-oficiais' => 'Comunicado',
    'comunicados' => 'Comunicado',
    'editais' => 'Edital',
    'regulamentos' => 'Regulamento',
    'resultados-e-convocacoes' => 'Resultado',
    'resultados' => 'Resultado',
    'atas-e-estatuto' => 'Ata',
    'prestacao-de-contas-anual' => 'Prestação de Contas',
    'prestacao-de-contas' => 'Prestação de Contas',
];

$tipo_resolvido = is_string($args['forced_tipo']) ? trim($args['forced_tipo']) : '';
if ($tipo_resolvido === '') {
    $tipo_resolvido = is_string($tipo_from_page) ? trim($tipo_from_page) : '';
}
if ($tipo_resolvido === '' && $page_slug && isset($slug_map[$page_slug])) {
    $tipo_resolvido = $slug_map[$page_slug];
}

$meta_keys = ['tipo_do_documento', 'tipo_documento'];
$meta_query = [];
if ($tipo_resolvido !== '') {
    $tipo_slug = sanitize_title($tipo_resolvido);
    $variants = [
        $tipo_resolvido,
        strtolower($tipo_resolvido),
        strtoupper($tipo_resolvido),
    ];
    if ($tipo_slug !== '' && $tipo_slug !== $tipo_resolvido) {
        $variants[] = $tipo_slug;
    }
    $variants = array_values(array_unique(array_filter($variants)));

    $meta_query = ['relation' => 'OR'];
    foreach ($meta_keys as $meta_key) {
        foreach ($variants as $variant) {
            $meta_query[] = [
                'key' => $meta_key,
                'value' => $variant,
                'compare' => '=',
            ];
        }
        $meta_query[] = [
            'key' => $meta_key,
            'value' => $tipo_resolvido,
            'compare' => 'LIKE',
        ];
        if ($tipo_slug !== '' && $tipo_slug !== $tipo_resolvido) {
            $meta_query[] = [
                'key' => $meta_key,
                'value' => $tipo_slug,
                'compare' => 'LIKE',
            ];
        }
    }
}

$docs_query = new WP_Query([
    'post_type' => 'documento',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'no_found_rows' => true,
    'meta_query' => $meta_query,
]);

$title = $post_id ? get_the_title($post_id) : '';
$description = $post_id ? get_post_field('post_excerpt', $post_id) : '';
?>

<section class="fmbrzp-docs">
    <div class="fmbrzp-docs__wrap">
        <div class="fmbrzp-docs__grid">
            <aside class="fmbrzp-docs__side">
                <?php
                $transparencia_page = get_page_by_path('transparencia');
                $back_url = $transparencia_page ? get_permalink($transparencia_page) : home_url('/transparencia/');
                get_template_part('template-parts/transparencia-header', null, [
                    'title' => $title,
                    'back_url' => $back_url,
                ]);
                ?>
            </aside>
            <main class="fmbrzp-docs__main">
                <?php
                get_template_part('template-parts/transparencia/documentos-table', null, [
                    'query' => $docs_query,
                    'description' => $description,
                ]);
                ?>
            </main>
        </div>
    </div>
</section>
