<?php
/*
Template Name: Calendário
*/

get_header();

$hero_bg = get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png';

$years = [
    [
        'year' => '2026',
        'title' => 'Calendário 2026',
        'desc' => 'Eventos, etapas e ações de fomento para a temporada',
        'status' => 'Disponível',
        'status_class' => 'disponivel',
        'url' => home_url('/calendario-2026/'),
        'cta' => 'Acessar 2026',
    ],
    [
        'year' => '2025',
        'title' => 'Calendário 2025',
        'desc' => 'Conteúdo em preparação para publicação',
        'status' => 'Disponível',
        'status_class' => 'disponivel',
        'url' => home_url('/calendario-2025/'),
        'cta' => 'Acessar 2025',
    ],
];
?>

<div id="primary" class="content-area fmbrzp-calendario-page">
    <main id="main" class="site-main">
        <div class="fmbrzp-calendar-root">
            <section class="fmbrzp-calendar-hero fmbrzp-cal-hero--bg" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url($hero_bg); ?>');">
                <h1>Calendário</h1>
                <p>Acompanhe os eventos, etapas e ações de fomento em Minas Gerais.</p>
            </section>

            <section class="fmbrzp-calendar-year-selector">
                <div class="fmbrzp-calendar-grid">
                    <?php foreach ($years as $year) : ?>
                        <article class="fmbrzp-event-card">
                            <h3><?php echo esc_html($year['title']); ?></h3>
                            <div class="fmbrzp-event-pills">
                                <span class="pill status-<?php echo esc_attr($year['status_class']); ?>"><?php echo esc_html($year['status']); ?></span>
                            </div>
                            <div class="fmbrzp-event-meta">
                                <div><?php echo esc_html($year['desc']); ?></div>
                            </div>
                            <a class="fmbrzp-calendar-btn" href="<?php echo esc_url($year['url']); ?>"><?php echo esc_html($year['cta']); ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
</div>

<?php
get_footer();
