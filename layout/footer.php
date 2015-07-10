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

$hascopyright = (empty($PAGE->theme->settings->copyright)) ? false : $PAGE->theme->settings->copyright;
$hasusefulresources = (!empty($PAGE->theme->settings->usefulresources));
$hasneedhelp = (!empty($PAGE->theme->settings->needhelp));
$hasaddress = (!empty($PAGE->theme->settings->address));
$hasfooterlinks = (!empty($PAGE->theme->settings->footerlinks));
$haswebsite = (!empty($PAGE->theme->settings->website));
$hasfacebook = (!empty($PAGE->theme->settings->facebook));
$hastwitter = (!empty($PAGE->theme->settings->twitter));
$hasgoogleplus = (!empty($PAGE->theme->settings->googleplus));
$hasflickr = (!empty($PAGE->theme->settings->flickr));
$haspinterest = (!empty($PAGE->theme->settings->pinterest));
$hasapple = (!empty($PAGE->theme->settings->apple));
$hasinstagram = (!empty($PAGE->theme->settings->instagram));
$hasandroid = (!empty($PAGE->theme->settings->android));
$haslinkedin = (!empty($PAGE->theme->settings->linkedin));
$hasyoutube = (!empty($PAGE->theme->settings->youtube));
$haswikipedia = (!empty($PAGE->theme->settings->wikipedia));
?>

<div class="footer-upper">
    <div class="row-fluid">
        <?php if ($hasusefulresources) { ?>
        <div class="block span3 usefulresources">
          <div class="header">
            <div class="title">
              <h2><?php echo get_string('usefulresources', 'theme_keats'); ?></h2>
            </div>
          </div>
          <div class="content">
            <?php echo $PAGE->theme->settings->usefulresources; ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($hasneedhelp) { ?>
        <div class="block span3 needhelp">
          <div class="header">
            <div class="title">
              <h2><?php echo get_string('needhelp', 'theme_keats'); ?></h2>
            </div>
          </div>
          <div class="content">
            <?php echo $PAGE->theme->settings->needhelp; ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($hasyoutube || $haslinkedin || $hasflickr || $hastwitter || $hasfacebook) {?>
        <div class="block span3 socialmedia">
          <div class="header">
            <div class="title">
              <h2><?php echo get_string('followuson', 'theme_keats'); ?></h2>
            </div>
          </div>
          <div class="content">

          <?php if ($hasyoutube) {?>
          <a href="<?php echo $PAGE->theme->settings->youtube;?> "><span class="footer-icon youtube">
          <img src="<?php echo $OUTPUT->pix_url('socialmedia/youtube', 'theme_keats'); ?>" alt="<?php echo get_string('youtube', 'theme_keats'); ?>"></span></a>
          <?php } ?>

          <?php if ($haslinkedin) {?>
          <a href="<?php echo $PAGE->theme->settings->linkedin;?> "><span class="footer-icon linkedin">
          <img src="<?php echo $OUTPUT->pix_url('socialmedia/linkedin', 'theme_keats'); ?>" alt="<?php echo get_string('linkedin', 'theme_keats'); ?>"></span></a>
          <?php } ?>

          <?php if ($hasflickr) {?>
          <a href="<?php echo $PAGE->theme->settings->flickr;?> "><span class="footer-icon flickr">
          <img src="<?php echo $OUTPUT->pix_url('socialmedia/flickr', 'theme_keats'); ?>" alt="<?php echo get_string('flickr', 'theme_keats'); ?>"></span></a>
          <?php } ?>

          <?php if ($hastwitter) {?>
          <a href="<?php echo $PAGE->theme->settings->twitter;?> "><span class="footer-icon twitter">
          <img src="<?php echo $OUTPUT->pix_url('socialmedia/twitter', 'theme_keats'); ?>" alt="<?php echo get_string('twitter', 'theme_keats'); ?>"></span></a>
          <?php } ?>

          <?php if ($hasfacebook) {?>
          <a href="<?php echo $PAGE->theme->settings->facebook;?> "><span class="footer-icon facebook">
          <img src="<?php echo $OUTPUT->pix_url('socialmedia/facebook', 'theme_keats'); ?>" alt="<?php echo get_string('facebook', 'theme_keats'); ?>"></span></a>
          <?php } ?>

          </div>
        </div>
        <?php } ?>
      </div>
</div>

<div class="footer-lower">
  <div class="row-fluid">
      <div class="footerlogo">
        <a href="http://www.kcl.ac.uk" class="logo-footer"><img alt="logo-ftr" src="<?php echo $OUTPUT->pix_url('logo-ftr', 'theme_keats'); ?>" /></a>
      </div>
      <div class="footerlinks">
        <?php if ($hasfooterlinks) {
                  echo $PAGE->theme->settings->footerlinks;
              }
        ?>
      </div>
      <div class="copyright">
          <div id="footer-left">
            <?php if ($hascopyright) {
                 echo $PAGE->theme->settings->copyright;
                 }
                 echo $OUTPUT->standard_footer_html();
            ?>

          </div>
      </div>
  </div>
</div>

<a href="#top" id="back-top" class="back-to-top" style="display: inline;"><i class="chevron-up"></i></a>

<!-- Start Personalise Settings Menu-->
<div id="dropdowncontainer">
  <!-- Start Dashboard Controllers Menu-->
  <div id="dashaction">
      <?php { require('panel.php'); } ?>
  </div>
  <!-- End Dashboard Controllers Menu-->
</div>
<!-- End Personalise Settings Menu-->
