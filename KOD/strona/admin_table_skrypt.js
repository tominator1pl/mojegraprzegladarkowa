$(document).ready(function() {
    var inpucik = [];
    var zaprzad = false;
    var klik = false;
   $('form[name=admin] > table > tbody > tr > td').click(function(){
       var kolumna = $('form[name=admin] > table > thead > tr > td').eq($(this).index()).html();
       if(!klik){
           klik = true;
       }
       if(!$(this).children().is('input') && !$(this).children().is('button')){

           var rzad = $(this).parent().children(':first').html();
           if(!zaprzad) {
               zaprzad = rzad;
               $('input[name=selectedID]').val(rzad);
           }
           if(zaprzad == rzad){
               if (!inpucik[kolumna] && $(this).html() != rzad) {
                   var wid = $(this).width();
                   if($(this).html() == '***')$(this).html('');
                   inpucik[kolumna] = $("<input type='text' style='width: "+wid+"px' class='form-control' name='" + kolumna + "' value='" + $(this).html() + "'>");
                   $(this).html(inpucik[kolumna]);
                   $(this).width(wid);
               }else if($(this).html() == rzad){

               } else {
                   $('form[name=admin]').submit();
               }
           }else{
               $('form[name=admin]').submit();
           }
       }
   });
    $('form[name=admin] > table > tbody').ready(function(){
        var colCount = 0;
        $('form[name=admin] > table > tbody > tr:nth-child(1) td').each(function () {
            colCount++;
        });
        colCount--;
        var newRow = "<tr>";
        newRow += "<td>*</td>"
        for(var i = 1; i < colCount; i++){
            var kolumna = $('form[name=admin] > table > thead > tr > td').eq(i).html();
            newRow += "<td><input type='text' class='form-control' name='" + kolumna + "New'></td>"
        }
        newRow += "</tr>";
        newRow = $(newRow);
        $('form[name=admin] > table > tbody').append(newRow);
        newRow.children().click(function(){
            var kolumna = $('form[name=admin] > table > thead > tr > td').eq($(this).index()).html();
            if(!klik){
                klik = true;
            }
            if($(this).children().is('input')){

                var rzad = $(this).parent().children(':first').html();
                if(!zaprzad) {
                    zaprzad = rzad;
                    $('input[name=selectedID]').val(rzad);
                }
                if(zaprzad == rzad){
                    if ($(this).html() != rzad) {

                    }else if($(this).html() == rzad){

                    } else {
                        $('form[name=admin]').submit();
                    }
                }else{
                    $('form[name=admin]').submit();
                }
            }
        });
    });
    $('body').click(function(){
        if(zaprzad){
            if(!klik) {
                $('form[name=admin]').submit();
            }else{
                klik = false;
            }
        }
    });
});
