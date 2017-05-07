<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * @package Thirty_One
 * @since Thirty One 1.0
 */
?>
<?php
   $download = get_post_meta( $post->ID, 'download', true );
   $download_count = get_post_meta( $post->ID, 'download_count', true );
?>

   <article id="download-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
           <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Download %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title( '', ' <span>&rarr;</span>' ); ?></a></h1>

           <div class="entry-meta">
              <?php
                  $show_sep = false;

                  if ( ! empty( $download['postid'] ) )
                     $show_sep = '<span class="sep">|</span>';

                  // Get the download categories                                        
                  echo get_the_term_list( $post->ID, 'download-categories', 'Type: ', ' ', $show_sep );

                  // Get the associated post
                  if ( ! empty( $download['postid'] ) )
                     echo '<a href="' . get_permalink( $download['postid'] ) . '" title="Read the post ' . get_the_title( $download['postid'] ) . '">Read the post</a>';
              ?>
           </div><!-- .entry-meta -->

           <?php
                  if ( has_post_thumbnail() )
                     the_post_thumbnail();
           ?>
        </header>

        <div class="download-description">
           <?php echo $post->post_excerpt; // We can't use the_excerpt because some themes has a "Read More..." link ?>
        </div>

        <footer class="entry-meta">
           <a href="<?php the_permalink(); ?>" class="download-btn" target="_blank">Download "<?php the_title(); ?>"</a>
           <span class="download-count">Downloaded <?php echo number_format( $download_count ); ?> times</span>
        </footer><!--.entry-meta-->

   </article><!-- #download-<?php the_ID(); ?> -->
