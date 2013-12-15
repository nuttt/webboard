$(window).load(function(){
	$('.coupon-list .item').each(function( index ) {
		button = $(this).children('.button');
		entry = $(this).children('.entry');
		itemWidth = $(this).width();
		btnWidth = button.width();
		entry.css('width', (itemWidth-btnWidth-10)+'px');
		entryHeight = entry.height();
		button.css('height', (entryHeight-(entryHeight/2-18))+'px');
		button.css('margin-top', (entryHeight/2-18)+'px');
	});
});