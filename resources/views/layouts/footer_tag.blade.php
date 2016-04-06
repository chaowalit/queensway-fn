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
@endif

@endif

<script>
    $(document).ready(function(){

    });

    function delete_soft_buy_course(buy_course_id){
        if(confirm('คุณต้องการ "ลบ" คอร์สนี้ ใช้หรือไม่')){
            $.ajax({
                url:'course/delete_course',
                data: {'buy_course_id': buy_course_id, '_token': $( "input[name='_token']" ).val()},
                dataType: 'html',

                type: 'POST',

                success: function(response){
                    if($.trim(response) != '200'){
                        alert(response);

                    }else{

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                    window.setTimeout('location.reload()', 2000); //Reloads after three seconds
                }
            });
        }
    }

    function delete_history_payment(history_payment_id){
        if(confirm('คุณต้องการ "ลบ" ประวัติการชำระเงิน นี้ใช้หรือไม่')){

        }
    }
</script>
