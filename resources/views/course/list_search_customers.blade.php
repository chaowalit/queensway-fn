<?php //dump($customers); ?>
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

            <th style="width: 18%;">จัดการคอร์ส</th>
        </tr>
    </thead>

    <tbody>
        @foreach($customers as $val)
        <tr>
            <td class="">
                {{ $val->customer_number }}
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
					<!--
                    <a href="{{ url('sale_course/form_sale_credit') }}/<?php echo base64_encode($val->id); ?>" class="btn btn-xs btn-success">
                        <i class="ace-icon fa fa-credit-card bigger-120"></i> แบบวงเงิน
                    </a>
					-->
					&nbsp;
					<?php $url_data = "customer_id=".base64_encode($val->id).'&sub_menu='.urlencode($sub_menu); ?>
                    <a href="{{ url('course/show_all_course_for_customer') }}?{{ $url_data }}" class="btn btn-xs btn-info">
                        <i class="ace-icon fa fa-filter bigger-120"></i> แสดงคอร์ส
                    </a>

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<style type="text/css">
    @media (min-width: 768px){
        .modal-dialog {
            width: 1000px;
            margin: 30px auto;
        }
    }
</style>
<script type="text/javascript">

    jQuery(function($) {

    });
</script>
