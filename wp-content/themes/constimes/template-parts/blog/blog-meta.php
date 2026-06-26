<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

$categories = get_the_terms($post->ID, 'category');
$constimes_blog_date = get_theme_mod('constimes_blog_date', true);
$constimes_blog_comments = get_theme_mod('constimes_blog_comments', true);
$constimes_blog_author = get_theme_mod('constimes_blog_author', true);
$constimes_blog_cat = get_theme_mod('constimes_blog_cat', false);

?>


<div class="blog-post-info">
    <ul>
        <?php if (!empty($constimes_blog_author)) : ?>
            <li><span class="my-icon icon-user-solid"></span>
                <p>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_html_e('By', 'constimes') ?> <?php print get_the_author(); ?></a>
                </p>
            </li>
        <?php endif; ?>
        <?php if (!empty($constimes_blog_date)) : ?>
            <li><span class="my-icon icon-calendar"></span>
                <p>
                     <?php the_time(get_option('date_format')); ?>
                </p>
            </li>
        <?php endif; ?>
        <?php if (!empty($constimes_blog_comments)) : ?>
        <li><span class="my-icon icon-chats"></span>
            <p>
                <a href="<?php comments_link(); ?>"> <?php comments_number(); ?></a>
            </p>
        </li>
        <?php endif;?>
    </ul>
</div>