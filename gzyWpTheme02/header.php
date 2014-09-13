<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			<?php
			if (is_home()) {
				bloginfo('name');
				echo " - ";
				bloginfo('description');
			} elseif (is_category()) {
				single_cat_title();
				echo " - ";
				bloginfo('name');
			} elseif (is_single() || is_page()) {
				single_post_title();
			} elseif (is_search()) {
				echo "搜索结果";
				echo " - ";
				bloginfo('name');
			} elseif (is_404()) {
				echo '页面未找到!';
			} else {
				wp_title('', true);
			}?>
		</title>
		<!-- 引入样式 -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<!--<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/plugin.css" type="text/css" media="screen" />
		<!-- 添加pingback -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<!-- 添加feed订阅 -->
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
		<!-- wp_head -->
		<!-- <?php wp_head(); ?> -->
		<!-- 小图标 -->
		<link href="<?php bloginfo('template_url'); ?>/images/favicon.ico" rel="shortcut icon" />
		<!-- 刷新缓存 -->
		<?php flush(); ?>
	</head>
<body>
	<div class="header">
		<div class="container">
			<div class="show_name">
				<a href="<?php echo get_option('home'); ?>/">
					<?php bloginfo('name'); ?>
				</a>
			</div>
			<div class="wanttobe">
				<?php bloginfo('description'); ?>
			</div>
		</div>
		<div class="nav_wrapper">
			<div class="nav_center">
				<ul class="nav clearfix">
					<li id="homenav">
						<a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">主页</a>
					</li>
				    <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
				</ul>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/plugin.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(window).scroll(function() {
				var bdScorllTop = $('body')[0].scrollTop;
				var headerWidth = $('body').width();
				//包裹.nav元素，使得在.nav设置margin-left的时候，.nav宽度和maring-left的和可以保持不变
				$('.nav_center').css({
					'width' : headerWidth * 0.75,
					'margin-left':0
				});
				if (bdScorllTop == 0) {
					$('.nav_wrapper').css({
						'width' : '75%',
						'top' : '100px',
						'left' : '12.5%'
					});
					$('.nav_wrapper').find('ul').css({
						'margin-left' : 0
					});
					$('.show_name').css({
						'font-size' : '2.8em',
						'color' : '#1b926c',
						'top' : '30px',
						'left':'13%'
					});
					$('.show_name a').css({'color' : '#1b926c'});
					$('.wanttobe').css({
						'opacity' : '1',
						'color': '#999999'
					});
				} else if (0 < bdScorllTop && bdScorllTop <= 100) {
					$('.nav_wrapper').css({
						'width' : headerWidth * 0.75 + headerWidth * 0.25 * (bdScorllTop * 0.01),
						'left' : headerWidth * 0.125 * (100 - bdScorllTop) * 0.01,
						'top' : 100 - bdScorllTop
					});
					$('.nav_wrapper').find('ul').css({
						'margin-left' : 0.20 * bdScorllTop + '%',
						// 'width':headerWidth*0.75
					});
					$('.show_name').css({
						'font-size' : 2.8 - 0.018 * bdScorllTop + 'em',
						'top' : 30 - 0.18 * bdScorllTop + 'px',
						'left':(13+(17-13)*bdScorllTop*0.01)+'%'
					});
					$('.nav_center').css({
						'margin-left':0.13 * bdScorllTop + '%'
					});
					if (bdScorllTop < 40) {
						$('.show_name a').css({
							'color' : '#1b926c'
						});
						// $('.show_name').removeClass('show_name_inner');
					} else {
						// $('.show_name').addClass('show_name_inner');
						$('.show_name').css({
							'color' : '#ffffff'
						});
						$('.show_name a').css({'color' : '#ffffff'});
						$('.wanttobe').css({
							'opacity' : 1 - (bdScorllTop - 40) / 15
						});
					}
				} else {
					$('.nav_wrapper').css({
						'position' : 'fixed',
						'top' : '0',
						'left' : '0',
						'width' : '100%'
					});
					$('.nav_wrapper').find('ul').css({
						'margin-left' : '20%'
					});
					$('.show_name').css({
						'font-size' : '1em',
						'top' : '12px',
						'left':'17%',
						'color' : '#ffffff'
					});
					$('.show_name a').css({'color' : '#ffffff'});
					$('.wanttobe').css({
						'opacity' : '1',
						'color': '#999999'
					});
					$('.nav_center').css({
					'margin-left' :'13%',
				});
				}
			});
			jQuery.gzyPugins.hoverEase("hovereasewrapper1");
			jQuery.gzyPugins.hoverEase("hovereasewrapper2");
			jQuery.gzyPugins.hoverEase("hovereasewrapper3");
			jQuery.gzyPugins.hoverEase("hovereasewrapper4");
			if($('.nav').find('li.current_page_item').length>0){
				$('.nav').find('li.current_page_item').addClass('active');
			}else{
				$('#homenav').addClass('active');
			}
			
		});
	</script>
