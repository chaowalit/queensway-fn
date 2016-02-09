@if($menu_nav == 'customers' && $menu_level == 1)
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

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

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
@endif