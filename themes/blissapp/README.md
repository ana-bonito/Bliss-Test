# Worpress app Description

This is a clean, simple, and easy-to-use WordPress theme. You have the following options:

* Home page: Hero (options: image, title and link), Two custom Gutenberg Blocks, Logo slider block and article list block.
* Events page: Custom post Type with pagination. The event options: image, title, date, location, description and link
* Blog/search page: Custom search page with search form, list of articles.

## Functional and technical requirements

* Home page with header, hero, footer and two Gutenberg Blocks
* Slider Gutenberg Block, this is a logo slider will display 4 logos at same time, have the caption option, this caption will show after image.
* Articles Gutenberg Block, with option number of articles to show, max of 10. Title and description can be add by Gutenberg Paragraph and Heading blocks 
* The full article can be seen on title click
* Access to search page with article list and search form
* Access to Events page, custom post type created with pagination.

## Technologies
* Gutenberg slider made with slick.js [More Info](http://kenwheeler.github.io/slick/)
* Wordpress core functions
* Framework UI [UIKit](https://getuikit.com) - Learn more about UIkit
* Advanced Custom Fields functions [More Info](https://www.advancedcustomfields.com/resources/)

## Implement Theme

* Install WordPress
* Download the zip package of the theme and install either automatically through the WordPress Dashboard > Appearance tab, or by uploading the simple theme folder to your WordPress/wp-content/themes directory.
* Plugins: [Advanced Custom Fields](https://www.advancedcustomfields.com/) - Learn more about ACF - You can download from plugins folder
* Import ACF Json File into Advanced Custom Fields: WordPress Dashboard > ACF > Tools > Import - You can find the json file inside Plugins folder
* Create Home page: WordPress Dashboard > pages > create new > On the sidebar select template Home page
* Select Gutenberg custom Block: those blocks are inside the category "BLISS CUSTOM BLOCKS" - This blocks are just available to Home Page available
* Home page Hero WordPress Dashboard > pages > Home Page > The hero option on the sidebar  
* Create Events page: WordPress Dashboard > pages > create new > On the sidebar select template Events List template.
* Create single event: WordPress Dashboard > Events, each event created will display on the event page created.
* Create Blog/search page: WordPress Dashboard > pages > create new > On the sidebar select template Blog List template.
* Create single article: WordPress Dashboard > Posts, each article created will display on the search/blog page created.
* Insert Logo: WordPress Dashboard > Appearance > Customize. The select Site Identity and insert the logo and site icon
* Create navigation: WordPress Dashboard > Appearance > Menus. Select the created pages.
