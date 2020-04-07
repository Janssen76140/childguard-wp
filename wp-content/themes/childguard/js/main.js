$(function() {
    var lesPlus = $('#lesPlus_pro');
    var i = $('#lesPlus_pro').size() + 1;
    
    $('#addScnt').live('click', function() {
            $('<div class"lesPlusClasse' + i +'"').appendTo(lesPlus);
            i++;
            return false;
    });
    
    $('#remScnt').live('click', function() { 
            if( i > 2 ) {
                    $(this).parents('div').remove();
                    i--;
            }
            return false;
    });
});