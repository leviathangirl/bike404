var lastthis;
$(document).ready(function(){
	$("#thumbnail ul li img").click(function(){
        if (lastthis) {
            $(lastthis).css("outline-style","none");
        }
        $(this).css({"outline-style":"dotted","outline-color":"#00ff00"});
        lastthis=this;

        var x = $(this).attr("src");
    	var y = $("#slide ul li:eq(1) img").attr("src");
        if (x == y)
        {

        }
    	else if(x >= y)
    	  {
    	     $("#slide ul li:eq(2) img").attr("src",x);
    		   moveRight();
    	   }
        else {
             $("#slide ul li:eq(0) img").attr("src",x);
    		   moveLeft();
             }
     });

    function moveLeft() {
            $('#slide ul').animate({
                left: + 600
            }, 300, function () {
             $('#slide ul li:last').prependTo('#slide ul');
                $('#slide ul').css({left: 0});
            });
        };

    function moveRight() {
            $('#slide ul').animate({
                left: - 600
            }, 300, function () {
               $('#slide ul li:first').appendTo('#slide ul');
                $('#slide ul').css({left: 0});
            });
        };

});
