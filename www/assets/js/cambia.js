function cambia2() {
    var a = document.getElementById("formControlRange").value;
    var variable = parseInt(a);
    console.log(variable);

    if (variable == 0) {
        $('#zero_scroll').html('0');
    };
    if (variable == 1) {
        $('#zero_scroll').html('250');
    };
    if (variable == 2) {
        $('#zero_scroll').html('900');
    };

    if (variable == 3) {
        $('#zero_scroll').html('2000');
    };
}
function check_status(){
    $.ajax({
        type: "GET",
        url: "/formi/status",
        success: function (answer) {
                console.log(answer);
        }
    });
}
$(document).ready(function () {
$('#iagree').on('click', function(){
        console.log($('#iagree').prop("checked") );
    if ($('#iagree').prop("checked") == false) { $('#send_form').attr("disabled", true); $('#send_form').addClass('disabled');}
    if ($('#iagree').prop("checked") == true) { $('#send_form').attr("disabled", false); $('#send_form').removeClass('disabled');}
    });

$('#send_form').on('click', function(){
        var formData = $("form").serialize();
        //console.log(formData);
        $.ajax({
            type: "POST",
            url: "/formi/send",
            data: formData,
            success: function (answer) {

                if (answer.response == true) {
                    $('#processNumber').html(answer.captchaNumber);
                    $('#processModal').modal('toggle');
                }
                else { alert("Server Error"); }
            }
        });
    return false;
     //end callback
    });

    $('#check_process').on('click', function(){
        var csrf_token_form = $("input[name=csrf_token_form]:hidden").val();
        var processNumber = $("#InputprocessNumber").val();

        $.ajax({
            type: "POST",
            url: "/formi/process",
            data: { 'csrf_test_name': csrf_token_form, 'processNumber': processNumber },
            success: function (answer) {
                console.log(answer);

                if (answer.response == true) {
                    $('#finishAnswer').html(answer.message);
                    $('#processModal').modal('toggle');
                    $('#finishModal').modal('toggle');
        
                }
                else { alert("Failed number!"); $("#InputprocessNumber").val(''); }
            }
        });
        return false;
     //end callback
    });

  

});