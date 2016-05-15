jQuery(function($) {
	//initiate dataTables plugin
	if ($("#user-profile-3").length) {
		var oTable1 =
			$('#dynamic-table')
			//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
			.dataTable({
				bAutoWidth: false,
				"aoColumns": [{
						"bSortable": false
					},
					null, null, {
						"bSortable": false
					}, {
						"bSortable": false
					}, {
						"bSortable": false
					}
				],
				"aaSorting": [],

				//,
				//"sScrollY": "200px",
				//"bPaginate": false,

				//"sScrollX": "100%",
				//"sScrollXInner": "120%",
				//"bScrollCollapse": true,
				//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
				//you may want to wrap the table inside a "div.dataTables_borderWrap" element

				//"iDisplayLength": 50
			});
		//oTable1.fnAdjustColumnSizing();


		//TableTools settings
		TableTools.classes.container = "btn-group btn-overlap";
		TableTools.classes.print = {
			"body": "DTTT_Print",
			"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
			"message": "tableTools-print-navbar"
		}

		//initiate TableTools extension
		var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
			"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",

			"sRowSelector": "td:not(:last-child)",
			"sRowSelect": "multi",
			"fnRowSelected": function(row) {
				//check checkbox when row is selected
				try {
					//$(row).find('input[type=checkbox]').get(0).checked = true
				} catch (e) {}
			},
			"fnRowDeselected": function(row) {
				//uncheck checkbox
				try {
					//$(row).find('input[type=checkbox]').get(0).checked = false
				} catch (e) {}
			},

			"sSelectedClass": "success",
			"aButtons": [{
					"sExtends": "copy",
					"sToolTip": "Copy to clipboard",
					"sButtonClass": "btn btn-white btn-primary btn-bold",
					"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
					"fnComplete": function() {
						this.fnInfo(
							'<h3 class="no-margin-top smaller">Table copied</h3>\
										<p>Copied ' +
							(oTable1.fnSettings().fnRecordsTotal()) +
							' row(s) to the clipboard.</p>',
							1500
						);
					}
				},

				{
					"sExtends": "csv",
					"sToolTip": "Export to CSV",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
				},

				{
					"sExtends": "pdf",
					"sToolTip": "Export to PDF",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
				},

				{
					"sExtends": "print",
					"sToolTip": "Print view",
					"sButtonClass": "btn btn-white btn-primary  btn-bold",
					"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

					"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

					"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
										  <p>Please use your browser's print function to\
										  print this table.\
										  <br />Press <b>escape</b> when finished.</p>",
				}
			]
		});
		//we put a container before our table and append TableTools element to it
		$(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

		//also add tooltips to table tools buttons
		//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
		//so we add tooltips to the "DIV" child after it becomes inserted
		//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
		setTimeout(function() {
			$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
				var div = $(this).find('> div');
				if (div.length > 0) div.tooltip({
					container: 'body'
				});
				else $(this).tooltip({
					container: 'body'
				});
			});
		}, 200);



		//ColVis extension
		var colvis = new $.fn.dataTable.ColVis(oTable1, {
			"buttonText": "<i class='fa fa-search'></i>",
			"aiExclude": [0, 6],
			"bShowAll": true,
			//"bRestore": true,
			"sAlign": "right",
			"fnLabel": function(i, title, th) {
				return $(th).text(); //remove icons, etc
			}

		});

		//style it
		$(colvis.button()).addClass('btn-group').find('button').addClass(
			'btn btn-white btn-info btn-bold')

		//and append it to our table tools btn-group, also add tooltip
		$(colvis.button())
			.prependTo('.tableTools-container .btn-group')
			.attr('title', 'Show/hide columns').tooltip({
				container: 'body'
			});

		//and make the list, buttons and checkboxed Ace-like
		// $(colvis.dom.collection)
		// 	.addClass(
		// 		'dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
		// 	.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
		// 	.find('input[type=checkbox]').addClass('ace').next().addClass(
		// 		'lbl padding-8');



		/////////////////////////////////
		//table checkboxes
		//$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

		//select/deselect all rows according to table header checkbox
		// $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
		// 	function() {
		// 		var th_checked = this.checked; //checkbox inside "TH" table header
		//
		// 		$(this).closest('table').find('tbody > tr').each(function() {
		// 			var row = this;
		// 			if (th_checked) tableTools_obj.fnSelect(row);
		// 			else tableTools_obj.fnDeselect(row);
		// 		});
		// 	});

		//select/deselect a row when the checkbox is checked/unchecked
		// $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
		// 	var row = $(this).closest('tr').get(0);
		// 	if (!this.checked) tableTools_obj.fnSelect(row);
		// 	else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
		// });



		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});


		//And for the first simple table, which doesn't have TableTools or dataTables
		//select/deselect all rows according to table header checkbox
		// var active_class = 'active';
		// $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click',
		// 	function() {
		// 		var th_checked = this.checked; //checkbox inside "TH" table header
		//
		// 		$(this).closest('table').find('tbody > tr').each(function() {
		// 			var row = this;
		// 			if (th_checked) $(row).addClass(active_class).find(
		// 				'input[type=checkbox]').eq(0).prop('checked', true);
		// 			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(
		// 				0).prop('checked', false);
		// 		});
		// 	});

		//select/deselect a row when the checkbox is checked/unchecked
		// $('#simple-table').on('click', 'td input[type=checkbox]', function() {
		// 	var $row = $(this).closest('tr');
		// 	if (this.checked) $row.addClass(active_class);
		// 	else $row.removeClass(active_class);
		// });



		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({
			placement: tooltip_placement
		});

		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return
				'right';
			return 'left';
		}
	}

});
//--------------------------------------------------------------------------------------
$(document).ready(function() {
	$("#nav-search-input").keyup(function() {
		var keyword = $(this).val();
		var column_name = $("#column_name").val();
		result_search_customer(keyword, column_name);
	});

	$("#column_name").change(function() {
		$("#nav-search-input").val('');
		result_search_customer($("#nav-search-input").val(), $("#column_name").val());
	});
	if ($("#column_name").val()) {
		result_search_customer($("#nav-search-input").val(), $("#column_name").val());
	}
	//result_search_customer($("#nav-search-input").val(), $("#column_name").val());
});

function result_search_customer(keyword, column_name) {
	$("#show_list_customers").html(
		'<div class="col-xs-12" style="text-align: center;"><h3 class="smaller lighter grey"><i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i> Loading...</h3></div>'
	);

	$.ajax({
		url: 'sale_course/search_customers',
		data: {
			'keyword': keyword,
			'column_name': column_name,
			'_token': $("input[name='_token']").val()
		},
		dataType: 'html',
		//async: false,
		type: 'POST',
		//processData: false,
		//contentType: false,
		success: function(response) {
			//console.log(response);
			$("#show_list_customers").html(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			//alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
			alert('status code: ' + jqXHR.status + ', ' + 'errorThrown: ' +
				errorThrown + ', ' + 'jqXHR.responseText: ' + jqXHR.responseText);
			//$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
			console.log('jqXHR:');
			console.log(jqXHR);
			console.log('textStatus:');
			console.log(textStatus);
			console.log('errorThrown:');
			console.log(errorThrown);
		}
	});
}

//---------------------------------------------------- Form sale credit --------------------------------------------------//
$("input[name='total_price']").keyup(function() {
	if ($.isNumeric($(this).val())) {
		$("#total_credit").val($(this).val() * $("#multiplier_price").val());

		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
		$("#cash").val('');
		$("#credit_debit_card").val('');
	} else {
		$("#total_credit").val('');

		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
		$("#cash").val('');
		$("#credit_debit_card").val('');
	}
});
$("#multiplier_price").change(function() {
	var total_price = $("input[name='total_price']").val();
	if ($.trim(total_price) != "" && $.isNumeric(total_price)) {
		$("#total_credit").val(total_price * $(this).val());

		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
		$("#cash").val('');
		$("#credit_debit_card").val('');
	} else {
		$("#total_credit").val('');

		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
		$("#cash").val('');
		$("#credit_debit_card").val('');
	}
});

$("#cash").keyup(function() {
	if ($.trim($(this).val()) != '' && $.isNumeric($(this).val())) {
		var credit_debit_card = ($.trim($("#credit_debit_card").val()) != '') ?
			parseInt($("#credit_debit_card").val()) : 0;

		var total_pay = parseInt($(this).val()) + credit_debit_card;
		var total_price = parseInt($("input[name='total_price']").val());

		$("#limit_credit").val(total_pay * $("#multiplier_price").val());
		$("#payment_amount").val(parseInt(total_pay));
		$("#accrued_expenses").val(total_price - total_pay);
	} else {
		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
	}
});

$("#credit_debit_card").keyup(function() {
	if ($.trim($(this).val()) != '' && $.isNumeric($(this).val())) {
		var cash = ($.trim($("#cash").val()) != '') ? parseInt($("#cash").val()) :
			0;
		var total_pay = parseInt($(this).val()) + cash;
		var total_price = parseInt($("input[name='total_price']").val());

		$("#limit_credit").val(total_pay * $("#multiplier_price").val());
		$("#payment_amount").val(parseInt(total_pay));
		$("#accrued_expenses").val(total_price - total_pay);
	} else {
		$("#payment_amount").val('');
		$("#limit_credit").val('');
		$("#accrued_expenses").val('');
	}
});

$("#btn_form_sale_credit").click(function() {
	var book_no = $("input[name='book_no']").val();
	var number_no = $("input[name='number_no']").val();
	var total_price = $("input[name='total_price']").val();
	var total_credit = $("#total_credit").val();
	var consultant = $("#consultant").val();
	var payment_info = check_form_payment_info('credit');

	if ($.trim(book_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเล่มที่ใบเสร็จ');
		return;
	} else if ($.trim(number_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเลขที่ใบเสร็จ');
		return;
	} else if ($.trim(total_price) == "" || !$.isNumeric(total_price)) {
		alert('กรุณากรอกข้อมูล ช่องยอดที่ซื้อจริง');
		return;
	} else if ($.trim(total_credit) == "" || !$.isNumeric(total_credit)) {
		alert('กรุณากรอกข้อมูล ช่องยอดที่ซื้อจริง เพื่อคำนวณวงเงินทั้งหมด');
		return;
	} else if ($.trim(consultant) == "") {
		alert('กรุณากรอกข้อมูล ช่องผู้รับผิดชอบ');
		return;
	} else if ($("#referent_payment_transfer").length && parseInt($(
			"#referent_payment_transfer").val()) > total_price) {
		alert('ยอดชำระยกมา ห้าม มากกว่า ยอดที่ซื้อจริง');
		return;
	} else if (payment_info == 200) {
		$("#form_sale_credit").submit();
	} else {
		alert(payment_info);
		return;
	}

});

function check_form_payment_info(course_type) {
	if (course_type == 'credit') {
		if ($.trim($("#payment_amount").val()) == "") {
			return "ไม่มีข้อมูลในช่อง ยอดชำระ";
		} else if ($.trim($("#limit_credit").val()) == "") {
			return "ไม่มีข้อมูลในช่อง วงเงินขณะนี้";
		} else if ($.trim($("#accrued_expenses").val()) == "") {
			return "ไม่มีข้อมูลในช่อง ยอดค้างจ่าย";
		} else if ($("#payment_type").val() == "cash") {
			if ($.trim($("#cash").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องเงินสด";
			}
			if ($.trim($("#credit_debit_card").val()) != "") {
				return "ห้ามกรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			}

		} else if ($("#payment_type").val() == "credit-debit") {
			if ($.trim($("#cash").val()) != "") {
				return "ห้ามกรอกข้อมูล ช่องเงินสด";
			}
			if ($.trim($("#credit_debit_card").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			} else if ($.trim($("#bank_name").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องธนาคาร";
			}
		} else if ($("#payment_type").val() == "cash-credit-debit") {
			if ($.trim($("#cash").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องเงินสด";
			} else if ($.trim($("#credit_debit_card").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			} else if ($.trim($("#bank_name").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องธนาคาร";
			}
		}


		var referent_payment_transfer = ($("#referent_payment_transfer").length) ?
			parseInt($("#referent_payment_transfer").val()) : 0;
		var cash = ($.trim($("#cash").val()) != "" && $.isNumeric($("#cash").val())) ?
			parseInt($("#cash").val()) : 0;
		var credit_debit_card = ($.trim($("#credit_debit_card").val()) != "" && $.isNumeric(
				$("#credit_debit_card").val())) ?
			parseInt($("#credit_debit_card").val()) : 0;
		var total_price = parseInt($("input[name='total_price']").val());
		var total_payment = (referent_payment_transfer + cash + credit_debit_card);
		if (total_price < total_payment) {
			return "คุณไม่สามารถชำระเงินเกินราคาทั้งหมดได้";
		}

		return 200;
	} else if (course_type == "debit") {
		if ($.trim($("#payment_amount").val()) == "") {
			return "ไม่มีข้อมูลในช่อง ยอดชำระ";
		} else if ($.trim($("#accrued_expenses").val()) == "") {
			return "ไม่มีข้อมูลในช่อง ยอดค้างจ่าย";
		} else if ($("#payment_type").val() == "cash") {
			if ($.trim($("#cash").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องเงินสด";
			}
			if ($.trim($("#credit_debit_card").val()) != "") {
				return "ห้ามกรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			}

		} else if ($("#payment_type").val() == "credit-debit") {
			if ($.trim($("#cash").val()) != "") {
				return "ห้ามกรอกข้อมูล ช่องเงินสด";
			}
			if ($.trim($("#credit_debit_card").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			} else if ($.trim($("#bank_name").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องธนาคาร";
			}
		} else if ($("#payment_type").val() == "cash-credit-debit") {
			if ($.trim($("#cash").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องเงินสด";
			} else if ($.trim($("#credit_debit_card").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต";
			} else if ($.trim($("#bank_name").val()) == "") {
				return "กรุณากรอกข้อมูล ช่องธนาคาร";
			}
		}

		var referent_payment_transfer = ($("#referent_payment_transfer").length) ?
			parseInt($("#referent_payment_transfer").val()) : 0;
		var cash = ($.trim($("#cash").val()) != "" && $.isNumeric($("#cash").val())) ?
			parseInt($("#cash").val()) : 0;
		var credit_debit_card = ($.trim($("#credit_debit_card").val()) != "" && $.isNumeric(
				$("#credit_debit_card").val())) ?
			parseInt($("#credit_debit_card").val()) : 0;
		var total_price = $("input[name='total_price']").val();
		var total_payment = (referent_payment_transfer + cash + credit_debit_card);
		if (total_price < total_payment) {
			return "คุณไม่สามารถชำระเงินเกินราคาทั้งหมดได้";
		}

		return 200;
	} else {
		return "Error...";
	}
}

$("#form_sale_credit").submit(function(e) {
	//alert('kkk');
	//e.preventDefault();
});

//------------------------------------------------ Form Sale debit ----------------------------------------------//
function cal_amount(item_of_course_id) {
	if ($.trim($("#amount_" + item_of_course_id).val()) != '' && $.isNumeric($(
			"#amount_" + item_of_course_id).val())) {
		var amount = parseInt($("#amount_" + item_of_course_id).val());

		var price_per_unit = ($.trim($("#price_per_unit_" + item_of_course_id).val()) !=
				'') ?
			parseInt($("#price_per_unit_" + item_of_course_id).val()) : 0;

		$("#total_per_item_" + item_of_course_id).val(amount * price_per_unit);
	} else {
		$("#total_per_item_" + item_of_course_id).val('');
		$("input[name='total_price']").val('');
	}
}

function cal_price_per_unit(item_of_course_id) {
	if ($.trim($("#price_per_unit_" + item_of_course_id).val()) != '' && $.isNumeric(
			$("#price_per_unit_" + item_of_course_id).val())) {
		var amount = parseInt($("#price_per_unit_" + item_of_course_id).val());

		var price_per_unit = ($.trim($("#amount_" + item_of_course_id).val()) != '') ?
			parseInt($("#amount_" + item_of_course_id).val()) : 0;

		$("#total_per_item_" + item_of_course_id).val(amount * price_per_unit);
	} else {
		$("#total_per_item_" + item_of_course_id).val('');
		$("input[name='total_price']").val('');
	}
}

$("#btn_form_sale_debit").click(function() {
	var book_no = $("input[name='book_no']").val();
	var number_no = $("input[name='number_no']").val();
	var total_price = $("input[name='total_price']").val();
	var consultant = $("#consultant").val();
	var payment_info = check_form_payment_info('debit');
	var check_item_select = check_item_select_();

	if ($.trim(book_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเล่มที่ใบเสร็จ');
		return;
	} else if ($.trim(number_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเลขที่ใบเสร็จ');
		return;
	} else if ($.trim(total_price) == "" || !$.isNumeric(total_price)) {
		alert('ไม่มีข้อมูลในช่อง รวมราคาทั้งหมด');
		return;
	} else if ($.trim(consultant) == "") {
		alert('กรุณากรอกข้อมูล ช่องผู้รับผิดชอบ');
		return;
	} else if (check_item_select != 200) {
		alert(check_item_select);
		return;
	} else if (payment_info == 200) {
		$("#form_sale_debit").submit();
	} else {
		alert(payment_info);
		return;
	}

});

$("#form_sale_debit").submit(function(e) {
	//alert('kkk');
	//e.preventDefault();
});

function check_item_select_() {
	var check_list = $("input[name='check_list[]']").map(function() {
		if ($(this).is(':checked')) {
			return $(this).val();
		}
	}).get();
	if (check_list.length == 0) {
		$("#total_price").val('');
		return "คุณไม่ได้เลือกรายการคอร์ส ที่ต้องการซื้อ";
	} else {
		return 200;
	}
}

$("#btn_cal_total_price_item").click(function(e) {
	var check_list = $("input[name='check_list[]']").map(function() {
		if ($(this).is(':checked')) {
			return $(this).val();
		}
	}).get();
	if (check_list.length > 0) {
		var total_price = 0;
		$.each(check_list, function(k, v) {
			var total_per_item = $.trim($("#total_per_item_" + v).val());
			if ($.isNumeric(total_per_item)) {
				total_price = total_price + parseInt(total_per_item);
			} else {
				//alert("ไม่สามารถคำนวณราคาได้ เนื่องจากราคารวมต่อไอเทมบางไอเทม ไม่มีค่า");
				total_price = 0;
				return false;
			}
		});
		if (total_price > 0) {
			console.log(total_price);
			$("#total_price").val(total_price);
		} else {
			alert("ไม่สามารถคำนวณราคาได้ เนื่องจากราคารวมต่อไอเทมบางไอเทม ไม่มีค่า");
			$("#total_price").val('');
		}

	} else {
		alert('กรุณาเลือกรายการคอร์ส ที่ต้องการ ก่อนการกดปุ่ม \'สรุปราคา\'');
		$("#total_price").val('');
	}

});
