$(document).ready(function () {

	var winWidth = $("iframe.video").width();
	var winHeight = winWidth/1.777778	
	
	$("iframe.video").css("height", winHeight);
	
});

$(window).resize(function () {

	var winWidth = $("iframe.video").width();
	var winHeight = winWidth/1.777778	
	
	$("iframe.video").css("height", winHeight);
	
});