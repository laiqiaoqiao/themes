(function($) {
	jQuery.gzyPugins = {
		slideBox : {
			slideTime : 1000,
			init : function() {
				_this = this;
				$('.goPre').bind('click', function() {
					_this.goPre();
				});
				$('.goNext').bind('click', function() {
					_this.goNext();
				});
			},
			goNext : function() {
				_this = this;
				$('.goPre').unbind();
				$('.goNext').unbind();
				var slideBoxObj = $('.sliderbox');
				var currentItemIndex = slideBoxObj.find('.items .active').index() + 1;
				var itemLength = slideBoxObj.find('.items').find('div').length;
				var nextItemIndex = currentItemIndex + 1;
				if (nextItemIndex > itemLength) {
					nextItemIndex = 1;
				}
				slideBoxObj.find('.items').find('.item' + nextItemIndex).css({
					'left' : '960px',
					'top' : '0px'
				});
				slideBoxObj.find('.items .active').stop().animate({
					'left' : '-960px'
				}, _this.slideTime, function() {
					slideBoxObj.find('.items .active').removeClass('active');
					slideBoxObj.find('.items').find('.item' + nextItemIndex).addClass('active');
					_this.init();
				});
				slideBoxObj.find('.items').find('.item' + nextItemIndex).stop().animate({
					'left' : '0px'
				}, _this.slideTime);
			},
			goPre : function() {
				_this = this;
				$('.goPre').unbind();
				$('.goNext').unbind();
				var slideBoxObj = $('.sliderbox');
				var currentItemIndex = slideBoxObj.find('.items .active').index() + 1;
				var itemLength = slideBoxObj.find('.items').find('div').length;
				var nextItemIndex = currentItemIndex - 1;
				if (nextItemIndex <= 0) {
					nextItemIndex = itemLength;
				}
				slideBoxObj.find('.items').find('.item' + nextItemIndex).css({
					'left' : '-960px',
					'top' : '0px'
				});
				slideBoxObj.find('.items .active').stop().animate({
					'left' : '960px'
				}, _this.slideTime, function() {
					slideBoxObj.find('.items .active').removeClass('active');
					slideBoxObj.find('.items').find('.item' + nextItemIndex).addClass('active');
					_this.init();
				});
				slideBoxObj.find('.items').find('.item' + nextItemIndex).stop().animate({
					'left' : '0px'
				}, _this.slideTime);
			}
		}
	}
})(jQuery);
/**
 *hover上下左右效果
 * autor guozhenyao
 *  */
(function($) {
	jQuery.gzyPugins.hoverEase = function(id) {
		$("#" + id).bind("mouseenter mouseleave", function(e) {
			var _this = $(this);
			var w = $(this).width();
			var h = $(this).height();
			var x = (e.pageX - this.offsetLeft - (w / 2)) * (w > h ? (h / w) : 1);
			var y = (e.pageY - this.offsetTop - (h / 2)) * (h > w ? (w / h) : 1);
			var direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;
			//0123 上右下左
			var eventType = e.type;
			if (e.type == 'mouseenter') {
				// if (direction == 0) {
					// _this.find('.frontg').css({
						// "display" : "block",
						// "left" : "0%",
						// "top" : "-100%"
					// });
				// } else if (direction == 1) {
					// _this.find('.frontg').css({
						// "display" : "block",
						// "left" : "100%",
						// "top" : "0%"
					// });
				// } else if (direction == 2) {
					// _this.find('.frontg').css({
						// "display" : "block",
						// "left" : "0%",
						// "top" : "100%"
					// });
				// } else if (direction == 3) {
					// _this.find('.frontg').css({
						// "display" : "block",
						// "left" : "-100%",
						// "top" : "0%"
					// });
				// }
				_this.find('.frontg').css({
						"display" : "block",
						"left" : "0%",
						"top" : "100%"
					});
				_this.find('.frontg').stop();
				_this.find('.frontg').animate({
					"display" : "block",
					"left" : "0%",
					"top" : "0%"
				}, 200);
			} else {
				_this.find('.frontg').stop();
				_this.find('.frontg').animate({
						"display" : "block",
						"left" : "0%",
						"top" : "100%"
					}, 200);
				// if (direction == 0) {
					// _this.find('.frontg').animate({
						// "display" : "block",
						// "left" : "0%",
						// "top" : "-100%"
					// }, 200);
				// } else if (direction == 1) {
					// _this.find('.frontg').animate({
						// "display" : "block",
						// "left" : "100%",
						// "top" : "0%"
					// }, 200);
				// } else if (direction == 2) {
					// _this.find('.frontg').animate({
						// "display" : "block",
						// "left" : "0%",
						// "top" : "100%"
					// }, 200);
				// } else if (direction == 3) {
					// _this.find('.frontg').animate({
						// "display" : "block",
						// "left" : "-100%",
						// "top" : "0%"
					// }, 200);
				// }
			}
		});
	}
})(jQuery);

(function($) {
	$.fn.gotop = function(id) {
		var _this = $('#'+id);
		
		$('#'+id).bind('click',function(){
			window.scroll(0,0);
		});
		$.fn.gotop.scrollHeight(id);
	}
	$.fn.gotop.scrollHeight = function(id){
		var _this = $('#'+id);
		var toppx = _this.css('top');
		var topintstr = toppx.split('px');
		var topint  = parseInt(topintstr[0]);
		$(window).scroll(function(){
			if($(window).scrollTop()>300){
				_this.show();
				// _this.fadeOut(1000);
				var scorllTopNum = $(window).scrollTop();
				// $('.SonlineBox').css('top',topint+scorllTopNum);
				_this.stop(true,false).delay(200).animate({top:topint+scorllTopNum},'slow');
			}else{
				_this.hide();
				// _this.fadeIn(1000);
			}
		});
	}
})(jQuery);