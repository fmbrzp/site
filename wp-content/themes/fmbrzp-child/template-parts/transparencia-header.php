<?php
if (!defined('ABSPATH')) {
    exit;
}

$args = isset($args) && is_array($args) ? $args : [];
$title = isset($args['title']) ? (string) $args['title'] : '';
$back_url = isset($args['back_url']) ? (string) $args['back_url'] : '';
if ($back_url === '') {
    $back_url = home_url('/transparencia/');
}
?>

<header class="fmbrzp-docs-header">
    <?php if ($title !== '') : ?>
        <h1 class="fmbrzp-docs__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>
    <div class="fmbrzp-docs-nav">
        <a class="fmbrzp-docs__back" href="<?php echo esc_url($back_url); ?>">← Voltar para Transparência</a>
    </div>
</header>
