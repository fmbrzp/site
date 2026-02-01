<?php
/*
Template Name: Transparência
*/

get_header();

$hero_bg = get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png';

$cards = [
    [
        'title' => 'Comunicados Oficiais',
        'description' => 'Comunicados e notas oficiais publicados pela federação.',
        'url' => home_url('/transparencia/comunicados/'),
    ],
    [
        'title' => 'Editais',
        'description' => 'Editais de convocação, seleção e processos internos.',
        'url' => home_url('/transparencia/editais/'),
    ],
    [
        'title' => 'Regulamentos',
        'description' => 'Regulamentos e documentos normativos das modalidades.',
        'url' => home_url('/transparencia/regulamentos/'),
    ],
    [
        'title' => 'Resultados',
        'description' => 'Resultados oficiais de competições e eventos.',
        'url' => home_url('/transparencia/resultados/'),
    ],
    [
        'title' => 'Convocações',
        'description' => 'Convocações de atletas, dirigentes e demais comunicados.',
        'url' => home_url('/transparencia/convocacoes/'),
    ],
];
?>

<main id="main" class="fmbrzp-transparencia-page" role="main">
    <section class="fmbrzp-cal-hero fmbrzp-cal-hero--bg" aria-label="Hero Transparência" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url($hero_bg); ?>');">
        <h1 class="fmbrzp-cal-hero__title">Transparência</h1>
        <p class="fmbrzp-cal-hero__sub">Área dedicada à divulgação de documentos oficiais, comunicados e informações institucionais da federação.</p>
    </section>

    <section class="fmbrzp-transparencia-grid">
        <div class="fmbrzp-transparencia-grid__inner">
            <?php foreach ($cards as $card) : ?>
                <article class="fmbrzp-card fmbrzp-transparencia-card">
                    <a class="fmbrzp-transparencia-card__link" href="<?php echo esc_url($card['url']); ?>">
                        <div class="fmbrzp-transparencia-card__content">
                            <h2 class="fmbrzp-transparencia-card__title"><?php echo esc_html($card['title']); ?></h2>
                            <p class="fmbrzp-transparencia-card__text"><?php echo esc_html($card['description']); ?></p>
                        </div>
                        <span class="fmbrzp-transparencia-card__cta">Ver documentos</span>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php
get_footer();