/* ------------------------------------------------------------------------------
*
*  # Buttons extension for Datatables. HTML5 examples
*
*  Specific JS code additions for datatable_extension_buttons_html5.html page
*
*  Version: 1.1
*  Latest update: Mar 6, 2016
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });


    // Column selectors
    $('.datatable-button-html5-columns').DataTable({
        buttons: {            
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-copy3 position-left"></i> Copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-file-spreadsheet position-left"></i> CSV',
                    fieldSeparator: '\t',
                    extension: '.tsv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-default',
                    text: '<i class="icon-file-excel position-left"></i> Excel',
                    fieldSeparator: '\t',
                    extension: '.xlsx',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'colvis',
                    text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
                    className: 'btn bg-blue btn-icon'
                }
            ]
        }
    });



});
