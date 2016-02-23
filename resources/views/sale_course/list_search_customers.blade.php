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

            <th style="width: 18%;">สั่งซื้อแบบ</th>
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
                    <a href="#" class="btn btn-xs btn-success">
                        <i class="ace-icon fa fa-credit-card bigger-120"></i> แบบวงเงิน
                    </a>
					&nbsp;
                    <a href="#" class="btn btn-xs btn-info">
                        <i class="ace-icon fa fa-filter bigger-120"></i> แบบรายคอร์ส
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
