<?php


/**
 * Implements template_preprocess_page
 *
 * Add convenience variables and template suggestions.
 */
function heryzurb_preprocess_html(&$variables) {
  //custom css for the site
  $variables['heryzurb_css'] = '';
  $variables['heryzurb_css'] = theme_get_setting('heryzurb_css');
}

/**
 * Custom search block form
 *  Magnifying glass icon used instead of 'submit button'.
 *  Use javascript to show/hide the 'search this site' prompt inside of the text field
 */
function heryzurb_preprocess_search_block_form(&$variables) {
    $prompt = t('search this site');
    $variables['search'] = array();
    $hidden = array();

    unset($variables['form']['actions']['submit']);
    unset($variables['form']['actions']['#children']);

    $variables['form']['search_block_form']['#size'] = theme_get_setting('searchbox_size');
    $variables['form']['search_block_form']['#attributes'] = array(
        'placeholder' => $prompt);

    // we should use 'render' instead of 'drupal_render' since the form is already rendered once.
    foreach (element_children($variables['form']) as $key) {
        $type = $variables['form'][$key]['#type'];
        if ($type == 'hidden' || $type == 'token') {
            $hidden[] = render($variables['form'][$key]);
        } else {
            $variables['search'][$key] = render($variables['form'][$key]);
        }
    }
    $variables['search']['hidden'] = implode($hidden);
    $variables['search_form'] = implode($variables['search']);
}
