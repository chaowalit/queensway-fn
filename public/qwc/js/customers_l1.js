
$(document).ready(function(){
    load_customers_list_table('1');
    

});

function next_pagination(){
    var current_page = parseInt($("#current_page").text());
    var total_page = parseInt($("#total_page").text());
    if((current_page + 1) <= total_page){
        var page = (current_page + 1);
        load_customers_list_table(page);
        $("#current_page").text(page);
    }
}

function prev_pagination(){
    var current_page = parseInt($("#current_page").text());
    var total_page = parseInt($("#total_page").text());
    if((current_page - 1) >= 1){
        var page = (current_page - 1);
        load_customers_list_table(page);
        $("#current_page").text(page);
    }
}

function load_customers_list_table(current_page){
    $("#show_list_customers").html('<div class="col-xs-12" style="text-align: center;"><h3 class="smaller lighter grey"><i class="ace-icon fa fa-spinner fa-spin orange bigger-125"></i> Loading...</h3></div>');
    $.ajax({
        url:'customers/get_customers',
        data: {'limit': $("#limit").val(), 'current_page': current_page, '_token': $( "input[name='_token']" ).val()},
        dataType: 'html',
        //async: false,
        type: 'POST',
        //processData: false,
        //contentType: false,
        success: function(response){
            //console.log(response);
            $("#show_list_customers").html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
            alert('status code: ' + jqXHR.status + ', ' + 'errorThrown: ' + errorThrown + ', ' + 'jqXHR.responseText: ' + jqXHR.responseText);
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
