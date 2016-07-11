if(!ace.vars['touch']) {
    $('.chosen-select').chosen({allow_single_deselect:true});
    //resize the chosen on window resize

    $(window)
    .off('resize.chosen')
    .on('resize.chosen', function() {
        $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
        })
    }).trigger('resize.chosen');
    //resize chosen on sidebar collapse/expand
    $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
        if(event_name != 'sidebar_collapsed') return;
        $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
        })
    });


    $('#chosen-multiple-style .btn').on('click', function(e){
        var target = $(this).find('input[type=radio]');
        var which = parseInt(target.val());
        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
         else $('#form-field-select-4').removeClass('tag-input-style');
    });
}

$('input[name=date-range-picker]').daterangepicker({
    'applyClass' : 'btn-sm btn-success',
    'cancelClass' : 'btn-sm btn-default',
    locale: {
        applyLabel: 'Apply',
        cancelLabel: 'Cancel',
        format: 'DD-MM-YYYY',
    }
}, function(start, end, label){
    //alert("A new date range was chosen: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
}).on('apply.daterangepicker', function(ev, picker){
    $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
}).on('cancel.daterangepicker', function(ev, picker){
    $(this).val('');
});

//------------------------------------------------------------------------------------------------------------------
$("#btn_gen_report_for_year").click(function(){
    var year_report = $("#form_gen_report_for_year").find("#year_report").val();
    if(year_report != ""){
        if(confirm("คุณต้องการออกรายงานรายปี ใช้หรือไม่")){
            $("#form_gen_report_for_year").submit();
        }
        
    }else{
        alert("กรุณาเลือกปีที่ต้องการออกรายงาน");
    }
    //$("#form_gen_report_for_year").submit();
});

$("#btn_gen_report_for_month").click(function(){
    var year_report = $("#form_gen_report_for_month").find("#year_report").val();
    var month_report = $("#form_gen_report_for_month").find("#month_report").val();

    if(year_report != "" && month_report != ""){
        if(confirm("คุณต้องการออกรายงานรายเดือน ใช้หรือไม่")){
            $("#form_gen_report_for_month").submit();
        }
    }else{
        alert("กรุณาเลือก เดือน/ปี ที่ต้องการออกรายงาน");
    }
});

$("#btn_list_report_for_person").click(function(){
    var customer_id = $("#form-field-select-3").val();

    if(customer_id != ""){
        $("#form_list_report_for_person").submit();
    }else{
        alert("กรุณาเลือกลูกค้าที่ต้องการออกรายงานก่อน...");
    }
});

$("#btn_gen_report_for_person_all").click(function(){
    if(confirm("คุณต้องการออกรายงานรายคน แบบทั้งหมด ใช้หรือไม่")){
        $("#form_gen_report_for_person_all").submit();
    }
    
});

//---------------------------------------------------- table ----------------------------------------------------
//inline scripts related to this page

jQuery(function($) {
    //initiate dataTables plugin
    var oTable1 =
        $('#dynamic-table-1')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable({
            bAutoWidth: false,
            "aoColumns": [{
                    "bSortable": true
                },
                null, null, null, null, null, null, null, {
                    "bSortable": false
                }
            ],
            "aaSorting": [],

            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50
        });
    //oTable1.fnAdjustColumnSizing();


    //TableTools settings
    TableTools.classes.container = "btn-group btn-overlap";
    TableTools.classes.print = {
        "body": "DTTT_Print",
        "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
        "message": "tableTools-print-navbar"
    }

    //initiate TableTools extension
    var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
        "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",

        "sRowSelector": "td:not(:last-child)",
        "sRowSelect": "multi",
        "fnRowSelected": function(row) {
            //check checkbox when row is selected
            try {
                $(row).find('input[type=checkbox]').get(0).checked = true
            } catch (e) {}
        },
        "fnRowDeselected": function(row) {
            //uncheck checkbox
            try {
                $(row).find('input[type=checkbox]').get(0).checked = false
            } catch (e) {}
        },

        "sSelectedClass": "success",
        "aButtons": [
            // {
            //  "sExtends": "copy",
            //  "sToolTip": "Copy to clipboard",
            //  "sButtonClass": "btn btn-white btn-primary btn-bold",
            //  "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
            //  "fnComplete": function() {
            //      this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
            //          <p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
            //          1500
            //      );
            //  }
            // },

            // {
            //  "sExtends": "csv",
            //  "sToolTip": "Export to CSV",
            //  "sButtonClass": "btn btn-white btn-primary  btn-bold",
            //  "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
            // },

            // {
            //  "sExtends": "pdf",
            //  "sToolTip": "Refresh",
            //  "sButtonClass": "btn btn-white btn-primary  btn-bold",
            //  "sButtonText": "<i class='fa fa-refresh bigger-110 red'></i>"
            // },

            {
                "sExtends": "print",
                "sToolTip": "Print view",
                "sButtonClass": "btn btn-white btn-primary  btn-bold",
                "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

                "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

                "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                          <p>Please use your browser's print function to\
                          print this table.\
                          <br />Press <b>escape</b> when finished.</p>",
            }
        ]
    });
    //we put a container before our table and append TableTools element to it
    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

    //also add tooltips to table tools buttons
    //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
    //so we add tooltips to the "DIV" child after it becomes inserted
    //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
    setTimeout(function() {
        $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
            var div = $(this).find('> div');
            if (div.length > 0) div.tooltip({
                container: 'body'
            });
            else $(this).tooltip({
                container: 'body'
            });
        });
    }, 200);



    //ColVis extension
    var colvis = new $.fn.dataTable.ColVis(oTable1, {
        "buttonText": "<i class='fa fa-search'></i>",
        "aiExclude": [0, 5],
        "bShowAll": true,
        //"bRestore": true,
        "sAlign": "right",
        "fnLabel": function(i, title, th) {
            return $(th).text(); //remove icons, etc
        }

    });

    //style it
    $(colvis.button()).addClass('btn-group').find('button').addClass(
        'btn btn-white btn-info btn-bold')

    //and append it to our table tools btn-group, also add tooltip
    $(colvis.button())
        .prependTo('.tableTools-container .btn-group')
        .attr('title', 'Show/hide columns').tooltip({
            container: 'body'
        });

    //and make the list, buttons and checkboxed Ace-like
    $(colvis.dom.collection)
        .addClass(
            'dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
        .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
        .find('input[type=checkbox]').addClass('ace').next().addClass(
            'lbl padding-8');



    /////////////////////////////////
    //table checkboxes
    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

    //select/deselect all rows according to table header checkbox
    $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
        function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) tableTools_obj.fnSelect(row);
                else tableTools_obj.fnDeselect(row);
            });
        });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
        var row = $(this).closest('tr').get(0);
        if (!this.checked) tableTools_obj.fnSelect(row);
        else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
    });



    $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        e.preventDefault();
    });


    //And for the first simple table, which doesn't have TableTools or dataTables
    //select/deselect all rows according to table header checkbox
    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
        function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find(
                    'input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(
                    0).prop('checked', false);
            });
        });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]', function() {
        var $row = $(this).closest('tr');
        if (this.checked) $row.addClass(active_class);
        else $row.removeClass(active_class);
    });



    /********************************/
    //add tooltip for small view action buttons in dropdown menu
    $('[data-rel="tooltip"]').tooltip({
        placement: tooltip_placement
    });

    //tooltip placement on right or left
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        //var w2 = $source.width();

        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return
            'right';
        return 'left';
    }
    //----------------------------------------------------------------------------------

    var oTable1 =
        $('#dynamic-table-2')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable({
            bAutoWidth: false,
            "aoColumns": [{
                    "bSortable": true
                },
                null, null, null, null, null, {
                    "bSortable": false
                }
            ],
            "aaSorting": [],

            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50
        });
    //oTable1.fnAdjustColumnSizing();


    //TableTools settings
    TableTools.classes.container = "btn-group btn-overlap";
    TableTools.classes.print = {
        "body": "DTTT_Print",
        "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
        "message": "tableTools-print-navbar"
    }

    //initiate TableTools extension
    var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
        "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",

        "sRowSelector": "td:not(:last-child)",
        "sRowSelect": "multi",
        "fnRowSelected": function(row) {
            //check checkbox when row is selected
            try {
                $(row).find('input[type=checkbox]').get(0).checked = true
            } catch (e) {}
        },
        "fnRowDeselected": function(row) {
            //uncheck checkbox
            try {
                $(row).find('input[type=checkbox]').get(0).checked = false
            } catch (e) {}
        },

        "sSelectedClass": "success",
        "aButtons": [
            // {
            //  "sExtends": "copy",
            //  "sToolTip": "Copy to clipboard",
            //  "sButtonClass": "btn btn-white btn-primary btn-bold",
            //  "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
            //  "fnComplete": function() {
            //      this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
            //          <p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
            //          1500
            //      );
            //  }
            // },

            // {
            //  "sExtends": "csv",
            //  "sToolTip": "Export to CSV",
            //  "sButtonClass": "btn btn-white btn-primary  btn-bold",
            //  "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
            // },

            // {
            //  "sExtends": "pdf",
            //  "sToolTip": "Refresh",
            //  "sButtonClass": "btn btn-white btn-primary  btn-bold",
            //  "sButtonText": "<i class='fa fa-refresh bigger-110 red'></i>"
            // },

            {
                "sExtends": "print",
                "sToolTip": "Print view",
                "sButtonClass": "btn btn-white btn-primary  btn-bold",
                "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

                "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

                "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                          <p>Please use your browser's print function to\
                          print this table.\
                          <br />Press <b>escape</b> when finished.</p>",
            }
        ]
    });
    //we put a container before our table and append TableTools element to it
    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

    //also add tooltips to table tools buttons
    //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
    //so we add tooltips to the "DIV" child after it becomes inserted
    //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
    setTimeout(function() {
        $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
            var div = $(this).find('> div');
            if (div.length > 0) div.tooltip({
                container: 'body'
            });
            else $(this).tooltip({
                container: 'body'
            });
        });
    }, 200);



    //ColVis extension
    var colvis = new $.fn.dataTable.ColVis(oTable1, {
        "buttonText": "<i class='fa fa-search'></i>",
        "aiExclude": [0, 5],
        "bShowAll": true,
        //"bRestore": true,
        "sAlign": "right",
        "fnLabel": function(i, title, th) {
            return $(th).text(); //remove icons, etc
        }

    });

    //style it
    $(colvis.button()).addClass('btn-group').find('button').addClass(
        'btn btn-white btn-info btn-bold')

    //and append it to our table tools btn-group, also add tooltip
    $(colvis.button())
        .prependTo('.tableTools-container .btn-group')
        .attr('title', 'Show/hide columns').tooltip({
            container: 'body'
        });

    //and make the list, buttons and checkboxed Ace-like
    $(colvis.dom.collection)
        .addClass(
            'dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
        .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
        .find('input[type=checkbox]').addClass('ace').next().addClass(
            'lbl padding-8');



    /////////////////////////////////
    //table checkboxes
    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

    //select/deselect all rows according to table header checkbox
    $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
        function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) tableTools_obj.fnSelect(row);
                else tableTools_obj.fnDeselect(row);
            });
        });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
        var row = $(this).closest('tr').get(0);
        if (!this.checked) tableTools_obj.fnSelect(row);
        else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
    });



    $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        e.preventDefault();
    });


    //And for the first simple table, which doesn't have TableTools or dataTables
    //select/deselect all rows according to table header checkbox
    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
        function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find(
                    'input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(
                    0).prop('checked', false);
            });
        });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]', function() {
        var $row = $(this).closest('tr');
        if (this.checked) $row.addClass(active_class);
        else $row.removeClass(active_class);
    });



    /********************************/
    //add tooltip for small view action buttons in dropdown menu
    $('[data-rel="tooltip"]').tooltip({
        placement: tooltip_placement
    });

    //tooltip placement on right or left
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        //var w2 = $source.width();

        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return
            'right';
        return 'left';
    }

});