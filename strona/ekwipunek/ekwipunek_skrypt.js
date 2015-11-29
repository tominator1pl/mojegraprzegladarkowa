$(document).ready(function() {
    var last2;
    var myDiv2 = false;
    $("div.col-sm-12 > div > table > tbody > tr").on('click', function(e) {
        if(last2) {
            last2.removeClass('table-kliked');
            last2.addClass('table-hoverek');
        }
        $(this).removeClass('table-hoverek');
        $(this).addClass('table-kliked');
        $('input[name=selectedIdEq]').val($(this).children(':first').html());
        myDiv2 = $(document.createElement('div'));
        myDiv2.hide();
        myDiv2.css({top: e.pageY-10, left: e.pageX-50});
        myDiv2.appendTo("form[name=ekwipunek]");
        myDiv2.addClass('sklep-hover-div uzyj');
        myDiv2.fadeIn(0);
        myDiv2.html("<input type='submit' class='btn btn-default' name='uzyj' value='Użyj'>");
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
        last2 = $(this);
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
        if(myDiv && !myDiv2) {
            myDiv.fadeOut(100,function(){
               myDiv.remove();
                myDiv=false;
            });
        }
    });
});