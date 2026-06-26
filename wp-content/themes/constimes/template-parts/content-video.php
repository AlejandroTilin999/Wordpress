<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

$constimes_video_url = function_exists('get_field') ? get_field('fromate_style') : NULL;

if (is_single()) :
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-video mb-50'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="postbox__thumb postbox__video w-img p-relative">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>

                <?php if (!empty($constimes_video_url)) : ?>
                    <a href="<?php print esc_url($constimes_video_url); ?>" class="play-btn pulse-btn popup-video"><i class="fas fa-play"></i></a>
                <?php endif; ?>
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

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-video mb-50'); ?>>
        <div class="blog-post-card video-box wow animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <?php if (has_post_thumbnail()) : ?>
                <div class="blog-img">
                    <?php if (!empty($constimes_video_url)) : ?>
                        <button class="play-video-btn venobox" data-vbtype="video" data-maxwidth="800px" data-autoplay="true" data-href="<?php echo esc_url($constimes_video_url); ?>"> <span class="my-icon icon-play"></span>
                        </button>
                        <img src="assets/img/blog-post/post-img-3.jpg" alt="post-img">
                    <?php endif; ?>
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>

                    <?php if (!empty($constimes_video_url)) : ?>
                        <a href="<?php print esc_url($constimes_video_url); ?>" class="play-btn pulse-btn popup-video"><i class="fas fa-play"></i></a>
                    <?php endif; ?>
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

<?php
endif; ?>