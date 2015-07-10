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

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<?php require('head.php'); ?>

<body <?php
      $bodyclasses = array();
      $bodyclasses[] = 'keats-'.keats_get_colour();
      $bodyclasses[] = 'keats-'.keats_get_font();
      echo $OUTPUT->body_attributes($bodyclasses); ?> >

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="container">

<div id="maintenancetitle"><?php echo $OUTPUT->page_heading(); ?></div>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>

</body>
