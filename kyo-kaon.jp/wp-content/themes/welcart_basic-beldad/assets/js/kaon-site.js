/* =========================================================
   喜芳工房 ヘッダー（スマホメニュー）とトップの特集カルーセル
   2026-11-02 リニューアル。jQuery は使っていない。
   ========================================================= */
(function () {
	'use strict';

	/* ---------- スマホメニュー ---------- */
	function initMenu() {
		var menu = document.getElementById('kn-spmenu');
		var burger = document.querySelector('.kn-hd__burger');
		if (!menu || !burger) return;
		var closeBtn = menu.querySelector('.kn-spmenu__close');
		var html = document.documentElement;
		function open() {
			menu.classList.add('is-open');
			menu.setAttribute('aria-hidden', 'false');
			burger.setAttribute('aria-expanded', 'true');
			html.classList.add('kn-lock');
		}
		function close() {
			menu.classList.remove('is-open');
			menu.setAttribute('aria-hidden', 'true');
			burger.setAttribute('aria-expanded', 'false');
			html.classList.remove('kn-lock');
		}
		burger.addEventListener('click', open);
		if (closeBtn) closeBtn.addEventListener('click', close);
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
		// メニュー内のリンク（ページ内リンク含む）を押したら閉じる
		menu.addEventListener('click', function (e) { if (e.target.closest('a')) close(); });
	}

	/* ---------- 特集カルーセル ----------
	   前後に2枚ずつ複製して「無限ループ」にする。
	   ★transitionend は裏タブなどで遅れて届くことがあるので使わず、時間（950ms）で
	     複製位置から本物の位置へ戻す。連打しても破綻しない。 */
	function initCarousel(root) {
		var track = root.querySelector('.kn-fc__track');
		var dots = root.querySelector('.kn-fc__dots');
		var count = root.querySelector('.kn-fc__count');
		var originals = Array.prototype.slice.call(track.children);
		var N = originals.length;
		if (N < 2) return;
		var PAD = Math.min(2, N);

		// 複製を作る（複製はタブ移動・読み上げの対象外にする）
		function cloneOf(el) {
			var c = el.cloneNode(true);
			c.setAttribute('aria-hidden', 'true');
			c.setAttribute('tabindex', '-1');
			c.classList.add('is-clone');
			var imgs = c.querySelectorAll('img');
			for (var i = 0; i < imgs.length; i++) imgs[i].setAttribute('loading', 'lazy');
			return c;
		}
		for (var i = 0; i < PAD; i++) {
			track.insertBefore(cloneOf(originals[N - 1 - i]), track.firstChild);
			track.appendChild(cloneOf(originals[i]));
		}
		var slides = Array.prototype.slice.call(track.children);

		for (var d = 0; d < N; d++) {
			var b = document.createElement('button');
			b.type = 'button';
			b.setAttribute('aria-label', (d + 1) + '枚目');
			dots.appendChild(b);
		}
		var dotEls = Array.prototype.slice.call(dots.children);

		var pos = PAD, timer = null, settle = null;
		function real() { return ((pos - PAD) % N + N) % N; }
		function pad2(n) { return (n < 10 ? '0' : '') + n; }

		function place(animate) {
			track.style.transition = animate ? '' : 'none';
			var vw = root.querySelector('.kn-fc__viewport').clientWidth;
			var s = slides[pos];
			var x = s.offsetLeft - (vw - s.offsetWidth) / 2;
			track.style.transform = 'translateX(' + (-x) + 'px)';
			for (var k = 0; k < slides.length; k++) slides[k].classList.toggle('is-active', k === pos);
			for (var j = 0; j < dotEls.length; j++) dotEls[j].classList.toggle('is-active', j === real());
			if (count) count.textContent = pad2(real() + 1) + ' / ' + pad2(N);
			if (!animate) { void track.offsetHeight; track.style.transition = ''; }
		}
		function normalize() {
			if (pos >= PAD + N) { pos -= N; place(false); }
			else if (pos < PAD) { pos += N; place(false); }
		}
		function move(target) {
			normalize();
			pos = Math.max(0, Math.min(slides.length - 1, target()));
			place(true);
			clearTimeout(settle);
			settle = setTimeout(normalize, 950);
		}
		function step(n) { move(function () { return pos + n; }); }
		function jump(k) { move(function () { return PAD + k; }); }

		var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		// 自動送りの間隔。2026-11-02 5秒→3.8秒（沙織さん指示）
		var INTERVAL = 2000; // 自動送りの間隔（ミリ秒）。2026-11-02 沙織さん指定で2秒
		function play() { clearInterval(timer); if (!reduce) timer = setInterval(function () { step(1); }, INTERVAL); }
		function stop() { clearInterval(timer); }

		root.addEventListener('mouseenter', stop);
		root.addEventListener('mouseleave', play);
		root.addEventListener('focusin', stop);
		root.addEventListener('focusout', play);
		dotEls.forEach(function (el, k) { el.addEventListener('click', function () { jump(k); play(); }); });
		var prev = root.querySelector('[data-prev]'), next = root.querySelector('[data-next]');
		if (prev) prev.addEventListener('click', function () { step(-1); play(); });
		if (next) next.addEventListener('click', function () { step(1); play(); });

		// スワイプ。指で動かしたときはリンクを開かない。
		var sx = null, sy = null, swiped = false;
		root.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; sy = e.touches[0].clientY; swiped = false; stop(); }, { passive: true });
		root.addEventListener('touchend', function (e) {
			if (sx === null) return;
			var dx = e.changedTouches[0].clientX - sx, dy = e.changedTouches[0].clientY - sy;
			if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) { swiped = true; step(dx < 0 ? 1 : -1); }
			sx = null; play();
		});
		track.addEventListener('click', function (e) {
			if (swiped) { e.preventDefault(); swiped = false; return; }
			// 横にのぞいている前後のスライドを押したら、そのスライドへ移動する（リンクは開かない）
			var s = e.target.closest('.kn-fc__slide');
			if (s && !s.classList.contains('is-active')) {
				e.preventDefault();
				var idx = slides.indexOf(s);
				move(function () { return idx; });
				play();
			}
		});

		// 画面外にあるときは止める（電池・CPUの節約）
		if ('IntersectionObserver' in window) {
			new IntersectionObserver(function (es) { es[0].isIntersecting ? play() : stop(); }).observe(root);
		}
		document.addEventListener('visibilitychange', function () { document.hidden ? stop() : play(); });

		var rt;
		window.addEventListener('resize', function () { clearTimeout(rt); rt = setTimeout(function () { place(false); }, 120); });
		window.addEventListener('load', function () { place(false); });
		place(false);
		play();
	}


	/* ---------- スクロールで ふわっと出す ----------
	   対象は下の SELECTOR。JSが動いたときだけ kn-rv を付けるので、JSが止まっても中身は見える。
	   同じ親の中で並んでいるもの（カードなど）は、少しずつ遅らせて順番に出す。 */
	var REVEAL = [
		'.kn-home .kn-head', '.kn-news__list li', '.kn-item', '.kn-cat', '.kn-om__text', '.kn-om__works > a',
		'.kn-post', '.kn-blog__lead', '.kn-ft-contact__in', '.kn-ft-shops .kn-head', '.kn-shop',
		'.kn-page [data-rv]', '.kn-ip [data-rv]', '.kn-ip__related .kn-head', '.kn-ip__brand .kn-head',
		'.kn-arc .kn-head', '.kn-arc__chips'
	].join(',');
	function initReveal() {
		if (!('IntersectionObserver' in window)) return;
		if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
		var els = Array.prototype.slice.call(document.querySelectorAll(REVEAL));
		if (!els.length) return;
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (en) {
				if (!en.isIntersecting) return;
				en.target.classList.add('is-in');
				io.unobserve(en.target);
			});
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
		els.forEach(function (el) {
			// すでに画面内にあるもの（読み込み直後に見えている部分）は即表示
			var r = el.getBoundingClientRect();
			if (r.top < window.innerHeight * 0.92 && r.bottom > 0) return;
			var sib = el.parentElement ? Array.prototype.indexOf.call(el.parentElement.children, el) : 0;
			el.style.transitionDelay = Math.min(sib % 4, 3) * 90 + 'ms';
			el.classList.add('kn-rv');
			io.observe(el);
		});
	}

	/* ---------- 商品ページ：バリエーション（SKU）が複数あるとき ----------
	   Welcart は SKU ごとに「名前・価格・数量・カートに入れる」を縦に並べて出す。
	   それだと、どの価格でどのボタンを押せばよいか分かりにくいので、
	   上に選択肢のカード（名前と価格）を並べ、選んだ SKU の欄だけを見せる。
	   フォーム自体は Welcart のまま（隠しているだけ）なので、カートの動きは変わらない。
	   JS が動かない環境では、今までどおり全部並んで表示される。 */
	function initVariations() {
		var form = document.querySelector('.kn-ip__form');
		if (!form) return;
		var skus = Array.prototype.slice.call(form.querySelectorAll('.skuform'));
		if (skus.length < 2) return;

		var wrap = document.createElement('div');
		wrap.className = 'kn-var';
		wrap.innerHTML = '<p class="kn-var__label">お選びください<small>（' + skus.length + '種類）</small></p>';
		var list = document.createElement('div');
		list.className = 'kn-var__list';
		list.setAttribute('role', 'radiogroup');
		wrap.appendChild(list);

		var first = -1;
		var btns = skus.map(function (sku, i) {
			var nameEl = sku.querySelector('.skuname');
			var priceEl = sku.querySelector('.kn-ip__price b');
			var img = sku.querySelector('.skuimg img');
			var sold = !!sku.querySelector('.kn-ip__soldout');
			var left = sku.querySelector('.kn-ip__alert');
			var b = document.createElement('button');
			b.type = 'button';
			b.className = 'kn-var__opt' + (sold ? ' is-sold' : '');
			b.setAttribute('role', 'radio');
			b.innerHTML =
				'<span class="kn-var__radio" aria-hidden="true"></span>' +
				(img ? '<span class="kn-var__img"><img src="' + img.currentSrc + '" alt=""></span>' : '') +
				'<span class="kn-var__name"></span>' +
				'<span class="kn-var__price"></span>';
			b.querySelector('.kn-var__name').textContent = nameEl ? nameEl.textContent.trim() : ('種類' + (i + 1));
			b.querySelector('.kn-var__price').textContent = priceEl ? priceEl.textContent.trim() : '';
			if (sold || left) {
				var st = document.createElement('small');
				st.className = 'kn-var__state';
				st.textContent = sold ? '品切れ' : left.textContent.trim();
				b.querySelector('.kn-var__name').appendChild(st);
			}
			b.addEventListener('click', function () { select(i); });
			list.appendChild(b);
			sku.classList.add('kn-var__sku');
			if (!sold && first < 0) first = i;
			return b;
		});

		function select(n) {
			skus.forEach(function (s, i) {
				var on = i === n;
				s.hidden = !on;
				btns[i].classList.toggle('is-on', on);
				btns[i].setAttribute('aria-checked', on ? 'true' : 'false');
			});
		}
		form.insertBefore(wrap, form.firstChild);
		form.classList.add('has-var');
		// カートに入れたときにエラーが出た SKU があれば、それを開いておく
		var err = -1;
		skus.forEach(function (s, i) {
			var e = s.querySelector('.error_message');
			if (err < 0 && e && e.textContent.trim()) err = i;
		});
		select(err >= 0 ? err : (first < 0 ? 0 : first));
	}

	/* ---------- 商品ページ：画面の下に固定する「カートに入れる」バー ----------
	   本物のカートボタンが画面から外れたら下から出てくる。
	   ・種類が1つの商品 → 押すとそのままカートに入る（本物のボタンを押している）
	   ・種類が複数の商品 → 押すと選択肢のところまでスクロール（選んでから入れてもらう）
	   ・品切れ → 「お問い合わせ」へスクロール */
	function initStickyCart() {
		var form = document.querySelector('.kn-ip__form');
		var buy = document.querySelector('.kn-ip__buy');
		if (!form || !buy) return;
		var skus = Array.prototype.slice.call(form.querySelectorAll('.skuform'));
		if (!skus.length) return;
		var multi = skus.length > 1;
		function current() {
			for (var i = 0; i < skus.length; i++) if (!skus[i].hidden) return skus[i];
			return skus[0];
		}
		var titleEl = document.querySelector('.kn-ip__title');
		var thumb = document.querySelector('#itemimg-main img');

		var bar = document.createElement('div');
		bar.className = 'kn-sticky';
		bar.setAttribute('aria-hidden', 'true');
		bar.innerHTML =
			'<div class="kn-sticky__in">' +
				(thumb ? '<span class="kn-sticky__img"><img src="' + (thumb.currentSrc || thumb.src) + '" alt=""></span>' : '') +
				'<span class="kn-sticky__info"><span class="kn-sticky__name"></span><span class="kn-sticky__price"></span></span>' +
				'<button type="button" class="kn-sticky__btn"></button>' +
			'</div>';
		document.body.appendChild(bar);
		var nameEl = bar.querySelector('.kn-sticky__name');
		var priceEl = bar.querySelector('.kn-sticky__price');
		var btn = bar.querySelector('.kn-sticky__btn');
		nameEl.textContent = titleEl ? titleEl.textContent.trim() : '';

		function refresh() {
			var s = current();
			var p = s.querySelector('.kn-ip__price b');
			var sold = !!s.querySelector('.kn-ip__soldout');
			var vname = multi && s.querySelector('.skuname') ? s.querySelector('.skuname').textContent.trim() : '';
			priceEl.textContent = (vname ? vname + '　' : '') + (p ? p.textContent.trim() : '');
			if (sold && !multi) btn.textContent = 'お問い合わせ';
			else if (multi) btn.textContent = '種類を選んでカートへ';
			else btn.textContent = 'カートに入れる';
		}
		refresh();
		form.addEventListener('click', function () { setTimeout(refresh, 0); });

		btn.addEventListener('click', function () {
			var s = current();
			var real = s.querySelector('.skubutton');
			if (!multi && real && !s.querySelector('.kn-ip__soldout')) {
				real.click(); // そのままカートへ
				return;
			}
			var target = multi ? form.querySelector('.kn-var') || form : (s.querySelector('.kn-ip__soldout') || form);
			var y = target.getBoundingClientRect().top + window.pageYOffset - 140;
			window.scrollTo({ top: y, behavior: 'smooth' });
		});

		// 本物のカート欄が見えているあいだは隠す
		var cartArea = form;
		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (en) {
				var show = !en[0].isIntersecting;
				bar.classList.toggle('is-show', show);
				document.body.classList.toggle('kn-has-sticky', show);
			}, { threshold: 0 });
			io.observe(cartArea);
		} else {
			bar.classList.add('is-show');
		}
	}

	/* ---------- ページの先頭へ（少しスクロールしたら出る） ---------- */
	function initToTop() {
		var b = document.querySelector('.kn-totop');
		if (!b) return;
		b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
		var on = false;
		function check() {
			var s = window.pageYOffset > 600;
			if (s !== on) { on = s; b.classList.toggle('is-show', s); }
		}
		window.addEventListener('scroll', check, { passive: true });
		check();
	}

	/* ---------- カートの点数を取り直す ----------
	   ページはロリポップ！アクセラレータにキャッシュされる（inc/kaon-speed.php）ので、
	   HTMLに書かれた点数は他の人のときのものかもしれない。admin-ajax（キャッシュされない）から取り直す。 */
	function initCartCount() {
		var els = document.querySelectorAll('[data-kn-cartn]');
		if (!els.length || !window.fetch) return;
		var run = function () {
			fetch('/wp-admin/admin-ajax.php?action=kaon_cart_count', { credentials: 'same-origin' })
				.then(function (r) { return r.json(); })
				.then(function (d) {
					var n = parseInt(d && d.n, 10) || 0;
					for (var i = 0; i < els.length; i++) { els[i].textContent = n; els[i].hidden = n <= 0; }
				})
				.catch(function () {});
		};
		if ('requestIdleCallback' in window) requestIdleCallback(run, { timeout: 2000 }); else setTimeout(run, 600);
	}

	function init() {
		initMenu();
		initCartCount();
		initToTop();
		initVariations();
		initStickyCart();
		initReveal();
		var cs = document.querySelectorAll('[data-kn-fc]');
		for (var i = 0; i < cs.length; i++) initCarousel(cs[i]);
	}
	if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
	else init();
})();
