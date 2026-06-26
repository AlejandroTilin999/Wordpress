<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package constimes
 */

get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 12;

?>

<section class="blog-post bog-search-result">
	<div class="container container-box">
		<div class="row">
			<div class="col-lg-<?php print esc_attr($blog_column); ?> blog-post-items">
				<div class="postbox__wrapper pr-20">
					<?php
					if (have_posts()) :
					?>
						<div class="result-bar page-header d-none">
							<h1 class="page-title"><?php esc_html_e('Search Results For:', 'constimes'); ?> <?php print get_search_query(); ?></h1>
						</div>
						<?php
						while (have_posts()) : the_post();
							get_template_part('template-parts/content', 'search');
						endwhile;
						?>
						<div class="basic-pagination mb-40 pagination justify-content-left pegination-box">
							<?php constimes_pagination('<i class="my-icon icon-arrow-left"></i>', '<i class="my-icon icon-arrow-right"></i>', '', ['class' => '']); ?>
						</div>
					<?php
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('blog-sidebar')) : ?>
				<div class="col-lg-4">
					<div class="blog__sidebar pl-70">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
