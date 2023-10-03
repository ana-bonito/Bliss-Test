<?php
/**
 * The main template file
 */

?>
<?php get_header(); ?>
<div class="uk-container">
  <div class="uk-grid uk-flex-middle uk-margin-large-top ">
    <div class="uk-width-3-5@m uk-margin uk-margin-auto">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div>Posted on <?php the_time('F jS, Y') ?></div>
        <p><?php the_content(__('(more...)')); ?></p>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
