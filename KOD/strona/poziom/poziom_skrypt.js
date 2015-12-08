$(document).ready(function() {
    var zycpkt = $('input#zyc-pkt');
    var silpkt = $('input#sil-pkt');
    var obrpkt = $('input#obr-pkt');
    var punkty = $('span#punkty');
    var zycie = $('span#zycie');
    var sila = $('span#sila');
    var obrona = $('span#obrona');
    var zycminus = $('input#zyc-minus');
    var zycplus = $('input#zyc-plus');
    var silminus = $('input#sil-minus');
    var silplus = $('input#sil-plus');
    var obrminus = $('input#obr-minus');
    var obrplus = $('input#obr-plus');
    zycplus.click(function(){
        punkty.html(parseInt(punkty.html())-1);
        zycpkt.val(parseInt(zycpkt.val())+1);
        zycie.html(parseInt(zycie.html())+5);
        checkPoints();
    });
    silplus.click(function(){
        punkty.html(parseInt(punkty.html())-1);
        silpkt.val(parseInt(silpkt.val())+1);
        sila.html(parseInt(sila.html())+1);
        checkPoints();
    });
    obrplus.click(function(){
        punkty.html(parseInt(punkty.html())-1);
        obrpkt.val(parseInt(obrpkt.val())+1);
        obrona.html(parseInt(obrona.html())+1);
        checkPoints();
    });
    zycminus.click(function(){
        punkty.html(parseInt(punkty.html())+1);
        zycpkt.val(parseInt(zycpkt.val())-1);
        zycie.html(parseInt(zycie.html())-5);
        checkPoints();
    });
    silminus.click(function(){
        punkty.html(parseInt(punkty.html())+1);
        silpkt.val(parseInt(silpkt.val())-1);
        sila.html(parseInt(sila.html())-1);
        checkPoints();
    });
    obrminus.click(function(){
        punkty.html(parseInt(punkty.html())+1);
        obrpkt.val(parseInt(obrpkt.val())-1);
        obrona.html(parseInt(obrona.html())-1);
        checkPoints();
    });

    function checkPoints(){
        if(zycpkt.val() > 0 ){
            if(zycminus.is(':disabled')){
                zycminus.removeAttr('disabled');
            }
        }else{
            if(!zycminus.is(':disabled')){
                zycminus.attr('disabled', 'disabled');
            }
        }
        if(silpkt.val() > 0 ){
            if(silminus.is(':disabled')){
                silminus.removeAttr('disabled');
            }
        }else{
            if(!silminus.is(':disabled')){
                silminus.attr('disabled', 'disabled');
            }
        }
        if(obrpkt.val() > 0 ){
            if(obrminus.is(':disabled')){
                obrminus.removeAttr('disabled');
            }
        }else{
            if(!obrminus.is(':disabled')){
                obrminus.attr('disabled', 'disabled');
            }
        }
        if(punkty.html() <= 0){
            if(!zycplus.is(':disabled')){
                zycplus.attr('disabled', 'disabled');
            }
            if(!silplus.is(':disabled')){
                silplus.attr('disabled', 'disabled');
            }
            if(!obrplus.is(':disabled')){
                obrplus.attr('disabled', 'disabled');
            }
        }else{
            if(zycplus.is(':disabled')){
                zycplus.removeAttr('disabled');
            }
            if(silplus.is(':disabled')){
                silplus.removeAttr('disabled');
            }
            if(obrplus.is(':disabled')){
                obrplus.removeAttr('disabled');
            }
        }

    }
});