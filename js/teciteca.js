var corAtiva = "rgb(112, 156, 190)";
var corInativa = "rgb(255, 255, 255)";
$(function(){
    $(".T_widget").hover(
        function(){$(this).css("background", corAtiva);},
        function(){$(this).css("background", corInativa)}
    );
 
    $(".T_widget").click(function(){
        $(".Cont_widget").slideUp();
        var cont = $(this).next();
        $(cont).slideDown("fast");     
    });
});
