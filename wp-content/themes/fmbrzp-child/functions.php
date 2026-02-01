<?php
add_action('wp_enqueue_scripts', function() {
    $theme_dir = get_stylesheet_directory();
    $theme_uri = get_stylesheet_directory_uri();
    $ui_path = $theme_dir . '/assets/css/fmbrzp-ui.css';
    $core_path = $theme_dir . '/assets/css/fmbrzp.css';

    wp_enqueue_style(
        'astra-parent-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'fmbrzp-child-style',
        get_stylesheet_uri(),
        ['astra-parent-style'],
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style(
        'fmbrzp-ui',
        $theme_uri . '/assets/css/fmbrzp-ui.css',
        ['fmbrzp-child-style'],
        file_exists($ui_path) ? filemtime($ui_path) : wp_get_theme()->get('Version')
    );
    wp_enqueue_style(
        'fmbrzp-institutional',
        $theme_uri . '/assets/css/fmbrzp.css',
        ['fmbrzp-ui'],
        file_exists($core_path) ? filemtime($core_path) : wp_get_theme()->get('Version')
    );
}, 20);

function fmbrzp_get_entity_name() {
    return "Federa\u{00E7}\u{00E3}o Mineira de Bocha Rafa, Zerbin e Petanca";
}

function fmbrzp_render_site_identity() {
    $entity_name = fmbrzp_get_entity_name();
    $logo_url = get_stylesheet_directory_uri() . '/assets/img/logo-fmbrzp-header.png';
    ?>
    <div class="site-branding ast-site-identity fmbrzp-site-identity">
        <a class="custom-logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img class="custom-logo fmbrzp-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($entity_name); ?>">
        </a>
    </div>
    <?php
}

function fmbrzp_render_footer_copyright() {
    $entity_name = fmbrzp_get_entity_name();
    ?>
    <div class="ast-footer-copyright">
        <span class="fmbrzp-footer__name"><?php echo esc_html($entity_name); ?></span>
        <span class="fmbrzp-footer__sigla">FMBRZP</span>
        <span class="fmbrzp-footer__copyright">&copy; <?php echo esc_html(gmdate('Y')); ?></span>
    </div>
    <?php
}

add_action('after_setup_theme', function() {
    if (class_exists('Astra_Builder_Header')) {
        remove_action('astra_site_identity', ['Astra_Builder_Header', 'site_identity']);
        remove_action('astra_mobile_site_identity', ['Astra_Builder_Header', 'site_identity']);
    }
    if (class_exists('Astra_Builder_Footer')) {
        remove_action('astra_footer_copyright', ['Astra_Builder_Footer', 'footer_copyright']);
    }
    add_action('astra_site_identity', 'fmbrzp_render_site_identity', 5);
    add_action('astra_mobile_site_identity', 'fmbrzp_render_site_identity', 5);
    add_action('astra_footer_copyright', 'fmbrzp_render_footer_copyright', 5);
}, 20);

add_action('wp_head', function() {
    echo '<meta charset="UTF-8">';
}, 0);

if (!defined('FMBRZP_DEBUG_MENU')) {
    define('FMBRZP_DEBUG_MENU', false);
}

function fmbrzp_render_header_social_icons() {
    global $fmbrzp_header_social_rendered;
    $fmbrzp_header_social_rendered = true;
    ?>
    <div class="fmbrzp-header-social" aria-label="Redes sociais">
        <a class="fmbrzp-header-social__link" href="https://instagram.com/fmbrzp" target="_blank" rel="noopener noreferrer" aria-label="Instagram" title="Instagram">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.505 4.505 0 0 0 12 7.5zm0 2A2.5 2.5 0 1 1 9.5 12 2.503 2.503 0 0 1 12 9.5zM17.75 6a.75.75 0 1 0 .75.75A.75.75 0 0 0 17.75 6z"/></svg>
        </a>
        <a class="fmbrzp-header-social__link" href="https://facebook.com/fmbrzp" target="_blank" rel="noopener noreferrer" aria-label="Facebook" title="Facebook">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3H13.5V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.4-.1-2.6-.1-2.6 0-4.4 1.6-4.4 4.5V11H7v3h2.7v8h3.8z"/></svg>
        </a>
        <a class="fmbrzp-header-social__link" href="https://wa.me/5532999908251?text=Ol%C3%A1%2C%20gostaria%20de%20falar%20com%20a%20Federa%C3%A7%C3%A3o%20Mineira%20de%20Bocha." target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" title="WhatsApp">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12.04 2C6.58 2 2.16 6.42 2.16 11.88c0 1.93.52 3.72 1.52 5.29L2 22l4.93-1.63a9.86 9.86 0 0 0 5.11 1.4h.01c5.46 0 9.88-4.42 9.88-9.88C21.93 6.42 17.5 2 12.04 2zm5.77 14.3c-.24.68-1.17 1.25-1.92 1.41-.51.11-1.16.2-3.36-.72-2.81-1.16-4.63-4.01-4.77-4.2-.13-.18-1.14-1.52-1.14-2.9 0-1.37.72-2.05.98-2.33.26-.29.56-.36.75-.36h.54c.17 0 .4-.06.62.47.24.58.82 2.02.89 2.16.07.14.12.32.02.5-.1.18-.15.32-.3.49-.14.17-.31.38-.44.51-.14.14-.29.29-.13.57.16.29.73 1.2 1.57 1.95 1.08.96 1.99 1.26 2.28 1.4.29.14.46.12.63-.07.17-.2.72-.84.91-1.13.2-.29.38-.24.63-.14.26.1 1.63.77 1.91.91.28.14.46.2.53.32.07.11.07.67-.17 1.35z"/></svg>
        </a>
    </div>
    <?php
}

function fmbrzp_get_social_menu_li($source = '') {
    $comment = '';
    if (defined('WP_DEBUG') && WP_DEBUG) {
        $comment = '<!-- fmbrzp-social-source:' . esc_html($source) . ' -->';
    }
    $icons = '<div class="fmbrzp-header-social" aria-label="Redes sociais">'
        . '<a class="fmbrzp-header-social__link" href="https://instagram.com/fmbrzp" target="_blank" rel="noopener noreferrer" aria-label="Instagram" title="Instagram">'
        . '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.5A4.5 4.5 0 1 0 16.5 12 4.505 4.505 0 0 0 12 7.5zm0 2A2.5 2.5 0 1 1 9.5 12 2.503 2.503 0 0 1 12 9.5zM17.75 6a.75.75 0 1 0 .75.75A.75.75 0 0 0 17.75 6z"/></svg>'
        . '</a>'
        . '<a class="fmbrzp-header-social__link" href="https://facebook.com/fmbrzp" target="_blank" rel="noopener noreferrer" aria-label="Facebook" title="Facebook">'
        . '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3H13.5V9.1c0-.9.3-1.5 1.6-1.5H16.7V5c-.3 0-1.4-.1-2.6-.1-2.6 0-4.4 1.6-4.4 4.5V11H7v3h2.7v8h3.8z"/></svg>'
        . '</a>'
        . '<a class="fmbrzp-header-social__link" href="https://wa.me/5532999908251?text=Ol%C3%A1%2C%20gostaria%20de%20falar%20com%20a%20Federa%C3%A7%C3%A3o%20Mineira%20de%20Bocha." target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" title="WhatsApp">'
        . '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12.04 2C6.58 2 2.16 6.42 2.16 11.88c0 1.93.52 3.72 1.52 5.29L2 22l4.93-1.63a9.86 9.86 0 0 0 5.11 1.4h.01c5.46 0 9.88-4.42 9.88-9.88C21.93 6.42 17.5 2 12.04 2zm5.77 14.3c-.24.68-1.17 1.25-1.92 1.41-.51.11-1.16.2-3.36-.72-2.81-1.16-4.63-4.01-4.77-4.2-.13-.18-1.14-1.52-1.14-2.9 0-1.37.72-2.05.98-2.33.26-.29.56-.36.75-.36h.54c.17 0 .4-.06.62.47.24.58.82 2.02.89 2.16.07.14.12.32.02.5-.1.18-.15.32-.3.49-.14.17-.31.38-.44.51-.14.14-.29.29-.13.57.16.29.73 1.2 1.57 1.95 1.08.96 1.99 1.26 2.28 1.4.29.14.46.12.63-.07.17-.2.72-.84.91-1.13.2-.29.38-.24.63-.14.26.1 1.63.77 1.91.91.28.14.46.2.53.32.07.11.07.67-.17 1.35z"/></svg>'
        . '</a>'
        . '</div>';

    return '<li class="menu-item fmbrzp-header-social-item">' . $icons . $comment . '</li>';
}

add_filter('astra_primary_navigation_items', function($items, $args) {
    if (strpos($items, 'fmbrzp-header-social-item') !== false) {
        return $items;
    }
    return $items . fmbrzp_get_social_menu_li('astra_primary_navigation_items');
}, 20, 2);

add_filter('wp_nav_menu_items', function($items, $args) {
    $menu_class = isset($args->menu_class) ? $args->menu_class : '';
    $menu_id = isset($args->menu_id) ? $args->menu_id : '';
    $container_class = isset($args->container_class) ? $args->container_class : '';
    $theme_location = isset($args->theme_location) ? $args->theme_location : '';

    if (FMBRZP_DEBUG_MENU) {
        $current_url = home_url(add_query_arg([], ''));
        error_log('[FMBRZP MENU] url=' . $current_url . ' theme_location=' . $theme_location . ' menu_id=' . $menu_id . ' menu_class=' . $menu_class . ' container_class=' . $container_class);
    }

    if (strpos($items, 'fmbrzp-header-social-item') !== false) {
        return $items;
    }

    $is_mobile_menu = (is_string($menu_class) && (strpos($menu_class, 'ast-header-break-point') !== false || strpos($menu_class, 'ast-mobile-menu') !== false))
        || (is_string($container_class) && strpos($container_class, 'ast-mobile-header') !== false);
    if ($is_mobile_menu) {
        return $items;
    }

    $is_header_menu = (is_string($menu_class) && strpos($menu_class, 'main-header-menu') !== false)
        || (is_string($container_class) && strpos($container_class, 'main-header-bar') !== false)
        || ($menu_id === 'primary-menu')
        || (in_array($theme_location, ['primary', 'astra-primary', 'main-menu', 'primary-menu'], true));

    if (!$is_header_menu) {
        return $items;
    }

    return $items . fmbrzp_get_social_menu_li('wp_nav_menu_items');
}, 20, 2);

add_action('admin_post_fmbrzp_contato_send', 'fmbrzp_handle_contato_form');
add_action('admin_post_nopriv_fmbrzp_contato_send', 'fmbrzp_handle_contato_form');

function fmbrzp_handle_contato_form() {
    if (!isset($_POST['fmbrzp_contato_nonce']) || !wp_verify_nonce($_POST['fmbrzp_contato_nonce'], 'fmbrzp_contato_send')) {
        wp_safe_redirect(add_query_arg('erro', '1', home_url('/contato/')));
        exit;
    }

    $nome = isset($_POST['nome']) ? sanitize_text_field(wp_unslash($_POST['nome'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $telefone = isset($_POST['telefone']) ? sanitize_text_field(wp_unslash($_POST['telefone'])) : '';
    $assunto = isset($_POST['assunto']) ? sanitize_text_field(wp_unslash($_POST['assunto'])) : '';
    $mensagem = isset($_POST['mensagem']) ? sanitize_textarea_field(wp_unslash($_POST['mensagem'])) : '';

    if ($nome === '' || $email === '' || $assunto === '' || $mensagem === '') {
        wp_safe_redirect(add_query_arg('erro', '1', home_url('/contato/')));
        exit;
    }

    $to = 'contato@fmbrzp.com.br';
    $subject = 'Contato - ' . $assunto;
    $body = "Nome: {$nome}\nE-mail: {$email}\nTelefone: {$telefone}\nAssunto: {$assunto}\n\nMensagem:\n{$mensagem}\n";
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nome . ' <' . $email . '>',
    ];

    $sent = wp_mail($to, $subject, $body, $headers);
    $query = $sent ? 'enviado' : 'erro';
    wp_safe_redirect(add_query_arg($query, '1', home_url('/contato/')));
    exit;
}
