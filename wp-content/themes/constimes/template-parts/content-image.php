<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

if (is_single()) : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="postbox__thumb">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
            </div>
        <?php endif; ?>

        <div class="postbox__content">
            <!-- blog meta -->
            <?php get_template_part('template-parts/blog/blog-meta'); ?>
            <h3 class="postbox__title">
                <?php the_title(); ?>
            </h3>
            <div class="postbox__text">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'constimes'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>
            <?php print constimes_get_tag(); ?>
        </div>
    </article>
<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image mb-50'); ?>>
        <div class="blog-post-card wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <?php if (has_post_thumbnail()) : ?>
                <div class="blog-img">
                    <?php
                    $constimes_blog_cat = get_theme_mod('constimes_blog_cat', false);
                    if (!empty($constimes_blog_cat)) :
                        $category =  get_the_terms(get_the_ID(), 'category'); ?>
                        <?php if (!empty($category[0]->name)) : ?>
                            <div class="tag">
                                <?php echo esc_html($category[0]->name); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="blog-content">
                <!-- blog meta -->
                <?php get_template_part('template-parts/blog/blog-meta'); ?>

                <h3 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div class="postbox__text mb-4">
                    <?php the_excerpt(); ?>
                </div>

                <!-- blog btn -->
                <?php get_template_part('template-parts/blog/blog-btn'); ?>
            </div>
        </div>
    </article>
<?php endif; ?>