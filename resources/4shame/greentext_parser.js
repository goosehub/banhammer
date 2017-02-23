$.fn.greentext = function() {
	this.each(function() {
		$(this).html( 
			$(this).html()
				.replace(/(^|\s)&gt;(.*?)(<br( )*(\/)?( )*>|\n|$)/g,'$1<span class="greentext">>$2</span>$3')				
		);
	});
	return $(this);
};
$(".postMessage").greentext();