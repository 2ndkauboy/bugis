<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */

get_header(); ?>

<div id="main" class="clearfix">
	<div id="content">
		<header class="page-header">
			<h2 class="page-title"><?php printf( __( 'Category Archives: %s', 'bugis' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h2>
			<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
		</header><!--end page header-->
				
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>			
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
				
			<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
			<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>

				<?php if (  $wp_query->max_num_pages > 1 ) : ?>

				<nav id="nav-below">
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bugis' ) ); ?></div>
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bugis' ) ); ?></div>
				</nav><!-- end #nav-below -->

				<?php endif; ?>

			<?php endif; ?>	

	</div><!--end content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>