<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('fmbrzp_get_documento_field')) {
    function fmbrzp_get_documento_field($post_id, $key) {
        if (function_exists('get_field')) {
            $value = get_field($key, $post_id);
            if ($value !== '' && $value !== null) {
                return $value;
            }
        }
        return get_post_meta($post_id, $key, true);
    }
}

if (!function_exists('fmbrzp_parse_documento_date')) {
    function fmbrzp_parse_documento_date($raw, $post_id) {
        if (is_array($raw)) {
            $raw = '';
        }
        $raw = is_string($raw) ? trim($raw) : '';
        $ts = 0;

        if ($raw !== '') {
            if (preg_match('/^\d{8}$/', $raw)) {
                $dt = DateTime::createFromFormat('Ymd', $raw);
                if ($dt instanceof DateTime) {
                    $ts = $dt->getTimestamp();
                }
            } elseif (preg_match('/^\d{4}-\d{2}-\d{2}/', $raw)) {
                $dt = DateTime::createFromFormat('Y-m-d', substr($raw, 0, 10));
                if ($dt instanceof DateTime) {
                    $ts = $dt->getTimestamp();
                }
            } else {
                $parsed = strtotime($raw);
                if ($parsed) {
                    $ts = $parsed;
                }
            }
        }

        if (!$ts) {
            $ts = get_post_time('U', true, $post_id);
        }

        return $ts ?: time();
    }
}

if (!function_exists('fmbrzp_get_documento_sort_ts')) {
    function fmbrzp_get_documento_sort_ts($post_id) {
        $raw = fmbrzp_get_documento_field($post_id, 'data_do_documento');
        return fmbrzp_parse_documento_date($raw, $post_id);
    }
}

$args = isset($args) && is_array($args) ? $args : [];
$defaults = [
    'query' => null,
    'empty_message' => 'Nenhum documento encontrado.',
];
$args = wp_parse_args($args, $defaults);

$query = $args['query'] instanceof WP_Query ? $args['query'] : null;
if (!$query) {
    global $wp_query;
    $query = $wp_query;
}

$posts = is_array($query->posts ?? null) ? $query->posts : [];
if (!empty($posts)) {
    usort($posts, function($a, $b) {
        return fmbrzp_get_documento_sort_ts($b->ID) <=> fmbrzp_get_documento_sort_ts($a->ID);
    });
    $query->posts = $posts;
    $query->post_count = count($posts);
}
?>

<section class="fmbrzp-docs__table" aria-label="Lista de documentos">
    <div class="fmbrzp-docs__head" role="row">
        <div class="fmbrzp-docs__cell fmbrzp-docs__cell--type" role="columnheader">Tipo</div>
        <div class="fmbrzp-docs__cell fmbrzp-docs__cell--doc" role="columnheader">Documento</div>
        <div class="fmbrzp-docs__cell fmbrzp-docs__cell--date" role="columnheader">Data</div>
        <div class="fmbrzp-docs__cell fmbrzp-docs__cell--action" role="columnheader">Ação</div>
    </div>

    <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : ?>
            <?php
            $query->the_post();
            $post_id = get_the_ID();
            $tipo = fmbrzp_get_documento_field($post_id, 'tipo_do_documento');
            $ementa = fmbrzp_get_documento_field($post_id, 'ementa');
            $data_raw = fmbrzp_get_documento_field($post_id, 'data_do_documento');
            $data_ts = fmbrzp_parse_documento_date($data_raw, $post_id);
            $data_formatada = date_i18n('d/m/Y', $data_ts);

            $pdf_url = '';
            if (function_exists('fmbrzp_get_documento_pdf_link')) {
                $pdf_url = fmbrzp_get_documento_pdf_link($post_id);
            }
            if ($pdf_url === '') {
                $fallback = fmbrzp_get_documento_field($post_id, 'link_do_pdf');
                if (is_string($fallback) && $fallback !== '') {
                    $pdf_url = esc_url_raw($fallback);
                }
            }

            $link_url = $pdf_url !== '' ? $pdf_url : get_permalink($post_id);
            $link_target = $pdf_url !== '' ? ' target="_blank"' : '';
            $link_rel = $pdf_url !== '' ? ' rel="noopener noreferrer"' : '';
            ?>
            <article class="fmbrzp-docs__row" role="row">
                <div class="fmbrzp-docs__topline">
                    <div class="fmbrzp-docs__cell fmbrzp-docs__cell--type" role="cell">
                        <?php if (is_string($tipo) && $tipo !== '') : ?>
                            <span class="fmbrzp-docs__chip"><?php echo esc_html($tipo); ?></span>
                        <?php else : ?>
                            <span class="fmbrzp-docs__chip"><?php echo esc_html__('Documento', 'fmbrzp-child'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="fmbrzp-docs__cell fmbrzp-docs__cell--date" role="cell">
                        <?php echo esc_html($data_formatada); ?>
                    </div>
                </div>
                <div class="fmbrzp-docs__cell fmbrzp-docs__cell--doc" role="cell">
                    <a class="fmbrzp-docs__doc-link" href="<?php echo esc_url($link_url); ?>"<?php echo $link_target . $link_rel; ?>>
                        <?php echo esc_html(get_the_title($post_id)); ?>
                    </a>
                    <?php if (is_string($ementa) && $ementa !== '') : ?>
                        <div class="fmbrzp-docs__ementa"><?php echo esc_html($ementa); ?></div>
                    <?php endif; ?>
                </div>
                <div class="fmbrzp-docs__cell fmbrzp-docs__cell--action" role="cell">
                    <a class="fmbrzp-docs__button" href="<?php echo esc_url($link_url); ?>"<?php echo $link_target . $link_rel; ?>>PDF</a>
                </div>
            </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="fmbrzp-docs__empty">
            <?php echo esc_html($args['empty_message']); ?>
        </div>
    <?php endif; ?>
</section>
