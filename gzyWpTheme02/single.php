<?php get_header(); ?>
<div class="container maincontent">
	<?php if (have_posts()) : the_post(); update_post_caches($posts);
	?>
	<h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?></a></h3>
	<?php the_tags('标签：', ', ', ''); ?>
	<?php the_time('Y年n月j日')
	?>
	<?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
	<p>
		<a href="<?php echo get_option('home'); ?>"  >&lt;&lt; 返回首页</a>
		<a href="#commentform" class="btn float right" >发表评论</a>
	</p>
	<?php the_content(); ?>
	<a href="<?php the_permalink(); ?>">阅读全文</a>
	<div class="hr clearfix">
		&nbsp;
	</div>
	<?php comments_template(); ?>
	<?php else : ?>
	<p>
		没有找到任何文章！
	</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>