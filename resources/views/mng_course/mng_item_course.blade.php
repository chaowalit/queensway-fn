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
			<li class="active">เพิ่ม/ลบ/แก้ไข รายการคอร์ส (item)</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

				<div class="row">
					<div class="col-xs-12">
						<h3 class="header smaller lighter blue">เพิ่ม/ลบ/แก้ไข รายการคอร์ส (item)</h3>

						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="table-header">
							แสดงผลรายการคอร์ส (item) ที่มี &nbsp; >>> <a href="{{ url('mng_course/create_item') }}"><b style="color: black;">เพิ่มรายการคอร์ส (item)</b></a>
						</div>

						<!-- div.table-responsive -->

						<!-- div.dataTables_borderWrap -->
						<div>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>

										<th class="">
											สถานะ
										</th>
										<th>ประเภทคอร์สหรือไอเทม</th>
										<th>ชื่อคอร์สหรือไอเทม</th>
										<th>ราคา/ครั้ง(บาท)</th>

										<th class="hidden-480">หมายเหตุ</th>


										<th></th>
									</tr>
								</thead>

								<tbody>
									@foreach($view_data['item_of_course'] as $val)
									<tr class="mng-row-{{ $val->item_of_course_id }}">

										<td class="">
											<span class="label label-sm label-{{ ($val->active == 1)? 'success':'danger' }} arrowed arrowed-righ">{{ ($val->active == 1)? 'Active':'Inactive' }}</span>
										</td>
										<td>
											<span class="label label-sm label-{{ (($val->item_of_course_id % 2) == 0)? 'pink':'info' }} arrowed-in arrowed-in-right">
												<big>{{ $val->category_item_name }}</big>
											</span>
										</td>
										<td>
											<a href="#">{{ $val->item_name }}</a>
										</td>
										<td>{{ $val->price }}</td>
										<td class="hidden-480">{{ $val->comment }}</td>

										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												<!--
												<a class="blue" href="#modal-table" role="button" data-toggle="modal">
													<i class="ace-icon fa fa-search-plus bigger-130"></i>
												</a>
												-->
												<a class="green" href="#">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>

												<a class="red" href="#" onclick="del_item_of_course({{ $val->item_of_course_id }})">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
												</a>
												<div id="dialog-confirm-{{ $val->item_of_course_id }}" class="hide">
							                        <div class="alert alert-info bigger-110">
							                            กรุณาตรวจสอบความถูกต้อง ก่อนลบข้อมูลนี้
							                        </div>

							                        <div class="space-6"></div>

							                        <p class="bigger-110 bolder center grey">
							                            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
							                            คุณแน่ใจหรือไม่ ที่จะลบข้อมูล {{ $val->item_name }} ?
							                        </p>
							                    </div><!-- #dialog-confirm -->
											</div>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="modal-table" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header no-padding">
								<div class="table-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										<span class="white">&times;</span>
									</button>
									Results for "Latest Registered Domains
								</div>
							</div>

							<div class="modal-body no-padding">
								<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
									<thead>
										<tr>
											<th>Domain</th>
											<th>Price</th>
											<th>Clicks</th>

											<th>
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												Update
											</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>
												<a href="#">ace.com</a>
											</td>
											<td>$45</td>
											<td>3,330</td>
											<td>Feb 12</td>
										</tr>

										<tr>
											<td>
												<a href="#">base.com</a>
											</td>
											<td>$35</td>
											<td>2,595</td>
											<td>Feb 18</td>
										</tr>

										<tr>
											<td>
												<a href="#">max.com</a>
											</td>
											<td>$60</td>
											<td>4,400</td>
											<td>Mar 11</td>
										</tr>

										<tr>
											<td>
												<a href="#">best.com</a>
											</td>
											<td>$75</td>
											<td>6,500</td>
											<td>Apr 03</td>
										</tr>

										<tr>
											<td>
												<a href="#">pro.com</a>
											</td>
											<td>$55</td>
											<td>4,250</td>
											<td>Jan 21</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="modal-footer no-margin-top">
								<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
									<i class="ace-icon fa fa-times"></i>
									Close
								</button>

								<ul class="pagination pull-right no-margin">
									<li class="prev disabled">
										<a href="#">
											<i class="ace-icon fa fa-angle-double-left"></i>
										</a>
									</li>

									<li class="active">
										<a href="#">1</a>
									</li>

									<li>
										<a href="#">2</a>
									</li>

									<li>
										<a href="#">3</a>
									</li>

									<li class="next">
										<a href="#">
											<i class="ace-icon fa fa-angle-double-right"></i>
										</a>
									</li>
								</ul>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>
<script type="text/javascript">

</script>
@endsection
