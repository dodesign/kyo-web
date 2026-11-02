<?php
/**
 * 商品ページ。2026-11-02 リニューアル（旧版は リポジトリ直下 _旧デザイン_20261102/wc_item_single.php）
 *
 * ・サイドバーをやめて全幅（inc/kaon-home.php で body に kn-wide-page kn-item-page を付けている）
 * ・本文の後半の共通部分（贈り物・人間心理・技術・想い）は inc/kaon-item.php で切り分けて、
 *   このファイルのデザインで出している。本文の中身は変えていない。
 * ・画像スライダー（#itemimg-main / #itemimg-sub）とカートのフォームは Welcart・親テーマのJSが使うので、
 *   ID・クラス名を変えないこと。
 *
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

<div id="primary" class="site-content kn-ip">
	<div id="content" role="main">

	<?php if ( have_posts() ) : the_post(); ?>

		<?php
		usces_remove_filter();
		usces_the_item();
		usces_have_skus();

		$kn_split = kaon_item_split_content( get_post_field( 'post_content', get_the_ID() ) );
		list( $kn_type, $kn_sub ) = kaon_item_type_of( get_the_ID() );
		$kn_root  = (int) usces_get_cat_id( 'item' );
		$kn_st    = kaon_cat_structure();
		$kn_short = kaon_short_item_name( get_the_title() );
		$kn_ask   = home_url( '/contact/?title=' . rawurlencode( get_the_title() ) . '&url=' . rawurlencode( get_permalink() ) );
		?>

		<article <?php post_class( 'kn-ip__article' ); ?> id="post-<?php the_ID(); ?>">

			<div class="kn-wrap">
				<p class="kn-arc__crumb kn-ip__crumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a>
					<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_root ) ); ?>">商品一覧</a>
					<?php if ( $kn_type ) : ?>
						<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_type ) ); ?>"><?php echo esc_html( get_cat_name( $kn_type ) ); ?></a>
					<?php endif; ?>
					<?php if ( $kn_sub ) : ?>
						<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_sub ) ); ?>"><?php echo esc_html( isset( $kn_st['labels'][ $kn_sub ] ) ? $kn_st['labels'][ $kn_sub ] : get_cat_name( $kn_sub ) ); ?></a>
					<?php endif; ?>
				</p>
			</div>

			<div class="kn-wrap kn-ip__top">

				<?php /* ---------- 画像 ---------- */ ?>
				<div id="img-box" class="kn-ip__gallery">
					<?php $imageid = usces_get_itemSubImageNums(); ?>
					<div id="itemimg-main" class="slider slider-for itemimg">
						<div><a href="<?php usces_the_itemImageURL( 0 ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( 0, 800, 800, $post ); ?></a></div>
						<?php foreach ( $imageid as $id ) : ?>
						<div><a href="<?php usces_the_itemImageURL( $id ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( $id, 800, 800, $post ); ?></a></div>
						<?php endforeach; ?>
					</div><!-- #itemimg-main -->
					<?php if ( ! empty( $imageid ) ) : ?>
					<div id="itemimg-sub" class="slider slider-nav itemsubimg">
						<div><?php usces_the_itemImage( 0, 150, 150, $post ); ?></div>
						<?php foreach ( $imageid as $id ) : ?>
						<div><?php usces_the_itemImage( $id, 150, 150, $post ); ?></div>
						<?php endforeach; ?>
					</div><!-- #itemimg-sub -->
					<?php endif; ?>
				</div><!-- #img-box -->

				<?php /* ---------- 購入欄 ---------- */ ?>
				<div class="kn-ip__buy">

					<div class="kn-ip__tags">
						<?php wcct_produt_tag(); ?>
						<?php welcart_basic_campaign_message(); ?>
					</div>

					<h1 class="kn-ip__title"><?php echo esc_html( $kn_short ? $kn_short : get_the_title() ); ?></h1>
					<?php if ( $kn_short && $kn_short !== get_the_title() ) : ?>
						<p class="kn-ip__fulltitle"><?php the_title(); ?></p>
					<?php endif; ?>
					<p class="kn-ip__code">商品番号：<?php usces_the_itemCode(); ?></p>

					<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
					<table class="dlseller">
						<tr><th><?php _e( 'First Withdrawal Date', 'dlseller' ); ?></th><td><?php echo dlseller_first_charging( $post->ID ); ?></td></tr>
						<?php if ( 0 < (int) $usces_item['dlseller_interval'] ) : ?>
						<tr><th><?php _e( 'Contract Period', 'dlseller' ); ?></th><td><?php echo $usces_item['dlseller_interval']; ?><?php _e( 'month (Automatic Updates)', 'welcart_basic' ); ?></td></tr>
						<?php endif; ?>
					</table>
					<?php endif; ?>

					<form action="<?php echo USCES_CART_URL; ?>" method="post" class="kn-ip__form">
					<?php do { ?>
						<div class="skuform">
							<?php if ( '' !== usces_the_itemSkuDisp( 'return' ) ) : ?>
							<div class="skuname"><?php usces_the_itemSkuDisp(); ?></div>
							<?php endif; ?>

							<?php
							global $usces;
							$pictid = $usces->get_subpictid( usces_the_itemSku( 'return' ) );
							if ( $pictid ) :
							?>
							<div class="skuimg"><?php echo wp_get_attachment_image( $pictid, array( 300, 300 ), true ); ?></div>
							<?php endif; ?>

							<?php usces_the_itemGpExp(); ?>

							<div class="kn-ip__price">
								<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
									<span class="field_cprice"><?php usces_the_itemCpriceCr(); ?></span>
								<?php endif; ?>
								<b><?php usces_the_itemPriceCr(); ?></b><small><?php usces_guid_tax(); ?></small>
								<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
									<span class="field_frequency"><?php dlseller_frequency_name( $post->ID, 'amount' ); ?></span>
								<?php endif; ?>
							</div>

							<?php
							/* ★在庫が少ないときだけ「残り◯点」を出す（2026-10-01 追加。しきい値は functions.php の KAON_ZAIKO_ALERT） */
							$kaon_zaiko = function_exists( 'usces_the_itemZaikoNum' ) ? usces_the_itemZaikoNum( 'return' ) : false;
							$kaon_alert = defined( 'KAON_ZAIKO_ALERT' ) ? (int) KAON_ZAIKO_ALERT : 3;
							if ( usces_have_zaiko() && is_numeric( $kaon_zaiko ) && 0 < (int) $kaon_zaiko && (int) $kaon_zaiko <= $kaon_alert ) :
							?>
							<p class="kaon-zaiko-alert kn-ip__alert">残り<?php echo (int) $kaon_zaiko; ?>点</p>
							<?php endif; ?>

							<?php if ( usces_is_options() ) : ?>
							<dl class="item-option kn-ip__opt">
								<?php while ( usces_have_options() ) : ?>
								<dt><?php usces_the_itemOptName(); ?></dt>
								<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
								<?php endwhile; ?>
							</dl>
							<?php endif; ?>

							<?php if ( wcct_get_options( 'display_zaiko_text' ) ) : ?>
								<div class="zaikostatus"><?php _e( 'stock status', 'usces' ); ?> : <?php usces_the_itemZaikoStatus(); ?></div>
							<?php endif; ?>

							<?php if ( ! usces_have_zaiko() ) : ?>
								<div class="kn-ip__soldout">
									<p>こちらの商品は、ただいま品切れです。</p>
									<a class="kn-ip__ask" href="<?php echo esc_url( $kn_ask ); ?>">似たお品のご相談・入荷のお問い合わせ</a>
								</div>
							<?php else : ?>
							<div class="kn-ip__cart">
								<span class="quantity"><?php _e( 'Quantity', 'usces' ); ?><?php usces_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></span>
								<span class="cart-button"><?php usces_the_itemSkuButton( wcct_get_options( 'cart_button' ), 0 ); ?></span>
							</div>
							<?php endif; ?>
							<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku( 'return' ) ); ?></div>
						</div><!-- .skuform -->
					<?php } while ( usces_have_skus() ); ?>
						<?php do_action( 'usces_action_single_item_inform' ); ?>
					</form>
					<?php do_action( 'usces_action_single_item_outform' ); ?>

					<ul class="kn-ip__points">
						<li>京都・上賀茂の工房で、職人が一つひとつ手仕立て</li>
						<li>房や珠は、お好みの色や形にご変更いただけます</li>
						<li>ご不明な点は、お電話・メールでお気軽に</li>
					</ul>

					<div class="kn-ip__consult">
						<p class="kn-ip__consult-t">房や珠の変更・ご相談</p>
						<div class="kn-ip__consult-row">
							<a class="kn-ip__tel" href="tel:0757216600"><small>お電話</small>075-721-6600</a>
							<a class="kn-ip__mail" href="<?php echo esc_url( $kn_ask ); ?>">この商品について問い合わせる</a>
						</div>
						<p class="kn-ip__consult-note">受付時間 9:00–18:00</p>
					</div>

					<?php if ( $item_custom = usces_get_item_custom( $post->ID, 'table', 'return' ) ) : ?>
						<div class="kn-ip__spec"><?php echo $item_custom; ?></div>
					<?php endif; ?>

				</div><!-- .kn-ip__buy -->
			</div><!-- .kn-ip__top -->

			<?php /* ---------- 商品の説明（本文の、商品ごとの部分） ---------- */ ?>
			<section class="kn-ip__desc-sec">
				<div class="kn-wrap kn-wrap--narrow">
					<div class="kn-head kn-head--solo"><h2><small>DETAIL</small>商品について</h2></div>
					<div class="kn-ip__desc item-description">
						<?php echo kaon_item_render( $kn_split['own'] ); ?>
						<?php if ( $kn_split['extra'] ) : ?>
							<div class="kn-ip__extra"><?php echo kaon_item_render( $kn_split['extra'] ); ?></div>
						<?php endif; ?>
					</div>

					<?php
					// カテゴリー（チップ）
					$kn_cats = get_the_category();
					if ( $kn_cats ) :
					?>
					<ul class="kn-chips kn-ip__cats">
						<?php foreach ( $kn_cats as $c ) : if ( (int) $c->term_id === $kn_root ) { continue; } ?>
							<li><a class="kn-chip" href="<?php echo esc_url( get_category_link( $c ) ); ?>"><?php echo esc_html( preg_replace( '/（.*?）|\(.*?\)/u', '', $c->name ) ); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
			</section>

			<?php /* ---------- お届けするもの（本文「大切な方への贈り物としても」の中身） ---------- */ ?>
			<?php if ( '' !== kaon_item_norm( $kn_split['gift'] ) ) : ?>
			<section class="kn-ip__gift kn-full">
				<div class="kn-wrap">
					<div class="kn-ip__gift-in">
						<div class="kn-ip__gift-img" data-rv><?php echo kaon_img( '/common/img/kodawari-6.jpg', 'full', '高級桐箱' ); ?></div>
						<div class="kn-ip__gift-body" data-rv>
							<p class="kn-ip__eyebrow">GIFT</p>
							<h2>大切な方への贈り物としても</h2>
							<div class="kn-ip__gift-text"><?php echo wpautop( wp_kses_post( trim( $kn_split['gift'] ) ) ); ?></div>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<?php /* ---------- 喜芳工房の念珠について（本文にあった共通欄だけ） ---------- */ ?>
			<?php
			$kn_cards = array_intersect_key( kaon_item_brand_cards(), array_flip( $kn_split['keys'] ) );
			if ( $kn_cards ) :
			?>
			<section class="kn-sec kn-sec--tint kn-full kn-ip__brand">
				<div class="kn-wrap">
					<div class="kn-head"><h2><small>KIHO KOUBOU</small>喜芳工房の念珠について</h2><a class="kn-more" href="<?php echo esc_url( home_url( '/kihou-koubou/' ) ); ?>">喜芳工房のこだわり</a></div>
					<div class="kn-ip__cards kn-ip__cards--<?php echo count( $kn_cards ); ?>">
						<?php foreach ( $kn_cards as $c ) : ?>
						<div class="kn-ip__card" data-rv>
							<div class="kn-ip__card-img"><?php echo kaon_img( $c['img'], 'medium_large', '' ); ?></div>
							<p class="kn-ip__card-no"><?php echo esc_html( $c['no'] ); ?></p>
							<h3><?php echo esc_html( $c['t'] ); ?></h3>
							<p><?php echo esc_html( $c['p'] ); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<?php if ( wcct_get_options( 'review' ) ) : ?>
				<div class="kn-wrap kn-wrap--narrow kn-ip__review"><?php comments_template( '/wc_templates/wc_review.php', false ); ?></div>
			<?php endif; ?>
			<?php ob_start(); usces_assistance_item( $post->ID, __( 'An article concerned', 'usces' ) ); $kn_assist = ob_get_clean(); ?>
			<?php if ( trim( $kn_assist ) ) : ?>
				<div class="kn-wrap kn-ip__assist"><?php echo $kn_assist; ?></div>
			<?php endif; ?>

		</article>

		<?php /* ---------- おすすめ（同じ種類・同じ男女から） ---------- */ ?>
		<?php
		$kn_rel = kaon_item_related_query( get_the_ID(), 4 );
		if ( $kn_rel->have_posts() ) :
		?>
		<section class="kn-sec kn-full kn-ip__related">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>RECOMMEND</small>こちらもおすすめ</h2><?php if ( $kn_type ) : ?><a class="kn-more" href="<?php echo esc_url( get_category_link( $kn_sub ? $kn_sub : $kn_type ) ); ?>">一覧を見る</a><?php endif; ?></div>
				<div class="kn-items">
					<?php while ( $kn_rel->have_posts() ) : $kn_rel->the_post(); usces_the_item(); ?>
						<?php kaon_item_card(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php
		endif;
		wp_reset_postdata();
		?>

		<?php /* ---------- 念珠をさがす（トップと同じ6枠）。おすすめに合うものが無かった人の行き先 ---------- */ ?>
		<?php kaon_cat_tiles_section( 'kn-sec--tint kn-ip__find', true ); ?>

	<?php else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
	<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>

<?php endswitch; ?>
