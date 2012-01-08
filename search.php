<script>
	$(document).ready(function() {
		$('#voltar a').live('click', function() {
			$('#single_post').fadeOut(500, function() {
				$('#contentInner').fadeIn(500)
			});
		});	
	});
</script>

<?php
	// query de posts									
	if (have_posts()) :
					
	$count = 0;
	$total = count($posts);			

	// loop				
	while (have_posts()) : the_post();					
?>				
<div class="post">
	
	<a href="#<?php echo the_slug(); ?>"></a>				
	<h2><a href="<?php bloginfo('url'); ?>/#blog/<?php echo the_slug(); ?>" rel="<?php the_ID(); ?>"><?php the_title(); ?></a></h2>
	<div class="post_infos">
		<span class="categoria"><?php the_category(', '); ?></span>
		<span class="data"><?php the_time(__('dMy')); ?></span>
	</div>

	<div class="entry">
		<?php the_content(); ?>
	</div>			
	<div class="post_footer">
		<div class="tags"><?php the_tags('tags: ', ', '); ?></div>
		<div class="comentarios"><a href="#blog/<?php echo the_slug(); ?>/#respond" rel="<?php the_ID(); ?>"><?php comments_number( 'comente', '1 comentário', '% comentários' ); ?></a></div>
	</div>						

</div><!-- .post -->	

<?php 
	endwhile; 
	endif;
?>

<div id='postPagination'>
	<span style="float:left"><?php next_posts_link('&laquo; Antigos') ?></span>
	<span style="float:right"><?php previous_posts_link('Novos &raquo;') ?></span>	
</div>				
				
<?php wp_reset_postdata(); ?>	
		

