<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>EP - Qwc Application</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


        @include('layouts/header_tag')
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="{{ url('/customers') }}" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            EP - Queensway
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="{{ asset('assets/avatars/user_1.png') }}" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>ยินดีต้อนรับ,</small>
                                    คุณ <?php echo Auth::user()->first_name; ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#modal-setting-profile" data-toggle="modal">
                                        <i class="ace-icon fa fa-cog"></i>
                                        การตั้งค่าระบบ
                                    </a>
                                </li>
                                <!--
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                -->
                                <li class="divider"></li>

                                <li>
                                    <a href="{{ url('/logout') }}">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <!--<i class="ace-icon fa fa-signal"></i>-->&nbsp;
                        </button>

                        <button class="btn btn-info">
                            <!--<i class="ace-icon fa fa-pencil"></i>-->&nbsp;
                        </button>

                        <button class="btn btn-warning">
                            <!--<i class="ace-icon fa fa-users"></i>-->&nbsp;
                        </button>

                        <button class="btn btn-danger">
                            <!--<i class="ace-icon fa fa-cogs"></i>-->&nbsp;
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="<?php echo ($menu_nav == 'customers')? "active open":" "; ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> จัดการข้อมูลลูกค้า </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="<?php echo ($menu_nav == 'customers' && $menu_level == '1')? "active":" "; ?>">
                                <a href="{{ url('customers') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    แสดงข้อมูลลูกค้าทั้งหมด
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo ($menu_nav == 'customers' && $menu_level == '2')? "active":" "; ?>">
                                <a href="{{ url('create_customer') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    เพิ่มข้อมูลลูกค้า
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo ($menu_nav == 'mng_course')? "active open":" "; ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-info-circle"></i>
                            <span class="menu-text"> ข้อมูลคอร์ส </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="<?php echo ($menu_nav == 'mng_course' && $menu_level == '1')? "active":" "; ?>">
                                <a href="{{ url('mng_course/show') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    เพิ่ม/ลบ/แก้ไข รายการคอร์ส(item)
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo ($menu_nav == 'mng_course' && $menu_level == '2')? "active":" "; ?>">
                                <a href="{{ url('sale_course/search_customer') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ซื้อคอร์สที่เปิดขาย
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <!-- <li class="<?php echo ($menu_nav == 'mng_course' && $menu_level == '3')? "active":" "; ?>">
                                <a href="{{ url('mng_course/doo_course') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ดูคอร์สที่เปิดขาย
                                </a>

                                <b class="arrow"></b>
                            </li> -->
                        </ul>
                    </li>

                    <li class="<?php echo ($menu_nav == 'use_course')? "active open":" "; ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-eye"></i>
                            <span class="menu-text"> จัดการคอร์ส </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="<?php echo ($menu_nav == 'use_course' && $menu_level == '1')? "active":" "; ?>">
                                <a href="{{ url('course/search_customer_use_course') }}?sub_menu=1">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ตัด/ ชำระ/ ย้าย/ ยกเลิก
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo ($menu_nav == 'use_course' && $menu_level == '2')? "active":" "; ?>">
                                <a href="{{ url('course/search_customer_use_course') }}?sub_menu=2">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ดูประวัติใบเสร็จการสั่งซื้อ
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                    <li class="<?php echo ($menu_nav == 'report')? "active":" "; ?>">
                        <a href="{{ url('report') }}">
                            <i class="menu-icon fa fa-file-excel-o"></i>
                            <span class="menu-text"> รายงาน </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="{{ url('manual') }}">
                            <i class="menu-icon fa fa-book"></i>
                            <span class="menu-text"> คู่มือการใช้งาน </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <!--
                    <li class="">
                        <a href="index.html">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                UI &amp; Elements
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    Layouts
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    <li class="">
                                        <a href="top-menu.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Top Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="two-menu-1.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Two Menus 1
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="two-menu-2.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Two Menus 2
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="mobile-menu-1.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Default Mobile Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="mobile-menu-2.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Mobile Menu 2
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="mobile-menu-3.html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Mobile Menu 3
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="typography.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Typography
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="elements.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Elements
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="buttons.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Buttons &amp; Icons
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="content-slider.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Content Sliders
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="treeview.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Treeview
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="jquery-ui.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    jQuery UI
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="nestable-list.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Nestable Lists
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    Three Level Menu
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    <li class="">
                                        <a href="#">
                                            <i class="menu-icon fa fa-leaf green"></i>
                                            Item #1
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="">
                                        <a href="#" class="dropdown-toggle">
                                            <i class="menu-icon fa fa-pencil orange"></i>

                                            4th level
                                            <b class="arrow fa fa-angle-down"></b>
                                        </a>

                                        <b class="arrow"></b>

                                        <ul class="submenu">
                                            <li class="">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-plus purple"></i>
                                                    Add Product
                                                </a>

                                                <b class="arrow"></b>
                                            </li>

                                            <li class="">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-eye pink"></i>
                                                    View Products
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Tables </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="tables.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Simple &amp; Dynamic
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="jqgrid.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    jqGrid plugin
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Forms </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="form-elements.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Form Elements
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="form-elements-2.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Form Elements 2
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="form-wizard.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Wizard &amp; Validation
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="wysiwyg.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Wysiwyg &amp; Markdown
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="dropzone.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Dropzone File Upload
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Widgets </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="calendar.html">
                            <i class="menu-icon fa fa-calendar"></i>

                            <span class="menu-text">
                                Calendar

                                <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                                    <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
                                </span>
                            </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="gallery.html">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text"> Gallery </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-tag"></i>
                            <span class="menu-text"> More Pages </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="profile.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    User Profile
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="inbox.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Inbox
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="pricing.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Pricing Tables
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="invoice.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Invoice
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="timeline.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Timeline
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="email.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Email Templates
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="login.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Login &amp; Register
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-o"></i>

                            <span class="menu-text">
                                Other Pages

                                <span class="badge badge-primary">5</span>
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="faq.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    FAQ
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="error-404.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Error 404
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="error-500.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Error 500
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="grid.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Grid
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="blank.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Blank Page
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    -->
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                </script>
            </div>

            <div class="main-content">

                @yield('content')

            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content" style="line-height: normal;">
                        <span class="bigger-100">
                            <span class="blue bolder">{{ Auth::user()->company_name }}</span>
                            &copy; {{ Auth::user()->branch_no }} - {{ Auth::user()->branch_name }} <br>
                            {{ Auth::user()->address }} <br> โทร. {{ Auth::user()->tel }}
                        </span>

                        &nbsp; &nbsp;
                        <!--
                        <span class="action-buttons">
                            <a href="#">
                                {{ Auth::user()->branch_no }}
                            </a>

                            <a href="#">
                                {{ Auth::user()->branch_name }}
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                        -->
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        @include('layouts/footer_tag')

        <div id="modal-setting-profile" class="modal">
			<div class="modal-dialog" style="width: 600px;">
				<div class="modal-content">
					<div id="modal-wizard-container">
						<div class="modal-header">
							<h4>การตั้งค่าระบบ</h4>
						</div>

						<div class="modal-body step-content">
							<div class="step-pane active" data-step="1">
								<div class="center">
                                    <form class="form-horizontal" id="sample-form">
                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">ชื่อบริษัท</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->company_name }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">รหัสสาขา</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->branch_no }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">ชื่อสาขา</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->branch_name }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">ชื่อผู้รับผิดชอบ</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->first_name }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">นามสกุลผู้รับผิดชอบ</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->last_name }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">ที่อยู่</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">

                                                    <textarea id="inputInfo" class="width-100" rows="3" readonly="true">{{ Auth::user()->address }}</textarea>

												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">โทรศัพท์</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->tel }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>

                                        <div class="form-group has-info">
											<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Email</label>

											<div class="col-xs-12 col-sm-7">
												<span class="block input-icon input-icon-right">
													<input type="text" id="inputInfo" class="width-100" value="{{ Auth::user()->email }}" readonly="true">
													<i class="ace-icon fa fa-info-circle"></i>
												</span>
											</div>

										</div>
									</form>
								</div>
							</div>

						</div>
					</div>

					<div class="modal-footer wizard-actions">
						<!-- <button class="btn btn-success btn-sm btn-next" data-last="Finish">
							Update
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button> -->

						<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>

    </body>
</html>
