<?php
//dump($view_data['course_all']);
//dump($view_data['customer']);
?>
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
                <a href="#">จัดการคอร์ส</a>
            </li>
            <li class=""><?php echo ($view_data['sub_menu'] == 1)? "ตัด/ ชำระเงิน/ ยกเลิก":"ดูประวัติใบเสร็จการสั่งซื้อ"; ?></li>
			<li class="active">แสดงรายการคอร์ส</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">

        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                กรุณาเลือกคอร์สที่ต้องการ <?php echo ($view_data['sub_menu'] == 1)? "ตัด/ ชำระเงิน/ ยกเลิก":"ดูประวัติใบเสร็จการสั่งซื้อ"; ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <!--ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้-->
                </small>
            </h1>
        </div><!-- /.page-header -->
        <?php echo csrf_field(); ?>
		<input type="hidden" id="sub_menu" value="{{ $view_data['sub_menu'] }}">

		<div class="row">
			<div class="col-sm-12">
				<div class="tabbable">
					<ul class="nav nav-tabs" id="myTab">
						<li class="">
							<a data-toggle="tab" href="#home" aria-expanded="false">
								<i class="green ace-icon fa fa-home bigger-120"></i>
								ลูกค้าที่เลือก
							</a>
						</li>

						<li class="active">
							<a data-toggle="tab" href="#messages" aria-expanded="true">
								คอร์สทั้งหมดของลูกค้า
								<span class="badge badge-danger">{{ count($view_data['course_all']) }}</span>
							</a>
						</li>

					</ul>

					<div class="tab-content">

						<div id="home" class="tab-pane fade">
							<div class="tabbable">
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
												<br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="full_name">ชื่อ-นามสกุล</label>

													<div class="col-sm-9">
														<input class="col-xs-12 col-sm-10" type="text" name="full_name" id="full_name" placeholder="" value="{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }}" readonly="true">
													</div>
												</div>
												<br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="thai_id">เลขบัตร ปปช.</label>

													<div class="col-sm-9">
														<input class="col-xs-12 col-sm-5" type="text" name="thai_id" id="thai_id" placeholder="" value="{{ $view_data['data_customer']['thai_id'] }}" readonly="true">
													</div>
												</div>
												<br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="nickname">ชื่อเล่น</label>

													<div class="col-sm-9">
														<input class="input-small" type="text" name="nickname" id="nickname" placeholder="" value="{{ $view_data['data_customer']['nickname'] }}" readonly="true" style="width: 150px;">
														&nbsp;&nbsp;&nbsp; โทร &nbsp;
														<input class="input-small" type="text" name="tel" id="tel" placeholder="" value="{{ $view_data['data_customer']['tel'] }}" readonly="true" style="width: 190px;">
													</div>
												</div>
												<br>
												<div class="space-4"></div>

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
												<br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right">Email</label>

													<div class="col-sm-9">

														<span class="input-icon input-icon-right">
															<input type="email" name="email" id="email" value="{{ $view_data['data_customer']['email'] }}" style="width: 300px;" readonly="true">
															<i class="ace-icon fa fa-envelope"></i>
														</span>

													</div>
												</div>
												<br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="intolerance_history">ประวัติการแพ้ยา</label>

													<div class="col-sm-9">
														<textarea name="intolerance_history" id="intolerance_history" class="col-xs-12 col-sm-10" rows="3" style="background: #f5f5f5!important;" readonly="true">{{ $view_data['data_customer']['intolerance_history'] }}</textarea>
													</div>
												</div>
												<br><br><br><br>
												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="comment">หมายเหตุ</label>

													<div class="col-sm-9">
														<textarea name="comment" id="comment" class="col-xs-12 col-sm-10" rows="3" style="background: #f5f5f5!important;" readonly="true">{{ $view_data['data_customer']['comment'] }}</textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="messages" class="tab-pane fade active in">
                            <label style="font-size: 20px;font-weight: 400;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }} ({{ $view_data['data_customer']['nickname'] }})</label>

							<h4 class="header blue bolder smaller">แบบวงเงิน</h4>
							<table id="dynamic-table-1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>

										<th class="">
											สถานะ
										</th>
										<th>เล่มที่/เลขที่ใบเสร็จ</th>
										<th>ราคาทั้งหมด</th>

										<th class="hidden-480">ยอดชำระ</th>
										<th>ยอดค้างชำระ</th>
										<th>วงเงินขณะนี้</th>
										<th>วงเงินที่ใช้ไป</th>
										<th>Consultant</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'credit')
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}<br>{{ $val->number_no }}</td>
											<td>{{ $val->total_price }}</td>

											<td>{{ $val->payment_amount_total }}</td>
											<td>{{ $val->accrued_expenses }}</td>
											<td>{{ $val->limit_credit }}</td>
											<td>{{ $val->usage_credit }}</td>
											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    @if($view_data['sub_menu'] == 1)
													<button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" aria-expanded="false">
														เมนู
														<i class="ace-icon fa fa-angle-down icon-on-right"></i>
													</button>

													<ul class="dropdown-menu">
														<li>
															<a href="{{ url('history_payment/payment') }}/{{ base64_encode($val->id) }}">ชำระเงิน</a>
														</li>

														<li>
															<a href="#">ตัดคอร์ส</a>
														</li>

                                                        <li>
															<a href="#">ยกเลิกคอร์ส</a>
														</li>
													</ul>
                                                    @else

                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
                                                    @endif
												</div>
											</td>

										</tr>
										@endif
									@endforeach
								</tbody>
							</table>

							<h4 class="header blue bolder smaller">แบบรายคอร์ส</h4>
							<table id="dynamic-table-2" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>

										<th class="">
											สถานะ
										</th>
										<th>เล่มที่/เลขที่ใบเสร็จ</th>
										<th>ราคาทั้งหมด</th>

										<th class="hidden-480">ยอดชำระ</th>
										<th>ยอดค้างชำระ</th>
										<th>Consultant</th>

										<th></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'debit')
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}<br>{{ $val->number_no }}</td>
											<td>{{ $val->total_price }}</td>

											<td>{{ $val->payment_amount_total }}</td>
											<td>{{ $val->accrued_expenses }}</td>

											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    @if($view_data['sub_menu'] == 1)
													<button data-toggle="dropdown" class="btn btn-primary btn-white dropdown-toggle" aria-expanded="false">
														เมนู
														<i class="ace-icon fa fa-angle-down icon-on-right"></i>
													</button>

													<ul class="dropdown-menu">
														<li>
															<a href="{{ url('history_payment/payment') }}/{{ base64_encode($val->id) }}">ชำระเงิน</a>
														</li>

														<li>
															<a href="#">ตัดคอร์ส</a>
														</li>

                                                        <li>
															<a href="#">ยกเลิกคอร์ส</a>
														</li>
													</ul>
                                                    @else

                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
                                                    @endif
												</div>
											</td>

										</tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>


					</div>
				</div>
			</div><!-- /.col -->
		</div>

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12" id="show_list_customers">

                        <!-- load data ajax -->
                        <div class="col-xs-12" style="text-align: center;">
                            <h3 class="smaller lighter grey">
                                <!--<i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i>-->

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
