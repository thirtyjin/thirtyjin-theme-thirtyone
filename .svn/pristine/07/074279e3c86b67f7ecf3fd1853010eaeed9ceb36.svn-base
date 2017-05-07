<?php 
	$post_type = get_post_type();
	$format = get_post_format(); 
?>    

		
<?php 

if ( in_array( $post_type, array('post','page','portfolio','freebies','books','download','slideshow') ) ) {
	
    // if standard post format 
//if ( (!$format) || in_array( $format, array('image', 'gallery', 'audio', 'video', 'link', 'quote', 'status', 'aside') ) ) { ?>
	
	<?php $show_sep = false; ?>
				
    <footer class="entry-meta">
    
    	<!--tags.  -->			
        <?php
            /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '<a class="icon icon-tag">', ' / ', '</a>' );
        if ( $tags_list ): ?>
		        <span class="tag-links"><?php printf( "%s",  $tags_list ); $show_sep = true; ?></span>
        <?php endif; // End if $tags_list ?>       
            
		<!--Edit.  -->         
		<?php edit_post_link( __( 'Edit', 'thirtyone' ), '<span class="edit-link icon icon-editor">', '</span>' ); ?>
				
    
        
    </footer>  <?php // End .entry-meta?>
    
    <div class="clearfix"></div>
			
<?php //}   // END .if ( !$format ) 
					
} // END .post type			
?>


