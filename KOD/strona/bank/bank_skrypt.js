$(document).ready(function() {
    var staraKwota = "";
    $('#inputKwota').on('input', function () {
        var kwota = $('#inputKwota');
        if (isNaN(kwota.val())) {
            kwota.val(staraKwota);
        } else {
            kwota.val(Math.floor(kwota.val()));
        }
        staraKwota = kwota.val();
    });
    $('form[name=przelej]').submit(function(e) {
        if($("div[id=blad]"))$("div[id=blad]").remove();
        if($("input[type=submit][clicked=true]").attr('name') == "przelejDo"){
            if($('input[name=kwota]').val() == 0){
                $("form[name=przelej]").after("<div id='blad'>Proszę podać kwotę do wpłaty.</div>");
                e.preventDefault();
            }
            if($('input[name=kwota]').val() > parseInt($('span#mojeHaisy').html())){
                $("form[name=przelej]").after("<div id='blad'>Nie masz wystarczająco środków do wpłaty.</div>");
                e.preventDefault();
            }
        }else if($("input[type=submit][clicked=true]").attr('name') == "przelejZ"){
            if($('input[name=kwota]').val() == 0){
                $("form[name=przelej]").after("<div id='blad'>Proszę podać kwotę do wypłaty.</div>");
                e.preventDefault();
            }
            if($('input[name=kwota]').val() > parseInt($('span#bankHaisy').html())){
                $("form[name=przelej]").after("<div id='blad'>Nie masz wystarczająco środków do wypłaty.</div>");
                e.preventDefault();
            }
        }
    });
    $("form[name=przelej] input[type=submit]").click(function() {
        $("input[type=submit]", $(this).parents("form[name=przelej]")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });
});