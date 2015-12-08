$(document).ready(function() {
    var last;
    $("div.col-sm-7 > div > table > tbody > tr").on('click', function() {
        if(last) {
            last.removeClass('table-kliked');
            last.addClass('table-hoverek');
        }
        $(this).removeClass('table-hoverek');
        $(this).addClass('table-kliked');
        $('input[name=selectedIdKup]').val($(this).children(':first').html());
        last = $(this);
    });
    var last2;
    $("div.col-sm-5 > div > table > tbody > tr").on('click', function() {
        if(last2) {
            last2.removeClass('table-kliked');
            last2.addClass('table-hoverek');
        }
        $(this).removeClass('table-hoverek');
        $(this).addClass('table-kliked');
        $('input[name=selectedIdSpr]').val($(this).children(':first').html());
        last2 = $(this);
    });
    $('form[name=sklep]').submit(function(e) {
        if($("div[id=blad]"))$("div[id=blad]").remove();
        if($("input[type=submit][clicked=true]").attr('id') == "butkup"){
            if($('input[name=selectedIdKup]').val() == "-1"){
                $("div.col-sm-7").children("table").after("<div id='blad'>Nie wybrano żadnego przedmiotu.</div>");
                e.preventDefault();
            }
        }else if($("input[type=submit][clicked=true]").attr('id') == "butspr"){
            if($('input[name=selectedIdSpr]').val() == "-1"){
                $("div.col-sm-5").children("table").after("<div id='blad'>Nie wybrano żadnego przedmiotu.</div>");
                e.preventDefault();
            }
        }
    });
    $("form[name=sklep] input[type=submit]").click(function() {
        $("input[type=submit]", $(this).parents("form[name=sklep]")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });
    var myDiv = false;
    var param1 = "";
    var param2 = "";
    $("table > tbody > tr").mousemove(function(e) {
        switch ($(this).children().eq(4).html()){
            case '1':
                param1 = "Obrażenia: ";
                param2 = "Prędkość ataku: ";
                break;
            case '2':
                param1 = "Pancerz: ";
                param2 = "";
                break;
        }
        if(myDiv){
            myDiv.stop();
            myDiv.fadeIn(100);
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.children('div.lead').html($(this).children().eq(1).html());
            myDiv.children('div#Cena-div').html("Cena: "+$(this).children().eq(2).html());
            myDiv.children('div#par1-div').html(param1+$(this).children().eq(5).html());
            myDiv.children('div#par2-div').html(param2+$(this).children().eq(6).html());
        }else {
            myDiv = $(document.createElement('div'));
            myDiv.hide();
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.appendTo("div.row-w-iframe");
            myDiv.addClass('sklep-hover-div');
            myDiv.fadeIn(100);
            myDiv.html("<div class='lead text-center'>"+$(this).children().eq(1).html()+"</div>" +
                "<div id='Cena-div' class='text-left'>Cena: "+$(this).children().eq(2).html()+"</div>" +
                "<div id='par1-div' class='text-left'>"+param1+$(this).children().eq(5).html()+"</div>" +
                "<div id='par2-div' class='text-left'>"+param2+$(this).children().eq(6).html()+"</div>");
        }
    }).mouseleave(function(e){
        if(myDiv) {
            myDiv.fadeOut(100,function(){
               myDiv.remove();
                myDiv=false;
            });
        }
    });
});