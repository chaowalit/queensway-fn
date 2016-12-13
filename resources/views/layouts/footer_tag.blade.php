@if($menu_level == 'form-chanel')
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/form-chanel.js') }}"></script>

@elseif($menu_nav == 'customers' && $menu_level == 1)
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/customers_l1.js') }}"></script>

@elseif($menu_nav == 'customers' && $menu_level == 2)

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/customers_l2.js') }}"></script>

@elseif($menu_nav == 'mng_course' && $menu_level == 1)
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/mng_course_l1.js') }}"></script>

@elseif($menu_nav == 'mng_course' && $menu_level == 2)
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/mng_course_l2.js') }}"></script>

@elseif($menu_nav == 'mng_course' && $menu_level == 3)
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->

@elseif($menu_nav == 'use_course')
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
@if($page_inside == 1)
<script src="{{ asset('qwc/js/search_customer_use_course.js') }}"></script>
@elseif($page_inside == 2)
<script src="{{ asset('qwc/js/show_all_course_for_customer.js') }}"></script>
@elseif($page_inside == 3)
<script src="{{ asset('qwc/js/history_payment_form.js') }}"></script>
@elseif($page_inside == 4)
<script src="{{ asset('qwc/js/form_usage_course.js') }}"></script>
@endif

@elseif($menu_nav == "report")
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>
<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/report.js') }}"></script>

@elseif($menu_nav == 'overview')
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery.2.1.1.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.flot.resize.min.js') }}"></script>
<!--<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>-->

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- qwc for css/js -->
<script src="{{ asset('qwc/js/overview.js') }}"></script>

@endif

<script>
    $(document).ready(function(){

    });

    function delete_soft_buy_course(buy_course_id){
        $( "#dialog-confirm-remove-course" ).removeClass('hide').dialog({
            resizable: false,
            width: '350',
            modal: true,
            title: "",
            title_html: true,
            buttons: [
                {
                    html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; ลบคอร์ส",
                    "class" : "btn btn-danger btn-minier",
                    click: function() {
                        $.ajax({
                            url:'course/delete_course',
                            data: {'buy_course_id': buy_course_id, '_token': $( "input[name='_token']" ).val()},
                            dataType: 'html',

                            type: 'POST',

                            success: function(response){
                                if($.trim(response) == '200'){
                                    alert("ทำรายการสำเร็จ ระบบจะกลับสู่หน้าดูประวัติใบเสร็จการสั่งซื้อ");
                                    window.location.href = '/course/search_customer_use_course?sub_menu=2'; 
                                }else{
                                    alert("ไม่สามารถทำรายการได้ กรุณาตรวจสอบความถูกต้องของข้อมูล");
                                    window.setTimeout('location.reload()', 1000);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                                window.setTimeout('location.reload()', 2000); //Reloads after three seconds
                            }
                        });
                        $( this ).dialog( "close" );
                    }
                }
                ,
                {
                    html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; ยกเลิก",
                    "class" : "btn btn-minier",
                    click: function() {
                        //var password_transection = $("#password_transection").val();
                        //alert(password_transection);
                        $( this ).dialog( "close" );
                    }
                }
            ]
        });

        $(".ui-dialog-title").each(function(){
            $(this).html("<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> แจ้งเตือน</h4></div>");
        });
    }

    function delete_history_payment(history_payment_id){
        if(confirm('คุณต้องการ "ลบ" ประวัติการชำระเงิน นี้ใช้หรือไม่')){

        }
    }
</script>

<div id="dialog-confirm-remove-course" class="hide">
    <div class="alert alert-info bigger-110">
        กรุณาตรวจสอบความถูกต้อง ก่อนลบข้อมูลคอร์สนี้
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="text" name="password_transection" id="password_transection" class="col-xs-12 col-sm-12" placeholder="รหัสยืนยันการทำรายการ">
        </div>
    </div><br><br>
    <div class="space-6"></div>

    <p class="bigger-110 bolder center grey">
        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
        คุณแน่ใจหรือไม่ ที่จะลบข้อมูลคอร์สนี้ ?
    </p>
</div><!-- #dialog-confirm -->
<style type="text/css">
    @media (min-width: 768px){
        .modal-dialog {
            width: 1000px;
            margin: 30px auto;
        }
    }
</style>