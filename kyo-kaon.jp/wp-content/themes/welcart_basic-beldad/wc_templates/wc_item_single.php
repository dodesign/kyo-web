<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

$division = welcart_basic_get_item_division( $post->ID );
switch( $division ) :
case 'data':
	get_template_part( 'wc_templates/wc_item_single_data', get_post_format() );
	break;
case 'service':
	get_template_part( 'wc_templates/wc_item_single_service', get_post_format() );
	break;
default://shipped

get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">

	<?php if ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<div class="item-header">
				<h1 class="item_page_title"><?php the_title(); ?></h1>
			</div><!-- .item-header -->

			<?php usces_remove_filter(); ?>
			<?php usces_the_item(); ?>
			<?php usces_have_skus(); ?>

			<div class="itempage-wrap">

				<div id="itempage" class="cf">
					
					<div id="img-box">

						<?php $imageid = usces_get_itemSubImageNums(); ?>

						<div id="itemimg-main" class="slider slider-for itemimg">
							<div><a href="<?php usces_the_itemImageURL( 0 ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( 0, 600, 600, $post ); ?></a></div>
							<?php foreach ( $imageid as $id ) : ?>
							<div><a href="<?php usces_the_itemImageURL( $id ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( $id, 600, 600, $post ); ?></a></div>
							<?php endforeach; ?>
						</div><!-- #itemimg-main -->

						<?php if ( !empty( $imageid ) ): ?>
						<div id="itemimg-sub" class="slider slider-nav itemsubimg">
							<div><?php usces_the_itemImage( 0, 90, 90, $post ); ?></div>
							<?php foreach ( $imageid as $id ) : ?>
							<div><?php usces_the_itemImage( $id, 90, 90, $post ); ?></div>
							<?php endforeach; ?>
						</div><!-- #itemimg-sub -->
						<?php endif; ?>

					</div><!-- #img-box -->

					<div class="detail-box">

						<div class="upper cf">
							<?php wcct_produt_tag(); ?>
							<?php welcart_basic_campaign_message(); ?>
							<div class="itemcode"><?php _e( 'Product Number:', 'welcart_basic_beldad' ); ?><?php usces_the_itemCode(); ?></div>
						</div><!-- .upper -->

						<h2 class="item-name"><?php usces_the_itemName(); ?></h2>

					</div><!-- .detail-box -->

					<div class="item-info">

						<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
						<!-- Charging Type Continue shipped -->
						<table class="dlseller">
							<tr><th><?php _e( 'First Withdrawal Date', 'dlseller' ); ?></th><td><?php echo dlseller_first_charging( $post->ID ); ?></td></tr>
							<?php if ( 0 < (int)$usces_item['dlseller_interval'] ) : ?>
							<tr><th><?php _e( 'Contract Period', 'dlseller' ); ?></th><td><?php echo $usces_item['dlseller_interval']; ?><?php _e( 'month (Automatic Updates)', 'welcart_basic' ); ?></td></tr>
							<?php endif; ?>
						</table>
						<?php endif; ?>

						<?php if ( $item_custom = usces_get_item_custom( $post->ID, 'table', 'return' ) ) : ?>
							<?php echo $item_custom; ?>
						<?php endif; ?>

						<form action="<?php echo USCES_CART_URL; ?>" method="post">

						<?php do { ?>
							<div class="skuform">
								<?php if ( '' !== usces_the_itemSkuDisp( 'return' ) ) : ?>
								<div class="skuname"><?php usces_the_itemSkuDisp(); ?></div>
								<?php endif; ?>
								
								<div class="inner cf">

									<?php
									global $usces;
									$pictid = $usces->get_subpictid( usces_the_itemSku( 'return' ) );
									if ( $pictid ) {
									?>
									<div class="left">
										<div class="skuimg">
										<?php echo wp_get_attachment_image( $pictid, array( 300, 300 ), true ); ?>
										</div>
									</div><!-- left -->
									<?php
									}
									?>

									<div class="right">

										<?php usces_the_itemGpExp(); ?>
										<?php if ( usces_is_options() ) : ?>
										<dl class="item-option">
											<?php while ( usces_have_options() ) : ?>
											<dt><?php usces_the_itemOptName(); ?></dt>
											<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
											<?php endwhile; ?>
										</dl>
										<?php endif; ?>

										<?php if( wcct_get_options( 'display_zaiko_text' ) ) :?>
											<div class="zaikostatus"><?php _e('stock status', 'usces'); ?> : <?php usces_the_itemZaikoStatus(); ?></div>
										<?php endif; ?>
										
										<div class="field cf">

											<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
											<div class="frequency"><span class="field_frequency"><?php dlseller_frequency_name( $post->ID, 'amount' ); ?></span></div>
											<?php endif; ?>

											<div class="field_price">
											<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
												<span class="field_cprice"><?php usces_the_itemCpriceCr(); ?></span>
											<?php endif; ?>
												<?php usces_the_itemPriceCr(); ?><?php usces_guid_tax(); ?>
											</div>

										</div><!-- .field -->

										<?php
										/* ★在庫が少ないときだけ「残り◯点」を出す（2026-10-01 追加）
										   usces_the_itemZaikoNum( 'return' ) はそのSKUの在庫数を返す。
										   在庫数が未設定のときは false が返るので is_numeric で弾く。
										   しきい値は functions.php の KAON_ZAIKO_ALERT（既定3）。
										   超えているときは何も出さない。 */
										$kaon_zaiko = function_exists( 'usces_the_itemZaikoNum' ) ? usces_the_itemZaikoNum( 'return' ) : false;
										$kaon_alert = defined( 'KAON_ZAIKO_ALERT' ) ? (int) KAON_ZAIKO_ALERT : 3;
										if ( usces_have_zaiko() && is_numeric( $kaon_zaiko ) && 0 < (int) $kaon_zaiko && (int) $kaon_zaiko <= $kaon_alert ) :
										?>
										<p class="kaon-zaiko-alert">残り<?php echo (int) $kaon_zaiko; ?>点</p>
										<?php endif; ?>

										<?php if( !usces_have_zaiko() ) : ?>
											<?php if( wcct_get_options( 'inquiry_link_button' ) ) :?>
												<div class="contact-item"><a href="<?php echo wcct_get_inquiry_link_url(); ?>"><i class="fa fa-envelope"></i><?php wcct_options( 'inquiry_text' ); ?></a></div>
											<?php else: ?>
												<div class="itemsoldout"><?php wcct_options( 'display_soldout_text' ); ?></div>
											<?php endif; ?>
										<?php else : ?>
										<div class="c-box">
											<span class="quantity"><?php _e( 'Quantity', 'usces' ); ?><?php usces_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></span>
											<span class="cart-button"><?php usces_the_itemSkuButton( wcct_get_options( 'cart_button' ), 0 ); ?></span>
										</div>
										<?php endif; ?>
										<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku( 'return' ) ); ?></div>
										
									</div><!-- .right -->

								</div><!-- .inner -->
								
							</div><!-- .skuform -->
						<?php } while ( usces_have_skus() ); ?>

							<?php do_action( 'usces_action_single_item_inform' ); ?>
						</form>
						<?php do_action( 'usces_action_single_item_outform' ); ?>

									<div class="p-customise uk-text-center">
											<h2>房や珠は、お好みの色や形にご変更可能です</h2>
											<p>ご遠慮なくご相談くださいませ。</p>
											<div class="uk-child-width-1-2@s uk-grid" uk-grid="">
												<div>
												<h3>お電話</h3>
													<a href="tel: 0757216600"><h4 class="uk-text-large">075-721-6600</h4></a>
												</div>
												<div>
													<h3>メール</h3>
													<p><button onclick="location.href='/contact/?title=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>'"  class="uk-button uk-button-primary">お問い合わせ</button></p>
												</div>
											</div>
									</div><!-- .p-customise -->
									<?php
									// 投稿のIDを取得（グローバルな投稿を使用）
									global $post;
									$post_id = $post->ID;

									// 投稿に紐づいたカテゴリーを取得
									$categories = get_the_category($post_id);

									// カテゴリーがある場合
									if ($categories) {
										echo '<ul class="item-categories">';

										foreach ($categories as $category) {
											// 親カテゴリーを取得
											$parent_category = get_category($category->parent);

											// リンクを作成するための変数
											$category_link = esc_url(get_category_link($category->term_id));
											$output_text = esc_html($category->name); // 子カテゴリー名

											// 親カテゴリーがある場合
											if ($parent_category && $parent_category->term_id > 0) {
												$parent_link = esc_html($parent_category->name); // 親カテゴリー名
												$output_text = $parent_link . '：' . $output_text; // 出力テキストを作成
											}

											// リンク付きで表示
											echo '<li class="item-categories-item">';
											echo '<a href="' . $category_link . '">' . $output_text . '</a>'; // 親と子を1つのリンクに
											echo '</li>';
										}

										echo '</ul>';
									} else {
									}
									?>
						<link rel='stylesheet' id='wc-basic-style-css'  href='https://kyo-kaon.jp/wp-content/themes/welcart_basic-beldad/style.css' type='text/css' media='all' />
					</div><!-- .item-info -->

						<div class="item-description">
							<?php the_content(); ?>
						</div>
					
				</div><!-- #itempage -->

				<?php if ( wcct_get_options( 'review' ) ) comments_template( '/wc_templates/wc_review.php', false ); ?>		
				<?php usces_assistance_item( $post->ID, __( 'An article concerned', 'usces' ) ); ?>

			</div><!-- .itemspage-wrap -->

		</article>

	<?php else: ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
	<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php endswitch; ?>
