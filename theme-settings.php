<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function heryzurb_form_system_theme_settings_alter(&$form, &$form_state)
{
    if (!isset($form['heryzurb'])) {
        $form['heryzurb'] = array(
            '#type' => 'vertical_tabs',
            '#weight' => -10,
        );
        $jquery_version = variable_get('jquery_update_jquery_version', '1.5');

        if (!module_exists('jquery_update') || !version_compare($jquery_version, '1.7', '>=')) {
            drupal_set_message(t('!module was not found, or your version of jQuery does not meet the minimum version requirement. Zurb Foundation requires jQuery 1.7 or higher. Please install !module, or Zurb Foundation plugins may not work correctly.',
                array(
                    '!module' => l('jQuery Update', 'https://drupal.org/project/jquery_update', array('external' => TRUE, 'attributes' => array('target' => '_blank'))),
                )
            ), 'warning', FALSE);
        }

        /*
         * General Settings.
         */
        $form['heryzurb']['general'] = array(
            '#type' => 'fieldset',
            '#title' => t('General Settings'),
        );

        $form['heryzurb']['general']['heryzurb_css'] = array(
            '#type' => 'textarea',
            '#title' => t('CSS style'),
            '#description' => t('Write your own css style here.'),
            '#default_value' => theme_get_setting('heryzurb_css'),

        );

    }
}
