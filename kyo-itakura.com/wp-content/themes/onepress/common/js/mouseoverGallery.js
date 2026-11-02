/*
Mouseover Gallery
Author: KEITA HIRAI
URL: keitahirai.net
*/

$(function() {
	$("#inner-gallery a").attr("target", "_blank");
	$("#inner-gallery-thumb li:first").addClass("active");

	var over = ("ontouchstart" in document) ? "touchstart" : "mouseover";
	$("#inner-gallery-thumb li").on(over, function() {
		$($(this).find("a").attr("href")).prependTo("#inner-gallery");

		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		return false;
	})

	$("#inner-gallery-thumb a").click(function() {
		return false;
	});
});