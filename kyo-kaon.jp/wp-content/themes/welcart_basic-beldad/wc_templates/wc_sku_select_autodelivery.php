<?php
/**
 * Sku Select Auto Delivery Page
 *
 * @package Welcart
 * @subpackage Welcart Beldad
 */

get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">

	<?php
	if ( have_posts() ) :
		the_post();
		?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="item-header">
				<h1 class="item_page_title"><?php the_title(); ?></h1>
			</div><!-- .item-header -->

			<?php
			usces_remove_filter();
			usces_the_item();
			usces_have_skus();
			?>

			<div class="itempage-wrap">
				<div id="itempage" class="cf">
					<div id="img-box">

						<?php $imageid = usces_get_itemSubImageNums(); ?>

						<div id="itemimg-main" class="itemimg">
							<div class="slider slider-for">
								<div><a href="<?php usces_the_itemImageURL( 0 ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', null ); ?>><?php usces_the_itemImage( 0, 600, 600, $post ); ?></a></div>
								<?php
								foreach ( $imageid as $id ) :
									?>
									<div><a href="<?php usces_the_itemImageURL( $id ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', null ); ?>><?php usces_the_itemImage( $id, 600, 600, $post ); ?></a></div>
									<?php
								endforeach;
								?>
							</div>
							<?php do_action( 'usces_theme_favorite_icon' ); ?>
						</div><!-- #itemimg-main -->

						<?php
						if ( ! empty( $imageid ) ) :
							?>
							<div id="itemimg-sub" class="slider slider-nav itemsubimg">
								<div><?php usces_the_itemImage( 0, 90, 90, $post ); ?></div>
								<?php
								foreach ( $imageid as $id ) :
									?>
									<div><?php usces_the_itemImage( $id, 90, 90, $post ); ?></div>
									<?php
								endforeach;
								?>
							</div><!-- #itemimg-sub -->
							<?php
						endif;
						?>

					</div><!-- #img-box -->

					<div class="detail-box">
						<div class="upper cf">
							<?php
							wcct_produt_tag();
							welcart_basic_campaign_message();
							?>
							<div class="itemcode"><?php esc_html_e( 'Product Number:', 'welcart_basic_beldad' ); ?><?php usces_the_itemCode(); ?></div>
						</div><!-- .upper -->
						<h2 class="item-name"><?php usces_the_itemName(); ?></h2>
					</div><!-- .detail-box -->

					<div class="item-info">

						<?php
						$item_custom = usces_get_item_custom( $post->ID, 'list', 'return' );
						if ( $item_custom ) :
							echo wp_kses_post( $item_custom );
						endif;
						do_action( 'usces_action_single_item_outform' );
						?>

						<div class="item-description">
							<?php the_content(); ?>
						</div>

					</div><!-- .item-info -->
				</div><!-- #itempage -->

				<?php
				if ( wcct_get_options( 'review' ) ) {
					comments_template( '/wc_templates/wc_review.php', false );
				}
				usces_assistance_item( $post->ID, __( 'An article concerned', 'usces' ) );
				?>

			</div><!-- .itempage-wrap -->
		</article>

		<?php
	else :
		?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
		<?php
	endif;
	?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php
get_footer();
