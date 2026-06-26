<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package constimes
 */

if (is_single()) : ?>

    <article id="post-<?php the_ID(); ?>">
        
        <div class="blog-img">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php endif; ?>
        </div>
        
        <?php get_template_part('template-parts/blog/blog-meta'); ?>

        <div class="blog-content">

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
        </div>
        <?php print constimes_get_tag(); ?>
        
        <?php
			//if ( get_previous_post_link() AND get_next_post_link() ): ?>

			<div class="blog-details-border">
				<div class="row">
					<?php
						if ( get_previous_post_link() ): ?>
                        <div class="col-md-6">
                            <div class="theme-navigation b-next-post text-left">
                                <span><?php print esc_html__( 'Prev Post', 'constimes' );?></span>
                                <h4><?php print get_previous_post_link( '%link ', '%title' );?></h4>
                            </div>
                        </div>
					<?php
						endif;?>

				<?php
					if ( get_next_post_link() ): ?>
                    <div class="col-md-6">
                        <div class="theme-navigation b-next-post text-left text-md-right">
                            <span><?php print esc_html__( 'Next Post', 'constimes' );?></span>
                            <h4><?php print get_next_post_link( '%link ', '%title' );?></h4>
                        </div>
                    </div>
				<?php
					endif;?>

			</div>
		</div>

		<?php
	//	endif;?>
							
							
    </article>



<?php else : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox__item format-image'); ?>>
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
                <?php get_template_part('template-parts/blog/blog-btn'); ?>
            </div>
        </div>
    </article>

<?php endif; ?>