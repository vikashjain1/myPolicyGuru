$(document).ready(function(){
	if (screen.width > 960) {
      	$(window).resize(function() {
		var totalHeight = $(window).height();
		var navHeight = $(".navbar").outerHeight();
		var footerHeight = $(".footer").outerHeight();
		var leftMenuHeight = $('.leftMenuArea').outerHeight();

		$(".loginPage .leftArea").outerHeight(totalHeight-navHeight-footerHeight);
		$(".loginPage .rightArea").outerHeight(totalHeight-navHeight-footerHeight);
		$(".leftMenuArea").outerHeight(totalHeight-navHeight-footerHeight-2);
	});

	$(window).trigger('resize');
	}
	else {
	 
	}

});