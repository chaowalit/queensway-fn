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
			<li class="">
				<a href="#">ซื้อคอร์สที่เปิดขาย</a>
			</li>
			<li class="active">ใบเสร็จการสั่งซื้อคอร์ส</li>
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
				ใบเสร็จการสั่งซื้อคอร์ส
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>

				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<!--<div class="hr dotted"></div>-->

				<?php //dump($view_data); ?>
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs" id="myTab3">
						<li class="active">
							<a data-toggle="tab" href="#home3" aria-expanded="true">
								<i class="pink ace-icon fa fa-tachometer bigger-110"></i>
								ข้อมูลใบเสร็จ
							</a>
						</li>

						<li class="">
							<a data-toggle="tab" href="#profile3" aria-expanded="false">
								<i class="blue ace-icon fa fa-user bigger-110"></i>
								ประวัติการชำระเงิน
							</a>
						</li>

						<li class="">
							<a data-toggle="tab" href="#dropdown13" aria-expanded="false">
								<i class="ace-icon fa fa-rocket"></i>
								ประวัติการใช้คอร์ส
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="home3" class="tab-pane active">

							<div class="widget-box transparent">
								<div class="widget-header widget-header-large">
									<h3 class="widget-title grey lighter">
										<i class="ace-icon fa fa-leaf green"></i>
										ข้อมูลใบเสร็จลูกค้า
									</h3>

									<div class="widget-toolbar no-border invoice-info">
										<span class="invoice-info-label">เล่มที่ใบเสร็จ:</span>
										<span class="red">{{ $view_data['book_no'] }}</span>

										<br>
										<span class="invoice-info-label">เลขที่ใบเสร็จ:</span>
										<span class="red">{{ $view_data['number_no'] }}</span>

										<br>
										<span class="invoice-info-label">วันที่ซื้อ:</span>
										<span class="blue">{{ date("d-m-Y H:i:s", strtotime($view_data['created_at'])) }}</span>
									</div>

									<div class="widget-toolbar hidden-480" style="line-height: 72px;">
										<a href="#">
											<!--<i class="ace-icon fa fa-print"></i>-->
										</a>
									</div>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-24">
										<div class="row">
											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
														<b>ข้อมูลคอร์สที่ซื้อ</b>
													</div>
												</div>

												<div>
													<ul class="list-unstyled spaced">
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ประเภทคอร์ส:-
															<b class="red">{{ $view_data['type_course'] == 'credit'? 'แบบวงเงิน':'แบบรายคอร์ส' }}</b>
														</li>
														@if($view_data['type_course'] == 'credit')
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ยอดที่ซื้อจริง:-
															<b class="red">{{ $view_data['total_price'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>จำนวนเท่า:-
															<b class="red">{{ number_format($view_data['multiplier_price']) }} เท่าของยอดที่ซื้อจริง</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ได้วงเงินทั้งหมด:-
															<b class="red">{{ $view_data['total_credit'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>Consultant:-
															<b class="red">{{ $view_data['consultant'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ยอดชำระทั้งหมด:-
															<b class="red">{{ $view_data['payment_amount_total'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>วงเงินขณะนี้:-
															<b class="red">{{ $view_data['limit_credit'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ยอดค้างชำระทั้งหมด:-
															<b class="red">{{ $view_data['accrued_expenses'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>วงเงินที่ใช้ไปทั้งหมด:-
															<b class="red">{{ $view_data['usage_credit'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>สถานะคอร์ส:-
															<b class="red">{{ $view_data['status_course'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>หมายเหตุ:-
															<b class="red">{{ $view_data['comment'] }}</b>
														</li>

														@else
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>รวมราคาทั้งหมด:-
															<b class="red">{{ $view_data['total_price'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>Consultant:-
															<b class="red">{{ $view_data['consultant'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ยอดชำระทั้งหมด:-
															<b class="red">{{ $view_data['payment_amount_total'] }} บาท</b>
														</li>

														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>ยอดค้างชำระทั้งหมด:-
															<b class="red">{{ $view_data['accrued_expenses'] }} บาท</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>สถานะคอร์ส:-
															<b class="red">{{ $view_data['status_course'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>หมายเหตุ:-
															<b class="red">{{ $view_data['comment'] }}</b>
														</li>

														@endif
														<!--
														<li class="divider"></li>
														<li>
															<i class="ace-icon fa fa-caret-right blue"></i>:-
															<b class="red"></b>
														</li>
														-->
													</ul>
												</div>
											</div><!-- /.col -->

											<div class="col-sm-6">
												<div class="row">
													<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
														<b>ข้อมูลลูกค้า</b>
													</div>
												</div>

												<div>
													<ul class="list-unstyled  spaced">
														<li>
															<i class="ace-icon fa fa-caret-right green"></i>รหัสลูกค้า:-
															<b class="red">{{ $view_data['data_customer']['customer_number'] }}</b>
														</li>

														<li>
															<i class="ace-icon fa fa-caret-right green"></i>ชื่อ-นามสกุล:-
															<b class="red">{{ $view_data['data_customer']['prefix'] }} {{ $view_data['data_customer']['full_name'] }}</b>
														</li>

														<li>
															<i class="ace-icon fa fa-caret-right green"></i>หมายเลข ปปช.:-
															<b class="red">{{ $view_data['data_customer']['thai_id'] }}</b>
														</li>

														<li>
															<i class="ace-icon fa fa-caret-right green"></i>ที่อยู่:-
															<b class="red">{{ $view_data['data_customer']['address'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right green"></i>โทร:-
															<b class="red">{{ $view_data['data_customer']['tel'] }}</b>
														</li>
														<li>
															<i class="ace-icon fa fa-caret-right green"></i>อีเมล:-
															<b class="red">{{ $view_data['data_customer']['email'] }}</b>
														</li>
													</ul>
												</div>
											</div><!-- /.col -->
										</div><!-- /.row -->

										<div class="space"></div>

										<div>
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th class="center">#</th>
														<th>รายการคอร์ส(item)</th>
														<th class="hidden-xs">จำนวนครั้ง</th>
														<th class="hidden-xs">จำนวนใช้ไป</th>
														<th class="hidden-480">ราคาต่อครั้ง(บาท)</th>
														<th>รวมราคา(บาท)</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$item_of_course = ($view_data['type_course'] == 'debit')? unserialize($view_data['item_of_course']) : []; //dump($item_of_course); ?>
													@foreach($item_of_course as $key => $val)
													<tr>
														<td class="center">{{ $key+1 }}</td>

														<td>
															<a href="#">{{ $val['item_name'] }}</a>
														</td>
														<td class="hidden-xs">
															{{ $val['amount_total'] }}
														</td>
														<td class="hidden-480">{{ $val['amount_usage'] }}</td>
														<td class="hidden-480">{{ $val['price_per_unit'] }}</td>
														<td>{{ $val['total_per_item'] }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="hr hr8 hr-double hr-dotted"></div>

										<div class="row">
											<div class="col-sm-5 pull-right">
												<h4 class="pull-right">
													รวมราคาทั้งหมด :
													<span class="red">฿{{ $view_data['total_price'] }}</span>
												</h4>
											</div>
											<div class="col-sm-7 pull-left red"> *ตารางแสดงรายการคอร์สที่ซื้อทั้งหมด (แบบรายคอร์ส) เท่านั้น</div>
										</div>

										<div class="space-6"></div>
										<div class="well">
											ถ้าหากคุณไม่ต้องการใบเสร็จการสั่งซื้อคอร์สนี้ คุณสามารถทำการลบคอร์สได้จาก (<a href="#">ลบคอร์สนี้</a>)
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="profile3" class="tab-pane">

							<div class="widget-box transparent">
								<div class="widget-header widget-header-large">
									<h3 class="widget-title grey lighter">
										<i class="ace-icon fa fa-leaf green"></i>
										ประวัติการชำระเงิน
									</h3>

									<div class="widget-toolbar no-border invoice-info">
										<span class="invoice-info-label">เล่มที่ใบเสร็จ:</span>
										<span class="red">{{ $view_data['book_no'] }}</span>

										<br>
										<span class="invoice-info-label">เลขที่ใบเสร็จ:</span>
										<span class="red">{{ $view_data['number_no'] }}</span>

										<br>
										<span class="invoice-info-label">วันที่ซื้อ:</span>
										<span class="blue">{{ date("d-m-Y H:i:s", strtotime($view_data['created_at'])) }}</span>
									</div>

									<div class="widget-toolbar hidden-480" style="line-height: 72px;">
										<a href="#">
											<!--<i class="ace-icon fa fa-print"></i>-->
										</a>
									</div>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-24">
										<div class="row">


										</div><!-- /.row -->

										<div class="space"></div>

										<div>
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th class="center">#</th>
														<th>ข้อมูลการชำระ</th>
														<th>ยอดชำระ(บาท)</th>
														<th>วันที่ชำระ</th>

													</tr>
												</thead>

												<tbody>
													@foreach($view_data['history_payment'] as $key => $val)
														<tr>
															<td>{{ $key+1 }}</td>
															<td>
																ธนาคาร:- {{ $val['bank_name'] }}<br>
																ประเภทการชำระ:- {{ $val['payment_type'] }}<br>
																จำนวนเงินสด:- {{ $val['cash'] }} บาท<br>
																จำนวนตัดผ่านบัตร:- {{ $val['credit_debit_card'] }} บาท<br>
																TID:- {{ $val['TID'] }}<br>
																MID:- {{ $val['MID'] }}<br>
																หมายเหตุ:- {{ $val['comment'] }}<br>
															</td>
															<td>{{ $val['payment_amount'] }}</td>
															<td>{{ date("d-m-Y", strtotime($val['created_at'])) }}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="hr hr8 hr-double hr-dotted"></div>

										<div class="row">
											<div class="col-sm-5 pull-right">
												<h4 class="pull-right">
													รวมยอดชำระทั้งหมด :
													<span class="red">฿{{ $view_data['payment_amount_total'] }}</span>
												</h4>
											</div>
											<div class="col-sm-7 pull-left red"> </div>
										</div>

										<div class="space-6"></div>
										<div class="well">
											ถ้าหากคุณไม่ต้องการใบเสร็จการสั่งซื้อคอร์สนี้ คุณสามารถทำการลบคอร์สได้จาก (<a href="#">ลบคอร์สนี้</a>)
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="dropdown13" class="tab-pane">
							<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
							<p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
						</div>
					</div>
				</div>

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>

@endsection
