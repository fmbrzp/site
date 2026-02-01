<?php
/*
Template Name: Calendário 2025
*/

get_header();

$hero_bg = get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png';

$month_names = [
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    12 => 'Dezembro',
];

$events_2025 = [
    ['month' => 6, 'name' => 'Copa Minas de Bocha', 'date' => '18/06/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 7, 'name' => 'Campeonato Mineiro de Duplas', 'date' => '18 e 19/07/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 8, 'name' => '36ª Taça Brasil de Clubes', 'date' => '14 a 17/08/2025', 'category' => 'Masculino', 'location' => 'Garibaldi/RS'],
    ['month' => 9, 'name' => 'Campeonato Mineiro de Trios', 'date' => '10/09/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 9, 'name' => 'Bolim de Ouro MG Individual – Série Prata', 'date' => '20/09 a 23/10/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 10, 'name' => 'Bolim de Ouro MG Individual – Iniciantes', 'date' => '03 a 26/10/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 10, 'name' => 'Bolim de Ouro MG Individual – Série Ouro', 'date' => '25/10/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
    ['month' => 12, 'name' => 'Bolim de Ouro Brasil Individual', 'date' => '05 a 07/12/2025', 'category' => 'Livre', 'location' => 'São Bernardo do Campo/SP'],
    ['month' => 12, 'name' => 'Campeonato Mineiro de Equipes', 'date' => '15 a 22/12/2025', 'category' => 'Livre', 'location' => 'Juiz de Fora/MG'],
];

$events_by_month = [];
foreach ($events_2025 as $event) {
    $month = $event['month'];
    if (!isset($events_by_month[$month])) {
        $events_by_month[$month] = [];
    }
    $events_by_month[$month][] = $event;
}
?>

<div id="primary" class="content-area fmbrzp-calendario-ano-page fmbrzp-calendario-2025">
    <main id="main" class="site-main">
        <div class="fmbrzp-calendar-root">
            <section class="fmbrzp-calendar-hero fmbrzp-cal-hero--bg" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url($hero_bg); ?>');">
                <h1>Calendário 2025</h1>
                <p>Eventos organizados por mês, com informações atualizadas conforme confirmação das etapas.</p>
            </section>

            <?php foreach ($month_names as $month_number => $month_label) :
                $month_events = isset($events_by_month[$month_number]) ? $events_by_month[$month_number] : [];
                if (!$month_events) {
                    continue;
                }
                ?>
                <section class="fmbrzp-calendar-month">
                    <header class="fmbrzp-calendar-month-header">
                        <span class="month-bar"></span>
                        <h2><?php echo esc_html($month_label); ?></h2>
                    </header>
                    <div class="fmbrzp-calendar-grid">
                        <?php foreach ($month_events as $event) : ?>
                            <article class="fmbrzp-event-card">
                                <h3><?php echo esc_html($event['name']); ?></h3>
                                <div class="fmbrzp-event-pills">
                                    <span class="pill modality-raffa">Raffa-Volo</span>
                                    <span class="pill status-confirmado">Confirmado</span>
                                </div>
                                <div class="fmbrzp-event-meta">
                                    <div>Data: <?php echo esc_html($event['date']); ?></div>
                                    <div>Categoria: <?php echo esc_html($event['category']); ?></div>
                                    <div>Local: <?php echo esc_html($event['location']); ?></div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </main>
</div>

<?php
get_footer();
