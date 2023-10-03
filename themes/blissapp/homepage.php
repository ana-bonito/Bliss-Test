<?php
/* Template Name: Home page */
?>

<?php get_header(); ?>

<!-- Hero section code -->
	<div class="uk-cover-container uk-height-large uk-light">
		<?php if( get_field('hero') ): ?>
			<img src="<?php the_field('hero'); ?>" alt="Hero Image" uk-cover>
		<?php endif; ?>

		<?php if( get_field('hero_heading') ): ?>
			<div class="hero-content uk-width-3-4@m uk-overlay uk-overlay-primary">
				<h1><?php the_field('hero_heading'); ?> </h1>
				<?php
				$link = get_field('hero_link');
				if( $link ):
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="uk-button uk-button-secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
	</div>
	<?php endif; ?>

<!-- Page content -->
<div class="uk-container">
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>
