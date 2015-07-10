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

$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.

echo $OUTPUT->doctype() ?>
<!--[if IEMobile 7]><html class="iem7"  lang="en" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="en" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="en" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<?php require('head.php'); ?>

<body <?php
      $bodyclasses = array();
      $bodyclasses[] = 'keats-'.keats_get_colour();
      $bodyclasses[] = 'keats-'.keats_get_font();
      $bodyclasses[] = 'two-column';
      echo $OUTPUT->body_attributes($bodyclasses); ?> >

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require('header.php'); ?>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span9">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php echo $OUTPUT->blocks('side-pre', 'span3'); ?>
    </div>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>
</div>

<footer id="page-footer">
       <?php require('footer.php'); ?>
</footer>
</div> <!-- container-fluid -->
</body>
