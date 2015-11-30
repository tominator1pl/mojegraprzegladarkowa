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
        $('input[name=selectedIdPos]').val($(this).children(':first').html());
        myDiv2 = $(document.createElement('div'));
        myDiv2.hide();
        myDiv2.css({top: e.pageY-10, left: e.pageX-65});
        myDiv2.appendTo("form[name=arena]");
        myDiv2.addClass('sklep-hover-div uzyj');
        myDiv2.fadeIn(0);
        myDiv2.html("<input type='submit' class='btn btn-default' name='walcz' value='Walcz'>");
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
    $("table > tbody > tr").mousemove(function(e) {
        if(myDiv){
            myDiv.stop();
            myDiv.fadeIn(100);
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.children('div#obr-div').html($(this).children().eq(1).html());
            myDiv.children('div#obr-div').children('img').attr('width','100px');
            myDiv.children('div#name-div').html($(this).children().eq(2).html());
            myDiv.children('div#poz-div').html("Poziom: "+$(this).children().eq(3).html());
            myDiv.children('div#sil-div').html("Siła: "+$(this).children().eq(4).html());
            myDiv.children('div#obro-div').html("Obrona: "+$(this).children().eq(5).html());
            myDiv.children('div#pie-div').html("Haisy: "+$(this).children().eq(6).html());
        }else {
            myDiv = $(document.createElement('div'));
            myDiv.hide();
            myDiv.css({top: e.pageY-10, left: e.pageX+30});
            myDiv.appendTo("div.row-w-iframe");
            myDiv.addClass('sklep-hover-div');
            myDiv.fadeIn(100);
            myDiv.html("<div id='obr-div' class='text-center'>"+$(this).children().eq(1).html()+"</div>" +
                "<div id='name-div' class='lead text-center'>"+$(this).children().eq(2).html()+"</div>" +
                "<div id='poz-div' class='text-left'>Poziom: "+$(this).children().eq(3).html()+"</div>" +
                "<div id='sil-div' class='text-left'>Siła: "+$(this).children().eq(4).html()+"</div>" +
                "<div id='obro-div' class='text-left'>obrona: "+$(this).children().eq(5).html()+"</div>" +
                "<div id='pie-div' class='text-left'>Haisy: "+$(this).children().eq(6).html()+"</div>");
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