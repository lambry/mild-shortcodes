#Shorts

A simple set of shortcodes.

###Main Shortcodes
* Rows/Columns
* Icons
* Buttons
* Panels
* Tabs
* Accordian
* Popup
* Alignment
* Posts
* Meta
* Subpages
* Restrict
* Login
* Sitemap
* Google Map
* iFrame

####Supplementary Shortcodes (handy in widgets)
* Image
* Link

If your theme already includes Font Awesome or Magnific Popup just dequeue the shorts versions:
```
add_action( 'wp_print_styles', function() {
    wp_dequeue_style( 'font-awesome' ); 
    wp_dequeue_style( 'magnific-popup-css' ); 
    wp_dequeue_script( 'magnific-popup-js' ); 
});
```