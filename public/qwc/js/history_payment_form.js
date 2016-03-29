$(document).ready(function() {

});

$("#cash").keyup(function() {
	if ($.trim($(this).val()) != '' && $.isNumeric($(this).val())) {
		var credit_debit_card = ($.trim($("#credit_debit_card").val()) != '') ?
			parseInt($("#credit_debit_card").val()) : 0;

		var total_pay = parseInt($(this).val()) + credit_debit_card;

		$("#payment_amount").val(parseInt(total_pay));

	} else {
		$("#payment_amount").val('');

	}
});

$("#credit_debit_card").keyup(function() {
	if ($.trim($(this).val()) != '' && $.isNumeric($(this).val())) {
		var cash = ($.trim($("#cash").val()) != '') ? parseInt($("#cash").val()) :
			0;
		var total_pay = parseInt($(this).val()) + cash;

		$("#payment_amount").val(parseInt(total_pay));

	} else {
		$("#payment_amount").val('');
	}
});

$("#btn_form_payment").click(function() {
	var payment_amount = $.trim($("#payment_amount").val());
	var book_no = $.trim($("#book_no").val());
	var number_no = $.trim($("#number_no").val());
	var cash = $.trim($("#cash").val());
	var credit_debit_card = $.trim($("#credit_debit_card").val());
	var bank_name = $.trim($("#bank_name").val());

	if ($.trim(book_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเล่มที่ใบเสร็จ');
		return;
	} else if ($.trim(number_no) == "") {
		alert('กรุณากรอกข้อมูล ช่องเลขที่ใบเสร็จ');
		return;
	} else if ($.trim($("#payment_amount").val()) == "") {
		alert('ไม่มีข้อมูลในช่อง ยอดชำระ');
		return;
	} else if ($("#payment_type").val() == "credit-debit") {
		if ($.trim($("#credit_debit_card").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต');
			return;
		} else if ($.trim($("#bank_name").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องธนาคาร');
			return;
		}
	} else if ($("#payment_type").val() == "cash-credit-debit") {
		if ($.trim($("#cash").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องเงินสด');
			return;
		} else if ($.trim($("#credit_debit_card").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องบัตรเครดิต/เดบิต');
			return;
		} else if ($.trim($("#bank_name").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องธนาคาร');
			return;
		}
	} else if ($("#payment_type").val() == "cash") {
		if ($.trim($("#cash").val()) == "") {
			alert('กรุณากรอกข้อมูล ช่องเงินสด');
			return;
		}

	}
	if ($("#payment_amount").val() > parseInt($("#accrued_expenses").val())) {
		alert('คุณชำระเงินเกินยอดค้างชำระที่มีอยู่... ยอดค้างชำระ คือ ' + $(
			"#accrued_expenses").val() + ' บาท');
		return;
	}

	$("#form_payment").submit();
});
