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
			<a href="{{ url('report') }}" class="btn btn-xs btn-prev">
				<i class="ace-icon fa fa-arrow-left"></i>
				กลับหน้าหลัก
			</a>
        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                รายงาน
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <!--ดูข้อมูล &amp; แก้ไขข้อมูล &amp; ลบข้อมูล ลูกค้าที่นี้-->
                    ผลการค้นหารายคน => ตั้งแต่ {{ $view_data['date_range'] }}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <?php echo csrf_field(); ?>


		<div class="row">
           <div id="messages" class="page-header"> 
           		<h4 class="header green bolder smaller" style="text-align: center;margin-bottom: 0px;margin-top: 0px;padding-bottom: 0px;border-bottom:none;">
					{{ $view_data['customer'][0]->prefix }} {{ $view_data['customer'][0]->full_name }} ({{ $view_data['customer'][0]->nickname }})
					<br>

					<form action="{{ url('gen_report_for_person_all') }}" method="get" id="form_gen_report_for_person_all">
						<input type="hidden" name="date_range" value="{{ $view_data['date_range'] }}">
						<input type="hidden" name="customer_id" value="{{ $view_data['customer_id'] }}">
						<input type="hidden" name="type_report" value="{{ $view_data['type_report'] }}">
					</form>
					<a href="#" id="btn_gen_report_for_person_all">
						<span class="ace-icon fa fa-download icon-on-right bigger-110"></span>
						Download All
					</a>
           		</h4>
				
				@if($view_data['type_report'] == 'credit')
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
							@if($val->type_course == 'credit')
							<tr>
								<td>{{ $val->status_course }}</td>
								<td>{{ $val->book_no }}<br>{{ $val->number_no }}</td>
								<td>{{ number_format($val->total_price, 2) }}</td>

								<td>{{ number_format($val->payment_amount_total, 2) }}</td>
								<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>
								<td>{{ number_format($val->limit_credit, 2) }}</td>
								<td>{{ number_format($val->usage_credit, 2) }}</td>
								<td>{{ $val->consultant }}</td>
								<td>
									<div class="btn-group">
										<form action="{{ url('gen_report_for_person_all') }}" method="get" 
										id="form_gen_report_for_person_all">
											<input type="hidden" name="date_range" value="{{ $view_data['date_range'] }}">
											<input type="hidden" name="customer_id" value="{{ $view_data['customer_id'] }}">
											<input type="hidden" name="type_report" value="{{ $view_data['type_report'] }}">
											<input type="hidden" name="course_id" value="{{ $val->id }}">

											<button type="submit" class="btn btn-purple btn-sm" id="">
	    										<span class="ace-icon fa fa-download icon-on-right bigger-110"></span>
	    										Download
	    									</button>
										</form>
                                        
									</div>
								</td>

							</tr>
							@endif
						@endforeach
					</tbody>
				</table>

				@else
					<h4 class="header blue bolder smaller" style="display: none;">แบบวงเงิน</h4>
					<table id="dynamic-table-1" class="table table-striped table-bordered table-hover" style="display: none;">
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
						</tbody>
					</table>

					<style type="text/css">
						#dynamic-table-1_wrapper {
							display: none;
						}
					</style>
				@endif

				@if($view_data['type_report'] == 'debit')
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
							@if($val->type_course == 'debit')
							<tr>
								<td>{{ $val->status_course }}</td>
								<td>{{ $val->book_no }}<br>{{ $val->number_no }}</td>
								<td>{{ number_format($val->total_price, 2) }}</td>

								<td>{{ number_format($val->payment_amount_total, 2) }}</td>
								<td style="{{ (number_format($val->accrued_expenses, 2) > 0)? "color: red;":"color: blue;" }}">{{ number_format($val->accrued_expenses, 2) }}</td>

								<td>{{ $val->consultant }}</td>
								<td>
									<div class="btn-group">
                                       <form action="{{ url('gen_report_for_person_all') }}" method="get" 
										id="form_gen_report_for_person_all">
											<input type="hidden" name="date_range" value="{{ $view_data['date_range'] }}">
											<input type="hidden" name="customer_id" value="{{ $view_data['customer_id'] }}">
											<input type="hidden" name="type_report" value="{{ $view_data['type_report'] }}">
											<input type="hidden" name="course_id" value="{{ $val->id }}">

											<button type="submit" class="btn btn-purple btn-sm" id="">
	    										<span class="ace-icon fa fa-download icon-on-right bigger-110"></span>
	    										Download
	    									</button>
										</form>
									</div>
								</td>

							</tr>
							@endif
						@endforeach
					</tbody>
				</table>
				@endif

			</div>

		</div>

    </div><!-- /.page-content -->
</div>

@endsection