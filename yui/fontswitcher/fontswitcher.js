/**
 * King's College London - theme/keats
 *
 * @package    theme
 * @subpackage keats
 * @copyright  2014 King's College London <http://kcl.ac.uk>
 * @copyright  2014 Catalyst IT <http://catalyst-eu.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

YUI.add('moodle-theme_keats-fontswitcher', function(Y) {

// Available fonts
var FONTS = ['fontSmall','fontBig'];

/**
 * keats theme font switcher class.
 * Initialise this class by calling M.theme_keats.init
 */
var FontSwitcher = function() {
    FontSwitcher.superclass.constructor.apply(this, arguments);
};
FontSwitcher.prototype = {
    /**
     * Constructor for this class
     * @param {object} config
     */
    initializer : function(config) {
        var i, c;
        // Attach events to the links to change fonts so we can do it with
        // JavaScript without refreshing the page
        for (i in FONTS) {
            c = FONTS[i];
            // Check if this is the current Font
            if (Y.one(document.body).hasClass('keats-'+c)) {
                this.set('font', c);
            }
            Y.all(config.div+' .font-'+c).on('click', this.setFont, this, c);
        }
    },
    /**
     * Sets the font being used for the keats theme
     * @param {Y.Event} e The event that fired
     * @param {string} font The new font
     */
    setFont : function(e, font) {
        // Prevent the event from refreshing the page
        e.preventDefault();
        // Switch over the CSS classes on the body
        Y.one(document.body).replaceClass('keats-'+this.get('font'), 'keats-'+font);
        // Update the current font
        this.set('font', font);
        // Store the users selection (Uses AJAX to save to the database)
        M.util.set_user_preference('theme_keats_chosen_font', font);
    }
};
// Make the font switcher a fully fledged YUI module
Y.extend(FontSwitcher, Y.Base, FontSwitcher.prototype, {
    NAME : 'keats theme font switcher',
    ATTRS : {
        font : {
            value : 'fontSmall'
        }
    }
});
// Our keats theme namespace
M.theme_keats = M.theme_keats || {};
// Initialisation function for the font switcher
M.theme_keats.initFontSwitcher = function(cfg) {
    return new FontSwitcher(cfg);
}

}, '@VERSION@', {requires:['base','node']});
