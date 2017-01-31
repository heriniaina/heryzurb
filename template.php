<?php


/**
 * Implements template_preprocess_page
 *
 * Add convenience variables and template suggestions.
 */
function bp_preprocess_page(&$variables) {
  //custom css for the site
  $variables['heryzurb_css'] = '';
  $variables['heryzurb_css'] = theme_get_setting('heryzurb_css');
}