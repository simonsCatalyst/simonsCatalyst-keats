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



defined('MOODLE_INTERNAL') || die;


if ($ADMIN->fulltree) {

    // Basic Heading
    $name = 'theme_keats/basicheading';
    $heading = get_string('basicheading', 'theme_keats');
    $information = get_string('basicheadingdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

	// Hide Menu
	$name = 'theme_keats/hidemenu';
	$title = get_string('hidemenu','theme_keats');
	$description = get_string('hidemenudesc', 'theme_keats');
	$default = 1;
	$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$settings->add($setting);

	// Custom CSS file
	$name = 'theme_keats/customcss';
	$title = get_string('customcss','theme_keats');
	$description = get_string('customcssdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtextarea($name, $title, $description, $default);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$settings->add($setting);
	

    // User Profile Menu Heading
    $name = 'theme_keats/userprofileheading';
    $heading = get_string('userprofileheading', 'theme_keats');
    $information = get_string('userprofileheadingdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

        // Enable My.
    	$name = 'theme_keats/enablemy';
    	$title = get_string('enablemy', 'theme_keats');
    	$description = get_string('enablemydesc', 'theme_keats');
    	$default = true;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);
    	
    	// Enable View Profile.
    	$name = 'theme_keats/enableprofile';
    	$title = get_string('enableprofile', 'theme_keats');
    	$description = get_string('enableprofiledesc', 'theme_keats');
    	$default = true;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);
    	
    	// Enable Edit Profile.
    	$name = 'theme_keats/enableeditprofile';
    	$title = get_string('enableeditprofile', 'theme_keats');
    	$description = get_string('enableeditprofiledesc', 'theme_keats');
    	$default = true;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);

    	// Enable Messages.
    	$name = 'theme_keats/enablemessages';
    	$title = get_string('enablemessages', 'theme_keats');
    	$description = get_string('enablemessagesdesc', 'theme_keats');
    	$default = true;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);
    	
    	// Enable Calendar.
    	$name = 'theme_keats/enablecalendar';
    	$title = get_string('enablecalendar', 'theme_keats');
    	$description = get_string('enablecalendardesc', 'theme_keats');
    	$default = true;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);
    	
    	// Enable Private Files.
    	$name = 'theme_keats/enableprivatefiles';
    	$title = get_string('enableprivatefiles', 'theme_keats');
    	$description = get_string('enableprivatefilesdesc', 'theme_keats');
    	$default = false;
    	$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    	$settings->add($setting);

	// Useful Resource Links Heading
    $name = 'theme_keats/usefulresourceheading';
    $heading = get_string('usefulresourceheading', 'theme_keats');
    $information = get_string('usefulresourceheadingdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

	// Useful Resources
	$name = 'theme_keats/usefulresources';
	$title = get_string('usefulresources','theme_keats');
	$description = get_string('usefulresourcesdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
	$settings->add($setting);

	// Need Help Heading
    $name = 'theme_keats/needhelpheading';
    $heading = get_string('needhelpheading', 'theme_keats');
    $information = get_string('needhelpheadingdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

	// Need Help
	$name = 'theme_keats/needhelp';
	$title = get_string('needhelp','theme_keats');
	$description = get_string('needhelpdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
	$settings->add($setting);

	// Social Icons Heading
    $name = 'theme_keats/socialiconsheading';
    $heading = get_string('socialiconsheading', 'theme_keats');
    $information = get_string('socialiconsheadingdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);
	
	// Website url setting
	$name = 'theme_keats/website';
	$title = get_string('website','theme_keats');
	$description = get_string('websitedesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// Facebook url setting
	$name = 'theme_keats/facebook';
	$title = get_string('facebook','theme_keats');
	$description = get_string('facebookdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// Twitter url setting
	$name = 'theme_keats/twitter';
	$title = get_string('twitter','theme_keats');
	$description = get_string('twitterdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// Flickr url setting
	$name = 'theme_keats/flickr';
	$title = get_string('flickr','theme_keats');
	$description = get_string('flickrdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// LinkedIn url setting
	$name = 'theme_keats/linkedin';
	$title = get_string('linkedin','theme_keats');
	$description = get_string('linkedindesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// YouTube url setting
	$name = 'theme_keats/youtube';
	$title = get_string('youtube','theme_keats');
	$description = get_string('youtubedesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// Footer Options Heading
    $name = 'theme_keats/footeroptheading';
    $heading = get_string('footeroptheading', 'theme_keats');
    $information = get_string('footeroptdesc', 'theme_keats');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);
	
	// Copyright setting
	$name = 'theme_keats/copyright';
	$title = get_string('copyright','theme_keats');
	$description = get_string('copyrightdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$settings->add($setting);

	// Footer links
	$name = 'theme_keats/footerlinks';
	$title = get_string('footerlinks','theme_keats');
	$description = get_string('footerlinksdesc', 'theme_keats');
	$default = '';
	$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
	$settings->add($setting);

}

