
$(document).ready(function(){
    $(".openNav").click(function(){
        $("#sidenav").css("width", "98%");
    });

    $("#sidenav").click(function(){
        $("#sidenav").css("width", "0%");
    });

    $("#sidenav a").click(function(e){
       e.stopPropagation();
    });
});
