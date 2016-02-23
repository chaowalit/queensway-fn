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
			<li class="active">ดูคอร์สที่เปิดขาย</li>
		</ul><!-- /.breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<!--
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
					<i class="ace-icon fa fa-search nav-search-icon"></i>
				</span>
				-->
			</form>
		</div><!-- /.nav-search -->
	</div>

	<div class="page-content">

		<div class="page-header">
			<h1>
				รายละเอียดคอร์ส
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					มีแค่ 2 คอร์ส เท่านั้น
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">

					<div class="col-xs-12 col-sm-6 pricing-box">
						<div class="widget-box widget-color-orange">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">ซื้อแบบวงเงิน</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<ul class="list-unstyled spaced2">
										<li>
											<i class="ace-icon fa fa-check green"></i>
											50 GB Disk Space
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											1 TB Bandwidth
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											1000 Email Accounts
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											100 MySQL Databases
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											$25 Ad Credit
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											Free Domain
										</li>
									</ul>

									<hr>
									<div class="price">
										$10
										<small>/month</small>
									</div>
								</div>

								<div>
									<a href="#" class="btn btn-block btn-warning">
										<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
										<span>Buy</span>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 pricing-box">
						<div class="widget-box widget-color-blue">
							<div class="widget-header">
								<h5 class="widget-title bigger lighter">ซื้อแบบรายคอร์ส</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<ul class="list-unstyled spaced2">
										<li>
											<i class="ace-icon fa fa-check green"></i>
											200 GB Disk Space
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											Unlimited Bandwidth
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											1000 Email Accounts
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											200 MySQL Databases
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											$25 Ad Credit
										</li>

										<li>
											<i class="ace-icon fa fa-check green"></i>
											Free Domain
										</li>
									</ul>

									<hr>
									<div class="price">
										$15
										<small>/month</small>
									</div>
								</div>

								<div>
									<a href="#" class="btn btn-block btn-primary">
										<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
										<span>Buy</span>
									</a>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>

<script type="text/javascript">

</script>
@endsection
