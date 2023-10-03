<?php
/**
 * Block Name: Bliss App - Article Blocks
 *
 * Block made with SLick slider for manage slider
 */

$id = 'bliss_block-' . $block['id']; // Create an id for every block
?>

<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$limit = get_field('display_number');

 $posts = array(
	'posts_per_page' => $limit,// query last 2 posts
	'post_type' => 'post',
	'paged' => $paged
);

?>
<div uk-grid>
    <?php

        $eventsPostQuery = new WP_Query($posts);

    	 if($eventsPostQuery->have_posts() ):

    		while($eventsPostQuery->have_posts()) :

    		$eventsPostQuery->the_post();

    		global $post;
			?>

        <div class="uk-width-1-3@m">
        <div class="uk-card uk-grid-collapse uk-margin border-color">
            <div class="uk-card-media-left uk-cover-container">
                <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php echo word_count(get_the_excerpt(), '30'); ?>
                    <div class="btn uk-margin-top"><a href="<?php the_permalink(); ?>">Read More</a></div>
                </div>
            </div>
        </div>
        </div>

  <?php endwhile;

endif;?>
</div>
