
$(document).ready(function(){
    //load costomer all limit 15
    var _token = $( "input[name='_token']" ).val();
    //alert(_token);
    $.ajax({
        url:'customers/get_customers',
        data: {'limit': '15', 'current_page': '1', '_token': $( "input[name='_token']" ).val()},
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
});
