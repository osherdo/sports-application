/* basic function (without adding icons to status.
jQuery(function($){
    $(".status").focusout(function(){
        var element = $(this);  
        element.text( $.trim(element.text()))
    });
});
*/

jQuery(function($) {
    $("button").click(function() {
        var element = $("#test");
        var test = $.trim(element.text())
        //console.log(test.length, test,element.html())
       // alert(test ? "Not Empty" : "Empty")
        $("[name=post]").val(element.html())
      //  if (!test) return false
        
        
        // debugging
       // console.log ($("form").serialize())
        //return false
    })

    // id attribute refernces a single element.
    // class is used for multiple objects.

    $(".icons img").click(function() {
        $("#test").append($(this).clone())
        placeCaretAtEnd($("#test"))

    })
});

function placeCaretAtEnd(el) {
    //http://stackoverflow.com/questions/4233265/contenteditable-set-caret-at-the-end-of-the-text-cross-browser
    el.focus();
    if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}

