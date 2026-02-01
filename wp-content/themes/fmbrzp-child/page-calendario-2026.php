<?php
/*
Template Name: Calendário 2026
*/

get_header();

$hero_bg = get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png';

$month_names = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro',
];

$events_2026 = [
    ['month' => 1, 'name' => 'Assembleia Geral', 'city' => '', 'uf' => '', 'modality' => 'Administrativa', 'status' => 'Previsto'],
    ['month' => 2, 'name' => '2ª Copa Minas', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Previsto'],
    ['month' => 3, 'name' => '4º Bolim de Ouro MG – Série Iniciantes', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 3, 'name' => '1ª Copa Família', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Previsto'],
    ['month' => 4, 'name' => '4ª Bolim de Ouro MG – Série Prata', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 4, 'name' => '1º Bolim de Ouro Regional – Zona da Mata', 'city' => '', 'uf' => '', 'modality' => 'Regional/Cultural', 'status' => 'Previsto'],
    ['month' => 4, 'name' => '1º Bolim de Ouro Regional – Sul de Minas', 'city' => '', 'uf' => '', 'modality' => 'Regional/Cultural', 'status' => 'Previsto'],
    ['month' => 5, 'name' => '4ª Bolim de Ouro MG – Série Ouro', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 5, 'name' => '2º Campeonato BR de Equipes (LBZP)', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 5, 'name' => '1ª Copa Regional de Rafa Livre – Sul de Minas', 'city' => '', 'uf' => '', 'modality' => 'Regional/Cultural', 'status' => 'Previsto'],
    ['month' => 6, 'name' => '37ª Taça Brasil de Clubes Masculino (LBZP)', 'city' => '', 'uf' => 'PR', 'modality' => 'Rafa', 'status' => 'Previsto'],
    ['month' => 6, 'name' => '1ª Copa Regional de Rafa Livre – Zona da Mata', 'city' => '', 'uf' => '', 'modality' => 'Regional/Cultural', 'status' => 'Previsto'],
    ['month' => 7, 'name' => '1º Campeonato Mineiro Olímpico', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 8, 'name' => 'Campeonato Mineiro Feminino', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 8, 'name' => '13º Campeonato Brasileiro Master (LBZP)', 'city' => '', 'uf' => 'RS', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 8, 'name' => 'Campeonato Mineiro de Trios', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 9, 'name' => '4º Campeonato Brasileiro Categorias de Base', 'city' => 'Erechim', 'uf' => 'RS', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 9, 'name' => 'XIII Jogos Sulamericanos (ODESUR)', 'city' => 'Santa Fé', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 9, 'name' => 'Campeonato Mineiro de Duplas', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 10, 'name' => '25ª Taça Brasil de Clubes Feminino (LBZP)', 'city' => 'Garibaldi', 'uf' => 'RS', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 10, 'name' => 'Mundial de Seleções (CBI)', 'city' => '', 'uf' => 'RS', 'modality' => 'Rafa', 'status' => 'Previsto'],
    ['month' => 10, 'name' => 'Campeonato Mineiro de Equipes', 'city' => '', 'uf' => '', 'modality' => 'Rafa', 'status' => 'Confirmado'],
    ['month' => 10, 'name' => 'Campeonato Mineiro de Petanca', 'city' => '', 'uf' => '', 'modality' => 'Petanca', 'status' => 'Previsto'],
    ['month' => 10, 'name' => 'Campeonato Mineiro de Zerbin', 'city' => '', 'uf' => '', 'modality' => 'Zerbin', 'status' => 'Previsto'],
    ['month' => 11, 'name' => 'Campeonato Brasileiro de Individual (LBZP)', 'city' => 'Juiz de Fora', 'uf' => 'MG', 'modality' => 'Rafa', 'status' => 'Previsto'],
    ['month' => 11, 'name' => '5º Campeonato Brasileiro de Petanca (LBZP)', 'city' => 'Carlos Barbosa', 'uf' => 'RS', 'modality' => 'Petanca', 'status' => 'Confirmado'],
    ['month' => 11, 'name' => '8º Campeonato Brasileiro de Zerbin (LBZP)', 'city' => 'Carlos Barbosa', 'uf' => 'RS', 'modality' => 'Zerbin', 'status' => 'Confirmado'],
    ['month' => 12, 'name' => '13º Bolim de Ouro Brasil', 'city' => 'São Bernardo do Campo', 'uf' => 'SP', 'modality' => 'Rafa', 'status' => 'Confirmado'],
];

$events_by_month = [];
foreach ($events_2026 as $event) {
    $month = $event['month'];
    if (!isset($events_by_month[$month])) {
        $events_by_month[$month] = [];
    }
    $events_by_month[$month][] = $event;
}

function fmbrzp_event_category($name) {
    $name_lower = mb_strtolower($name, 'UTF-8');
    if (false !== mb_strpos($name_lower, 'feminino')) {
        return 'Feminino';
    }
    if (false !== mb_strpos($name_lower, 'masculino')) {
        return 'Masculino';
    }
    if (false !== mb_strpos($name_lower, 'juvenil') || false !== mb_strpos($name_lower, 'base')) {
        return 'Juvenil';
    }
    return 'Livre';
}

function fmbrzp_event_location($event) {
    $name = $event['name'];
    $city = $event['city'];
    $uf = $event['uf'];

    $exceptions = [
        '1º Bolim de Ouro Regional – Zona da Mata' => 'a definir',
        '1º Bolim de Ouro Regional – Sul de Minas' => 'a definir',
        '1ª Copa Regional de Rafa Livre – Sul de Minas' => 'Três Corações/MG',
        '1ª Copa Regional de Rafa Livre – Zona da Mata' => 'a definir',
    ];

    if (isset($exceptions[$name])) {
        return $exceptions[$name];
    }

    if ($city && $uf) {
        return $city . '/' . $uf;
    }
    if ($city && !$uf && $city === 'Santa Fé') {
        return 'Santa Fé/Argentina';
    }
    if (!$city && $uf === 'RS') {
        return 'Rio Grande do Sul';
    }
    if (!$city && $uf) {
        return $uf;
    }

    return 'Juiz de Fora/MG';
}

function fmbrzp_event_modality_label($modality) {
    if ($modality === 'Rafa') {
        return 'Raffa-Volo';
    }
    return $modality;
}

function fmbrzp_event_modality_class($modality_label) {
    $key = mb_strtolower($modality_label, 'UTF-8');
    if (false !== mb_strpos($key, 'raffa')) {
        return 'modality-raffa';
    }
    if (false !== mb_strpos($key, 'zerbin')) {
        return 'modality-zerbin';
    }
    if (false !== mb_strpos($key, 'petanca')) {
        return 'modality-petanca';
    }
    if (false !== mb_strpos($key, 'regional')) {
        return 'modality-regional';
    }
    return 'modality-raffa';
}

function fmbrzp_event_status_class($status) {
    $key = mb_strtolower($status, 'UTF-8');
    if ($key === 'confirmado') {
        return 'status-confirmado';
    }
    if ($key === 'previsto') {
        return 'status-previsto';
    }
    if ($key === 'cancelado') {
        return 'status-cancelado';
    }
    return 'status-previsto';
}
?>

<div id="primary" class="content-area fmbrzp-calendario-ano-page fmbrzp-calendario-2026">
    <main id="main" class="site-main">
        <div class="fmbrzp-calendar-root">
            <section class="fmbrzp-calendar-hero fmbrzp-cal-hero--bg" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url($hero_bg); ?>');">
                <h1>Calendário 2026</h1>
                <p>Eventos organizados por mês.</p>
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
                        <?php foreach ($month_events as $event) :
                            $modality_label = fmbrzp_event_modality_label($event['modality']);
                            $modality_class = fmbrzp_event_modality_class($modality_label);
                            $status_class = fmbrzp_event_status_class($event['status']);
                            $category = fmbrzp_event_category($event['name']);
                            $location = fmbrzp_event_location($event);
                            $date_label = $month_label . '/2026';
                            ?>
                            <article class="fmbrzp-event-card">
                                <h3><?php echo esc_html($event['name']); ?></h3>
                                <div class="fmbrzp-event-pills">
                                    <span class="pill <?php echo esc_attr($modality_class); ?>"><?php echo esc_html($modality_label); ?></span>
                                    <span class="pill <?php echo esc_attr($status_class); ?>"><?php echo esc_html($event['status']); ?></span>
                                </div>
                                <div class="fmbrzp-event-meta">
                                    <div>Data: <?php echo esc_html($date_label); ?></div>
                                    <div>Categoria: <?php echo esc_html($category); ?></div>
                                    <div>Local: <?php echo esc_html($location); ?></div>
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
