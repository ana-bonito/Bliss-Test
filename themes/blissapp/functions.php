<?php
// Navigation registrations
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(array('header-menu' => __( 'Header Main Menu' )));
}

// Custom logo set Up
function bliss_custom_logo_setup() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
/*********
Filter to change logo class
the_custom_logo relies on get_custom_logo, which itself calls wp_get_attachment_image
to add the custom-logo class. The latter function has a filter,
wp_get_attachment_image_attributes which you can use to manipulate the image attributes.

The filter checks if the custom-logo class is there and if yes add more classes.
******/

add_filter( 'get_custom_logo_image_attributes', function(
	$custom_logo_attr, $custom_logo_id, $blog_id  ){
	    $custom_logo_attr['class'] = 'theme-logo';
	    return $custom_logo_attr;
	} ,10,3);

add_action( 'after_setup_theme', 'bliss_custom_logo_setup' );


//  Custom post type pagination function

function events_pagination($pages = '', $range = 4)
{
		$showitems = ($range * 2)+1;
		global $paged;
		if(empty($paged)) $paged = 1;
		if($pages == '')
		{
				global $wp_query;
				$pages = $wp_query->max_num_pages;
				if(!$pages)
				{
						$pages = 1;
				}
		}
		if(1 != $pages)
		{
				echo "<nav aria-label='Page navigation'>  <ul class='pagination'> <span>Page ".$paged." of ".$pages."</span>";
				if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
				if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
				for ($i=1; $i <= $pages; $i++)
				{
						if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
						{
								echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
						}
				}
				if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">i class='flaticon flaticon-back'></i></a></li>";
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i></a></li>";
				echo "</ul></nav>\n";
		}
}

/**
 * Custom block category
 */

function bliss_block_categories( $categories ) {
  return array_merge(
      $categories,
      array(
          array(
              'slug' => 'bliss_category', // The slug of our new category
              'title' => __( 'Bliss Custom Blocks', 'blissApp' ), // The name of our new category
              'icon'  => 'welcome-widgets-menus', // an icon choose from the https://developer.wordpress.org/resource/dashicons/#wordpress Dashicon icons
          ),
      )
  );
}
add_filter( 'block_categories', 'bliss_block_categories', 10, 2 );

// Register a Foundation based simple block
 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
      'name'              => 'bliss_slide_block', // Name of our block
      'title'             => __('Bliss App - Slider Blocks'), // Title of our block
      'description'       => __('Block made with Slick slider for manage slider.'), // Description of our block
      'render_callback'   => 'bl_block_render_callback',// Callback function ( the once that contain the template of our block )
      'category'          => 'bliss_category',// The category in which the block will be inserted
      'icon'              => ' ', // The icon associated with the block ( here i have used a custom SVG )
      //'keywords'        => array(),
  ));
  $articles = acf_register_block(array(
      'name'              => 'bliss_article_block', // Name of our block
      'title'             => __('Bliss App - Article Blocks'), // Title of our block
      'description'       => __('Block to display articles'), // Description of our block
      'render_callback'   => 'bl_block_render_callback',// Callback function ( the once that contain the template of our block )
      'category'          => 'bliss_category',// The category in which the block will be inserted
      'icon'              => ' ', // The icon associated with the block ( here i have used a custom SVG )
      //'keywords'        => array(),
  ));

}


function bl_block_render_callback( $block ) {

    // convert name ("acf/slider") into path friendly slug ("slider")
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "blocks/block" folder
    if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
        include( get_theme_file_path("/blocks/{$slug}.php") );
    }
}

// Add Feature images to posts and pages
add_theme_support('post-thumbnails', array(
	'post',
	'page',
));

function word_count($string, $limit) {

$words = explode(' ', $string);

return implode(' ', array_slice($words, 0, $limit));

}
?>
