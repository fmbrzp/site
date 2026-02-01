<?php
/**
 * Template Name: Sistema
 */
if ( ! defined('ABSPATH') ) { exit; }

get_header();
?>

<main id="primary" class="site-main">
  <section class="fmbrzp-sistema-page">
    <div class="fmbrzp-sistema-wrap">

      <!-- HERO padrão -->
      <section class="fmbrzp-cal-hero fmbrzp-cal-hero--bg fmbrzp-sistema-hero" aria-label="Hero Sistema" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png'); ?>');">
        <h1 class="fmbrzp-cal-hero__title">Sistema</h1>
        <p class="fmbrzp-cal-hero__sub">
          O Sistema de Cadastro Unificado para Federações, Clubes, Atletas e Transferências está em desenvolvimento e será disponibilizado em breve.
        </p>
      </section>

      <!-- Conteúdo -->
      <div class="fmbrzp-sistema-grid">
        <!-- Card: Em construção -->
        <article class="fmbrzp-card fmbrzp-sistema-card">
          <h2 class="fmbrzp-sistema-card__title">Em construção</h2>

          <p class="fmbrzp-sistema-card__text">
            Estamos finalizando o ambiente de testes e validações. Assim que concluído, o acesso será liberado para uso.
          </p>

          <div class="fmbrzp-sistema-badges" aria-label="Módulos do sistema">
            <span class="fmbrzp-sistema-badge">Federações</span>
            <span class="fmbrzp-sistema-badge">Clubes</span>
            <span class="fmbrzp-sistema-badge">Atletas</span>
            <span class="fmbrzp-sistema-badge">Transferências</span>
          </div>

          <div class="fmbrzp-sistema-note">
            Para assuntos urgentes, utilize o WhatsApp. Para solicitações formais, utilize o e-mail institucional.
          </div>
        </article>

        <!-- Card: O que estará disponível -->
        <article class="fmbrzp-card fmbrzp-sistema-card">
          <h2 class="fmbrzp-sistema-card__title">O que estará disponível</h2>

          <ul class="fmbrzp-sistema-list">
            <li>Cadastro e atualização de federações e clubes.</li>
            <li>Cadastro de atletas com dados e vínculos.</li>
            <li>Solicitação e homologação de transferências.</li>
            <li>Organização e rastreabilidade de processos e documentos.</li>
            <li>Padronização e transparência administrativa.</li>
          </ul>

          <div class="fmbrzp-sistema-actions">
            <a class="fmbrzp-sistema-link" href="/contato/">Falar com a Federação</a>
          </div>
        </article>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
