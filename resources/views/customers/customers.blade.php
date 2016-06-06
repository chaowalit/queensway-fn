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
                <select class="nav-search-input" name="type_search" id="type_search">
                    <option value="customer_number">รหัสลูกค้า</option>
                    <option value="full_name" selected>ชื่อ-นามสกุล</option>
                    <option value="thai_id">เลขบัตร ปปช.</option>
                    <option value="tel">โทรศัพท์</option>
                    <option value="email">Email</option>
                </select>
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" name="text_search_customer" id="text_search_customer" autocomplete="off">
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
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12" id="show_list_customers">

                        <!-- load data ajax -->
                        <div class="col-xs-12" style="text-align: center;">
                            <h3 class="smaller lighter grey">
                                <i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>
                                  Loading...
                            </h3>
                        </div>

                    </div><!-- /.span -->
                    <div class="col-xs-12">
                        <nav class="pull-right">
                          <ul class="pagination" style="margin: 0px 0;">
                            <li>
                              <a href="#" aria-label="Previous" onclick="prev_pagination()">
                                <span aria-hidden="true"> << ก่อนหน้า</span>
                              </a>
                            </li>
                            <li><a href="#"> <b id="current_page">1</b> </a></li>
                            <li><a href="#" style="padding: 6px 6px;">จาก</a></li>
                            <li><a href="#"> <b id="total_page">{{ $view_data['total_page'] }}</b> </a></li>
                            <li>
                              <a href="#" aria-label="Next" onclick="next_pagination()">
                                <span aria-hidden="true">ถัดไป >> </span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                        <input type="hidden" id="limit" value="{{ $view_data['limit'] }}">
                    </div><!-- /.span -->
                </div><!-- /.row -->

                <div class="hr hr-18 dotted hr-double"></div>
                <!--
                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                    <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                </h4>

                <div class="hr hr-18 dotted hr-double"></div>
                -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>

@endsection
