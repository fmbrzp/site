<?php
get_header();

$hero_bg = get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png';
?>

<main id="main" class="fmbrzp-noticias-page" role="main">
    <section class="fmbrzp-cal-hero fmbrzp-cal-hero--bg" aria-label="Hero Notícias" style="--fmbrzp-cal-hero-bg: url('<?php echo esc_url($hero_bg); ?>');">
        <h1 class="fmbrzp-cal-hero__title">Notícias</h1>
        <p class="fmbrzp-cal-hero__sub">Atualizações, comunicados e registros oficiais da Federação.</p>
    </section>

    <section class="fmbrzp-news-list">
        <div class="ast-container fmbrzp-container">
            <?php if (have_posts()) : ?>
                <div class="fmbrzp-news-grid">
                    <?php while (have_posts()) : the_post();
                        $categories = get_the_category();
                        $category_label = !empty($categories) ? $categories[0]->name : 'Geral';
                        ?>
                        <article class="fmbrzp-card fmbrzp-news-card">
                            <a class="fmbrzp-news-card__link" href="<?php the_permalink(); ?>">
                                <div class="fmbrzp-news-card__media">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', ['class' => 'fmbrzp-news-card__image']); ?>
                                    <?php else : ?>
                                        <img class="fmbrzp-news-card__image" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/news-placeholder.png'); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="fmbrzp-news-card__body">
                                    <div class="fmbrzp-news-card__top">
                                        <span class="fmbrzp-news-card__category"><?php echo esc_html($category_label); ?></span>
                                        <span class="fmbrzp-news-card__date"><?php echo esc_html(get_the_date()); ?></span>
                                    </div>
                                    <h3 class="fmbrzp-news-card__title"><?php the_title(); ?></h3>
                                    <p class="fmbrzp-news-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <nav class="fmbrzp-news-pagination" aria-label="Paginação">
                    <?php
                    echo paginate_links([
                        'mid_size' => 1,
                        'prev_text' => 'Anterior',
                        'next_text' => 'Próxima',
                        'type' => 'list',
                    ]);
                    ?>
                </nav>
            <?php else : ?>
                <article class="fmbrzp-card fmbrzp-news-empty">
                    <h3 class="fmbrzp-news-empty__title">Nenhuma notícia publicada no momento.</h3>
                </article>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();