jQuery(document).ready(function($) {

    /**
     * Sortable Repeater Custom Control
     *
     * @author Tristan Elliott <http://tristanelliott.co.za>
     * @license http://www.gnu.org/licenses/gpl-2.0.html
     */

    // Update the values for all our input fields and initialise the sortable repeater
    $('.sortable_repeater_control').each(function() {

        // If there is an existing customizer value, populate our rows
        var defaultValuesArray = $(this).find('.customize-control-sortable-repeater').val().split(',');
        var numRepeaterItems = defaultValuesArray.length;

        if (0 < numRepeaterItems) {

            // Add the first item to our existing input field
            $(this).find('.repeater-input').val(defaultValuesArray[0]);

            // Create a new row for each new value
            if (1 < numRepeaterItems) {
                // eslint-disable-next-line vars-on-top
                var i;
                for (i = 1; i < numRepeaterItems; ++i) {
                    bootpressAppendRow($(this), defaultValuesArray[i]);
                }
            }
        }
    });

    // Make our Repeater fields sortable
    $(this).find('.sortable').sortable({
        update: function(event, ui) {
            bootpressGetAllInputs($(this).parent());
        }
    });

    // Remove item starting from it's parent element
    $('.sortable').on('click', '.customize-control-sortable-repeater-delete', function(event) {
        event.preventDefault();
        // eslint-disable-next-line vars-on-top
        var numItems = $(this).parent().parent().find('.repeater').length;

        if (1 < numItems) {
            $(this).parent().slideUp('fast', function() {
                var parentContainer = $(this).parent().parent();
                $(this).remove();
                bootpressGetAllInputs(parentContainer);
            });
        } else {
            $(this).parent().find('.repeater-input').val('');
            bootpressGetAllInputs($(this).parent().parent().parent());
        }
    });

    // Add new item
    $('.customize-control-sortable-repeater-add').click(function(event) {
        event.preventDefault();
        bootpressAppendRow($(this).parent());
        bootpressGetAllInputs($(this).parent());
    });

    // Refresh our hidden field if any fields change
    $('.sortable').change(function() {
        bootpressGetAllInputs($(this).parent());
    });

    // Add https:// to the start of the URL if it doesn't have it
    $('.sortable').on('blur', '.repeater-input', function() {
        var url = $(this);
        var val = url.val();
        // eslint-disable-next-line space-unary-ops
        if (val && !val.match(/^.+:\/\/.*/)) {

            // Important! Make sure to trigger change event so Customizer knows it has to save the field
            url.val('https://' + val).trigger('change');
        }
    });

    // Append a new row to our list of elements
    function bootpressAppendRow($element, defaultValue = '') {
        var newRow = '<div class="repeater" style="display:none"><input type="text" value="' + defaultValue + '" class="repeater-input" placeholder="https://" /><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a></div>';

        $element.find('.sortable').append(newRow);
        $element.find('.sortable').find('.repeater:last').slideDown('slow', function() {
            $(this).find('input').focus();
        });
    }

    // Get the values from the repeater input fields and add to our hidden field
    function bootpressGetAllInputs($element) {
        var inputValues = $element.find('.repeater-input').map(function() {
            return $(this).val();
        }).toArray();

        // Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
        $element.find('.customize-control-sortable-repeater').val(inputValues);

        // Important! Make sure to trigger change event so Customizer knows it has to save the field
        $element.find('.customize-control-sortable-repeater').trigger('change');
    }
});