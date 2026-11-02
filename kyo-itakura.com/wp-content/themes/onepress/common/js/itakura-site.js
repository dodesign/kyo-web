/* kyo-itakura.com 2026-11-02 リニューアル。jQuery を使わない（素のJS）。
   ・スマホメニュー ・トップの写真の切り替え ・製品紹介の「色」「素材」のたたみ ・スクロールで出す ・ページの先頭へ */
(function () {
	'use strict';

	/* ---------- スマホメニュー ---------- */
	function initMenu() {
		var sp = document.getElementById('ki-sp');
		var btn = document.querySelector('.ki-hd__burger');
		if (!sp || !btn) return;
		function set(open) {
			sp.classList.toggle('is-open', open);
			sp.setAttribute('aria-hidden', open ? 'false' : 'true');
			btn.setAttribute('aria-expanded', open ? 'true' : 'false');
			document.documentElement.classList.toggle('ki-lock', open);
		}
		btn.addEventListener('click', function () { set(true); });
		var close = sp.querySelector('.ki-sp__close');
		if (close) close.addEventListener('click', function () { set(false); });
		sp.addEventListener('click', function (e) { if (e.target.closest('a')) set(false); });
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') set(false); });
	}

	/* ---------- トップの写真（5秒ごとに切り替え） ---------- */
	function initHero() {
		var hero = document.querySelector('[data-ki-hero]');
		if (!hero) return;
		var imgs = hero.querySelectorAll('.ki-hero__img');
		if (imgs.length < 2) return;
		if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
		var i = 0;
		setInterval(function () {
			if (document.hidden) return;
			imgs[i].classList.remove('is-on');
			i = (i + 1) % imgs.length;
			var im = imgs[i];
			if (im.loading === 'lazy') im.loading = 'eager';
			im.classList.add('is-on');
		}, 5000);
	}

	/* ---------- 製品紹介：「色」「素材」は1行だけ見せて「すべて見る」で開く ---------- */
	function initFold() {
		var rows = document.querySelectorAll('.ki-chiprow.is-fold');
		Array.prototype.forEach.call(rows, function (row) {
			var ul = row.querySelector('.ki-chips');
			if (!ul || ul.scrollHeight <= ul.clientHeight + 4) return; // 1行に収まっていれば何もしない
			var b = document.createElement('button');
			b.type = 'button';
			b.className = 'ki-chiprow__toggle';
			b.textContent = 'すべて見る';
			b.addEventListener('click', function () {
				var open = row.classList.toggle('is-open');
				b.textContent = open ? 'たたむ' : 'すべて見る';
			});
			row.appendChild(b);
			if (ul.querySelector('.is-current')) row.classList.add('is-open');
		});
	}

	/* ---------- スクロールで出す ---------- */
	function initReveal() {
		if (!('IntersectionObserver' in window)) return;
		if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
		var els = document.querySelectorAll('[data-rv], .ki-head, .ki-card, .ki-post, .ki-news li');
		var io = new IntersectionObserver(function (en) {
			en.forEach(function (e) {
				if (!e.isIntersecting) return;
				e.target.classList.add('is-in');
				io.unobserve(e.target);
			});
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
		Array.prototype.forEach.call(els, function (el) {
			var r = el.getBoundingClientRect();
			if (r.top < window.innerHeight * 0.92 && r.bottom > 0) return; // 最初から見えているものはそのまま
			var idx = el.parentElement ? Array.prototype.indexOf.call(el.parentElement.children, el) : 0;
			el.style.transitionDelay = Math.min(idx % 4, 3) * 90 + 'ms';
			el.classList.add('ki-rv');
			io.observe(el);
		});
	}

	/* ---------- ページの先頭へ ---------- */
	function initToTop() {
		var b = document.querySelector('.ki-totop');
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

	function init() {
		initMenu();
		initHero();
		initFold();
		initReveal();
		initToTop();
	}
	if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
	else init();
})();
