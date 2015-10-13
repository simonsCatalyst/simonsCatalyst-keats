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

// If My page and a guest, force to login page.
if ($_SERVER['REQUEST_URI'] == '/my/' && isguestuser()) {
    redirect('/login/index.php');
}

// If domain name alone entered, force non-guest users to their My page
// and force guest users to login page.
// To really get to Moodle front page (with login box) click 'site home' ie /?redirect=0
// See allowguestmymoodle, autologinguests for guest access issues.
if ($_SERVER['REQUEST_URI'] == '/') {
    if (isguestuser()) {
        redirect('/login/index.php');
    } else {
        redirect('/my/');
    }
}

$PAGE->requires->jquery();

?>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <!-- For Chrome for Android: -->
    <link rel="icon" sizes="192x192" href="<?php echo $OUTPUT->pix_url('apple-touch-iconandroid-icon-192x192', 'theme')?>">
    <!-- For iPhone 6 Plus with @3× display: -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-180x180', 'theme')?>">
    <!-- For iPad with @2× display running iOS ≥ 7: -->
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-152x152', 'theme')?>">
    <!-- For iPad with @2× display running iOS ≤ 6: -->
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-144x144', 'theme')?>">
    <!-- For iPhone with @2× display running iOS ≥ 7: -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-120x120', 'theme')?>">
    <!-- For iPhone with @2× display running iOS ≤ 6: -->
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-114x114', 'theme')?>">
    <!-- For the iPad mini and the first- and second-generation iPad (@1× display) on iOS ≥ 7: -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-76x76', 'theme')?>">
    <!-- For the iPad mini and the first- and second-generation iPad (@1× display) on iOS ≤ 6: -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-72x72', 'theme')?>">
    <!-- For the iPad mini and the first- and second-generation iPad (@1× display) on iOS ≤ 6: -->
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-60x60', 'theme')?>">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-57x57', 'theme')?>">
    <!-- For Microsoft devices using Tiles: -->
    <meta name="msapplication-square70x70logo" content="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-114x114smalltile, 'theme')?>" />
    <meta name="msapplication-square150x150logo" content="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-114x114mediumtile, 'theme')?>" />
    <meta name="msapplication-wide310x150logo" content="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-114x114widetile, 'theme')?>" />
    <meta name="msapplication-square310x310logo" content="<?php echo $OUTPUT->pix_url('apple-touch-iconapple-touch-icon-114x114largetile, 'theme')?>" />

    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Google web fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" />

<script>
$(document).ready(function(){

  // hide #back-top first
  $("#back-top").hide();

  // fade in #back-top
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
      } else {
        $('#back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });

  });

  // wraps iframe with class
  $('iframe').wrap('<div class="videoWrapper" />');
});
</script>

</head>

