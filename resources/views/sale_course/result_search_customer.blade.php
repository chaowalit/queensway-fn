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
                <a href="#">จัดการข้อมูลคอร์ส</a>
            </li>
            <li class="active">ซื้อคอร์สที่เปิดขาย</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <select class="nav-search-input" id="column_name">
                    <option value="customer_number">รหัสลูกค้า</option>
                    <option value="full_name" selected>ชื่อ-นามสกุล</option>
                    <option value="thai_id">เลขบัตร ปปช.</option>
                    <option value="tel">โทรศัพท์</option>
                    <option value="email">Email</option>
                </select>
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
				<!--<button class="btn btn-minier btn-purple" style="height: 25px;border-radius: 4px!important;">ค้นหา</button>-->
            </form>
        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                ผลการค้นหาลูกค้าที่ต้องการซื้อคอร์ส
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <!--ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้-->
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
                                <!--<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>-->
                                  กรุณากรอกคำค้นหา...
                            </h3>
                        </div>

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
