<table id="simple-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="">
                รหัสลูกค้า
            </th>
            <th>ชื่อ-นามสกุล</th>
            <th>เลขบัตร ปปช.</th>
            <th class="hidden-480">โทรศัพท์</th>

            <th>
                <!--<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>-->
                Email
            </th>

            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($customers as $val)
        <tr>
            <td class="">
                {{ $val->customer_number }}
                <?php
                    $count = $accrued_expenses[$val->id]['credit_accrued_expenses'] + $accrued_expenses[$val->id]['debit_accrued_expenses'];
                    if($count > 0){
                ?>
                <i class="ace-icon fa fa-bell orange pull-right"></i>
                <?php } ?>
            </td>

            <td>
                <a href="#">{{ $val->prefix }} {{ $val->full_name }}</a>
            </td>
            <td>{{ $val->thai_id }}</td>
            <td class="hidden-480">{{ $val->tel }}</td>
            <td>{{ $val->email }}</td>
            <!--
            <td class="hidden-480">
                <span class="label label-sm label-warning">Expiring</span>
            </td>
            -->
            <td>
                <div class="hidden-sm hidden-xs btn-group">
                    <a href="#modal-table-{{ $val->id }}" class="btn btn-xs btn-success" data-toggle="modal">
                        <i class="ace-icon fa fa-search bigger-120"></i>
                    </a>

                    <a href="{{ url('/customers/edit_customers') }}/<?php echo $val->id; ?>" class="btn btn-xs btn-info">
                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>

                    <a href="#" class="btn btn-xs btn-danger" onclick="btn_del_customer({{ $val->id }})">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </a>
                    <div id="dialog-confirm-{{ $val->id }}" class="hide">
                        <div class="alert alert-info bigger-110">
                            กรุณาตรวจสอบความถูกต้อง ก่อนลบข้อมูลลูกค้านี้
                        </div>

                        <div class="space-6"></div>

                        <p class="bigger-110 bolder center grey">
                            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                            คุณแน่ใจหรือไม่ ที่จะลบข้อมูล {{ $val->full_name }} ?
                        </p>
                    </div><!-- #dialog-confirm -->

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach($customers as $val)
<div id="modal-table-{{ $val->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    รายละเอียดข้อมูล "ลูกค้า" ที่เลือก
                </div>
            </div>

            <div class="modal-body no-padding">
                <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                    <thead>
                        <!--
                        <tr>
                            <th>Domain</th>
                            <th>Price</th>
                            <th>Clicks</th>

                            <th>
                                <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                Update
                            </th>
                        </tr>
                        -->
                    </thead>

                    <tbody>
                        <tr>
                            <td style="width:18%;">
                                <a href="#">รหัสลูกค้า</a>
                            </td>
                            <td>{{ $val->customer_number }}</td>

                        </tr>

                        <tr>
                            <td>
                                <a href="#">ชื่อ-นามสกุล</a>
                            </td>
                            <td>{{ $val->prefix }} {{ $val->full_name }}</td>

                        </tr>

                        <tr>
                            <td>
                                <a href="#">รหัสบัตร ปปช.</a>
                            </td>
                            <td>{{ $val->thai_id }}</td>

                        </tr>

                        <tr>
                            <td>
                                <a href="#">ที่อยู่</a>
                            </td>
                            <td>{{ $val->address }}</td>

                        </tr>

                        <tr>
                            <td>
                                <a href="#">ช่ือเล่น</a>
                            </td>
                            <td>{{ $val->nickname }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">โทรศัพท์</a>
                            </td>
                            <td>{{ $val->tel }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">Email</a>
                            </td>
                            <td>{{ $val->email }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">วันเกิด</a>
                            </td>
                            <td>{{ $val->birthday }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">ประวัติการแพ้ยา</a>
                            </td>
                            <td>{{ $val->intolerance_history }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">หมายเหตุ</a>
                            </td>
                            <td>{{ $val->comment }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">วันที่สมัครสมาชิก</a>
                            </td>
                            <td>{{ date("d-m-Y H:i:s", strtotime($val->created_at)) }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#">วันที่มีการอัพเดตล่าสุด</a>
                            </td>
                            <td>{{ date("d-m-Y H:i:s", strtotime($val->updated_at)) }}</td>

                        </tr>
                        <tr>
                            <td>
                                <a href="#" style="color: red;">ค้างชำระคอร์ส</a>
                            </td>
                            <td>
                                แบบวงเงิน: <strong style="color: red;"><?php echo $accrued_expenses[$val->id]['credit_accrued_expenses']; ?></strong> บาท,
                                แบบรายคอร์ส: <strong style="color: red;"><?php echo $accrued_expenses[$val->id]['debit_accrued_expenses']; ?></strong> บาท
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer no-margin-top">
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    ปิด
                </button>
                <a href="{{ url('sale_course/form_sale_credit') }}/<?php echo base64_encode($val->id); ?>" class="btn btn-sm btn-success pull-left">
                    <i class="ace-icon fa fa-credit-card"></i>
                    ซื้อคอร์สแบบวงเงิน
                </a>
                <a href="{{ url('sale_course/form_sale_debit') }}/<?php echo base64_encode($val->id); ?>" class="btn btn-sm btn-info pull-left">
                    <i class="ace-icon fa fa-filter"></i>
                    ซื้อคอร์สแบบรายคอร์ส
                </a>
                <!--
                <ul class="pagination pull-right no-margin">
                    <li class="prev disabled">
                        <a href="#">
                            <i class="ace-icon fa fa-angle-double-left"></i>
                        </a>
                    </li>

                    <li class="active">
                        <a href="#">1</a>
                    </li>

                    <li>
                        <a href="#">2</a>
                    </li>

                    <li>
                        <a href="#">3</a>
                    </li>

                    <li class="next">
                        <a href="#">
                            <i class="ace-icon fa fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
                -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->
@endforeach


<style type="text/css">
    @media (min-width: 768px){
        .modal-dialog {
            width: 1000px;
            margin: 30px auto;
        }
    }
</style>
<script type="text/javascript">
    function btn_del_customer(id){

        $( "#dialog-confirm-"+id ).removeClass('hide').dialog({
            resizable: false,
            width: '350',
            modal: true,
            title: "",
            title_html: true,
            buttons: [
                {
                    html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; ลบลูกค้า",
                    "class" : "btn btn-danger btn-minier",
                    click: function() {
                        require_del_customer(id);

                        $( this ).dialog( "close" );
                    }
                }
                ,
                {
                    html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; ยกเลิก",
                    "class" : "btn btn-minier",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                }
            ]
        });

        $(".ui-dialog-title").each(function(){
            $(this).html("<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> แจ้งเตือน</h4></div>");
        });
    }

    function require_del_customer(id){
        var current_page = parseInt($("#current_page").text());
        $.ajax({
            url:'customers/del_customers',
            data: {'id': id, '_token': $( "input[name='_token']" ).val()},
            dataType: 'html',

            type: 'POST',

            success: function(response){
                if($.trim(response) == 'error'){
                    alert('ไม่สามารถลบลูกค้าได้... ระบบจะรีเฟรชใน 3 วินาที');
                    window.setTimeout('location.reload()', 1000); //Reloads after three seconds
                }else{
                    load_customers_list_table(current_page);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                window.setTimeout('location.reload()', 2000); //Reloads after three seconds
            }
        });
    }

    jQuery(function($) {

    });
</script>
