/**
 * Single Accordion Custom Control
 *
 * @author Tristan Elliott <http://tristanelliott.co.za>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 *
 */

$('.single-accordion-toggle').click(function() {
    var $accordionToggle = $(this);
    $(this).parent().find('.single-accordion').slideToggle('slow', function() {
        $accordionToggle.toggleClass('single-accordion-toggle-rotate', $(this).is(':visible'));
    });
});