<?php get_header(); ?>
<!-- <div>
<img style="width:100px;height:30px;" src="<?php bloginfo('template_url'); ?>/images/screenshot.jpg" />
</div> -->
<div class="maincontent">
	<div class="container clearfix" style="position: relative">
		<div class="colum_left">
			<div class="lasted4">
				<?php if (have_posts()) : $x=0;while (have_posts() && $x<=3) :the_post();$x++;
				?>
				<ul class="content_span6">
					<div class="content_span6innerleft">
						<li class="showImg">
							<div class="hovereasewrapper" id="hovereasewrapper<?php echo $x; ?>">
								<a class="hovereaseinwrapper" href="#"></a>
								<div class="backg">
									<div class="tip_title">
										<?php the_title(); ?>
									</div>
									<img src="<?php bloginfo('template_url'); ?>/images/article<?php the_ID(); ?>.jpg" />
								</div>
								<div class="frontg">
									<h3><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?></a></h3>
									<div class="excerpt">
										<?php the_excerpt(); ?>
									</div>
									<div class="bottom_info clearfix">
										<p>
											<?php the_tags('标签：', ',', ''); ?>
										</p>
										<?php the_time('Y年n月j日'); ?>
										&nbsp;
										<?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
										<a class="pull_right" href="<?php the_permalink(); ?>">阅读全文</a>
									</div>
								</div>
							</div>
						</li>
					</div>
				</ul>
				<?php endwhile; ?>
				<?php else : ?>
				<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
				<p>
					没有找到任何文章！
				</p>
				<?php endif; ?>
				<?php rewind_posts(); ?>
			</div>
			<div class="list">
				<?php if (have_posts()) : while (have_posts()) :the_post();
				?>
				<div class="wenzhang_list">
					<h3><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
							<?php the_tags('标签：', ',', ''); ?>
						<?php the_time('Y年n月j日'); ?>
						<?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
						<a class="pull_right" href="<?php the_permalink(); ?>">阅读全文</a>
					
				</div>
				<?php endwhile; ?>
				<?php else : ?>
				<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
				<p>
					没有找到任何文章！
				</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="colum_right">
			<?php get_sidebar(); ?>
		</div>
		<span class="splitline"></span>
	</div>
</div>

<?php get_footer(); ?>