@extends('layouts.app')

@section('content')
<div class="main-content-inner">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">จัดการข้อมูลลูกค้า</a>
            </li>
            <li class="active">แสดงข้อมูลลูกค้าทั้งหมด</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <select class="nav-search-input" id="">
                    <option value="">รหัสลูกค้า</option>
                    <option value="" selected>ชื่อ-นามสกุล</option>
                    <option value="">เลขบัตร ปปช.</option>
                    <option value="">โทรศัพท์</option>
                    <option value="">Email</option>
                </select>
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                ตารางแสดงข้อมูลลูกค้า
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
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
                                <tr>
                                    <td class="">
                                        
                                    </td>

                                    <td>
                                        <a href="#">ace.com</a>
                                    </td>
                                    <td>$45</td>
                                    <td class="hidden-480">3,330</td>
                                    <td>Feb 12</td>
                                    <!--
                                    <td class="hidden-480">
                                        <span class="label label-sm label-warning">Expiring</span>
                                    </td>
                                    -->
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <button class="btn btn-xs btn-success">
                                                <i class="ace-icon fa fa-search bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-info">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </button>

                                            <button class="btn btn-xs btn-danger">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.span -->
                    <div class="col-xs-12">
                        <nav class="pull-right">
                          <ul class="pagination" style="margin: 0px 0;">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true"> << ก่อนหน้า</span>
                              </a>
                            </li>
                            <li><a href="#"> <b>1</b> </a></li>
                            <li><a href="#" style="padding: 6px 6px;">จาก</a></li>
                            <li><a href="#"> <b>3</b> </a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">ถัดไป >> </span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div><!-- /.span -->
                </div><!-- /.row -->

                <div class="hr hr-18 dotted hr-double"></div>

                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                    <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                </h4>

                <div class="hr hr-18 dotted hr-double"></div>

                <div id="modal-table" class="modal fade" tabindex="-1">
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
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
@endsection
