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
                <a href="#">จัดการคอร์สที่ซื้อ</a>
            </li>
            <li class="">ตัด/ชำระเงิน (คอร์ส)</li>
			<li class="">แสดงรายการคอร์ส</li>
			<li class="active">ชำระเงินคอร์ส</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">

        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                ชำระเงินคอร์ส
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <!--ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้-->
                </small>
            </h1>
        </div><!-- /.page-header -->
        <?php echo csrf_field(); dump($view_data['buy_course']); ?>


		<div class="row">
			<div class="col-sm-12">
				<div class="">
					<div id="user-profile-3" class="user-profile row">
						<div class="col-sm-offset-1 col-sm-10">

							@if (count($errors) > 0)
							<div class="well well-sm">
								<div class="inline middle red bigger-110"> เกิดข้อผิดพลาดในการชำระเงิน กรุณาลองใหม่อีกครั้ง และควรตรวจสอบข้อมูลก่อนการบันทึกให้ "ถูกต้อง" </div>
							</div><!-- /.well -->
							@endif
							<div class="space"></div>

							<form action="{{ url('history_payment/save_history_payment') }}" class="form-horizontal" id="form_payment" method="POST">
								<div class="tabbable">
									<ul class="nav nav-tabs padding-16">
                                        <li class="">
											<a data-toggle="tab" href="#edit-settings" aria-expanded="false">
												<i class="purple ace-icon fa fa-info-circle bigger-125"></i>
												ข้อมูลเพิ่มเติม
											</a>
										</li>
										<li class="active">
											<a data-toggle="tab" href="#edit-basic" aria-expanded="true">
                                                <i class="purple ace-icon fa fa-credit-card bigger-125"></i>
                                                ข้อมูลทางการเงิน
											</a>
										</li>
										<!--
										<li class="">
											<a data-toggle="tab" href="#edit-settings" aria-expanded="false">
												<i class="purple ace-icon fa fa-cog bigger-125"></i>
												Settings
											</a>
										</li>

										<li class="">
											<a data-toggle="tab" href="#edit-password" aria-expanded="false">
												<i class="blue ace-icon fa fa-key bigger-125"></i>
												Password
											</a>
										</li>
										-->
									</ul>

									<div class="tab-content profile-edit-tab-content">
										<div id="edit-basic" class="tab-pane active">

											<h4 class="header blue bolder smaller">{{ $view_data['buy_course']['data_customer']['prefix'] }} {{ $view_data['buy_course']['data_customer']['full_name'] }} ({{ $view_data['buy_course']['data_customer']['nickname'] }})</h4>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ยอดชำระ</label>

												<div class="col-sm-9">
													<input type="number" name="payment_amount" id="payment_amount" value="" readonly="true"> ,
                                                    &nbsp; เล่มที่ใบเสร็จ &nbsp;
													<input type="text" name="book_no" id="book_no" value=""> ,
													&nbsp; เลขที่ใบเสร็จ &nbsp;
													<input type="text" name="number_no" id="number_no" value="">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ช่องทางการชำระ</label>

												<div class="col-sm-9">
													<select name="payment_type" id="payment_type" style="width: 190px;">
														<option value="cash">เงินสด</option>
														<option value="credit-debit">บัตรเครดิต/เดบิต</option>
														<option value="cash-credit-debit">เงินสดและบัตรเครดิต/เดบิต</option>

													</select> ,
													&nbsp; เงินสด &nbsp;
													<input type="number" name="cash" id="cash" value=""> ,
													&nbsp; บัตรเครดิต/เดบิต &nbsp;
													<input type="number" name="credit_debit_card" id="credit_debit_card" value="">
													<!--
													&nbsp; ผ่อนชำระ &nbsp;
													<input type="text" name="" id="" value="" style="width: 250px;">
													-->
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ธนาคาร</label>
												<div class="col-sm-9">

													<input type="text" name="bank_name" id="bank_name" value="" placeholder="ชื่อธนาคาร" style="width: 100%;">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">TID</label>

												<div class="col-sm-9">
													<input type="text" name="TID" id="TID" value="" style="width: 45%;"> ,
													&nbsp; MID &nbsp;
													<input type="text" name="MID" id="MID" value="" style="width: 45%;">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">หมายเหตุ</label>

												<div class="col-sm-9">
													<textarea name="comment_history_payment" id="comment_history_payment" class="col-xs-12 col-sm-12" rows="3" style=""></textarea>
												</div>
											</div>
										</div>

										<div id="edit-settings" class="tab-pane">


										</div>

										<div id="edit-password" class="tab-pane">

										</div>
									</div>
								</div>

								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="button" id="btn_form_payment">
											<i class="ace-icon fa fa-check bigger-110"></i>
											ชำระเงิน
										</button>
										{{ csrf_field() }}
                                        <input type="hidden" name="buy_course_id" value="{{ $view_data['buy_course']['id'] }}">
                                        <input type="hidden" name="accrued_expenses" id="accrued_expenses" value="{{ $view_data['buy_course']['accrued_expenses'] }}">
										&nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											ยกเลิก
										</button>
									</div>
								</div>
							</form>
						</div><!-- /.span -->
					</div><!-- /.user-profile -->
				</div>
			</div><!-- /.col -->
		</div>

    </div><!-- /.page-content -->
</div>
@endsection
