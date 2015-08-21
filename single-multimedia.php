<?php get_header(); ?>
<div class="hline hline-medium"></div>
<main class="row">
	<?php while ( have_posts() ) : the_post(); ?>
	<main class="main">
			<?php echo embed_mm_content(get_the_ID()); ?>
	</main>
	
	<sidebar class="sidebar">
		<h1><?php the_title(); ?></h1>
		<p class="metatext metatext-byline">
			By <?php the_author_posts_link(); ?> / <a href="<?php the_archive_date(); ?>"><?php the_time('F j, Y'); ?></a>
		</p>
		<p class="excerpt"><?php get_excerpt(500); ?></p>
	</sidebar>
	<?php endwhile; ?>
</main>

<div class="hline hline-medium"></div>
<section class="row">
	<main class="main vline-medium">
		
		<?php $displays = array('video' => 'videos','gallery' => 'galleries','audio' => 'audio');?>
		<?php $format  = get_post_format(get_the_ID());?>
		<?php $args = array( 'posts_per_page' => 12, 'cat' => $multimedia, 'tax_query' => array(array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array('post-format-'.$format)
			))); ?>
		<?php $myposts = new WP_Query( $args ); ?>
		
		<h6>more <?php echo $displays[$format];?></h6>
		<?php while( $myposts->have_posts() ): ?>
		<?php $myposts->the_post();?>
		<div class="vmedia col-1-3" data-mh="thumbnails">
			<figure class="thumbnail thumbnail-small hovertext-container">
					<?php if ( has_post_thumbnail()) {the_post_thumbnail('medium');} ?>
					<div class="hovertext hovertext-small">
						<img src="<?php echo get_template_directory_uri(); ?>	/images/playsmall.png"/>
				</a>
			</figure>
			<div class="block">
				<h5 id="post-<?php the_ID(); ?>" class="slideTitle">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</h5>
			</div>
		</div>
		<?php endwhile;?>
		
	</main>
	
	<sidebar class="sidebar">
		<h6>play next</h6>
		<?php $args = array( 'posts_per_page' => 6, 'cat' => $multimedia ) ?>
		<?php $myposts = new WP_Query( $args ); ?>
		<?php while ( $myposts->have_posts() ) : ?>
		<?php $myposts->the_post(); ?>
		<?php $format  = get_post_format(get_the_ID())?>
		<article class="hmedia hmedia-list">
			<figure class="thumbnail thumbnail-xsmall">
				<?php if ( has_post_thumbnail()) {the_post_thumbnail('thumbnail');} ?>
			</figure>
			
			<div class="block">
				<div class="articletype small-text"><?php echo $format ?></div>
				<h5 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</h5>
			</div>
		</article>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</sidebar>
</section>

<div class="hline hline-medium"></div>
<section class="row">
	<section class="main">
		<?php comments_template(); ?>
	</section>
</section>
<div class="hline hline-medium"></div>

<?php get_footer(); ?>