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
            <li class=""><?php echo ($view_data['sub_menu'] == 1)? "ตัด/ ชำระ/ ย้าย/ ยกเลิก":"ดูประวัติใบเสร็จการสั่งซื้อ"; ?></li>
			<li class="active">แสดงรายการคอร์ส</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">

        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                กรุณาเลือกคอร์สที่ต้องการ <?php echo ($view_data['sub_menu'] == 1)? "ตัด/ ชำระ/ ย้าย/ ยกเลิก":"ดูประวัติใบเสร็จการสั่งซื้อ"; ?>
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
								<i class="green ace-icon fa fa-users bigger-120"></i>
								ลูกค้าที่เลือก
							</a>
						</li>

						<li class="active">
							<a data-toggle="tab" href="#messages" aria-expanded="true">
                                <i class="green ace-icon fa fa-eye bigger-120"></i>
								คอร์สทั้งหมดที่ใช้งานได้
                                <?php
                                    $active = 0;    $transfer = 0;  $cancel = 0;
                                    foreach($view_data['course_all'] as $val){
                                        if($val->status_course == "active"){
                                            $active++;
                                        }else if($val->status_course == "transfer"){
                                            $transfer++;
                                        }else if($val->status_course == "cancel"){
                                            $cancel++;
                                        }
                                    }
                                ?>
								<span class="badge badge-danger">{{ $active }}</span>
							</a>
						</li>
                        <li class="">
							<a data-toggle="tab" href="#course_transfer" aria-expanded="false">
								<i class="green ace-icon fa fa-exchange bigger-120"></i>
								คอร์สที่ย้าย/เปลี่ยน
                                <span class="badge badge-danger">{{ $transfer }}</span>
							</a>
						</li>
                        <li class="">
							<a data-toggle="tab" href="#course_cancel" aria-expanded="false">
								<i class="green ace-icon fa fa-times bigger-120"></i>
								คอร์สที่ถูกยกเลิก
                                <span class="badge badge-danger">{{ $cancel }}</span>
							</a>
						</li>
					</ul>

					<div class="tab-content">
                        <!-- ดูข้อมูลลูกค้าที่เลือก -->
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

                        <!-- คอร์สที่ใช้งานได้ -->
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
										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'credit' && $val->status_course == "active")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>
											<td>{{ number_format($val->limit_credit, 2) }}</td>
											<td>{{ number_format($val->usage_credit, 2) }}</td>
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
															<a href="{{ url('usage_course/form_usage_course') }}/{{ base64_encode($val->id) }}">ตัดคอร์ส</a>
														</li>

                                                        <li>
															<a href="javascript:void(0);" onclick="transfer_buy_course_of_credit('{{ $val->id }}')">ย้าย/เปลี่ยน คอร์ส</a>
                                                            <!-- แบบวงเงิน -->
														</li>

                                                        <li>
															<a href="javascript:void(0);" onclick="cancel_buy_course_of_credit('{{ $val->id }}')">ยกเลิกคอร์ส</a>
                                                            <!-- แบบวงเงิน -->
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

										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'debit' && $val->status_course == "active")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>

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
															<a href="{{ url('usage_course/form_usage_course') }}/{{ base64_encode($val->id) }}">ตัดคอร์ส</a>
														</li>

                                                        <li>
                                                            <a href="javascript:void(0);" onclick="transfer_buy_course_of_debit('{{ $val->id }}')">ย้าย/เปลี่ยน คอร์ส</a>
                                                            <!-- แบบรายคอร์ส -->
														</li>

                                                        <li>
                                                            <a href="javascript:void(0);" onclick="cancel_buy_course_of_debit('{{ $val->id }}')">ยกเลิกคอร์ส</a>
                                                            <!-- แบบรายคอร์ส -->
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

                        <!-- คอร์สที่โอนย้าย -->
                        <div id="course_transfer" class="tab-pane fade">
                            <label style="font-size: 20px;font-weight: 400;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }} ({{ $view_data['data_customer']['nickname'] }})</label>

							<h4 class="header blue bolder smaller">แบบวงเงิน</h4>
							<table id="dynamic-table-3" class="table table-striped table-bordered table-hover">
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
										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'credit' && $val->status_course == "transfer")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>
											<td>{{ number_format($val->limit_credit, 2) }}</td>
											<td>{{ number_format($val->usage_credit, 2) }}</td>
											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
												</div>
											</td>

										</tr>
										@endif
									@endforeach
								</tbody>
							</table>

							<h4 class="header blue bolder smaller">แบบรายคอร์ส</h4>
							<table id="dynamic-table-4" class="table table-striped table-bordered table-hover">
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

										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'debit' && $val->status_course == "transfer")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>

											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
												</div>
											</td>

										</tr>
										@endif
									@endforeach
								</tbody>
							</table>
						</div>

                        <!-- คอร์สที่ถูกยกเลิก -->
                        <div id="course_cancel" class="tab-pane fade">
                            <label style="font-size: 20px;font-weight: 400;font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;">{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }} ({{ $view_data['data_customer']['nickname'] }})</label>

							<h4 class="header blue bolder smaller">แบบวงเงิน</h4>
							<table id="dynamic-table-5" class="table table-striped table-bordered table-hover">
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
										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'credit' && $val->status_course == "cancel")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>
											<td>{{ number_format($val->limit_credit, 2) }}</td>
											<td>{{ number_format($val->usage_credit, 2) }}</td>
											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
												</div>
											</td>

										</tr>
										@endif
									@endforeach
								</tbody>
							</table>

							<h4 class="header blue bolder smaller">แบบรายคอร์ส</h4>
							<table id="dynamic-table-6" class="table table-striped table-bordered table-hover">
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

										<th style="width: 12%;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['course_all'] as $val)
										@if($val->type_course == 'debit' && $val->status_course == "cancel")
										<tr>
											<td>{{ $val->status_course }}</td>
											<td>{{ $val->book_no }}/{{ $val->number_no }}</td>
											<td>{{ number_format($val->total_price, 2) }}</td>

											<td>{{ number_format($val->payment_amount_total, 2) }}</td>
											<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>

											<td>{{ $val->consultant }}</td>
											<td>
												<div class="btn-group">
                                                    <a href="{{ url('history_payment/invoice') }}/{{ base64_encode($val->id) }}" class="btn btn-white btn-info">ดูข้อมูล</a>
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


    </div><!-- /.page-content -->
</div>

<!-- Modal -->
<a href="#modal-confirm-transfer-course" id="show_modal_confirm_transfer_course" data-toggle="modal" style="display: none;">
    <i class="ace-icon fa fa-cog"></i>
</a>
<div id="modal-confirm-transfer-course" class="modal">
    <div class="modal-dialog" style="width: 600px;">
        <div class="modal-content">
            <form action="{{ url('course/form_transfer_buy_course') }}" method="POST" class="form-horizontal">
                <div id="modal-wizard-container">

                    <div class="modal-header">
                        <h4>ผลการคำนวณการ ย้าย/เปลี่ยน คอร์ส</h4>
                    </div>

                    <div class="modal-body step-content" style="height: 220px;">
                        <div class="step-pane active" data-step="1">
                            <div class="center">

                                <div class="form-group has-info">
                                    <label for="" class="col-xs-12 col-sm-4 control-label no-padding-right">เล่มที่ใบเสร็จ : </label>

                                    <div class="col-xs-12 col-sm-6">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="book_no" id="book_no" class="width-100" required readonly="true">
                                            <i class="ace-icon fa fa-info-circle"></i>
                                        </span>
                                    </div>

                                </div>

                                <div class="form-group has-info">
                                    <label for="" class="col-xs-12 col-sm-4 control-label no-padding-right">เลขที่ใบเสร็จ : </label>

                                    <div class="col-xs-12 col-sm-6">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="number_no" id="number_no" class="width-100" required readonly="true">
                                            <i class="ace-icon fa fa-info-circle"></i>
                                        </span>
                                    </div>

                                </div>

                                <div class="form-group has-info">
                                    <label for="" class="col-xs-12 col-sm-4 control-label no-padding-right">จำนวนยอดเงินที่ยังไม่ได้ใช้ : </label>

                                    <div class="col-xs-12 col-sm-6">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" name="referent_payment_transfer" id="referent_payment_transfer" class="width-100" required readonly="true">
                                            <i class="ace-icon fa fa-info-circle"></i>
                                        </span>
                                    </div>

                                </div>
                                <div class="form-group has-info">
                                    <label for="" class="col-xs-12 col-sm-4 control-label no-padding-right">ต้องการสร้างคอร์สใหม่แบบ : </label>

                                    <div class="col-xs-12 col-sm-3">
                                        <div class="radio">
    										<label>
    											<input name="type_course" value="credit" type="radio" class="ace" checked>
    											<span class="lbl"> แบบวงเงิน</span>
    										</label>
    									</div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="radio">
    										<label>
    											<input name="type_course" value="debit" type="radio" class="ace">
    											<span class="lbl"> แบบรายคอร์ส</span>
    										</label>
    									</div>
                                    </div>

                                </div>
                                <input type="hidden" name="buy_course_id" id="buy_course_id">
                                {{ csrf_field() }}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer wizard-actions">
                    <button class="btn btn-success btn-sm btn-next" data-last="Finish">
                        ยืนยัน
                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>

                    <button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        ยกเลิก
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
