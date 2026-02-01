<?php
get_header();

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();
if ($post_id) {
    $tipo = function_exists('fmbrzp_get_documento_field')
        ? fmbrzp_get_documento_field($post_id, 'tipo_do_documento')
        : (function_exists('get_field') ? get_field('tipo_do_documento', $post_id) : get_post_meta($post_id, 'tipo_do_documento', true));
    $numero = function_exists('fmbrzp_get_documento_field')
        ? fmbrzp_get_documento_field($post_id, 'numero_referencia')
        : (function_exists('get_field') ? get_field('numero_referencia', $post_id) : get_post_meta($post_id, 'numero_referencia', true));
    $data_raw = function_exists('fmbrzp_get_documento_field')
        ? fmbrzp_get_documento_field($post_id, 'data_do_documento')
        : (function_exists('get_field') ? get_field('data_do_documento', $post_id) : get_post_meta($post_id, 'data_do_documento', true));
    $ementa = function_exists('fmbrzp_get_documento_field')
        ? fmbrzp_get_documento_field($post_id, 'ementa')
        : (function_exists('get_field') ? get_field('ementa', $post_id) : get_post_meta($post_id, 'ementa', true));

    $data_ts = function_exists('fmbrzp_parse_documento_date')
        ? fmbrzp_parse_documento_date($data_raw, $post_id)
        : (is_string($data_raw) && $data_raw !== '' ? strtotime($data_raw) : get_post_time('U', true, $post_id));
    $data_formatada = $data_ts ? date_i18n('d/m/Y', $data_ts) : '';

    $pdf_url = '';
    if (function_exists('fmbrzp_get_documento_pdf_link')) {
        $pdf_url = fmbrzp_get_documento_pdf_link($post_id);
    }
    if ($pdf_url === '') {
        $fallback = function_exists('fmbrzp_get_documento_field')
            ? fmbrzp_get_documento_field($post_id, 'link_do_pdf')
            : (function_exists('get_field') ? get_field('link_do_pdf', $post_id) : get_post_meta($post_id, 'link_do_pdf', true));
        if (is_string($fallback) && $fallback !== '') {
            $pdf_url = esc_url_raw($fallback);
        }
    }
    ?>

    <main id="main" class="fmbrzp-docs" role="main">
        <div class="ast-container">
            <header class="fmbrzp-docs__intro">
                <h1 class="fmbrzp-docs__title"><?php echo esc_html(get_the_title($post_id)); ?></h1>
            </header>

            <div class="fmbrzp-docs__single">
                <div class="fmbrzp-docs__single-meta">
                    <?php if (is_string($tipo) && $tipo !== '') : ?>
                        <div class="fmbrzp-docs__single-item"><strong>Tipo:</strong> <?php echo esc_html($tipo); ?></div>
                    <?php endif; ?>
                    <?php if (is_string($numero) && $numero !== '') : ?>
                        <div class="fmbrzp-docs__single-item"><strong>Nº/Ref.:</strong> <?php echo esc_html($numero); ?></div>
                    <?php endif; ?>
                    <?php if ($data_formatada !== '') : ?>
                        <div class="fmbrzp-docs__single-item"><strong>Data:</strong> <?php echo esc_html($data_formatada); ?></div>
                    <?php endif; ?>
                </div>

                <?php if (is_string($ementa) && $ementa !== '') : ?>
                    <div class="fmbrzp-docs__single-ementa"><?php echo esc_html($ementa); ?></div>
                <?php endif; ?>

                <?php if ($pdf_url !== '') : ?>
                    <div class="fmbrzp-docs__single-action">
                        <a class="fmbrzp-docs__button" href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer">Abrir PDF</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php
}

get_footer();
