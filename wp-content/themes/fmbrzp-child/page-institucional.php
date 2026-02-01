<?php
/*
Template Name: Institucional
*/

get_header();

if (!function_exists('fmbrzp_asset_clube')) {
    function fmbrzp_asset_clube($filename) {
        $rel = '/assets/clubes/' . ltrim($filename, '/');
        $child_path = get_stylesheet_directory() . $rel;
        if (file_exists($child_path)) {
            return get_stylesheet_directory_uri() . $rel;
        }
        $parent_path = get_template_directory() . $rel;
        if (file_exists($parent_path)) {
            return get_template_directory_uri() . $rel;
        }
        return get_stylesheet_directory_uri() . '/assets/img/logo-fmbrzp.png';
    }
}

$theme_uri = get_stylesheet_directory_uri();
$transparency_page = get_page_by_path('transparencia');
$transparency_url = $transparency_page ? get_permalink($transparency_page) : home_url('/transparencia/');
$calendar_page = get_page_by_path('calendario');
$calendar_url = $calendar_page ? get_permalink($calendar_page) : '#';
$contact_page = get_page_by_path('contato');
$contact_url = $contact_page ? get_permalink($contact_page) : '#';
$contact_note = $contact_page ? '' : '<!-- TODO: criar pagina /contato/ -->';
$calendar_note = $calendar_page ? '' : '<!-- TODO: criar pagina /calendario/ -->';

$block_content = <<<'HTML'
<!-- wp:group {"className":"fmbrzp-institucional"} -->
<div class="wp-block-group fmbrzp-institucional">
    <!-- wp:group {"align":"full","className":"fmbrzp-institucional-hero"} -->
    <div class="wp-block-group alignfull fmbrzp-institucional-hero">
        <!-- wp:group {"className":"fmbrzp-container fmbrzp-hero-inner"} -->
        <div class="wp-block-group fmbrzp-container fmbrzp-hero-inner">
            <!-- wp:heading {"level":1} -->
            <h1>Institucional</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-hero-subtitle"} -->
            <p class="fmbrzp-hero-subtitle">A Federação Mineira de Bocha Rafa, Zerbin e Petanca atua para organizar, regulamentar e desenvolver a Bocha em Minas Gerais, com atuação integrada nas modalidades olímpicas (Rafa, Zerbin e Petanca), na Bocha Paralímpica/Adaptada e no apoio às práticas regionais, culturais e inclusivas que sustentam o crescimento do esporte no estado.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"className":"fmbrzp-hero-status"} -->
            <p class="fmbrzp-hero-status"><strong>Status:</strong> entidade em processo de registro.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"fmbrzp-nav"} -->
    <div class="wp-block-group fmbrzp-nav">
        <!-- wp:heading {"level":2,"className":"fmbrzp-nav-title"} -->
        <h2 class="fmbrzp-nav-title">Navegação rápida</h2>
        <!-- /wp:heading -->

        <!-- wp:buttons {"className":"fmbrzp-nav-chips"} -->
        <div class="wp-block-buttons fmbrzp-nav-chips">
            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#quem-somos">Quem somos</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#finalidade">Finalidade e atuação</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#modalidades">Modalidades</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#missao-visao-valores">Missão, Visão e Valores</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#governanca">Governança</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"fmbrzp-chip"} -->
            <div class="wp-block-button fmbrzp-chip"><a class="wp-block-button__link" href="#clubes">Clubes</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"quem-somos","className":"fmbrzp-section"} -->
    <section id="quem-somos" class="wp-block-group fmbrzp-section">
        <!-- wp:heading {"level":2} -->
        <h2>Quem somos</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>A Federação Mineira de Bocha Rafa, Zerbin e Petanca (FMBRZP) integra clubes, atletas e profissionais em Minas Gerais, organizando o desenvolvimento da Bocha no estado com padrões técnicos alinhados às normas nacionais e internacionais.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><strong>Nossa atuação é integrada em três frentes:</strong></p>
        <!-- /wp:paragraph -->

        <!-- wp:list -->
        <ul>
            <li>Modalidades olímpicas (Rafa, Zerbin e Petanca) e ciclos oficiais.</li>
            <li>Práticas regionais e culturais que sustentam a base e a identidade do esporte.</li>
            <li>Bocha Paralímpica e Adaptada, fortalecendo acessibilidade, inclusão e participação.</li>
        </ul>
        <!-- /wp:list -->

        <!-- wp:paragraph -->
        <p>Com governança, formação técnica e competições estruturadas, conectamos o fomento regional ao alto rendimento e ampliamos o crescimento sustentável da Bocha em Minas Gerais.</p>
        <!-- /wp:paragraph -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"finalidade","className":"fmbrzp-section"} -->
    <section id="finalidade" class="wp-block-group fmbrzp-section">
        <!-- wp:heading {"level":2} -->
        <h2>Finalidade e atuação</h2>
        <!-- /wp:heading -->

        <!-- wp:list -->
        <ul>
            <li>Organizar competições oficiais e calendário estadual</li>
            <li>Apoiar clubes filiados e projetos de base</li>
            <li>Promover formação técnica e capacitação de gestores</li>
            <li>Estruturar e supervisionar arbitragem especializada</li>
            <li>Desenvolver programas de crescimento esportivo e social</li>
            <li>Estimular inclusão, acessibilidade e diversidade nas modalidades</li>
        </ul>
        <!-- /wp:list -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"modalidades","className":"fmbrzp-section fmbrzp-modalidades"} -->
    <section id="modalidades" class="wp-block-group fmbrzp-section fmbrzp-modalidades">
        <!-- wp:heading {"level":2} -->
        <h2>Modalidades</h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"className":"fmbrzp-cards fmbrzp-cards--modalidades"} -->
        <div class="wp-block-columns fmbrzp-cards fmbrzp-cards--modalidades">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card fmbrzp-card--featured"} -->
                <div class="wp-block-group fmbrzp-card fmbrzp-card--featured">
                    <!-- wp:html -->
                    <div class="fmbrzp-card-icon" aria-hidden="true">
                        <svg viewBox="0 0 64 40" aria-hidden="true" focusable="false">
                            <circle cx="16" cy="16" r="10" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <circle cx="32" cy="16" r="10" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <circle cx="48" cy="16" r="10" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <circle cx="24" cy="26" r="10" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></circle>
                            <circle cx="40" cy="26" r="10" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></circle>
                        </svg>
                    </div>
                    <!-- /wp:html -->

                    <!-- wp:heading {"level":3} -->
                    <h3>Modalidades olímpicas</h3>
                    <!-- /wp:heading -->

                    <!-- wp:list {"className":"fmbrzp-bullets"} -->
                    <ul class="fmbrzp-bullets">
                        <li>Rafa, Zerbin e Petanca com foco em performance e calendário oficial</li>
                        <li>Seleções, ciclos competitivos e padronização técnica</li>
                    </ul>
                    <!-- /wp:list -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card"} -->
                <div class="wp-block-group fmbrzp-card">
                    <!-- wp:html -->
                    <div class="fmbrzp-card-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path d="M12 3c-3.3 0-6 2.5-6 5.6 0 4.1 6 10.8 6 10.8s6-6.7 6-10.8C18 5.5 15.3 3 12 3z" fill="none" stroke="currentColor" stroke-width="1.8"></path>
                            <circle cx="12" cy="8.6" r="2.2" fill="none" stroke="currentColor" stroke-width="1.8"></circle>
                        </svg>
                    </div>
                    <!-- /wp:html -->

                    <!-- wp:heading {"level":3} -->
                    <h3>Regras regionais e culturais</h3>
                    <!-- /wp:heading -->

                    <!-- wp:list {"className":"fmbrzp-bullets"} -->
                    <ul class="fmbrzp-bullets">
                        <li>Valorização de práticas tradicionais e identidade local</li>
                        <li>Integração comunitária e expansão da base</li>
                    </ul>
                    <!-- /wp:list -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card"} -->
                <div class="wp-block-group fmbrzp-card">
                    <!-- wp:html -->
                    <div class="fmbrzp-card-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <circle cx="12" cy="5" r="2" fill="none" stroke="currentColor" stroke-width="1.8"></circle>
                            <path d="M7 21l2-7 3 2 3-2 2 7" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9 10h6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <!-- /wp:html -->

                    <!-- wp:heading {"level":3} -->
                    <h3>Bocha Paralímpica e Adaptada</h3>
                    <!-- /wp:heading -->

                    <!-- wp:list {"className":"fmbrzp-bullets"} -->
                    <ul class="fmbrzp-bullets">
                        <li>Inclusão esportiva com adequação de regras e suporte</li>
                        <li>Acessibilidade, formação e participação</li>
                    </ul>
                    <!-- /wp:list -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"missao-visao-valores","className":"fmbrzp-section"} -->
    <section id="missao-visao-valores" class="wp-block-group fmbrzp-section">
        <!-- wp:heading {"level":2} -->
        <h2>Missão, Visão e Valores</h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"className":"fmbrzp-cards fmbrzp-cards--mvv"} -->
        <div class="wp-block-columns fmbrzp-cards fmbrzp-cards--mvv">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card"} -->
                <div class="wp-block-group fmbrzp-card">
                    <!-- wp:heading {"level":3} -->
                    <h3>Missão</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Organizar e fortalecer a Bocha em Minas Gerais, promovendo competições, formação e desenvolvimento sustentável.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>Atuar de forma integrada no fomento regional, no alto rendimento e na Bocha Paralímpica/Adaptada.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card"} -->
                <div class="wp-block-group fmbrzp-card">
                    <!-- wp:heading {"level":3} -->
                    <h3>Visão</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Ser referência estadual e nacional em governança, qualidade técnica e inclusão, ampliando o alcance esportivo e social da Bocha.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph -->
                    <p>Consolidar um ecossistema com calendário, formação e bases ativas em todo o estado.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"fmbrzp-card"} -->
                <div class="wp-block-group fmbrzp-card">
                    <!-- wp:heading {"level":3} -->
                    <h3>Valores</h3>
                    <!-- /wp:heading -->

                    <!-- wp:list -->
                    <ul>
                        <li>Ética e transparência</li>
                        <li>Respeito e jogo limpo</li>
                        <li>Inclusão e acessibilidade</li>
                        <li>Valorização cultural</li>
                        <li>Excelência técnica e esportiva</li>
                        <li>Inovação e aprendizado contínuo</li>
                    </ul>
                    <!-- /wp:list -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"governanca","className":"fmbrzp-section"} -->
    <section id="governanca" class="wp-block-group fmbrzp-section">
        <!-- wp:heading {"level":2} -->
        <h2>Governança</h2>
        <!-- /wp:heading -->

        <!-- wp:list -->
        <ul>
            <li>Assembleia Geral</li>
            <li>Diretoria Executiva</li>
            <li>Conselho Fiscal</li>
            <li>Conselho Técnico / Conselho de Atletas</li>
        </ul>
        <!-- /wp:list -->

        <!-- wp:buttons {"className":"fmbrzp-governanca-actions"} -->
        <div class="wp-block-buttons fmbrzp-governanca-actions">
            <!-- wp:button {"className":"fmbrzp-button-secondary"} -->
            <div class="wp-block-button fmbrzp-button-secondary"><a class="wp-block-button__link" href="{{transparencia_url}}">Acessar Transparência</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"section","anchor":"clubes","className":"fmbrzp-section"} -->
    <section id="clubes" class="wp-block-group fmbrzp-section">
        <!-- wp:heading {"level":2} -->
        <h2>Clubes</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>Reunimos clubes fundadores e parceiros comprometidos com a organização de eventos, projetos de formação e fortalecimento da Bocha em Minas Gerais.</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":3} -->
        <h3>Clubes Fundadores</h3>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"fmbrzp-clubes-grid fmbrzp-clubes-grid--fundadores"} -->
        <div class="wp-block-group fmbrzp-clubes-grid fmbrzp-clubes-grid--fundadores">
            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_vargem_grande}}" alt="Vargem Grande" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
                <h3 class="fmbrzp-clube-nome">Vargem Grande FC</h3>
                <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
                <p class="fmbrzp-clube-cidade">Belmiro Braga/MG</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                    <figure class="wp-block-image size-medium"><img src="{{clube_bola_show}}" alt="Bola Show" loading="lazy" decoding="async"></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
                <h3 class="fmbrzp-clube-nome">J. F. Bola Show</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
                <p class="fmbrzp-clube-cidade">Juiz de Fora/MG</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                    <figure class="wp-block-image size-medium"><img src="{{clube_trintoes}}" alt="Trintões" loading="lazy" decoding="async"></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
                <h3 class="fmbrzp-clube-nome">Trintões FC</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
                <p class="fmbrzp-clube-cidade">Belmiro Braga/MG</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:heading {"level":3} -->
        <h3>Clubes Parceiros (em atualização)</h3>
        <!-- /wp:heading -->

        <!-- wp:group {"className":"fmbrzp-clubes-grid fmbrzp-clubes-grid--parceiros"} -->
        <div class="wp-block-group fmbrzp-clubes-grid fmbrzp-clubes-grid--parceiros">
            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_unidos}}" alt="Unidos" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
            <h3 class="fmbrzp-clube-nome">Unidos FC</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
            <p class="fmbrzp-clube-cidade">Belmiro Braga/MG</p>
            <!-- /wp:paragraph -->
        </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_botafogo}}" alt="Botafogo" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
            <h3 class="fmbrzp-clube-nome">Botafogo FC</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
            <p class="fmbrzp-clube-cidade">São João Nepomuceno/MG</p>
            <!-- /wp:paragraph -->
        </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_caramonas}}" alt="Caramonãs" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
            <h3 class="fmbrzp-clube-nome">Caramonãs</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
            <p class="fmbrzp-clube-cidade">Astolfo Dutra/MG</p>
            <!-- /wp:paragraph -->
        </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_mangueiras}}" alt="Mangueiras Country Club" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
            <h3 class="fmbrzp-clube-nome">Mangueiras Country Club</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
            <p class="fmbrzp-clube-cidade">Ubá/MG</p>
            <!-- /wp:paragraph -->
        </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"fmbrzp-clube-card"} -->
            <div class="wp-block-group fmbrzp-clube-card">
                <!-- wp:group {"className":"fmbrzp-clube-logo"} -->
                <div class="wp-block-group fmbrzp-clube-logo">
                    <!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
                <figure class="wp-block-image size-medium"><img src="{{clube_atalaia}}" alt="CSSE-TC Atalaia" loading="lazy" decoding="async"></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"className":"fmbrzp-clube-nome"} -->
            <h3 class="fmbrzp-clube-nome">CSSE-TC Atalaia</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"className":"fmbrzp-clube-cidade"} -->
            <p class="fmbrzp-clube-cidade">Três Corações/MG</p>
            <!-- /wp:paragraph -->
        </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </section>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"fmbrzp-cta"} -->
    <div class="wp-block-group alignfull fmbrzp-cta">
        <!-- wp:group {"className":"fmbrzp-container fmbrzp-cta__inner"} -->
        <div class="wp-block-group fmbrzp-container fmbrzp-cta__inner">
            <!-- wp:heading {"level":2} -->
            <h2>Venha ser um clube parceiro.</h2>
            <!-- /wp:heading -->

            <!-- wp:buttons {"className":"fmbrzp-cta__actions"} -->
            <div class="wp-block-buttons fmbrzp-cta__actions">
                <!-- wp:button {"className":"fmbrzp-btn fmbrzp-btn--primary"} -->
                <div class="wp-block-button fmbrzp-btn fmbrzp-btn--primary"><a class="wp-block-button__link ast-button button fmbrzp-btn fmbrzp-btn--primary" href="{{contato_url}}">Entrar em contato</a></div>
                <!-- /wp:button -->

                {{contato_note}}

                <!-- wp:button {"className":"fmbrzp-btn fmbrzp-btn--secondary"} -->
                <div class="wp-block-button fmbrzp-btn fmbrzp-btn--secondary"><a class="wp-block-button__link ast-button button fmbrzp-btn fmbrzp-btn--secondary" href="{{calendario_url}}">Ver calendário</a></div>
                <!-- /wp:button -->

                {{calendario_note}}
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
HTML;

$block_content = str_replace(
    [
        '{{theme_uri}}',
        '{{transparencia_url}}',
        '{{calendario_url}}',
        '{{contato_url}}',
        '{{contato_note}}',
        '{{calendario_note}}',
        '{{clube_bola_show}}',
        '{{clube_trintoes}}',
        '{{clube_vargem_grande}}',
        '{{clube_unidos}}',
        '{{clube_botafogo}}',
        '{{clube_caramonas}}',
        '{{clube_mangueiras}}',
        '{{clube_atalaia}}'
    ],
    [
        esc_url($theme_uri),
        esc_url($transparency_url),
        esc_url($calendar_url),
        esc_url($contact_url),
        $contact_note,
        $calendar_note,
        esc_url(fmbrzp_asset_clube('bola-show.jpg')),
        esc_url(fmbrzp_asset_clube('trintoes.png')),
        esc_url(fmbrzp_asset_clube('vargem-grande.jpg')),
        esc_url(fmbrzp_asset_clube('unidos.png')),
        esc_url(fmbrzp_asset_clube('botafogo.png')),
        esc_url(fmbrzp_asset_clube('caramonas.jpg')),
        esc_url(fmbrzp_asset_clube('mangueiras.png')),
        esc_url(fmbrzp_asset_clube('atalaia.png'))
    ],
    $block_content
);
?>

<div id="primary" class="content-area fmbrzp-institucional-page">
    <main id="main" class="site-main">
        <?php echo do_blocks($block_content); ?>
    </main>
</div>

<?php
get_footer();
