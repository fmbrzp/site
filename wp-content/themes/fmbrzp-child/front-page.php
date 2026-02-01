<?php
get_header();

$page_for_posts_id = (int) get_option('page_for_posts');
$news_url = $page_for_posts_id ? get_permalink($page_for_posts_id) : home_url('/');
$transparency_page = get_page_by_path('transparencia');
$transparency_url = $transparency_page ? get_permalink($transparency_page) : home_url('/transparencia/');

$quick_links = [
    [
        'label' => 'Comunicados Oficiais',
        'slug' => 'comunicados-oficiais',
    ],
    [
        'label' => 'Editais',
        'slug' => 'editais',
    ],
    [
        'label' => 'Regulamentos',
        'slug' => 'regulamentos',
    ],
    [
        'label' => 'Transpar&ecirc;ncia',
        'url' => $transparency_url,
    ],
];
?>

<div id="primary" class="content-area fmbrzp-home">
    <main id="main" class="site-main">
        <section class="fmbrzp-hero">
            <div class="ast-container fmbrzp-container">
                <div class="fmbrzp-hero__inner">
                    <div class="fmbrzp-hero__content">
                        <div class="fmbrzp-hero__brand">
                            <img class="fmbrzp-hero__logo" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo-fmbrzp.png'); ?>" alt="<?php echo esc_attr(fmbrzp_get_entity_name()); ?>">
                        </div>
                        <div class="fmbrzp-hero__text">
                            <p class="fmbrzp-hero__name"><?php echo wp_kses_post('FEDERA&Ccedil;&Atilde;O MINEIRA DE BOCHA<br>RAFA, ZERBIN E PETANCA'); ?></p>
                            <p class="fmbrzp-hero__sigla"><?php echo esc_html('FMBRZP'); ?></p>
                            <p><?php echo wp_kses_post('Portal institucional dedicado &agrave; promo&ccedil;&atilde;o, organiza&ccedil;&atilde;o e desenvolvimento das modalidades esportivas da federa&ccedil;&atilde;o.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fmbrzp-section fmbrzp-news">
            <div class="ast-container fmbrzp-container">
                <div class="fmbrzp-section__header">
                    <h2>&Uacute;ltimas Not&iacute;cias</h2>
                    <p class="fmbrzp-news__subtitle"><?php echo wp_kses_post('Atualiza&ccedil;&otilde;es oficiais e comunicados institucionais da Federa&ccedil;&atilde;o.'); ?></p>
                    <a class="fmbrzp-link" href="<?php echo esc_url($news_url); ?>">Acompanhe todas as not&iacute;cias da Federa&ccedil;&atilde;o</a>
                </div>

                <div class="fmbrzp-grid fmbrzp-grid--news">
                    <?php
                    $news_query = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true,
                    ]);

                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) :
                            $news_query->the_post();
                            ?>
                            <article <?php post_class('fmbrzp-card fmbrzp-card--news'); ?>>
                                <div class="fmbrzp-card__media">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', ['class' => 'fmbrzp-card__image']); ?>
                                    <?php else : ?>
                                        <img class="fmbrzp-card__image" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/news-placeholder.png'); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <h3 class="fmbrzp-card__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="fmbrzp-meta">
                                    <span class="fmbrzp-meta__date"><?php echo esc_html(get_the_date()); ?></span>
                                    <span class="fmbrzp-meta__sep">&bull;</span>
                                    <span class="fmbrzp-meta__cat"><?php echo wp_kses_post(get_the_category_list(', ')); ?></span>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <p><?php echo wp_kses_post('N&atilde;o h&aacute; not&iacute;cias publicadas no momento.'); ?></p>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <section class="fmbrzp-section fmbrzp-quick">
            <div class="ast-container fmbrzp-container">
                <div class="fmbrzp-section__header">
                    <h2>Acesso r&aacute;pido</h2>
                </div>

                <div class="fmbrzp-grid fmbrzp-grid--quick">
                    <?php foreach ($quick_links as $link) :
                        $url = '';
                        $slug_class = '';
                        if (!empty($link['url'])) {
                            $url = $link['url'];
                        } elseif (!empty($link['slug'])) {
                            $term = get_category_by_slug($link['slug']);
                            if ($term) {
                                $url = get_category_link($term);
                            }
                            $slug_class = ' fmbrzp-quick-' . sanitize_html_class($link['slug']);
                        }
                        if ('' === $slug_class && !empty($link['label']) && false !== stripos($link['label'], 'Transpar')) {
                            $slug_class = ' fmbrzp-quick-transparencia';
                        }
                        $url = $url ? $url : home_url('/');
                        ?>
                        <a class="fmbrzp-card fmbrzp-card--quick<?php echo esc_attr($slug_class); ?>" href="<?php echo esc_url($url); ?>">
                            <span class="fmbrzp-card__label"><?php echo wp_kses_post($link['label']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php
get_footer();
