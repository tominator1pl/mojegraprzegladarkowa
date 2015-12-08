$(document).ready(function() {
    var last2;
    var myDiv2 = false;
    var dif = 0;
    $("div.col-sm-12 > div > table > tbody > tr").on('click', function(e) {
        if(last2) {
            last2.removeClass('table-kliked');
            last2.addClass('table-hoverek');
        }
        $(this).removeClass('table-hoverek');
        $(this).addClass('table-kliked');
        $('input[name=selectedIdPrzy]').val($(this).children(':first').html());
        myDiv2 = $(document.createElement('div'));
        myDiv2.hide();
        myDiv2.css({top: e.pageY-10, left: e.pageX-200});
        myDiv2.appendTo("form[name=przygoda]");
        myDiv2.addClass('sklep-hover-div uzyj');
        myDiv2.fadeIn(0);
        myDiv2.html("<label for='inputCzas'>Na Czas (min):</label><input type='text' class='form-control' id='inputCzas' name='czas'>" +
            "<input type='submit' class='btn btn-default' name='naPrzy' value='Na Przygodę'>");
        myDiv2.mouseleave(function(e){
            myDiv2.fadeOut(100,function(){
                myDiv2.remove();
                myDiv2=false;
            });
            myDiv.fadeOut(100,function(){
                myDiv.remove();
                myDiv=false;
            });
        });
        var staraKwota = "";
        myDiv2.children('input#inputCzas').on('input', function () {
            var kwota = myDiv2.children('input#inputCzas');
            if (isNaN(kwota.val())) {
                kwota.val(staraKwota);
            } else {
                kwota.val(Math.floor(kwota.val()));
            }
            if(kwota.val() > ($('span.zycie').html()/dif)){
                kwota.val(staraKwota);
            }
            staraKwota = kwota.val();
        });
        last2 = $(this);
    });
    var myDiv = false;
    $("table > tbody > tr").mousemove(function(e) {
        if(myDiv){
            myDiv.stop();
            myDiv.fadeIn(100);
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.children('div.lead').html($(this).children().eq(1).html());
            dif = $(this).children().eq(2).html();
            myDiv.children('div#zyc-div').html("-Życia na min: "+dif);
            myDiv.children('div#czas-div').html("Max. czas: "+(Math.floor($('span.zycie').html()/dif))+" min");
            myDiv.children('div#zysk-div').html("Zysk: "+$(this).children().eq(3).html());
        }else {
            myDiv = $(document.createElement('div'));
            myDiv.hide();
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.appendTo("div.row-w-iframe");
            myDiv.addClass('sklep-hover-div');
            myDiv.fadeIn(100);
            dif = $(this).children().eq(2).html();
            myDiv.html("<div class='lead text-center'>"+$(this).children().eq(1).html()+"</div>" +
                "<div id='zyc-div' class='text-left'>-Życia na min: "+dif+"</div>" +
                "<div id='czas-div' class='text-left'>Max. czas: "+(Math.floor($('span.zycie').html()/dif))+" min</div>" +
                "<div id='zysk-div' class='text-left'>Zysk: "+$(this).children().eq(3).html()+"</div>");
        }
    }).mouseleave(function(e){
        if(myDiv && !myDiv2) {
            myDiv.fadeOut(100,function(){
               myDiv.remove();
                myDiv=false;
            });
        }
    });
    function secondsToHms(d) {
        d = Number(d);
        var da = Math.floor(d / 86400);
        var h = Math.floor(d % 86400 / 3600);
        var m = Math.floor(d % 86400 % 3600 / 60);
        var s = Math.floor(d % 86400 % 3600 % 60);
        return (da >= 100 ? da : (da >= 10 ? "0" + da : (da > 0 ? "00" + da : "000"))) + ":" + (h >= 10 ? h : (h > 0 ? "0" + h : "00")) + ":" + (m >= 10 ? m : (m > 0 ? "0" + m : "00")) + ":" + (s >= 10 ? s : (s > 0 ? "0" + s : "00"));
    }
    if($('div#CzasPoz')){
        var czasp = $('div#CzasPoz');
        var czasPoz = parseInt(czasp.html());
        czasp.html(secondsToHms(czasPoz));
        var tim = setInterval(function(){
            czasPoz--;
            czasp.html(secondsToHms(czasPoz));
        },1000);
    }
});