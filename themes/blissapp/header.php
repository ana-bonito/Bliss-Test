
<?php
/**
 * The header
 */
?>
<html>
<head>
<title>Bliss APP</title>

</script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/assets/css/uikit.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/assets/css/slick.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/assets/css/slick-theme.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/style.css'; ?>">
</head>

<body>
<div id="main-header" class="main-header">

	    <!-- Main Navbar -->
	    <nav class="uk-navbar-container">
		    <div class="uk-container">
					<div uk-navbar>
		        <div class="uk-navbar-left">
								<?php if ( function_exists( 'the_custom_logo' ) ) {
											the_custom_logo();
									}
								?>
		        </div>
		        <div class="uk-navbar-right">
							<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
									<?php
									wp_nav_menu(
										array(
											'theme_location'  => 'header-menu',
											'menu_class'      => 'menu-wrapper',
											'container_class' => 'primary-menu-container',
											'items_wrap'      => '<ul class="uk-navbar-nav uk-visible@s">%3$s</ul>',
											'fallback_cb'     => false,
										)
									);
			    			?>
		            <a href="#" class="uk-navbar-toggle uk-hidden@s" uk-navbar-toggle-icon uk-toggle="target: #sidenav"></a>
								<a class="uk-navbar-toggle" href="/blog/" uk-search-icon uk-toggle></a>
		        </div>
					</div>
				</div>
	    </nav>

	<div id="sidenav" uk-offcanvas="flip: true" class="uk-offcanvas">
	    <div class="uk-offcanvas-bar">
				<button class="uk-offcanvas-close" type="button" uk-close></button>
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'menu_class'      => 'menu-wrapper',
							'container_class' => 'primary-menu-container',
							'items_wrap'      => '<ul class="uk-nav">%3$s</ul>',
							'fallback_cb'     => false,
						)
					);
				?>
	    </div>
	</div>

	<?php endif; ?>
</div>
