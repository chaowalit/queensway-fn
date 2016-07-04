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

