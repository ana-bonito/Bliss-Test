<?php
/**
 * Block Name: Bliss App - Slider Blocks
 *
 * Block made with SLick slider for manage slider
 */

$id = 'bliss_block-' . $block['id']; // Create an id for every block
?>

<section id="<?php echo $id; ?>" class="grid-container block__slide full">
    <div class="uk-container" >
        <div class="uk-margin-large-top uk-margin-large-bottom row">
        <?php if ( have_rows('slider') ) : ?>

            <?php while( have_rows('slider') ) : the_row(); ?>

            <div class="cell block__slide  small-12 medium-4">

                            <?php
            $image = get_sub_field('img');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>

            <?php if ( get_sub_field('caption_text') ) : ?>
                    <p class="slide caption"><?php echo get_sub_field('caption_text'); ?></p>
            <?php endif; ?>
            </div>

            <?php endwhile; ?>

        <?php endif; ?>
    </div>
</section>
