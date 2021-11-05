$(document).ready(function(){
    
    /* common.js */

    function resizeEvt(){
        const w_height = $(window).height();
        const header_H = $("header").height();
        const banner_H = $("section .subpage").height();
        const footer_H = $("footer").height();

        let content_H = w_height - (header_H + banner_H + footer_H);
        
        $("#main_content").css({"height":content_H+"px"});
        
        if(w_height < $(document).height()){
            $("section").css("min-height", "386px");
            $("footer").removeClass("sticky");
        }else{
            $("footer").addClass("sticky");
        }
    };
    resizeEvt();

    $(window).resize(function(){
        resizeEvt();
    });


    $("a, button").click(function(){
        $('#loader').show();
    });

    $(window).on('load', function () { $("#loader").hide(); });


});
