jQuery(function($){
    $(".status").focusout(function(){
        var element = $(this);  
        element.text( $.trim(element.text()))
    });
});
