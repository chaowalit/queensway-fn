<?php //dump($view_data['buy_course']); ?>
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
                <a href="#">รายงาน</a>
            </li>

        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">

        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                รายงาน
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <!--ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้-->
                    กรุณากำหนดเงื่อนไขการออกรายงาน
                </small>
            </h1>
        </div><!-- /.page-header -->
        <?php echo csrf_field(); //dump($view_data['buy_course']); ?>


		<div class="row">

			<div class="col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">
                            <i class="ace-icon fa fa-book"></i>
                            รายงานแบบกำหนดเอง
                        </h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>

							<a href="#" data-action="close">
								<i class="ace-icon fa fa-times"></i>
							</a>
						</div>
					</div>

					<div class="widget-body" style="display: block;">
						<div class="widget-main">
                            <div>
								<label for="form-field-9">เลือกลูกค้า</label>

								<input type="text" class="form-control limited" id="form-field-9" maxlength="50"></textarea>
							</div>

							<hr>

                            <div>
								<label for="form-field-8">เลือกช่วงเวลา</label>

                                <div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span>

									<input class="form-control active" type="text" name="date-range-picker" id="id-date-range-picker-1">
								</div>
							</div>

							<hr>

							<div>
                                <span class="input-group-btn">
									<button type="button" class="btn btn-purple btn-sm">
										<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
										Search
									</button>
								</span>
							</div>
						</div>


					</div>
				</div>
			</div><!-- /.col -->

            <div class="col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">
                            <i class="ace-icon fa fa-book"></i>
                            รายงานแบบรายเดือน
                        </h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>

							<a href="#" data-action="close">
								<i class="ace-icon fa fa-times"></i>
							</a>
						</div>
					</div>

					<div class="widget-body" style="display: block;">
						<div class="widget-main">
							<div>
								<label for="form-field-8">เดือน (Month)</label>

                                <select class="form-control" id="">
									<option value="">กรุณาเลือกเดือน</option>
                                    <option value="01">มกราคม</option>
									<option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
								</select>
							</div>

							<hr>

							<div>
								<label for="form-field-9">ปีที่ (Year)</label>

                                <select class="form-control" id="">
									<option value="">กรุณาเลือกปี</option>
                                    <?php for($i = 2016 ; $i <= 2022 ; $i++){ ?>
									<option value="{{ $i }}">{{ $i }}</option>
                                    <?php } ?>
								</select>
							</div>

							<hr>

							<div>
                                <span class="input-group-btn">
									<button type="button" class="btn btn-purple btn-sm">
										<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
										Search
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.col -->

            <div class="col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">
                            <i class="ace-icon fa fa-book"></i>
                            รายงานแบบรายปี
                        </h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>

							<a href="#" data-action="close">
								<i class="ace-icon fa fa-times"></i>
							</a>
						</div>
					</div>

					<div class="widget-body" style="display: block;">
						<div class="widget-main">
							<div>
                                <label for="form-field-9">ปีที่ (Year)</label>

                                <select class="form-control" id="">
									<option value="">กรุณาเลือกปี</option>
                                    <?php for($i = 2016 ; $i <= 2022 ; $i++){ ?>
									<option value="{{ $i }}">{{ $i }}</option>
                                    <?php } ?>
								</select>
							</div>

							<hr>

                            <div>
                                <span class="input-group-btn">
									<button type="button" class="btn btn-purple btn-sm">
										<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
										Search
									</button>
								</span>
							</div>
							<!-- <div>
								<label for="form-field-9">With Character Limit</label>

								<textarea class="form-control limited" id="form-field-9" maxlength="50"></textarea>
							</div>

							<hr>

							<div>
								<label for="form-field-11">Autosize</label>

								<textarea id="form-field-11" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 52px;"></textarea>
							</div> -->
						</div>


					</div>
				</div>
			</div><!-- /.col -->

            

		</div>

    </div><!-- /.page-content -->
</div>
@endsection
