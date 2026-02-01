<?php
/*
Template Name: Notícias
*/

get_header();

$paged = max(1, get_query_var('paged'));
$query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $paged,
]);
?>

<div id="primary" class="content-area fmbrzp-noticias-page">
    <main id="main" class="site-main">
        <section class="fmbrzp-news-hero">
            <div class="ast-container fmbrzp-container">
                <h1 class="fmbrzp-news-hero__title">Notícias</h1>
                <p class="fmbrzp-news-hero__sub">Atualizações, comunicados e registros oficiais da Federação.</p>
            </div>
        </section>

        <section class="fmbrzp-news-list">
            <div class="ast-container fmbrzp-container">
                <?php if ($query->have_posts()) : ?>
                    <div class="fmbrzp-news-grid">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $categories = get_the_category();
                            $category_label = !empty($categories) ? $categories[0]->name : 'Geral';
                            ?>
                            <article class="fmbrzp-card fmbrzp-news-card">
                                <a class="fmbrzp-news-card__link" href="<?php the_permalink(); ?>">
                                    <div class="fmbrzp-news-card__media">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium_large', ['class' => 'fmbrzp-news-card__image']); ?>
                                        <?php else : ?>
                                            <div class="fmbrzp-news-card__placeholder" aria-hidden="true">
                                                <span class="fmbrzp-news-card__placeholder-icon"></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="fmbrzp-news-card__body">
                                        <span class="fmbrzp-news-card__category"><?php echo esc_html($category_label); ?></span>
                                        <h3 class="fmbrzp-news-card__title"><?php the_title(); ?></h3>
                                        <div class="fmbrzp-news-card__meta">
                                            <span><?php echo esc_html(get_the_author()); ?></span>
                                            <span class="fmbrzp-news-card__meta-sep">•</span>
                                            <span><?php echo esc_html(get_the_date()); ?></span>
                                        </div>
                                        <p class="fmbrzp-news-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <nav class="fmbrzp-news-pagination" aria-label="Paginação">
                        <?php
                        echo paginate_links([
                            'total' => $query->max_num_pages,
                            'current' => $paged,
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
</div>

<?php
wp_reset_postdata();
get_footer();