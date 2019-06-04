<?php
Namespace App;
/**
 * The Events Calendar drop-in functionality for Sage 9
 * Version: 1.0
 * Author: Michael W. Delaney
 */
/**
 * Set Sage-friendly The Events Calendar template
 */
if(class_exists('Tribe__Settings_Manager')) {
  
  // Set the The Events Calendar default template to our Sage-friendly template.
  \Tribe__Settings_Manager::set_option( 'tribeEventsTemplate', 'views/template-events.blade.php' );
  
}
/**
* Menu highlighting for The Events Calendar pages
*/
add_filter( 'nav_menu_css_class', function ($classes = array(), $menu_item = false){
    // Check if the current queried page is an event, or the events archive, and whether the current item in the filter is '/events/'
    if((is_singular('tribe_events') || is_post_type_archive('tribe_events')) && $menu_item->url == '/events/') {
        $classes[] ='current-page-ancestor';
    }
  
    // The filter also wants to highlight the "Posts" archive. Stop it from doing that.
    if((is_singular('tribe_events') || is_post_type_archive('tribe_events')) && $menu_item->url == get_post_type_archive_link( 'post' )) {
        if(($key = array_search('current_page_parent', $classes)) !== false) {
            unset($classes[$key]);
        }
      
    }
    // Return the correct classes for this menu item.
    return $classes;
  
}, 10, 2 );