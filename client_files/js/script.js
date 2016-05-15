jQuery(document).ready(function() {	

	jQuery("#mainmenu ul, #mainmenu-ide ul").css({display: "none"}); // Opera Fix
	jQuery("#mainmenu li, #mainmenu-ide li").hover(
		function(){
			jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268);
		},
		function(){
			jQuery(this).find('ul:first').css({visibility: "hidden"});
		}
	);
	jQuery("#mainmenu > li, #mainmenu-ide > li").hover(
		function(){
			jQuery(this).addClass('hovered');
		},
		function(){
			jQuery(this).removeClass('hovered');
		}
	);	

	/*
	
	jQuery('.slider-home .slides').innerfade({
		speed: 1200,
		timeout: 5000,
		type: 'sequence',
		containerheight: '352px'
	}); 
	
	jQuery('.slider-interior .slides').innerfade({
		speed: 1200,
		timeout: 5000,
		type: 'sequence',
		containerheight: '247px'
	}); 
	
	var wc = 230;
	var w1 = jQuery('.homepage-block-news .block').height();
	var w2 = jQuery('.homepage-block-lab .block').height();
	var w3 = jQuery('.homepage-block-video .block').height();
	if (w1>w2 && w1>w3) { wc = w1; }	
	if (w2>w1 && w2>w3) { wc = w2; }	
	if (w3>w1 && w3>w2) { wc = w3; }
	wc = wc - 20;
	jQuery('.homepage-block-news .block').height(wc+'px');
	jQuery('.homepage-block-lab .block').height(wc+'px');
	jQuery('.homepage-block-video .block').height(wc+'px');
	
	//if (!jQuery('.subsubmenu ul li ul li ul li:visible').length)
	//	jQuery('.subsubmenu').parent().hide();

	*/
	
});

/*

function isEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

*/
