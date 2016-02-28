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
				ซื้อคอร์สแบบวงเงิน
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>

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
								<div class="inline middle blue bigger-110"> กรุณากรอกข้อมูลให้สมบูรณ์ เพื่อความถูกต้องของการออก "รายงาน" </div>
							</div><!-- /.well -->

							<div class="space"></div>

							<form class="form-horizontal">
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

											<div class="space"></div>
											<h4 class="header blue bolder smaller">ข้อมูลคอร์สที่ซื้อ (แบบวงเงิน)</h4>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">เล่มที่ใบเสร็จ</label>

												<div class="col-sm-9">
													<input type="text" name="" id="" value=""> ,
													&nbsp; เลขที่ใบเสร็จ &nbsp;
													<input type="text" name="" id="" value="">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ราคาที่ซื้อจริง</label>

												<div class="col-sm-9">
													<input type="number" name="" id="" value=""> ,
													&nbsp; จำนวนเท่า &nbsp;
													<select name="" id="" style="width: 120px;">
														<option value="1">1 เท่า</option>
														<option value="1.5">1.5 เท่า</option>
														<option value="2">2 เท่า</option>
														<option value="2.5">2.5 เท่า</option>
														<option value="3">3 เท่า</option>
													</select> ,
													&nbsp; ได้วงเงินทั้งหมด &nbsp;
													<input type="number" name="" id="" value="" readonly="true">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="full_name">Consultant</label>

												<div class="col-sm-9">
													<input class="col-xs-12 col-sm-10" type="text" name="" id="" placeholder="" value="">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">หมายเหตุ</label>

												<div class="col-sm-9">
													<textarea name="" id="" class="col-xs-12 col-sm-10" rows="3" style=""></textarea>
												</div>
											</div>

											<div class="space"></div>
											<h4 class="header blue bolder smaller">ข้อมูลทางการเงิน</h4>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ยอดจ่ายมา</label>

												<div class="col-sm-9">
													<input type="number" name="" id="" value=""> ,
													&nbsp; วงเงินขณะนี้ &nbsp;
													<input type="number" name="" id="" value="" readonly="true">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">ช่องทางการชำระ</label>

												<div class="col-sm-9">
													<select name="" id="" style="width: 130px;">
														<option value="เงินสด">เงินสด</option>
														<option value="เครดิต">เครดิต</option>
														<option value="เงินสดและเครดิต">เงินสดและเครดิต</option>

													</select> ,
													&nbsp; ผ่อนชำระ &nbsp;
													<input type="text" name="" id="" value="" style="width: 300px;">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="">TID</label>

												<div class="col-sm-9">
													<input type="number" name="" id="" value="" style="width: 250px;"> ,
													&nbsp; MID &nbsp;
													<input type="number" name="" id="" value="" style="width: 250px;">
												</div>
											</div>
										</div>

										<div id="edit-settings" class="tab-pane">
											<div class="space-10"></div>

											<div>
												<label class="inline">
													<input type="checkbox" name="form-field-checkbox" class="ace">
													<span class="lbl"> Make my profile public</span>
												</label>
											</div>

											<div class="space-8"></div>

											<div>
												<label class="inline">
													<input type="checkbox" name="form-field-checkbox" class="ace">
													<span class="lbl"> Email me new updates</span>
												</label>
											</div>

											<div class="space-8"></div>

											<div>
												<label>
													<input type="checkbox" name="form-field-checkbox" class="ace">
													<span class="lbl"> Keep a history of my conversations</span>
												</label>

												<label>
													<span class="space-2 block"></span>

													for
													<input type="text" class="input-mini" maxlength="3">
													days
												</label>
											</div>
										</div>

										<div id="edit-password" class="tab-pane">
											<div class="space-10"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>

												<div class="col-sm-9">
													<input type="password" id="form-field-pass1">
												</div>
											</div>

											<div class="space-4"></div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password</label>

												<div class="col-sm-9">
													<input type="password" id="form-field-pass2">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="button">
											<i class="ace-icon fa fa-check bigger-110"></i>
											ซื้อคอร์ส
										</button>

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
