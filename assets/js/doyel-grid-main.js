(function ($) {
    "use strict";
    //Document ready function
    jQuery(document).ready(function($){
        //Masonry ===================================
        $(".masonry-post").masonry({
            horizontalOrder: true,
        });
        $(".menu-close").focus(function() {
            $("a.slicknav_open").focus();
        });
    });//End document ready function 

}(jQuery)); 