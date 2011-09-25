<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="main_content" class="grid_8">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="post_nav">
					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
</div> 
 <div id="post">
					<h1 id="single_post"><?php the_title(); ?></h1>

						<?php twentyten_posted_on(); ?>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
							</a>
<?php endif; ?>

<div id="extra">
						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
</div>

<div id="post_nav">
				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
</div>

<hr id="single_post">
<div id="comments">
				<?php comments_template( '', true ); ?>
</div>

<?php endwhile; // end of the loop. ?>
</div>
</div>

<div id="sidebar" class="grid_4">
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>