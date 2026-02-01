<?php
get_header();

get_template_part('template-parts/transparencia/page-listagem', null, [
    'forced_tipo' => 'Prestação de Contas',
]);

get_footer();
