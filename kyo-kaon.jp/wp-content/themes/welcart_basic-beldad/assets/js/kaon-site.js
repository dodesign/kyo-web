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
		function play() { clearInterval(timer); if (!reduce) timer = setInterval(function () { step(1); }, 5000); }
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

	function init() {
		initMenu();
		var cs = document.querySelectorAll('[data-kn-fc]');
		for (var i = 0; i < cs.length; i++) initCarousel(cs[i]);
	}
	if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
	else init();
})();
