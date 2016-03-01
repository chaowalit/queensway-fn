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
