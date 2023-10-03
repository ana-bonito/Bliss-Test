<?php
/**
 * Template Name: Blog List template
 */

?>
<?php get_header(); ?>

  <?php
  $id = get_the_ID();
  $featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'ASC',
  );
  $featured_query = new WP_Query($featured_args);
  ?>

  <div class="uk-container">
    <div class="uk-grid uk-flex-middle">
      <div class="uk-width-3-5@m uk-margin uk-margin-auto">

        <form role="search" method="get" class="uk-search uk-search-large search-form uk-width-1-1" action="<?php echo home_url( '/' ); ?>">
          <div class="uk-grid uk-flex-middle">
        		<input type="search" class="uk-search-input search-field uk-width-3-4@m"
        			placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
        			value="<?php echo get_search_query() ?>" name="s"
        			title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        	   <input type="submit" class="search-submit uk-button uk-button-default uk-width-1-4@m"
        		value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
          </div>
        </form>
      </div>
    <?php if ($featured_query->have_posts()) { ?>
        <?php while($featured_query->have_posts()){ ?>
          <?php $featured_query->the_post(); ?>
          <div class="uk-width-3-5@m uk-margin uk-margin-auto skills-el" id="<?php echo $id; ?>" data-name="<?php echo $id; ?>" >
            <div class="thumb">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
            </div>
          </div>
          <div class="uk-width-3-5@m uk-margin uk-margin-auto">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
              <h1 class="blog-title"><?php echo get_the_title(); ?></h1>
              <div class="summary"><?php echo get_the_excerpt(); ?></div>
            </a>
          </div>
        <?php } ?>

    <?php } ?>
    </div>
  </div>

<?php get_footer(); ?>
