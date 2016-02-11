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

                    <button class="btn btn-xs btn-info">
                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>

                    <button class="btn btn-xs btn-danger">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </button>
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
                    Results for "Latest Registered Domains
                </div>
            </div>

            <div class="modal-body no-padding">
                <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                    <thead>
                        <tr>
                            <th>Domain</th>
                            <th>Price</th>
                            <th>Clicks</th>

                            <th>
                                <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                Update
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <a href="#">ace.com</a>
                            </td>
                            <td>$45</td>
                            <td>3,330</td>
                            <td>Feb 12</td>
                        </tr>

                        <tr>
                            <td>
                                <a href="#">base.com</a>
                            </td>
                            <td>$35</td>
                            <td>2,595</td>
                            <td>Feb 18</td>
                        </tr>

                        <tr>
                            <td>
                                <a href="#">max.com</a>
                            </td>
                            <td>$60</td>
                            <td>4,400</td>
                            <td>Mar 11</td>
                        </tr>

                        <tr>
                            <td>
                                <a href="#">best.com</a>
                            </td>
                            <td>$75</td>
                            <td>6,500</td>
                            <td>Apr 03</td>
                        </tr>

                        <tr>
                            <td>
                                <a href="#">pro.com</a>
                            </td>
                            <td>$55</td>
                            <td>4,250</td>
                            <td>Jan 21</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer no-margin-top">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                </button>

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
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->
@endforeach