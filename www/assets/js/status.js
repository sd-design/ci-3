$(document).ready(function(){
    function goBasket(){
        if ($(this).hasClass('available')){
            window.location.replace('/basket/');
        }
        else {
            console.log('basket is empty...may be');
        }
    }
    function openGDPR(){
        $('.gdpr_wrap').toggle();
    }
    function checkGDPR(){
        if(localStorage.getItem('gdpr_accepts')){
            var gdprAccept = localStorage.getItem('gdpr_accepts');
            if(gdprAccept == 'true'){

            }
            if(gdprAccept == 'false'){
                console.log(gdprAccept);
                setTimeout(openGDPR, 7000);

            }

        }
        else{
            setTimeout(openGDPR, 5000);
        }
    }
    $.ajax({
        type: "GET",
        url: "/basket/status",
        dataType: "json",
        success: function (response) {
            if(response.answer == 'ok' || response.basket_init == true){
                $('.webinar-block').addClass('available');
            }
            else{localStorage.setItem('basket_list', '');}
        },
        error: function (xhr, status, error) {
            console.log(status);
        }
    });

        $('.webinar-block').click(goBasket);
    checkGDPR();
    $('#agreeGDPR').on('click', function(){
        localStorage.setItem('gdpr_accepts', true);
        $('.gdpr_wrap').toggle();
    });
    $('#closeGDPR').on('click', function(){
        localStorage.setItem('gdpr_accepts', false);
        $('.gdpr_wrap').toggle();
    });

});