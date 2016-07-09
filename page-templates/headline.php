<?php
/*
Template Name: headline
*/
?>

<?php get_header(); ?>

<header class="row">
	<div class="full-width">
		<img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" class="home-logo" alt="The Statesman" width="700" />
		<div class="tagline">
			<?php bloginfo('description'); ?>
		</div>
	</div>
</header>

<main>
	<div class="full-width">
		<div class="hline hline-strong"></div>
	</div>

	<section class="row">
		<?php while ( have_posts() ) : the_post(); ?>
	    <?php the_content(); ?>
	  <?php endwhile; ?>
	</section>

	<div class="full-width">
		<div class="hline hline-strong"></div>
	</div>

	<section class="row">

		<?php $args = array( 'posts_per_page' => 8, 'category__not_in' => array($opinions, $multimedia, $featured) ); ?>
		<?php $myposts = new WP_Query( $args ); ?>
		<main class="main">
			<?php if ( $myposts->have_posts() ) : ?>
			<h6>Latest Stories</h6>
			<?php while ( $myposts->have_posts() ) : ?>
			<?php $myposts->the_post(); ?>
			<article class="hmedia hmedia-list">
				<figure class="thumbnail thumbnail-large">
					<div class="imagewrapper">
						<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>
					</div>
				</figure>
				<div class="block">
					<p class="articletype small-text"><?php the_excluded_category(array($featured, $top_story)); ?></p>
					<h2 id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h2>
					<p class="metatext metatext-byline small-text">By <?php the_author_posts_link(); ?> / <a href="<?php the_archive_date(); ?>"><?php the_time('F j, Y'); ?></a></p>
					<p class="excerpt"><?php get_excerpt(); ?></p>
				</div>
			</article>
			<?php endwhile; ?>
			<?php endif; ?>
		</main>

		<sidebar class="sidebar">
			<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
      	<?php dynamic_sidebar( 'home-sidebar' ); ?>
  		<?php endif; ?>
		</sidebar>

	</section>

	<div class="full-width">
		<div class="hline hline-medium"></div>
	</div>

	<?php $sections = array( $news, $arts, $opinions, $sports ); ?>
	<section class="row">
		<?php foreach ( $sections as $section): ?>
			<?php $args = array( 'posts_per_page' => 3, 'cat' => $section); ?>
			<?php $myposts = new WP_Query( $args ); ?>
			<?php if ( $myposts->have_posts() ) : ?>
			<div class="fourcolumn vspace">
				<h6>
					<a href="<?php echo esc_url(get_category_link($section)); ?>">
						<?php echo get_cat_name($section); ?>
					</a>
				</h6>
				<?php $myposts->the_post(); ?>
				<figure class="thumbnail">
					<div class="imagewrapper">
						<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>
					</div>
				</figure>
				<p id="post-<?php the_ID(); ?>" class="metatext metatext-dark">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</p>
				<?php while ( $myposts->have_posts() ) : ?>
				<?php $myposts->the_post(); ?>
				<p id="post-<?php the_ID(); ?>" class="metatext metatext-dark">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</p>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</section>

	<div class="full-width">
		<div class="hline hline-strong"></div>
	</div>

	<section class="row">
		<div class="threecolumn vline-medium center">
			<h6>Issue Archive</h6>
			<a href="http://issuu.com/sbstatesman"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt="The Statesman" width="268" /></a>
		</div>
		<div class="threecolumn vline-medium center">
			<h6>Podcast</h6>
			<a href="https://itunes.apple.com/us/podcast/the-statesman/id1033005149"><img src="<?php bloginfo( 'template_url' ); ?>/images/itunes.png" alt="Download on iTunes" width="200" /></a>
		</div>
		<div class="threecolumn center">
			<h6>Social Media</h6>
			<div class="iconbar iconbar-social">
				<a href="http://facebook.com/sbstatesman"><i class="fa fa-facebook fa-4x"></i></a>
				<a href="http://twitter.com/sbstatesman"><i class="fa fa-twitter fa-4x"></i></a>
				<a href="http://instagram.com/sbstatesman"><i class="fa fa-instagram fa-4x"></i></a>
				<a href="http://vimeo.com/sbstatesman"><i class="fa fa-vimeo fa-4x"></i></a>
			</div>
		</div>
	</section>

	<div class="full-width">
		<div class="hline hline-strong"></div>
	</div>
</main>

<?php get_footer(); ?>
