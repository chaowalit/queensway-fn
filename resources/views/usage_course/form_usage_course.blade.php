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
			<li class="">ตัด/ ชำระเงิน/ ยกเลิก</li>
			<li class="active">ตัดคอร์ส</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<!-- <form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form> -->
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

		<div class="page-header">
			<h1>
				ตัดคอร์ส
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					<!-- and Validation -->
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<!-- <h4 class="lighter">
					<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
					<a href="#modal-wizard" data-toggle="modal" class="pink"> Wizard Inside a Modal Box </a>
				</h4> -->

				<!-- <div class="hr hr-18 hr-double dotted"></div> -->

				<div class="widget-box">
					<div class="widget-header widget-header-blue widget-header-flat">
						<h4 class="widget-title lighter">กรุณาเลือกรายการที่ต้องการตัดคอร์ส</h4>

						<div class="widget-toolbar">
							<label>
								<small class="green">
									<b>ข้อมูลคอร์ส:</b>
								</small>

								<a href="#modal-wizard" data-toggle="modal" class="btn btn-xs btn-info" style="border-radius: 5px!important;padding-top: 0px;padding-bottom: 0px;">
									<i class="ace-icon fa fa-search bigger-160"></i>
								</a>
							</label>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div id="fuelux-wizard-container" class="">
								<div>
									<ul class="steps">
										<li data-step="1" class="active">
											<span class="step">1</span>
											<span class="title">เลือกรายการ</span>
										</li>

										<li data-step="2" class="active">
											<span class="step">2</span>
											<span class="title">ใส่จำนวน</span>
										</li>

										<li data-step="3" class="active">
											<span class="step">3</span>
											<span class="title">กำหนดราคาต่อหน่วย</span>
										</li>

										<li data-step="4" class="active">
											<span class="step">4</span>
											<span class="title">ตรวจสอบรายการทั้งหมด</span>
										</li>
									</ul>
								</div>

								<hr>
								<?php
								//dump($view_data['course']);
								//dump($view_data['item_of_course']);
								$item_of_course = @unserialize($view_data['course']['item_of_course']);
								//dump($item_of_course);
								?>
								<div class="step-content pos-rel">
									<div class="step-pane active" data-step="1">
										<h3 class="lighter block green" style="margin-top: 0px;">{{ $view_data['course']['data_customer']['prefix'] }} {{ $view_data['course']['data_customer']['full_name'] }} ({{ $view_data['course']['data_customer']['nickname'] }})</h3>
										<div class="row">
											<div class="col-xs-12">
												<form action="{{ url('usage_course/save_form_usage_course') }}" id="send_form_usage_course" method="post">
												<input type="hidden" name="buy_course_id" value="{{ $view_data['course']['id'] }}">
												<input type="hidden" name="type_course" value="{{ $view_data['course']['type_course'] }}">

												<table id="simple-table" class="table table-striped table-bordered table-hover">
													<thead>
														<tr style="background: #438eb9;color:white;">
															@if($view_data['course']['type_course'] == 'credit')
															<th class="center"></th>
															<th>รายการคอร์ส(item)</th>
															<th class="hidden-480">ราคาวงเงิน(บาท)</th>

															<th style="width:7%;">
																จำนวนครั้ง
															</th>
															<th class="hidden-480" style="width:10%;">ราคาต่อครั้ง(บาท)</th>

															<th style="width:11%;">รวมราคา(บาท)</th>
															@else
															<th class="center"></th>
															<th>รายการคอร์ส(item)</th>
															<th>จำนวนที่ซื้อ</th>
															<th>จำนวนที่ใช้</th>
															<th style="width:7%;">
																จำนวนครั้ง
															</th>
															<th class="hidden-480" style="width:10%;">ราคาต่อครั้ง(บาท)</th>

															<th style="width:11%;">รวมราคา(บาท)</th>
															@endif
														</tr>
													</thead>

													<tbody>
														@if($view_data['course']['type_course'] == 'credit')
														@foreach($view_data['item_of_course'] as $key => $val)
														<!-- แบบวงเงิน -->
														<tr>
															<td class="center">
																<label class="pos-rel">
																	<input type="checkbox" name="check_usage_course[]" id="check_usage_course_{{ $val->item_of_course_id }}" value="{{ $val->item_of_course_id }}" onclick="checked_usage_course('{{ $val->item_of_course_id }}')" class="ace">
																	<span class="lbl"></span>
																</label>
															</td>
															<td>
																<a href="#">{{ $val->item_name }}</a>
															</td>
															<td>{{ number_format($val->price_credit, 2) }}</td>
															<td>
																<span class="block input-icon input-icon-right">
																	<select class="form-control" onchange="selected_amount_usage_course('{{ $val->item_of_course_id }}')" name="amount_{{ $val->item_of_course_id }}" id="amount_{{ $val->item_of_course_id }}" >
																		<?php for($i = 1;$i <= 5;$i++){ ?>
																		<option value="{{ $i }}">{{ $i }}</option>
																		<?php } ?>
																	</select>
																</span>
															</td>

															<td class="hidden-480">
																<span class="block input-icon input-icon-right">
																	<input type="number" name="price_per_unit_{{ $val->item_of_course_id }}" id="price_per_unit_{{ $val->item_of_course_id }}" value="{{ $val->price_credit }}" class="width-100" readonly="true">
																	<i class="ace-icon fa fa-info-circle"></i>
																</span>
															</td>

															<td>
																<span class="block input-icon input-icon-right">
																	<input type="number" name="total_per_item_{{ $val->item_of_course_id }}" id="total_per_item_{{ $val->item_of_course_id }}" class="width-100" readonly="true">
																	<i class="ace-icon fa fa-info-circle"></i>
																</span>
															</td>
														</tr>
														<input type="hidden" name="category_item_name_{{ $val->item_of_course_id }}" value="{{ $val->category_item_name }}">
														<input type="hidden" name="item_name_{{ $val->item_of_course_id }}" value="{{ $val->item_name }}">

														@endforeach
														@else
														@foreach($item_of_course as $key => $val)
														<!-- แบบรายคอร์ส -->
														<tr>
															<td class="center">
																<label class="pos-rel">
																	<input type="checkbox" name="check_usage_course[]" id="check_usage_course_{{ $val['item_of_course_id'] }}" value="{{ $val['item_of_course_id'] }}" onclick="checked_usage_course('{{ $val['item_of_course_id'] }}')" class="ace">
																	<span class="lbl"></span>
																</label>
															</td>
															<td>
																<a href="#">{{ $val['item_name'] }}</a>
															</td>
															<td>{{ $val['amount_total'] }}</td>
															<td>{{ $val['amount_usage'] }}</td>
															<td>
																<span class="block input-icon input-icon-right">
																	<select class="form-control" onchange="selected_amount_usage_course('{{ $val['item_of_course_id'] }}')" name="amount_{{ $val['item_of_course_id'] }}" id="amount_{{ $val['item_of_course_id'] }}">
																		<?php

																		for($i = 1;$i <= ($val['amount_total'] - $val['amount_usage']);$i++){ ?>
																		<option value="{{ $i }}">{{ $i }}</option>
																		<?php } ?>
																	</select>
																</span>
															</td>

															<td class="hidden-480">
																<span class="block input-icon input-icon-right">
																	<input type="number" name="price_per_unit_{{ $val['item_of_course_id'] }}" id="price_per_unit_{{ $val['item_of_course_id'] }}" value="{{ $val['price_per_unit'] }}" class="width-100" readonly="true">
																	<i class="ace-icon fa fa-info-circle"></i>
																</span>
															</td>

															<td>
																<span class="block input-icon input-icon-right">
																	<input type="number" name="total_per_item_{{ $val['item_of_course_id'] }}" id="total_per_item_{{ $val['item_of_course_id'] }}" class="width-100" readonly="true">
																	<i class="ace-icon fa fa-info-circle"></i>
																</span>
															</td>
														</tr>
														<input type="hidden" name="category_item_name_{{ $val['item_of_course_id'] }}" value="{{ $val['category_item_name'] }}">
														<input type="hidden" name="item_name_{{ $val['item_of_course_id'] }}" value="{{ $val['item_name'] }}">

														@endforeach
														@endif

													</tbody>
												</table>
												{{ csrf_field() }}
												</form>

												<table id="" class="table table-striped table-bordered table-hover">
													<tr>
														<th colspan="4" class="center">
															สรุปทั้งหมด
														</th>

														<th class="center" style="width:7%;">
															<b><span id="summary_amount">0</span></b>
														</th>
														<th class="center" style="width:10%;">
															<span id="summary_price_per_unit"></span>
														</th>
														<th class="center" style="width:11%;">
															<b><span id="summary_total_per_item">0.00</span></b>
														</th>
													</tr>
													<tr>
														<!-- <th colspan="7" style="text-align:right;border:none;">
															<button class="btn btn-white btn-info btn-bold">
																<i class="ace-icon fa fa-refresh bigger-120 blue"></i>
																สรุปทั้งหมด
															</button>
														</th> -->
													</tr>
												</table>
											</div><!-- /.span -->
										</div>
										<!-- <form class="form-horizontal" id="sample-form">
											<div class="form-group has-warning">
												<label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with warning</label>

												<div class="col-xs-12 col-sm-5">
													<span class="block input-icon input-icon-right">
														<input type="text" id="inputWarning" class="width-100">
														<i class="ace-icon fa fa-leaf"></i>
													</span>
												</div>
												<div class="help-block col-xs-12 col-sm-reset inline"> Warning tip help! </div>
											</div>

											<div class="form-group has-error">
												<label for="inputError" class="col-xs-12 col-sm-3 col-md-3 control-label no-padding-right">Input with error</label>

												<div class="col-xs-12 col-sm-5">
													<span class="block input-icon input-icon-right">
														<input type="text" id="inputError" class="width-100">
														<i class="ace-icon fa fa-times-circle"></i>
													</span>
												</div>
												<div class="help-block col-xs-12 col-sm-reset inline"> Error tip help! </div>
											</div>

											<div class="form-group has-success">
												<label for="inputSuccess" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with success</label>

												<div class="col-xs-12 col-sm-5">
													<span class="block input-icon input-icon-right">
														<input type="text" id="inputSuccess" class="width-100">
														<i class="ace-icon fa fa-check-circle"></i>
													</span>
												</div>
												<div class="help-block col-xs-12 col-sm-reset inline"> Success tip help! </div>
											</div>

											<div class="form-group has-info">
												<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with info</label>

												<div class="col-xs-12 col-sm-5">
													<span class="block input-icon input-icon-right">
														<input type="text" id="inputInfo" class="width-100">
														<i class="ace-icon fa fa-info-circle"></i>
													</span>
												</div>
												<div class="help-block col-xs-12 col-sm-reset inline"> Info tip help! </div>
											</div>

											<div class="form-group">
												<label for="inputError2" class="col-xs-12 col-sm-3 control-label no-padding-right">Input with error</label>

												<div class="col-xs-12 col-sm-5">
													<span class="input-icon block">
														<input type="text" id="inputError2" class="width-100">
														<i class="ace-icon fa fa-times-circle red"></i>
													</span>
												</div>
												<div class="help-block col-xs-12 col-sm-reset inline"> Error tip help! </div>
											</div>
										</form> -->

										<!-- <form class="form-horizontal hide" id="validation-form" method="get" novalidate="novalidate">
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="email" name="email" id="email" class="col-xs-12 col-sm-6">
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="password" id="password" class="col-xs-12 col-sm-4">
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="password2" id="password2" class="col-xs-12 col-sm-4">
													</div>
												</div>
											</div>

											<div class="hr hr-dotted"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Company Name:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="text" id="name" name="name" class="col-xs-12 col-sm-5">
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Phone Number:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="ace-icon fa fa-phone"></i>
														</span>

														<input type="tel" id="phone" name="phone">
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Company URL:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="url" id="url" name="url" class="col-xs-12 col-sm-8">
													</div>
												</div>
											</div>

											<div class="hr hr-dotted"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right">Subscribe to</label>

												<div class="col-xs-12 col-sm-9">
													<div>
														<label>
															<input name="subscription" value="1" type="checkbox" class="ace">
															<span class="lbl"> Latest news and announcements</span>
														</label>
													</div>

													<div>
														<label>
															<input name="subscription" value="2" type="checkbox" class="ace">
															<span class="lbl"> Product offers and discounts</span>
														</label>
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right">Gender</label>

												<div class="col-xs-12 col-sm-9">
													<div>
														<label class="line-height-1 blue">
															<input name="gender" value="1" type="radio" class="ace">
															<span class="lbl"> Male</span>
														</label>
													</div>

													<div>
														<label class="line-height-1 blue">
															<input name="gender" value="2" type="radio" class="ace">
															<span class="lbl"> Female</span>
														</label>
													</div>
												</div>
											</div>

											<div class="hr hr-dotted"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">State</label>

												<div class="col-xs-12 col-sm-9">
													<div class="select2-container select2" id="s2id_state" style="width: 200px;"><a href="javascript:void(0)" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-1">Click to Choose...</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen1" class="select2-offscreen">State</label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-1" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen1_search" class="select2-offscreen">State</label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-1" id="s2id_autogen1_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-1">   </ul></div></div><select id="state" name="state" class="select2" data-placeholder="Click to Choose..." style="width: 200px; display: none;" tabindex="-1" title="State">
														<option value="">&nbsp;</option>
														<option value="AL">Alabama</option>
														<option value="AK">Alaska</option>
														<option value="AZ">Arizona</option>
														<option value="AR">Arkansas</option>
														<option value="CA">California</option>
														<option value="CO">Colorado</option>
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="HI">Hawaii</option>
														<option value="ID">Idaho</option>
														<option value="IL">Illinois</option>
														<option value="IN">Indiana</option>
														<option value="IA">Iowa</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="ME">Maine</option>
														<option value="MD">Maryland</option>
														<option value="MA">Massachusetts</option>
														<option value="MI">Michigan</option>
														<option value="MN">Minnesota</option>
														<option value="MS">Mississippi</option>
														<option value="MO">Missouri</option>
														<option value="MT">Montana</option>
														<option value="NE">Nebraska</option>
														<option value="NV">Nevada</option>
														<option value="NH">New Hampshire</option>
														<option value="NJ">New Jersey</option>
														<option value="NM">New Mexico</option>
														<option value="NY">New York</option>
														<option value="NC">North Carolina</option>
														<option value="ND">North Dakota</option>
														<option value="OH">Ohio</option>
														<option value="OK">Oklahoma</option>
														<option value="OR">Oregon</option>
														<option value="PA">Pennsylvania</option>
														<option value="RI">Rhode Island</option>
														<option value="SC">South Carolina</option>
														<option value="SD">South Dakota</option>
														<option value="TN">Tennessee</option>
														<option value="TX">Texas</option>
														<option value="UT">Utah</option>
														<option value="VT">Vermont</option>
														<option value="VA">Virginia</option>
														<option value="WA">Washington</option>
														<option value="WV">West Virginia</option>
														<option value="WI">Wisconsin</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Platform</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<select class="input-medium" id="platform" name="platform">
															<option value="">------------------</option>
															<option value="linux">Linux</option>
															<option value="windows">Windows</option>
															<option value="mac">Mac OS</option>
															<option value="ios">iOS</option>
															<option value="android">Android</option>
														</select>
													</div>
												</div>
											</div>

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment">Comment</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<textarea class="input-xlarge" name="comment" id="comment"></textarea>
													</div>
												</div>
											</div>

											<div class="space-8"></div>

											<div class="form-group">
												<div class="col-xs-12 col-sm-4 col-sm-offset-3">
													<label>
														<input name="agree" id="agree" type="checkbox" class="ace">
														<span class="lbl"> I accept the policy</span>
													</label>
												</div>
											</div>
										</form> -->
									</div>

									<div class="step-pane" data-step="2">
										<div>

										</div>
									</div>

									<div class="step-pane" data-step="3">
										<div class="center">
											<h3 class="blue lighter">This is step 3</h3>
										</div>
									</div>

									<div class="step-pane" data-step="4">
										<div class="center">
											<h3 class="green">Congrats!</h3>
											Your product is ready to ship! Click finish to continue!
										</div>
									</div>
								</div>
							</div>

							<hr>
							<div class="wizard-actions">
								<button class="btn btn-prev">
									<i class="ace-icon fa fa-arrow-left"></i>
									ยกเลิก
								</button>

								<button type="button" id="btn_form_usage_course" class="btn btn-success btn-next" data-last="Finish">
									บันทึกการตัดคอร์ส

								<i class="ace-icon fa fa-arrow-right icon-on-right"></i></button>
							</div>
						</div><!-- /.widget-main -->
					</div><!-- /.widget-body -->
				</div>

				<div id="modal-wizard" class="modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div id="modal-wizard-container">
								<!-- <div class="modal-header">
									<ul class="steps">
										<li data-step="1" class="active">
											<span class="step">1</span>
											<span class="title">Validation states</span>
										</li>

										<li data-step="2">
											<span class="step">2</span>
											<span class="title">Alerts</span>
										</li>

										<li data-step="3">
											<span class="step">3</span>
											<span class="title">Payment Info</span>
										</li>

										<li data-step="4">
											<span class="step">4</span>
											<span class="title">Other Info</span>
										</li>
									</ul>
								</div> -->

								<div class="modal-body step-content">
									<div class="step-pane active" data-step="1">
										<div class="center">
											<h4 class="blue">ข้อมูลคอร์ส</h4>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="timeline-container timeline-style2">
        												<span class="timeline-label" style="width: 120px;">
        													<!-- <u><h4>ข้อมูลคอร์ส</h4></u> -->
        												</span>

        												<div class="timeline-items">
        													<div class="timeline-item clearfix">
        														<div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">ประเภทคอร์ส</a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
        																	<!-- <span class="bigger-110"> -->
        																	<span class="black bolder">
                                                                                {{ $view_data['course']['type_course'] == 'credit'? 'แบบวงเงิน':'แบบรายคอร์ส' }}
                                                                            </span>
        																	<!-- </span> -->


        																</div>
        															</div>
        														</div>
        													</div>

        													<div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">เล่มที่ใบเสร็จ</a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ $view_data['course']['book_no'] }}
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">เลขที่ใบเสร็จ</a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ $view_data['course']['number_no'] }}
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">
                                                                        ราคาทั้งหมด
                                                                    </a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ number_format($view_data['course']['total_price'], 2) }} บาท
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">
                                                                        ยอดชำระทั้งหมด
                                                                    </a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ number_format($view_data['course']['payment_amount_total'], 2) }} บาท
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">
                                                                        ยอดค้างชำระทั้งหมด
                                                                    </a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ number_format($view_data['course']['accrued_expenses'], 2) }} บาท
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

        												</div><!-- /.timeline-items -->
        											</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="timeline-container timeline-style2">
        												<span class="timeline-label">
        													<b></b>
        												</span>
                                                        <div class="timeline-items">
                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
        															<span class="timeline-date"><a href="#" class="purple bolder">
                                                                        Consultant
                                                                    </a></span>

        															<i class="timeline-indicator btn btn-info no-hover"></i>
        														</div>

        														<div class="widget-box transparent">
        															<div class="widget-body">
        																<div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ $view_data['course']['consultant'] }}
                                                                            </span>
        																</div>
        															</div>
        														</div>
        													</div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
                                                                    <span class="timeline-date"><a href="#" class="purple bolder">
                                                                        หมายเหตุ
                                                                    </a></span>

                                                                    <i class="timeline-indicator btn btn-info no-hover"></i>
                                                                </div>

                                                                <div class="widget-box transparent">
                                                                    <div class="widget-body">
                                                                        <div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ $view_data['course']['comment'] }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
                                                                    <span class="timeline-date"><a href="#" class="purple bolder">
                                                                        วันที่ซื้อ
                                                                    </a></span>

                                                                    <i class="timeline-indicator btn btn-info no-hover"></i>
                                                                </div>

                                                                <div class="widget-box transparent">
                                                                    <div class="widget-body">
                                                                        <div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ date("d-m-Y H:i:s", strtotime($view_data['course']['created_at'])) }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="timeline-item clearfix">
                                                                <div class="timeline-info">
                                                                    <span class="timeline-date"><a href="#" class="purple bolder">
                                                                        สถานะคอร์ส
                                                                    </a></span>

                                                                    <i class="timeline-indicator btn btn-info no-hover"></i>
                                                                </div>

                                                                <div class="widget-box transparent">
                                                                    <div class="widget-body">
                                                                        <div class="widget-main no-padding">
                                                                            <span class="black bolder">
                                                                                {{ $view_data['course']['status_course'] }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

										</div>
									</div>

									<div class="step-pane" data-step="2">
										<div class="center">
											<h4 class="blue">Step 2</h4>
										</div>
									</div>

									<div class="step-pane" data-step="3">
										<div class="center">
											<h4 class="blue">Step 3</h4>
										</div>
									</div>

									<div class="step-pane" data-step="4">
										<div class="center">
											<h4 class="blue">Step 4</h4>
										</div>
									</div>
								</div>
							</div>

							<div class="modal-footer wizard-actions">
								<!-- <button class="btn btn-sm btn-prev" disabled="disabled">
									<i class="ace-icon fa fa-arrow-left"></i>
									Prev
								</button>

								<button class="btn btn-success btn-sm btn-next" data-last="Finish">
									Next
									<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
								</button> -->

								<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
									<i class="ace-icon fa fa-times"></i>
									Cancel
								</button>
							</div>
						</div>
					</div>
				</div><!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>
@endsection
