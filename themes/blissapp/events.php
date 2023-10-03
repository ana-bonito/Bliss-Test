<?php
/* Template Name: Events List template */
?>

<?php get_header(); ?>

<?php
// Events Custom Query

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


 $args = array(
	'posts_per_page' => 2,// query last 2 posts
	'post_type' => 'event',
  'order'          => 'ASC',
	'paged' => $paged
);
?>
<div class="uk-container">
  <div class="uk-grid uk-flex-between@m uk-flex-middle">
  <?php
  $eventsPostQuery = new WP_Query($args);

  		 if($eventsPostQuery->have_posts() ):

  			while($eventsPostQuery->have_posts()) :

  			$eventsPostQuery->the_post();

  			global $post;
  			 ?>
  		 <div class="uk-width-1-2@m uk-margin-large-top uk-margin-large-bottom">
  			 <div class="uk-card uk-card-default">
  			    <div class="uk-card-header">
  			        <div class="uk-grid-small uk-flex-middle" uk-grid>
  			            <div class="uk-width-auto">
                      <?php $image = get_field('event_image');
                      if( !empty( $image ) ): ?>
                          <img  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                      <?php endif; ?>
  			            </div>
  			            <div class="uk-width-expand">
  			                <h3 class="uk-card-title uk-margin-remove-bottom"><?php the_title(); ?></h3>
  			                <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00"><?php the_field('event_date'); ?></time></p>
  			            </div>
  			        </div>
  			    </div>
  			    <div class="uk-card-body">
                <p>Location: <?php the_field('event_location'); ?></p>
                <h4 class="uk-margin-remove-top">Description</h4>
                <?php echo word_count(get_the_excerpt(), '30'); ?>
  			    </div>
  			    <div class="uk-card-footer">
  			        <a href="#" class="uk-button uk-button-text">Read more</a>
  			    </div>
  			</div>
  		</div>

  		 <?php endwhile;

  	 endif;?>
  			</div>
			<?php
			// Pagination
			wp_reset_query();

			if (function_exists("events_pagination")) {

		   events_pagination($eventsPostQuery->max_num_pages);

			}
	?>
</div>
<?php get_footer(); ?>
