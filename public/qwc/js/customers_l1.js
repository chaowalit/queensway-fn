$(document).ready(function() {
    var keyword = $.trim($("#text_search_customer").val());
    var type_search = $("#type_search").val();
    load_customers_list_table('1', keyword, type_search);

    $("#text_search_customer").keyup(function() {
        var keyword = $.trim($(this).val());
        var type_search = $("#type_search").val();
        if (keyword != '') {
            load_customers_list_table('1', keyword, type_search);
            $("#current_page").text('1');
        } else {
            load_customers_list_table('1', keyword, type_search);
            $("#current_page").text('1');
        }

    });

    $("#type_search").change(function() {
        load_customers_list_table('1', '', 'id');
        $("#current_page").text('1');
        $("#text_search_customer").val('');
    });
});

function next_pagination() {
    var keyword = $.trim($("#text_search_customer").val());
    var type_search = $("#type_search").val();

    var current_page = parseInt($("#current_page").text());
    var total_page = parseInt($("#total_page").text());
    if ((current_page + 1) <= total_page) {
        var page = (current_page + 1);
        load_customers_list_table(page, keyword, type_search);
        $("#current_page").text(page);
    }
}

function prev_pagination() {
    var keyword = $.trim($("#text_search_customer").val());
    var type_search = $("#type_search").val();

    var current_page = parseInt($("#current_page").text());
    var total_page = parseInt($("#total_page").text());
    if ((current_page - 1) >= 1) {
        var page = (current_page - 1);
        load_customers_list_table(page, keyword, type_search);
        $("#current_page").text(page);
    }
}

function load_customers_list_table(current_page, keyword, type_search) {
    $("#show_list_customers").html(
        '<div class="col-xs-12" style="text-align: center;"><h3 class="smaller lighter grey"><i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i> Loading...</h3></div>'
    );
    $.ajax({
        url: 'customers/get_customers',
        data: {
            'limit': $("#limit").val(),
            'current_page': current_page,
            'keyword': keyword,
            'type_search': type_search,
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
            alert('status code: ' + jqXHR.status + ', ' +
                'errorThrown: ' + errorThrown + ', ' +
                'jqXHR.responseText: ' + jqXHR.responseText);
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
