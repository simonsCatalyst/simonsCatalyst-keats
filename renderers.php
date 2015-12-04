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

class theme_keats_core_renderer extends core_renderer {

    protected function mycourses($CFG,$sidebar){
        $mycourses = enrol_get_users_courses($_SESSION['USER']->id);

        $courselist = array();
        foreach ($mycourses as $key=>$val){
            $courselist[] = $val->id;
        }

        $content = '';

        for($x=1;$x<=sizeof($courselist);$x++){
            $course = get_course($courselist[$x-1]);
            $title = $course->fullname;

            if ($course instanceof stdClass) {
                require_once($CFG->libdir. '/coursecatlib.php');
                $course = new course_in_list($course);
            }

            $url = $CFG->wwwroot."/theme/keats/pix/coursenoimage.jpg";
            foreach ($course->get_course_overviewfiles() as $file) {
                $isimage = $file->is_valid_image();
                $url = file_encode_url("$CFG->wwwroot/pluginfile.php",
                        '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                        $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
                if (!$isimage) {
                    $url = $CFG->wwwroot."/theme/keats/pix/coursenoimage.jpg";
                }
            }

            $content .= '<div class="view view-second view-mycourse '.(($x%3==0)?'view-nomargin':'').'">
                            <img src="'.$url.'" />
                            <div class="mask">
                                <h2>'.$title.'</h2>
                                <a href="'.$CFG->wwwroot.'/course/view.php?id='.$courselist[$x-1].'" class="info">Enter</a>
                            </div>
                        </div>';
        }
        return $content;
    }

    /*
     * This renders a notification message.
     * Uses bootstrap compatible html.
     */
    public function notification($message, $classes = 'notifyproblem') {
        $message = clean_text($message);

        if ($classes == 'notifyproblem') {
            return html_writer::div($message, 'alert alert-danger');
        }
        if ($classes == 'notifywarning') {
            return html_writer::div($message, 'alert alert-warning');
        }
        if ($classes == 'notifysuccess') {
            return html_writer::div($message, 'alert alert-success');
        }
        if ($classes == 'notifymessage') {
            return html_writer::div($message, 'alert alert-info');
        }
        if ($classes == 'redirectmessage') {
            return html_writer::div($message, 'alert alert-block alert-info');
        }
        return html_writer::div($message, $classes);
    }

    /*
     * This renders the navbar.
     * Uses bootstrap compatible html.
     */
    public function navbar() {
        $breadcrumbs = '';
        foreach ($this->page->navbar->get_items() as $item) {
            $item->hideicon = true;
            $breadcrumbs .= '<li>'.$this->render($item).'</li>';
        }
        return "<ol class=breadcrumb>$breadcrumbs</ol>";
    }

    /*
     * Overriding the custom_menu function ensures the custom menu is
     * always shown, even if no menu items are configured in the global
     * theme settings page.
     */
    public function custom_menu($custommenuitems = '') {
        global $CFG;

        if (!empty($CFG->custommenuitems)) {
                $custommenuitems .= $CFG->custommenuitems;
            }
            $custommenu = new custom_menu($custommenuitems, current_language());
            return $this->render_custom_menu($custommenu);
        }

    /*
     * This renders the bootstrap top menu.
     *
     * This renderer is needed to enable the Bootstrap style navigation.
     */
    protected function render_custom_menu(custom_menu $menu) {
        global $CFG, $USER;

        // TODO: eliminate this duplicated logic, it belongs in core, not
        // here. See MDL-39565.

        $content = '<ul class="nav navbar-nav">';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }

        return $content.'</ul>';
    }

    /*
     * Overriding the custom_menu function ensures the custom menu is
     * always shown, even if no menu items are configured in the global
     * theme settings page.
     */
    public function user_menu($user = null, $withlinks = null) {
        global $CFG;
        $usermenu = new custom_menu('', current_language());
        return $this->render_user_menu($usermenu);
    }

    /*
     * This renders the bootstrap top menu.
     *
     * This renderer is needed to enable the Bootstrap style navigation.
     */
    protected function render_user_menu(custom_menu $menu) {
    global $CFG, $USER, $DB, $PAGE;

    $addusermenu = true;
    $addlangmenu = true;
    $addmessagemenu = true;

    if (!isloggedin() || isguestuser()) {
        $addmessagemenu = false;
    }

    if ($addmessagemenu) {
        $messages = $this->get_user_messages();
        $messagecount = count($messages);
        $messagemenu = $menu->add(
            '<i class="fa fa-envelope-o"></i>' . html_writer::tag('ot', $messagecount),
            new moodle_url('#'),
            get_string('messages', 'message'),
            9999
        );
        foreach ($messages as $message) {

            if (!$message->from) {
                continue;
            }
            $senderpicture = new user_picture($message->from);
            $senderpicture->link = false;
            $senderpicture = $this->render($senderpicture);

            $messagecontent = $senderpicture;
            $messagecontent .= html_writer::start_span('msg-body');
            $messagecontent .= html_writer::start_span('msg-title');
            $messagecontent .= html_writer::span($message->from->firstname . ': ', 'msg-sender');
            $messagecontent .= $message->text;
            $messagecontent .= html_writer::end_span();
            $messagecontent .= html_writer::start_span('msg-time');
            $messagecontent .= html_writer::tag('i', '', array('class' => 'icon-time'));
            $messagecontent .= html_writer::span($message->date);
            $messagecontent .= html_writer::end_span();

            $messageurl = new moodle_url('/message/index.php', array('user1' => $USER->id, 'user2' => $message->from->id));
            $messagemenu->add($messagecontent, $messageurl, $message->state);
        }
    }

        $langs = get_string_manager()->get_list_of_translations();
        if (count($langs) < 2
        or empty($CFG->langmenu)
        or ($this->page->course != SITEID and !empty($this->page->course->lang))) {
            $addlangmenu = false;
        }

        if ($addlangmenu) {
            $language = $menu->add(get_string('language'), new moodle_url('#'), get_string('language'), 10000);
            foreach ($langs as $langtype => $langname) {
                $language->add($langname, new moodle_url($this->page->url, array('lang' => $langtype)), $langname);
            }
        }

        if ($addusermenu) {
            if (isloggedin() && !isguestuser()) {
                $usermenu = $menu->add('<img class="profilepic" src="'.$CFG->wwwroot.'/user/pix.php?file=/'.$USER->id.'/f1.jpg" width="80" height="80" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" />' .fullname($USER), new moodle_url('#'), fullname($USER), 10001);

                if (!empty($PAGE->theme->settings->enablemy)) {
                    $usermenu->add(
                        '<i class="fa fa-file"></i>' . get_string('enablemy','theme_keats'),
                        new moodle_url('/my', array('id'=>$USER->id)),
                        get_string('enablemy','theme_keats')
                    );
                }

                if (!empty($PAGE->theme->settings->enableprofile)) {
                    $usermenu->add(
                        '<i class="fa fa-user"></i>' . get_string('viewprofile'),
                        new moodle_url('/user/profile.php', array('id' => $USER->id)),
                        get_string('viewprofile')
                    );
                }

                if (!empty($PAGE->theme->settings->enableeditprofile)) {
                        $usermenu->add(
                        '<i class="fa fa-cog"></i>' . get_string('editmyprofile'),
                        new moodle_url('/user/edit.php', array('id' => $USER->id)),
                        get_string('editmyprofile')
                    );
                }

                if (!empty($PAGE->theme->settings->enablemessages)) {
                    $usermenu->add(
                        '<i class="fa fa-comments"></i>' . get_string('enablemessages', 'theme_keats'),
                        new moodle_url('/message/index.php', array()),
                        get_string('enablemessages', 'theme_keats')
                    );
                }

                if (!empty($PAGE->theme->settings->enableprivatefiles)) {
                    $usermenu->add(
                        '<i class="fa fa-file"></i>' . get_string('privatefiles', 'block_private_files'),
                        new moodle_url('/user/files.php', array('id' => $USER->id)),
                        get_string('privatefiles', 'block_private_files')
                    );
                }

                if (!empty($PAGE->theme->settings->enablebadges)) {
                    $usermenu->add(
                        '<i class="fa fa-certificate"></i>' . get_string('badges'),
                        new moodle_url('/badges/mybadges.php', array('id' => $USER->id)),
                        get_string('badges')
                    );
                }

                if (!empty($PAGE->theme->settings->enablecalendar)) {
                    $usermenu->add(
                        '<i class="fa fa-calendar"></i>' . get_string('pluginname', 'block_calendar_month'),
                        new moodle_url('/calendar/view.php', array('id' => $USER->id)),
                        get_string('pluginname', 'block_calendar_month')
                    );
                }

                // Add custom links to menu
                $customlinksnum = (empty($PAGE->theme->settings->usermenulinks)) ? false : $PAGE->theme->settings->usermenulinks;
                if ($customlinksnum !=0) {
                    foreach (range(1, $customlinksnum) as $customlinksnumber) {
                        $cli = "customlinkicon$customlinksnumber";
                        $cln = "customlinkname$customlinksnumber";
                        $clu = "customlinkurl$customlinksnumber";

                        if (!empty($PAGE->theme->settings->enablecalendar)) {
                            $usermenu->add(
                                '<i class="fa fa-'.$PAGE->theme->settings->$cli.'"></i>' .$PAGE->theme->settings->$cln,
                                new moodle_url($PAGE->theme->settings->$clu, array('id' => $USER->id)),
                                $PAGE->theme->settings->$cln
                            );
                        }
                    }
                }

                $usermenu->add(
                    '<i class="fa fa-lock"></i>' . get_string('logout'),
                    new moodle_url('/login/logout.php', array('sesskey' => sesskey(), 'loginpage' => '1')),
                    get_string('logout')
                );
            } else {
                echo '<a href="'.$CFG->wwwroot.'/login/index.php">'.get_string('login').'</a>';
            }
        }

        $content = '<ul class="nav navbar-nav navbar-right">';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }

        return $content.'</ul>';
        }

   protected function process_user_messages() {

       $messagelist = array();

       foreach ($usermessages as $message) {
           $cleanmsg = new stdClass();
           $cleanmsg->from = fullname($message);
           $cleanmsg->msguserid = $message->id;

           $userpicture = new user_picture($message);
           $userpicture->link = false;
           $picture = $this->render($userpicture);

           $cleanmsg->text = $picture . ' ' . $cleanmsg->text;

           $messagelist[] = $cleanmsg;
       }

       return $messagelist;
   }

   protected function get_user_messages() {
       global $USER, $DB;
       $messagelist = array();
       $maxmessages = 5;

       $readmessagesql = "SELECT id, smallmessage, useridfrom, useridto, timecreated, fullmessageformat, notification
                            FROM {message_read}
                           WHERE useridto = :userid
                        ORDER BY timecreated DESC
                           LIMIT $maxmessages";
       $newmessagesql = "SELECT id, smallmessage, useridfrom, useridto, timecreated, fullmessageformat, notification
                           FROM {message}
                          WHERE useridto = :userid";

       $readmessages = $DB->get_records_sql($readmessagesql, array('userid' => $USER->id));

       $newmessages = $DB->get_records_sql($newmessagesql, array('userid' => $USER->id));

       foreach ($newmessages as $message) {
           $messagelist[] = $this->bootstrap_process_message($message, 'new');
       }

       //uncomment below to display old messages in messagecount

       //foreach ($readmessages as $message) {
       //    $messagelist[] = $this->bootstrap_process_message($message, 'old');
       //}

       return $messagelist;

   }

   protected function bootstrap_process_message($message, $state) {
       global $DB;
       $messagecontent = new stdClass();

       if ($message->notification) {
           $messagecontent->text = get_string('unreadnewnotification', 'message');
       } else {
           if ($message->fullmessageformat == FORMAT_HTML) {
               $message->smallmessage = html_to_text($message->smallmessage);
           }
           if (core_text::strlen($message->smallmessage) > 15) {
               $messagecontent->text = core_text::substr($message->smallmessage, 0, 15).'...';
           } else {
               $messagecontent->text = $message->smallmessage;
           }
       }

       if ((time() - $message->timecreated ) <= (3600 * 3)) {
           $messagecontent->date = format_time(time() - $message->timecreated);
       } else {
           $messagecontent->date = userdate($message->timecreated, get_string('strftimetime', 'langconfig'));
       }

       $messagecontent->from = $DB->get_record('user', array('id' => $message->useridfrom));
       $messagecontent->state = $state;
       return $messagecontent;
   }


   /*
    * This code renders the custom menu items for the
    * bootstrap dropdown menu.
    */
   protected function render_custom_menu_item(custom_menu_item $menunode, $level = 0 ) {
       static $submenucount = 0;

  // Add additional class for custom envelope/messages selector.
  $customclass = '';
        if (preg_match('/fa-envelope/', $menunode->get_text())) {
    $customclass = ' messages';
  }

       if ($menunode->has_children()) {

           if ($level == 1) {
               $dropdowntype = 'dropdown';
           } else {
               $dropdowntype = 'dropdown-submenu';
           }

           $content = html_writer::start_tag('li', array('class' => $dropdowntype . $customclass));
           // If the child has menus render it as a sub menu.
           $submenucount++;
           if ($menunode->get_url() !== null) {
               $url = $menunode->get_url();
           } else {
               $url = '#cm_submenu_'.$submenucount;
           }
           $linkattributes = array(
               'href' => $url,
               'class' => 'dropdown-toggle',
               'data-toggle' => 'dropdown',
               'title' => $menunode->get_title(),
           );
           $content .= html_writer::start_tag('a', $linkattributes);
           $content .= $menunode->get_text();
           if ($level == 1) {
               $content .= '<b class="caret"></b>';
           }
           $content .= '</a>';
           $content .= '<ul class="dropdown-menu">';
           foreach ($menunode->get_children() as $menunode) {
               $content .= $this->render_custom_menu_item($menunode, 0);
           }
           $content .= '</ul>';
       } else {
           $content = '<li>';
           // The node doesn't have children so produce a final menuitem.
           if ($menunode->get_url() !== null) {
               $url = $menunode->get_url();
           } else {
               $url = '#';
           }
           $content .= html_writer::link($url, $menunode->get_text(), array('title' => $menunode->get_title()));
       }
       return $content;
   }
}
