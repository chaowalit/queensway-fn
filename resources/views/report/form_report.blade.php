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
                </small>
            </h1>
        </div><!-- /.page-header -->
        <?php echo csrf_field(); //dump($view_data['buy_course']); ?>


		<div class="row">
			<div class="col-sm-12">

				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">กรุณากำหนดเงื่อนไขการออกรายงาน</h4>

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
								<label for="form-field-8">Default</label>

								<textarea class="form-control" id="form-field-8" placeholder="Default Text"></textarea>
							</div>

							<hr>

							<div>
								<label for="form-field-9">With Character Limit</label>

								<textarea class="form-control limited" id="form-field-9" maxlength="50"></textarea>
							</div>

							<hr>

							<div>
								<label for="form-field-11">Autosize</label>

								<textarea id="form-field-11" class="autosize-transition form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 52px;"></textarea>
							</div>
						</div>


					</div>
				</div>
			</div><!-- /.col -->
		</div>

    </div><!-- /.page-content -->
</div>
@endsection
