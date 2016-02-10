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
				<a href="#">จัดการข้อมูลลูกค้า</a>
			</li>
			<li class="active">เพิ่มข้อมูลลูกค้า</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<!--
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
				-->
				<a href="{{ url('customers') }}" class="btn btn-xs btn-prev">
					<i class="ace-icon fa fa-arrow-left"></i>
					กลับหน้าหลัก
				</a>
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

		<div class="page-header">
			<h1>
				ฟอร์มเพิ่มข้อมูลลูกค้า
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					คุณสามารถสมัครสมาชิกให้กับลูกค้า ได้ที่นี้
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
				</div>
				@endif
				@if(Session::has('status'))
				<div class="alert alert-success">
					บันทึกข้อมูลลูกค้าสำเร็จแล้ว คุณสามารถดูข้อมูลที่บันทึกได้ที่ <a href="{{ url('/customers') }}">แสดงข้อมูลลูกค้าทั้งหมด</a>
				</div>
				@endif
				<!-- PAGE CONTENT BEGINS -->
				<form action="{{ url('/save_customer') }}" class="form-horizontal" role="form" method="POST">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="customer_number"> รหัสลูกค้า </label>

						<div class="col-sm-9">
							<input type="text" name="customer_number" id="customer_number" placeholder="รหัสลูกค้า" class="col-xs-10 col-sm-5" value="{{ old('customer_number') }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="prefix"> คำนำหน้า </label>

						<div class="col-sm-9">
							<!--<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5">-->
							<div class="col-xs-6 col-sm-2" style="padding-left: 0px;">
								<select class="form-control" id="prefix" name="prefix">
									<option value="คุณ" {{ old('prefix') == 'คุณ'? 'selected':'' }}>คุณ</option>
									<option value="นาย" {{ old('prefix') == 'นาย'? 'selected':'' }}>นาย</option>
									<option value="นาง" {{ old('prefix') == 'นาง'? 'selected':'' }}>นาง</option>
									<option value="นางสาว" {{ old('prefix') == 'นางสาว'? 'selected':'' }}>นางสาว</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="full_name"> ชื่อ-นามสกุล </label>

						<div class="col-sm-9">
							<input type="text" name="full_name" id="full_name" placeholder="ชื่อ-นามสกุล" class="col-xs-10 col-sm-5" value="{{ old('full_name') }}">
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="thai_id"> เลขบัตร ปปช. </label>

						<div class="col-sm-9">
							<input type="number" name="thai_id" id="thai_id" placeholder="เลขบัตร ปปช." class="col-xs-10 col-sm-5" value="{{ old('thai_id') }}">
							<span class="help-inline col-xs-12 col-sm-7">
								<!--<span class="middle">Inline help text</span>-->
							</span>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="address"> ที่อยู่ </label>

						<div class="col-sm-9">
							<textarea class="col-xs-10 col-sm-8" name="address" id="address" placeholder="ที่อยู่" rows="3">{{ old('address') }}</textarea>
							<span class="help-inline col-xs-12 col-sm-7">
								<!--
								<label class="middle">
									<input class="ace" type="checkbox" id="id-disable-check">
									<span class="lbl"> Disable it!</span>
								</label>
								-->
							</span>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="nickname">ชื่อเล่น</label>

						<div class="col-sm-9">
							<input class="input-sm" type="text" name="nickname" id="nickname" placeholder="ชื่อเล่น" value="{{ old('nickname') }}">
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="tel">โทรศัพท์</label>

						<div class="col-sm-9">
							<div class="clearfix">
								<input class="col-xs-5" type="text" name="tel" id="tel" placeholder="โทรศัพท์" value="{{ old('tel') }}">
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="email">Email</label>

						<div class="col-sm-9">
							<div class="clearfix">
								<input class="col-xs-5" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="birthday">วัน-เดือน-ปี เกิด</label>

						<div class="col-sm-9">
							<div class="col-xs-5 col-sm-5" style="padding-left: 0px;">
								<div class="input-group">
									<input class="form-control date-picker" name="birthday" id="birthday" type="text" data-date-format="dd-mm-yyyy" value="{{ old('birthday') }}">
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span>
								</div>
							</div>
							<span class="help-inline col-xs-12 col-sm-7">
								<label class="middle" style="color: red;">
									<span class="lbl"> รูปแบบ : วว-ดด-ปปปป, ตัวอย่าง : 12-02-1991</span>
								</label>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="intolerance_history"> ประวัติการแพ้ยา </label>

						<div class="col-sm-9">
							<textarea class="col-xs-10 col-sm-8" name="intolerance_history" id="intolerance_history" placeholder="ประวัติการแพ้ยา" rows="3">{{ old('intolerance_history') }}</textarea>
							<span class="help-inline col-xs-12 col-sm-7">
								
							</span>
						</div>
					</div>
					<!--
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Input with Icon</label>

						<div class="col-sm-9">
							<span class="input-icon">
								<input type="text" id="form-field-icon-1">
								<i class="ace-icon fa fa-leaf blue"></i>
							</span>

							<span class="input-icon input-icon-right">
								<input type="text" id="form-field-icon-2">
								<i class="ace-icon fa fa-leaf green"></i>
							</span>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-6">Tooltip and help button</label>

						<div class="col-sm-9">
							<input data-rel="tooltip" type="text" id="form-field-6" placeholder="Tooltip on hover" title="" data-placement="bottom" data-original-title="Hello Tooltip!">
							<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details." title="" data-original-title="Popover on hover">?</span>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Tag input</label>

						<div class="col-sm-9">
							<div class="inline"><div class="tags"><span class="tag">Tag Input Control<button type="button" class="close">×</button></span><span class="tag">Programmatically Added<button type="button" class="close">×</button></span><input type="text" name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." style="display: none;"><input type="text" placeholder="Enter tags ..."></div>
								
							</div>
						</div>
					</div>
					-->
					{{ csrf_field() }}
					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								บันทึก
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								รีเซต
							</button>
						</div>
					</div>

				</form>

				
				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>

@endsection