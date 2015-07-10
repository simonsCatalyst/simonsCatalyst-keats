<?php

/**
 * King's College London - theme/keats
 *
 * @package    theme
 * @subpackage keats
 * @copyright  2014 King's College London <http://kcl.ac.uk>
 * @copyright  2014 Catalyst IT <http://catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



/**
 * Adds the JavaScript for the colour switcher to the page.
 */

function keats_initialise_colourswitcher(moodle_page $page) {
    user_preference_allow_ajax_update('theme_keats_chosen_colour', PARAM_ALPHA);
    $page->requires->yui_module('moodle-theme_keats-colourswitcher', 'M.theme_keats.initColourSwitcher', array(array('div'=>'#colourswitcher')));
}

/**
 * Adds the JavaScript for the font switcher to the page.
 */
function keats_initialise_fontswitcher(moodle_page $page) {
    user_preference_allow_ajax_update('theme_keats_chosen_font', PARAM_ALPHA);
    $page->requires->yui_module('moodle-theme_keats-fontswitcher', 'M.theme_keats.initFontSwitcher', array(array('div'=>'#fontswitcher')));
}

/**
 * Gets the colour and font the user has selected, or the default if they have never changed
 *
 * @param string $default The default colour to use, normally defaultTheme
 * @return string The colour the user has selected
 */
function keats_get_colour($default = 'defaultTheme') {
    return get_user_preferences('theme_keats_chosen_colour', $default);
}

function keats_get_font($default='fontSmall') {
    return get_user_preferences('theme_keats_chosen_font', $default);
}

/**
 * Checks if the user is switching colours with a refresh (JS disabled)
 *
 * If they are this updates the users preference in the database
 *
 * @return bool
 */
function keats_check_colourswitch() {
    $changecolour = optional_param('keatscolour', null, PARAM_ALPHA);
    if (in_array($changecolour, array('defaultTheme','yellowTheme','orangeTheme','highvisTheme'))) {
        return set_user_preference('theme_keats_chosen_colour', $changecolour);
    }
    return false;
}

function keats_check_fontswitch() {
    $changefont = optional_param('keatsfont', null, PARAM_ALPHA);
    if (in_array($changefont, array('fontSmall','fontBig'))) {
        return set_user_preference('theme_keats_chosen_font', $changefont);
    }
    return false;
}


function keats_process_css($css, $theme) {

    // Set custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = keats_set_customcss($css, $customcss);

    return $css;
}

function keats_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}
