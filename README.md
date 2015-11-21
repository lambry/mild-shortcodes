#Shorts

A simple set of shortcodes.

###Main Shortcodes
* Rows/Columns
* Icons
* Buttons
* Panels
* Tabs
* Accordian
* Alignment
* Posts
* Subpages
* Restrict
* Login
* Sitemap
* Google Map
* iFrame

####Supplementary Shortcodes (handy in widgets)
* Image
* Link

If your theme already includes Font Awesome just dequeue the shorts version:
```
add_action( 'wp_print_styles', function() {
	wp_dequeue_style( 'font-awesome' ); 
});
```