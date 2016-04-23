function checked_usage_course(item_of_course_id) {
	//alert(item_of_course_id);
	if ($("#check_usage_course_" + item_of_course_id).is(':checked')) {
		var total_per_item = parseFloat($("#amount_" +
			item_of_course_id).val()) * parseFloat($("#price_per_unit_" +
			item_of_course_id).val());
		$("#total_per_item_" + item_of_course_id).val(total_per_item.toFixed(2));

		summary_total_all();
	} else {
		$("#total_per_item_" + item_of_course_id).val('');
		summary_total_all();
	}
}

function selected_amount_usage_course(item_of_course_id) {
	//alert(item_of_course_id);
	if ($("#check_usage_course_" + item_of_course_id).is(':checked')) {
		var total_per_item = parseFloat($("#amount_" +
			item_of_course_id).val()) * parseFloat($("#price_per_unit_" +
			item_of_course_id).val());
		$("#total_per_item_" + item_of_course_id).val(total_per_item.toFixed(2));
	}
	summary_total_all();
}

function summary_total_all() {
	var summary_amount = 0;
	var summary_total_per_item = 0.00;
	$(':checkbox:checked').each(function(i) {
		summary_amount = summary_amount + parseInt($("#amount_" + $(this).val()).val());
		summary_total_per_item = summary_total_per_item + parseFloat($(
			"#total_per_item_" + $(this).val()).val());
	});
	$("#summary_amount").text(summary_amount);
	$("#summary_total_per_item").text(summary_total_per_item.toFixed(2));
}

$("#btn_form_usage_course").click(function() {
	var check_data_exist = false;
	$(':checkbox:checked').each(function(i) {
		check_data_exist = true;
	});
	if (check_data_exist) {
		if (confirm('คุณแน่ใจหรือไม่ ที่จะบันทึกรายการ "ตัดคอร์ส" นี้')) {
			$("#send_form_usage_course").submit();
		}
	} else {
		alert('กรุณาใส่ข้อมูลการตัดคอร์สก่อน');
	}
});
