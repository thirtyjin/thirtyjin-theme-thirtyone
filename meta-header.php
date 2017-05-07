<?php 
	$post_type = get_post_type();
	$format = get_post_format(); 
?>    

		
<?php 

if ( in_array( $post_type, array('post') ) ) {
	
    // if standard post format 
	if ( (!$format) || in_array( $format, array('image', 'gallery', 'audio', 'video', 'link', 'quote', 'status') ) ) { ?>
	
	<?php $show_sep = false; ?>
			
			

			<div class="entry-title-meta ">
			
				<?php if( !is_singular() ) { ?>
				    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'thirtyone'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
				<?php } else { ?>
				    <h2 class="post-title"><?php the_title(); ?></h2>  
				<?php } ?>
				
				<div class="entry-meta">	
				
					<span class="post-format">
						<?php $post_format = get_post_format(); 
						if ( false === $post_format ) {
							$post_format = 'standard';
						}
						?>
						<a class="entry-format icon icon-format-<?php echo $post_format; ?>" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>"><?php echo get_post_format_string( $format ); ?></a>
					</span>
					    	
					<?php thirtyone_posted_on(); ?> 
					
					<!--Views.  -->
		            <span class="entry-views">
		            <a class="icon icon-viewer"><?php post_views('', ''); ?></a> 
		            </span>
		            
					<!--Comments.  -->		
					<?php if ( comments_open() ) : ?>
					<span class="entry-comments">
					<?php comments_popup_link(  __( '0', 'thirtyone' ) , __( '<b>1</b>', 'thirtyone' ), __( '<b>%</b>', 'thirtyone' ), 'icon icon-comment' ); ?></span>
					<?php endif; // End if comments_open() ?>
					
		
					<!--categories.  -->			
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( ' / ' );
						if ( $categories_list ):
					?>
					<span class="cat-links icon icon-category">
						<?php printf( "%s",  $categories_list );
						$show_sep = true; ?>
					</span>
					<?php endif; // End if categories ?>  
					
					
					<!--Like this.  -->
		            <span class="entry-likethis">
					<?php printLikes(get_the_ID()); ?> <!--Likes.  -->
		            </span>
				
				</div>  <?php // End .entry-meta?>
			
			</div> <?php // End .entry-title-meta?>
			
			

			<div class="clearfix"></div>
			
	        
	    <?php } // End. standard post foemat 
	    
	    
	    
	    elseif ( in_array( $format, array('aside') ) ) { ?>
	
			<!--BEGIN .entry-meta-->
			<footer class="entry-meta">		
					
			<?php $show_sep = false; ?>
			<?php if (  ('post' == get_post_type()) || ('portfolio' == get_post_type())  ) : // Hide category and tag text for pages on Search ?>
						
			<!--Post-date.  -->			
				<?php thirtyone_posted_on(); ?>
			            
			<!--Edit.  -->         
				<?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link icon icon-editor">', '</span>' ); ?>
			            
	            
	<?php endif; // End if 'post' == get_post_type() ?>
	            
	</footer>
	<!--END .entry-meta-->
	    
	    <?php }  // END .if ( !$format ) 
					
} // END .post type			
?>









<?php 
// post_type
if ( in_array( $post_type, array('page','portfolio','freebies','download','slideshow') ) ) { // Hide category and tag text for pages on Search ?>

	<div class="entry-title-meta ">
			
	<?php if( !is_singular() ) { ?>
	    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'thirtyone'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
	<?php } else { ?>
	    <h2 class="post-title"><?php the_title(); ?></h2>  
	<?php } ?>
	

	<!--BEGIN .entry-meta-->
	<div class="entry-meta">		
	
	<!--Post-date.  -->			
				<?php thirtyone_posted_on(); ?>
				
	<!--categories.  -->			
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( ' / ' );
					if ( $categories_list ):
				?>
				<span class="cat-links icon icon-category">
					<?php printf( "%s",  $categories_list );
					$show_sep = true; ?>
				</span>
				<?php endif; // End if categories ?>
				
				<span class="cat-links icon icon-category">
				<?php 
				//$post_type = get_post_type ();
				if ( 'portfolio' == $post_type ) {
					echo get_the_term_list($post->ID, 'project-type', '', ' / ','');
				}elseif ('freebies' == $post_type ) {
					echo get_the_term_list($post->ID, 'freebies-type', '', ' / ','');
				}elseif ('books' == $post_type ) {
					echo get_the_term_list($post->ID, 'books-type', '', ' / ','');
				}else {
					echo 'nothing';
				} ?>
				</span>
				

			
	<!--Comments.  -->		
				<?php if ( comments_open() ) : ?>
				<span class="entry-comments">
				<?php comments_popup_link(  __( '0', 'thirtyone' ) , __( '<b>1</b>', 'thirtyone' ), __( '<b>%</b>', 'thirtyone' ), 'icon icon-comment' ); ?></span>
				<?php endif; // End if comments_open() ?>

	            
	<!--Edit.  -->         
	            <?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link icon icon-editor">', '</span>' ); ?>
	         
	</div>
	<!--END .entry-meta-->   
	
	</div> <?php // End .entry-title-meta?>
	
	<div class="clearfix"></div>
	            
<?php } elseif ( in_array( $post_type, array('books') ) ) { ?>
	
		<div class="entry-title-meta ">
				
			<?php if( !is_singular() ) { ?>
		    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'thirtyone'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
			<?php } else { ?>
		    <h2 class="post-title"><?php the_title(); ?></h2>  
			<?php } ?>
		
		</div> <?php // End .entry-title-meta ?>
		
		<div class="clearfix"></div> 
<?php }
	
    