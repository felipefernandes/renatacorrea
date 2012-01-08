<?php
/*
Template Name: Blog Single
*/
?>
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
	$post = get_post($_POST['id']);
?>
<?php if ($post) : ?>
	<?php setup_postdata($post); ?>		
	<div class="post">
		<h2><?php the_title(); ?></h2>
		<div class="post_infos">
			<span class="categoria"><?php the_category(', '); ?></span>
			<span class="data"><?php the_time(__('dMy')); ?></span>
		</div>

		<div class="entry">
			<?php the_content(); ?>
		</div>			
		
		<div class="post_footer">
			<div class="tags"><?php the_tags('tags: ', ', '); ?></div>
			<div class="comentarios">
				<a href="#respond"><?php comments_number( 'comente', '1 comentário', '% comentários' ); ?></a>
			</div><!-- .comentarios -->			
		</div>						
		
		<?php if ( comments_open() && ! post_password_required() ) : ?>
		<div class="comments-link">		
			
		<?php comments_template(); ?> 
			
		</div>
		<?php endif; ?>
		
		<div id="voltar">
			<a href="#blog">Voltar para lista de posts</a>
		</div>

	</div><!-- .post -->	
	
<?php endif; ?>


