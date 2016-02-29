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
			<li class="active">แก้ไขรายการคอร์ส (item)</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<!--
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
				-->
				<a href="{{ url('mng_course/show') }}" class="btn btn-xs btn-prev">
					<i class="ace-icon fa fa-arrow-left"></i>
					กลับหน้าหลัก
				</a>
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

		<div class="page-header">
			<h1>
				ฟอร์มแก้ไขรายการคอร์ส (item)
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					คุณสามารถแก้ไขรายการคอร์ส ได้ที่นี้
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
					บันทึกข้อมูลคอร์สหรือไอเทมสำเร็จแล้ว คุณสามารถดูข้อมูลที่บันทึกได้ที่ <a href="{{ url('mng_course/show') }}">แสดงข้อมูลคอร์สหรือไอเทมทั้งหมด</a>
				</div>
				@endif
				<!-- PAGE CONTENT BEGINS -->
				<form action="{{ url('mng_course/save_mng_course') }}" class="form-horizontal" role="form" method="POST">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="category_item_id"> ประเภทคอร์สหรือไอเทม </label>

						<div class="col-sm-9">
							<!--<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5">-->
							<div class="col-xs-8 col-sm-4" style="padding-left: 0px;">
								<select class="form-control" id="category_item_id" name="category_item_id">
									<option value="">กรุณาเลือก</option>
									@foreach($view_data['category_item'] as $val)
									<option value="{{ $val->id }}" {{ ($val->id == (old('category_item_id', '')? old('category_item_id', '') : $view_data['item_of_course'][0]['category_item_id']) )? 'selected':'' }}>{{ $val->category_item_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="item_name"> ชื่อคอร์สหรือไอเทม </label>

						<div class="col-sm-9">
							<input type="text" name="item_name" id="item_name" placeholder="ชื่อคอร์สหรือไอเทม" class="col-xs-10 col-sm-5" value="{{ old('item_name', '')? old('item_name', '') : $view_data['item_of_course'][0]['item_name'] }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="price">ราคาต่อครั้ง</label>

						<div class="col-sm-9">
							<input class="input-sm" type="text" name="price" id="price" placeholder="ราคาต่อครั้ง" value="{{ old('price', '')? old('price', '') : $view_data['item_of_course'][0]['price'] }}">

						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="price_credit">ราคาแบบวงเงิน ต่อ ครั้ง</label>

						<div class="col-sm-9">
							<input class="input-sm" type="text" name="price_credit" id="price_credit" placeholder="ราคาแบบวงเงิน ต่อ ครั้ง" value="{{ old('price_credit', '')? old('price_credit', '') : $view_data['item_of_course'][0]['price_credit'] }}">

						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="comment"> หมายเหตุ </label>

						<div class="col-sm-9">
							<textarea class="col-xs-10 col-sm-8" name="comment" id="comment" placeholder="หมายเหตุ" rows="3">{{ old('comment', '')? old('comment', '') : $view_data['item_of_course'][0]['comment'] }}</textarea>
							<span class="help-inline col-xs-12 col-sm-7">

							</span>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="active"> สถานะ </label>

						<div class="col-sm-9">
							<!--<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5">-->
							<div class="col-xs-6 col-sm-2" style="padding-left: 0px;">
								<select class="form-control" id="active" name="active">
									<option value="1" {{ ((old('active', '')? old('active', '') : $view_data['item_of_course'][0]['active'] ) == '1')? 'selected':'' }}>Active</option>
									<option value="0" {{ ((old('active', '')? old('active', '') : $view_data['item_of_course'][0]['active']) == '0')? 'selected':'' }}>Inactive</option>

								</select>
							</div>
						</div>
					</div>
					<input type="hidden" name="item_of_course_id" value="{{ $view_data['item_of_course'][0]['id'] }}">
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

<script type="text/javascript">

</script>
@endsection
