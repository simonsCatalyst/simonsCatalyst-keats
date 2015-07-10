<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * King's College London - theme/keats
 *
 * @package    theme
 * @subpackage keats
 * @copyright  2014 King's College London <http://kcl.ac.uk>
 * @copyright  2014 Catalyst IT <http://catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hasheader = (empty($PAGE->layout_options['noheader']));

$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$hastopcontent = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));


$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$isfrontpage = $PAGE->bodyid == "page-site-index";

$hastitledate = (!empty($PAGE->theme->settings->titledate));
$hasemailurl = (!empty($PAGE->theme->settings->emailurl));

$hasgeneralalert = (!empty($PAGE->theme->settings->generalalert));
$hassnowalert = (!empty($PAGE->theme->settings->snowalert));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$hashidemenu = (!empty($PAGE->theme->settings->hidemenu));

$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';

keats_check_colourswitch();
keats_initialise_colourswitcher($PAGE);

keats_check_fontswitch();
keats_initialise_fontswitcher($PAGE);

?>

<div id="container" class="clearfix">

<header role="banner" class="navbar navbar-fixed-top">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">

            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; ?></a>

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
          <?php if ((!isloggedin()) && ($hashidemenu)) {
                    ;
                } else if ($hascustommenu) {
                    echo $custommenu;
                } ?>
            <ul class="nav pull-right">
            <li><?php echo $OUTPUT->user_menu(); ?></li>
            </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

<header id="page-header" class="clearfix">

    <a href="<?php echo $CFG->wwwroot; ?>" class="logo">
        <img alt="logo" src="<?php echo $OUTPUT->pix_url('logo', 'theme_keats'); ?>" />
    </a>

    <div class="toplinks">
        <a href="//www.kcl.ac.uk/" target="_blank"><?php echo get_string('kingsmainsite', 'theme_keats'); ?></a>
        <a href="//internal.kcl.ac.uk/" target="_blank"><?php echo get_string('internal', 'theme_keats'); ?></a>
    </div>

    <div class="coursesearch">
      <form method="get" action="<?php echo $CFG->wwwroot;?>/course/search.php" id="coursesearch">
          <fieldset class="coursesearchbox invisiblefieldset">
            <input type="text" value="" placeholder="<?php echo get_string('coursesearchtext', 'theme_keats'); ?>" name="search" size="12" id="shortsearchbox">
            <input type="submit" value="Go">
          </fieldset>
      </form>

      <?php if (!empty($courseheader)) { ?>
          <div id="course-header"><?php echo $courseheader; ?></div>
      <?php } ?>
    </div>
</header>

  <?php if (($isfrontpage) && $hasgeneralalert) {?>
  <div id="page-header-generalalert">
  <?php echo $PAGE->theme->settings->generalalert; ?>
  </div>
  <?php } ?>

    <?php if ($hasnavbar) { ?>
        <div id="navbar">
            <nav class="breadcrumb-button"><?php echo $PAGE->button; ?></nav>
            <?php echo $OUTPUT->navbar(); ?>
        </div>
    <?php } ?>
