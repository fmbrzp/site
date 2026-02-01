<?php
get_header();

get_template_part('template-parts/transparencia/page-listagem', null, [
    'forced_tipo' => 'Comunicado',
]);

get_footer();
