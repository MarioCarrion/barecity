<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
	 <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div class="meta"><?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: '), ', ', ' &#8212; '); ?> @ <?php the_time() ?> <?php edit_post_link(__('Edit This')); ?></div>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>

  <?php 
    // This sections needs the patched "URL Shortener 1.7"
    // http://github.com/mariocarrion/url-shortener
    $shorten_url = fts_show_shorturl($post);
    if ($shorten_url != ""):
  ?> 
	<div class="shortenurl">
	Shorten URL: <a href="<?php echo $shorten_url; ?>"><?php echo $shorten_url; ?><img src="<?php bloginfo('stylesheet_directory'); ?>/shortcut-icon.png" alt="shorten url" /></a>
	</div>

  <?php endif; ?>

	<div class="feedback">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>

<?php get_footer(); ?>
