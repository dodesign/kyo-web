<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

get_header(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<div class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			
		</div>

		<?php if ( is_single() ) : ?>
			<?php if ( !usces_is_item() ) : ?>
			<div class="entry-meta">
				<span class="date"><time><?php the_date(); ?></time></span>
				
				<span class="author"><?php _e( 'Contributor: ','welcart_basic_beldad' ); ?><?php the_author() ?><?php edit_post_link( __( 'Edit This' ) ); ?></span>
				
				<?php if ( get_the_category() ) : ?>
				<span class="cat"><?php the_category( ',' ) ?></span>
				<?php endif; ?>
				
				<?php if ( get_the_tags() ) : ?>
				<span class="tag"><?php the_tags( __( 'Tags: ' ) ); ?></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-img"><?php the_post_thumbnail( 'full' ); ?></div>
			<?php endif; ?>
			<?php if ( is_singular('post') ) : ?>
				<p class="uk-text-center">
					<button 
						onclick="location.href='/contact/?title=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>'" 
						class="uk-button uk-button-secondary">
						この商品についてお問い合わせ
					</button>
				</p>
			<?php endif; ?>

			<?php the_content( __( '(more...)' ) ); ?>
		</div><!-- .entry-content -->


	</article>