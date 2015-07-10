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
?>
<div class="panel">
  <div class="settings"><a href="javascript:;" onmousedown="toggleSlide('dashAccess');"><i class="fa fa-cog"></i></a></div>
</div>


<div id="dashAccess" style="display:none; overflow:hidden; text-align: center;	height:110px;">
  <div class="dashAccessInner">
    <!-- Dashboard -->
    <div id="dashSlide">
      <div class="dashInner">

        <div id="colourswitcher">
          <ul id="dashTemplateC" class="switch first">
            <li class="dashmenuheaders"><?php echo get_string('colour', 'theme_keats'); ?></li>
            <li><a href="<?php echo new moodle_url($PAGE->url, array('keatscolour' => 'defaultTheme')); ?>" class="styleswitch colour-defaultTheme">
              <img src="<?php echo $OUTPUT->pix_url('spacer', 'theme'); ?>" alt="default-color"></a></li>
            <li><a href="<?php echo new moodle_url($PAGE->url, array('keatscolour' => 'yellowTheme')); ?>" class="styleswitch colour-yellowTheme">
              <img src="<?php echo $OUTPUT->pix_url('spacer', 'theme'); ?>" alt="yellowTheme-color"></a></li>
            <li><a href="<?php echo new moodle_url($PAGE->url, array('keatscolour' => 'orangeTheme')); ?>" class="styleswitch colour-orangeTheme">
              <img src="<?php echo $OUTPUT->pix_url('spacer', 'theme'); ?>" alt="orangeTheme-color"></a></li>
            <li><a href="<?php echo new moodle_url($PAGE->url, array('keatscolour' => 'highvisTheme')); ?>" class="styleswitch colour-highvisTheme">
            <i class="fa fa-eye-slash"></i></a></li>
          </ul>
        </div>

        <div id="fontswitcher">
          <ul id="dashTemplateF" class="switch last">
             <li class="dashmenuheaders"><?php echo get_string('fontsize', 'theme_keats'); ?></li>
             <li class="first"><a href="<?php echo new moodle_url($PAGE->url, array('keatsfont' => 'fontSmall')); ?>" class="styleswitch font-fontSmall">
               <img src="<?php echo $OUTPUT->pix_url('minus', 'theme'); ?>" alt="fontSmall" /></a></li>
             <li><a href="<?php echo new moodle_url($PAGE->url, array('keatsfont' => 'fontBig')); ?>" class="styleswitch font-fontBig">
              <img src="<?php echo $OUTPUT->pix_url('plus', 'theme'); ?>" alt="fontBig" /></a></li>
          </ul>
        </div>

      </div>
    </div>
    <!-- /Dashboard -->
  </div>
</div>
