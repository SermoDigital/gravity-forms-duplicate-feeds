<?php

if(function_exists('add_action') && class_exists('GFAPI')) {
    // When a form is duplicated
    add_action('gform_post_form_duplicated', function($form_id, $new_id){
        // Get all the (active) feeds from the original form
        $feeds = \GFAPI::get_feeds(null, $form_id);

        // And add them to the new form
        foreach($feeds as $feed) {
            $feed_meta  = rgar($feed, 'meta');
            $addon_slug = rgar($feed, 'addon_slug');

            \GFAPI::add_feed($new_id, $feed_meta, $addon_slug);
        }
    }, 10, 2);
}
