<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doyel Grid
 */
if ( ! is_singular( ) ) : ?>
<div class="col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="inner-box">
			<?php if ( has_post_thumbnail () ): ?>
			<div class="image">
				<?php doyel_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
			<div class="<?php if ( ! has_post_thumbnail () ): ?>border-top <?php endif; ?>lower-content">
				<div class="upper-box">
					<?php
						the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
					<div class="post-date"><?php doyel_grid_posted_on(); ?></div>
				</div>
				<div class="lower-box">
					<ul class="post-meta">
						<li><?php doyel_grid_comments(); ?></li>
						<li><?php doyel_grid_posted_by(); ?></li>
						<li><?php doyel_grid_category(); ?></li>
					</ul>
					<?php
		           	echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'" class="read-more"><span>'.esc_html__('Read More','doyel-grid').'<i class="fa fa-long-arrow-right"></i>'.'</span></a>'; 
		            ?>
				</div>
			</div>
		</div>
	</article>	
</div>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php doyel_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						doyel_posted_by();
						doyel_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doyel-grid' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'doyel-grid' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php doyel_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>