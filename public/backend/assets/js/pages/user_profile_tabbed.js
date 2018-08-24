/* ------------------------------------------------------------------------------
*
*  # Tabbed user profile
*
*  Specific JS code additions for tabbed user profile page
*
*  Version: 1.0
*  Latest update: Jan 1, 2017
*
* ---------------------------------------------------------------------------- */

$(function() {

    // Form components
    // ------------------------------

    // Select2 selects
    $('.select').select2({
        minimumResultsForSearch: Infinity
    });


    // Styled file input
    $(".file-styled").uniform({
        fileButtonClass: 'action btn bg-warning'
    });


    // Styled checkboxes, radios
    $(".styled").uniform({
        radioClass: 'choice'
    });




    // Link row
    // ------------------------------

    // Initialize Row link plugin
    $('tbody.rowlink').rowlink();



    // Custom code
    // ------------------------------

    // Highlight row when checkbox is checked
    $('.table-inbox').find('tr > td:first-child').find('input[type=checkbox]').on('change', function() {
        if($(this).is(':checked')) {
            $(this).parents('tr').addClass('warning');
        }
        else {
            $(this).parents('tr').removeClass('warning');
        }
    });

    // Grab first letter and insert to the icon
    $(".table tr").each(function (i) {

        // Title
        var $title = $(this).find('.letter-icon-title'),
            letter = $title.eq(0).text().charAt(0).toUpperCase();

        // Icon
        var $icon = $(this).find('.letter-icon');
            $icon.eq(0).text(letter);
    });

});
