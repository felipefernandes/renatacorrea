<?php get_header(); ?>

<div id="menu_principal">
	<h1><a id="logotipo" href="<?php bloginfo('url'); ?>/#home">Renata Corrêa</a></h1>
	<ul>
		<li><a id="portifolio_link" href="<?php bloginfo('url'); ?>/#portifolio">portifolio</a></li>
		<li><a id="blog_link" href="<?php bloginfo('url'); ?>/#blog">blog</a></li>
	</ul>
	<div id="assinatura">
		designed and developed<br /> 
		by <a href="http://felipefernandes.nu/" target="_blank">ff.nu</a> 
	</div>
</div>

<div id="portifolio_tab" class="fechado">
	<ul>
		<li><a id="eu_sou_link" href="<?php bloginfo('url'); ?>/#eu-sou">eu sou</a></li>
		<li><a id="trabalhos_link" href="<?php bloginfo('url'); ?>/#trabalhos">trabalhos</a></li>
		<li><a id="telegrama_link" href="<?php bloginfo('url'); ?>/#telegrama">me manda<br />um telegrama</a></li>		
	</ul>
</div>

<div id="portifolio_content_tab" class="fechado">
	
	<div id="eu_sou" class="conteudo">
		<?php
			$query = new WP_Query( 'pagename=quem-e' );
			
			while( $query->have_posts() ) : $query->the_post();
			
				the_post_thumbnail( 'bio-thumb' );
				the_content();
				
			endwhile;
			wp_reset_postdata();
		?>
		
	</div><!-- #eu_sou -->
	
	<div id="trabalhos">
		<?php
			// query de posts									
			$args = array( 'post_type' => 'trabalhos' );						
			$query = new WP_Query( $args );

			// loop
			while( $query->have_posts() ) : $query->the_post();			
		?>
		<div class="job">
			<h2><?php the_title(); ?></h2>
			<h3><?php echo get_post_meta($post->ID, 'cargo', true); ?></h3>
			<?php the_post_thumbnail('trabalhos-thumb'); ?>
			<?php the_content(); ?>
			
			<div class="social">								
				<ul>
					<!--
						<li>
							<g:plusone href="<?php the_permalink(); ?>" size="medium" annotation="none"></g:plusone></li>

						<li><a href="https://twitter.com/share" class="twitter-share-button" 
							data-url="<? the_permalink(); ?>" data-text="<?php the_title(); ?>" 
							data-count="none" data-via="letrapreta">Tweet</a></li>

						<li><fb:like href="<? the_permalink(); ?>" send="false" layout="button_count" width="50" show_faces="false"></fb:like></li>
					-->
				</ul>	
						
			</div><!-- .social -->
			
		</div><!-- .job -->
		<?php
			endwhile;
			wp_reset_postdata();
		?>		
	</div>
	
	<div id="telegrama">
		<h2>Me manda <br />um telegrama...</h2>
		<span>Ah! Tempos modernos...<br />
		Acho que é mais prático me enviar<br />
		um email, né? ;)</span>		
		<p><a id="email_contato" href="mailto:contato@renatacorrea.com.br" title="Enviar email para contato@renatacorrea.com.br">contato@renatacorrea.com.br</a></p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>		
		<p><span>Você também me encontra:</span><br /><br />
			Twitter (<a href="#" target="_blank">@letrapreta</a>), no <a href="#" target="_blank">Linkedin</a>,
			no <a href="https://www.facebook.com/pages/Renata-Corr%C3%AAa/141386825961620" target="_blank">Facebook</a>, no Skype (<strong>correa.renata</strong>), 
			e no Instagram (<strong>letrapreta</strong>).
		</p>
	</div>	
	
</div>





<?php
	$totalposts = (array) wp_count_posts();
	$totalposts = $totalposts['publish'];
?>
<script type="text/javascript">

	$(document).ready(function() {		
		$.ajaxSetup({cache:false});		
		$("h2 a").live('click', function(){										 
			var post_id = $(this).attr("rel");
			$("#contentInner").fadeOut(500);
			$("#single_post").fadeOut(500).load("<?php bloginfo('url'); ?>/blog-single", {id:post_id}, function(){ 
				$("#single_post").fadeIn(500); });
			return false;
		});
				
		$(".comentarios a").live('click', function(){
			var post_id = $(this).attr("rel");
			$("#contentInner").fadeOut(500);
			$("#single_post").fadeOut(500).load("<?php bloginfo('url'); ?>/blog-single", {id:post_id}, function(){ 
				$("#single_post").fadeIn(500); });
			return false;
		});		
		
		$(".categoria a").live('click', function(){										 
			var ahref = $(this).attr("href");
			$("#contentInner").fadeOut(500);
			$("#single_post").fadeOut(500).load("<?php bloginfo('url'); ?>/?s=", {id:post_id}, function(){ 
				$("#single_post").fadeIn(500); });
			return false;
		});		
		
		
		
	});
</script>

<div id="blog_tab" class="fechado">	
	
	<div class="conteudo">
		<div id="single_post"></div>
	</div>
	
	<div id='content' class="conteudo">								
		
	    <div id='contentInner'>	
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
			
	    </div><!-- #contentInner -->	
	</div><!-- .conteudo --><!-- #content -->
</div>


<?php get_footer(); ?>