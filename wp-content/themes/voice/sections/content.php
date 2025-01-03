<article id="post-<?php the_ID(); ?>" <?php post_class( 'vce-single' ); ?>>

	<?php if ( !vce_use_cover_fimg() ) : ?>
		<header class="entry-header">
			<?php if ( vce_get_post_display( 'show_cat' ) ) : ?>
				<span class="meta-category"><?php echo vce_get_category(); ?></span>
			<?php endif; ?>

			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php if (get_the_category()[0]->term_id != 1) {  ?>
				<div class="entry-meta"><?php echo vce_get_meta_data('single'); ?></div>
			<?php } ?>
		</header>
	<?php endif;?>

	<?php if ( vce_is_paginated_post() ) : global $page; ?>
		<?php if ( vce_get_option( 'show_paginated' ) == 'above' ) : ?>
			<?php get_template_part( 'sections/paginated-nav' ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php get_template_part('sections/ads/below-single-header'); ?>

		<?php if ( vce_get_post_display( 'show_fimg' ) && has_post_thumbnail() && !vce_use_cover_fimg() ) : ?>
			<?php if ( !vce_is_paginated_post() || ( vce_is_paginated_post() && vce_get_option( 'show_paginated_fimg' ) ) && $page <= 1 ) : ?>

			 	<?php global $vce_sidebar_opts; $img_size = $vce_sidebar_opts['use_sidebar'] == 'none' ? 'vce-lay-a-nosid' : 'vce-lay-a'; ?>

			 	<div class="meta-image">
					<?php the_post_thumbnail( $img_size ); ?>

					<?php if ( vce_get_option( 'show_fimg_cap' ) && $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
						<div class="vce-photo-caption"><?php echo $caption;  ?></div>
					<?php endif; ?>
				</div>

				<?php if ( vce_get_post_display( 'show_author_img' ) ) : ?>
					<div class="meta-author">
					
						<?php if( voice_is_co_authors_active() && $coauthors_meta = get_coauthors() ) : ?>
							<?php $temp = ''; ?>
							<?php foreach ($coauthors_meta as $i => $key ) : ?>
								<div class="meta-author-img">
								<?php echo get_avatar( $key->user_email, 100 ); ?>
								</div>
								 <?php 
								 	$separator = $i != (count($coauthors_meta) - 1) ? ', ' : '';
									$temp .= 
										'<span class="vcard author">
											<span class="fn">
												<a href="'.  esc_url( get_author_posts_url( $key->ID, $key->user_nicename ) ) .'">'.  $key->display_name .'</a>'.$separator.'
											</span>
										</span>'
								  ?>
								
							<?php endforeach; ?>
							<div class="meta-author-wrapped"><?php echo __vce( 'written_by' ); ?>
								<?php echo $temp; ?>
							</div>

						<?php else : ?>

							<div class="meta-author-img">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
							</div>
							<div class="meta-author-wrapped"><?php echo __vce( 'written_by' ); ?> <span class="vcard author"><span class="fn"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a></span></span>
							</div>

						<?php endif; ?>

				    </div>
				<?php endif; ?>

			<?php endif; ?>
		<?php endif; ?>

	    <?php if ( vce_get_post_display( 'show_headline' ) && has_excerpt() ) : ?>
	    	<?php if ( !vce_is_paginated_post() || ( vce_is_paginated_post() && vce_get_option( 'show_paginated_headline' ) ) && $page <= 1 ) : ?>
			    <div class="entry-headline">
			    	<?php the_excerpt(); ?>
			    </div>
			<?php endif; ?>
	    <?php endif; ?>

	<?php get_template_part('sections/ads/above-single'); ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<ins class="adsbygoogle"
     	data-ad-client="ca-pub-2721372160560428"
     	data-full-width-responsive="true"></ins>

	<?php if ( vce_is_paginated_post() && vce_get_option( 'show_paginated' ) == 'below' ) : ?>
		<?php get_template_part( 'sections/paginated-nav' ); ?>
	<?php endif; ?>

	<?php if ( vce_get_post_display( 'show_tags' ) ) : ?>
		<footer class="entry-footer">
			<div class="meta-tags">
				<?php the_tags( false, ' ', false ); ?>
			</div>
		</footer>
	<?php endif; ?>

	<?php if ( vce_get_option( 'show_share' ) ) : ?>
	  	<?php get_template_part( 'sections/share-bar' ); ?>
	<?php endif; ?>

	 <?php get_template_part('sections/ads/below-single'); ?>

</article>