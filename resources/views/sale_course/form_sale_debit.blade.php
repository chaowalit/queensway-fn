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
				<a href="{{ url('sale_course/search_customer') }}" class="btn btn-xs btn-prev">
					<i class="ace-icon fa fa-arrow-left"></i>
					กลับหน้าหลัก
				</a>
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

		<div class="page-header">
			<h1>
				ซื้อคอร์สแบบรายคอร์ส
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					<b class="red">{{ isset($view_data['transfer_course'])? "กำลัง ย้าย/เปลี่ยน คอร์สอยู่":"" }}</b>
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<!--<div class="hr dotted"></div>-->

				<div class="">
					<div id="user-profile-3" class="user-profile row">
						<div class="col-sm-offset-1 col-sm-10">
							<div class="well well-sm">
								<!-- -
<button type="button" class="close" data-dismiss="alert">&times;</button>
&nbsp; -->
							<div class="inline middle {{ isset($view_data['transfer_course'])? "red":"blue" }} bigger-110">
								@if(isset($view_data['transfer_course']))
									ตอนนี้คุณกำลังอยู่ในขั้นตอนการย้ายคอร์ส กรุณาทำรายการด้านล่างให้ถูกต้องสมบูรณ์
								@else
									กรุณากรอกข้อมูลให้สมบูรณ์ เพื่อความถูกต้องของการออก "รายงาน"
								@endif

							</div>

							</div><!-- /.well -->
							@if (count($errors) > 0)
							<div class="well well-sm">
								<div class="inline middle red bigger-110"> เกิดข้อผิดพลาดในการซื้อคอร์ส กรุณาลองใหม่อีกครั้ง และควรตรวจสอบข้อมูลก่อนการบันทึกให้ "ถูกต้อง" </div>
							</div><!-- /.well -->
							@endif

							<div class="space"></div>

							@if(isset($view_data['transfer_course']))
							<form action="{{ url('sale_course/transfer_save_form_sale_debit') }}" class="form-horizontal" id="form_sale_debit" method="POST">
								<input type="hidden" name="old_buy_course_id" value="{{ $view_data['old_buy_course_id'] }}">
							@else
							<form class="form-horizontal" action="{{ url('sale_course/save_form_sale_debit') }}" id="form_sale_debit" method="POST">
							@endif
								<div class="tabbable">
									<ul class="nav nav-tabs padding-16">
										<li class="active">
											<a data-toggle="tab" href="#edit-basic" aria-expanded="true">
												<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
												ข้อมูลพื้นฐาน
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
											<h4 class="header blue bolder smaller">ข้อมูลลูกค้า</h4>

											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<span class="profile-picture">
														<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="{{ asset('assets/avatars/profile-pic.jpg') }}">
													</span>
												</div>

												<div class="vspace-12-sm"></div>

												<div class="col-xs-12 col-sm-10">
													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="customer_number">รหัสลูกค้า</label>

														<div class="col-sm-9">
															<input class="col-xs-12 col-sm-5" type="text" name="customer_number" id="customer_number" placeholder="" value="{{ $view_data['data_customer']['customer_number'] }}" readonly="true">
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="full_name">ชื่อ-นามสกุล</label>

														<div class="col-sm-9">
															<input class="col-xs-12 col-sm-10" type="text" name="full_name" id="full_name" placeholder="" value="{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }}" readonly="true">
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="thai_id">เลขบัตร ปปช.</label>

														<div class="col-sm-9">
															<input class="col-xs-12 col-sm-5" type="text" name="thai_id" id="thai_id" placeholder="" value="{{ $view_data['data_customer']['thai_id'] }}" readonly="true">
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right" for="nickname">ชื่อเล่น</label>

														<div class="col-sm-9">
															<input class="input-small" type="text" name="nickname" id="nickname" placeholder="" value="{{ $view_data['data_customer']['nickname'] }}" readonly="true">
															&nbsp;&nbsp;&nbsp; โทร &nbsp;
															<input class="input-small" type="text" name="tel" id="tel" placeholder="" value="{{ $view_data['data_customer']['tel'] }}" readonly="true">
														</div>
													</div>
												</div>
											</div>

											<hr>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-date">วันที่เกิด</label>

												<div class="col-sm-9">
													<div class="input-medium">
														<div class="input-group">
															<input class="input-medium date-picker" name="birthday" id="birthday" type="text" data-date-format="dd-mm-yyyy" value="{{ $view_data['data_customer']['birthday'] }}" readonly="true">
															<span class="input-group-addon">
																<i class="ace-icon fa fa-calendar"></i>
															</span>
														</div>
													</div>
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right">Email</label>

												<div class="col-sm-9">

													<span class="input-icon input-icon-right">
														<input type="email" name="email" id="email" value="{{ $view_data['data_customer']['email'] }}" style="width: 300px;" readonly="true">
														<i class="ace-icon fa fa-envelope"></i>
													</span>
													<!--
													<label class="inline">
														<input name="form-field-radio" type="radio" class="ace">
														<span class="lbl middle"> Male</span>
													</label>

													&nbsp; &nbsp; &nbsp;
													<label class="inline">
														<input name="form-field-radio" type="radio" class="ace">
														<span class="lbl middle"> Female</span>
													</label>
													-->
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="intolerance_history">ประวัติการแพ้ยา</label>

												<div class="col-sm-9">
													<textarea name="intolerance_history" id="intolerance_history" class="col-xs-12 col-sm-10" rows="3" style="background: #f5f5f5!important;" readonly="true">{{ $view_data['data_customer']['intolerance_history'] }}</textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="comment">หมายเหตุ</label>

												<div class="col-sm-9">
													<textarea name="comment" id="comment" class="col-xs-12 col-sm-10" rows="3" style="background: #f5f5f5!important;" readonly="true">{{ $view_data['data_customer']['comment'] }}</textarea>
												</div>
											</div>

											<div class="space"></div>
											<h4 class="header blue bolder smaller">ข้อมูลคอร์สที่ซื้อ (แบบรายคอร์ส)</h4>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">เล่มที่ใบเสร็จ</label>

												<div class="col-sm-9">
													<input type="text" name="book_no" id="book_no" value=""> ,
													&nbsp; เลขที่ใบเสร็จ &nbsp;
													<input type="text" name="number_no" id="number_no" value="">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">เลือกรายการคอร์ส</label>
<?php //dump($view_data['item_of_course']); ?>
												<div class="col-sm-9">
													<table id="dynamic-table" class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th class="center">

																</th>

																<th>รายการคอร์ส(Item)</th>
																<th class="hidden-480">ราคา MPL<br>ขั้นต่ำ(บาท)</th>
																<th style="width: 50px;">จำนวนครั้ง</th>
																<th style="width: 80px;">ราคาต่อครั้ง</th>
																<th style="width: 80px;">รวมราคา</th>
															</tr>
														</thead>

														<tbody>
															@foreach($view_data['item_of_course'] as $key => $val)
															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" name="check_list[]" value="{{ $val->item_of_course_id }}" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td>{{ $val->item_name }}</td>
																<td class="hidden-480">{{ $val->price }}</td>
																<td>
																	<div class="hidden-sm hidden-xs action-buttons">
																		<input type="number" name="amount_{{ $val->item_of_course_id }}" id="amount_{{ $val->item_of_course_id }}" value="" style="width: 50px;" min="0" max="99" onkeyup="cal_amount('{{ $val->item_of_course_id }}')">
																	</div>

																</td>
																<td>
																	<div class="hidden-sm hidden-xs action-buttons">
																		<input type="number" name="price_per_unit_{{ $val->item_of_course_id }}" id="price_per_unit_{{ $val->item_of_course_id }}" value="" style="width: 80px;" min="0" max="999999" onkeyup="cal_price_per_unit('{{ $val->item_of_course_id }}')">
																	</div>

																</td>
																<td>
																	<div class="hidden-sm hidden-xs action-buttons">
																		<input type="number" name="total_per_item_{{ $val->item_of_course_id }}" id="total_per_item_{{ $val->item_of_course_id }}" value="" style="width: 80px;" min="0" max="999999" readonly="true">
																	</div>

																</td>
															</tr>
															@endforeach
														<tbody>
													</table>

												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">รวมราคาทั้งหมด</label>

												<div class="col-sm-9">
													<input type="number" name="total_price" id="total_price" placeholder="" value="" readonly="true"> &nbsp;
													<button type="button" class="btn btn-sm btn-primary" id="btn_cal_total_price_item">สรุปราคา</button>
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="full_name">Consultant</label>

												<div class="col-sm-9">
													<input class="col-xs-12 col-sm-10" type="text" name="consultant" id="consultant" placeholder="" value="">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">หมายเหตุ</label>

												<div class="col-sm-9">
													<textarea name="comment_sale_debit" id="comment_sale_debit" class="col-xs-12 col-sm-10" rows="3" style=""></textarea>
												</div>
											</div>

											<div class="space"></div>
											<h4 class="header blue bolder smaller">ข้อมูลทางการเงิน</h4>

											@if(isset($view_data['transfer_course']))
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right red" for="">
													ยอดชำระยกมา
												</label>
												<div class="col-sm-6">
													<input type="text" name="referent_payment_transfer" id="referent_payment_transfer" value="{{ $view_data['referent_payment_transfer'] }}" readonly="true" class="red">
												</div>
												<div class="col-sm-3">

												</div>
											</div>
											@endif

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ยอดชำระ</label>

												<div class="col-sm-9">
													<input type="number" name="payment_amount" id="payment_amount" value="" readonly="true"> ,
													<!--&nbsp; วงเงินขณะนี้ &nbsp;
													<input type="number" name="" id="" value="" readonly="true"> ,-->
													&nbsp; ยอดค้างจ่าย &nbsp;
													<input type="number" name="accrued_expenses" id="accrued_expenses" value="" readonly="true">
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
										<button class="btn btn-info" type="button" id="btn_form_sale_debit">
											<i class="ace-icon fa fa-check bigger-110"></i>
											ซื้อคอร์ส
										</button>
										{{ csrf_field() }}
										<input type="hidden" name="customers_id" value="{{ $view_data['customers_id'] }}">
										<input type="hidden" name="type_course" value="debit">
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

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>

<style>
	.input-small {
		width: 250px;
		max-width: 100%;
	}
</style>
@endsection
