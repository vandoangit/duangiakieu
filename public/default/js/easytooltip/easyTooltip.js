var offsetfromcursorX=12;
var offsetfromcursorY=10;
var offsetdivfrompointerX=10;
var offsetdivfrompointerY=14;

var ie=document.all;
var ns6=document.getElementById && !document.all;
if(ie || ns6)
    var tipobj=document.all ? document.all["easyTooltip"] : document.getElementById ? document.getElementById("easyTooltip") : "";

function ietruebody(){
    return(document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body;
}






(function($){
    $.fn.easyTooltip=function(options){
        // default configuration properties
        var defaults={
            offsetfromcursorX:12,
            offsetfromcursorY:8,
            offsetdivfrompointerX:10,
            offsetdivfrompointerY:14,
            tooltipId:"easyTooltip",
            clickRemove:false,
            content:"",
            useElement:false
        };

        var options=$.extend(defaults,options);
        var content;
        var useElement_id;

        var ie=document.all;
        var ns6=document.getElementById && !document.all;

        this.each(function(){
            var title=$(this).attr("title");
            $(this).hover(function(e){
                content=(options.content != "") ? options.content : title;
                if(options.useElement){
                    useElement_id=$(this).attr("hominhtri");
                    content=$("#" + useElement_id).html();
                }
                $(this).attr("title","");
                if(content != "" && content != undefined){
                    $("body").append("<div id='" + options.tooltipId + "'>" + content + "</div>");

                    var tipobj=document.all ? document.all[options.tooltipId] : document.getElementById ? document.getElementById(options.tooltipId) : "";
                    var position_x,position_y,curX,curY,winwidth,winheight,rightedge,bottomedge,leftedge;

                    curX=(ns6) ? e.pageX : event.clientX + ietruebody().scrollLeft;
                    curY=(ns6) ? e.pageY : event.clientY + ietruebody().scrollTop;

                    winwidth=(ie && !window.opera) ? ietruebody().clientWidth : window.innerWidth - 20;
                    winheight=(ie && !window.opera) ? ietruebody().clientHeight : window.innerHeight - 20;

                    rightedge=(ie && !window.opera) ? winwidth - event.clientX - options.offsetfromcursorX : winwidth - e.clientX - options.offsetfromcursorX;
                    bottomedge=(ie && !window.opera) ? winheight - event.clientY - options.offsetfromcursorY : winheight - e.clientY - options.offsetfromcursorY;

                    leftedge=(options.offsetfromcursorX < 0) ? options.offsetfromcursorX * (-1) : -1000;
                    if(tipobj != undefined){

                        if(rightedge < tipobj.offsetWidth)
                            position_x=curX - tipobj.offsetWidth;
                        else if(curX < leftedge)
                            position_x=5;
                        else
                            position_x=curX + options.offsetfromcursorX - options.offsetdivfrompointerX;

                        if(bottomedge < tipobj.offsetHeight)
                            position_y=curY - tipobj.offsetHeight + options.offsetfromcursorY;
                        else
                            position_y=curY + options.offsetfromcursorY + options.offsetdivfrompointerY;

                        $("#" + options.tooltipId)
                            .css("position","absolute")
                            .css("top",position_y + "px")
                            .css("left",position_x + "px")
                            .css("display","none")
                            .fadeIn("fast")
                    }
                }
            },
                function(){
                    $("#" + options.tooltipId).remove();
                    $(this).attr("title",title);
                });
            $(this).mousemove(function(e){
                var tipobj=document.all ? document.all[options.tooltipId] : document.getElementById ? document.getElementById(options.tooltipId) : "";
                var position_x,position_y,curX,curY,winwidth,winheight,rightedge,bottomedge,leftedge;

                curX=(ns6) ? e.pageX : event.clientX + ietruebody().scrollLeft;
                curY=(ns6) ? e.pageY : event.clientY + ietruebody().scrollTop;

                winwidth=(ie && !window.opera) ? ietruebody().clientWidth : window.innerWidth - 20;
                winheight=(ie && !window.opera) ? ietruebody().clientHeight : window.innerHeight - 20;

                rightedge=(ie && !window.opera) ? winwidth - event.clientX - options.offsetfromcursorX : winwidth - e.clientX - options.offsetfromcursorX;
                bottomedge=(ie && !window.opera) ? winheight - event.clientY - options.offsetfromcursorY : winheight - e.clientY - options.offsetfromcursorY;

                leftedge=(options.offsetfromcursorX < 0) ? options.offsetfromcursorX * (-1) : -1000;
                if(tipobj != undefined){

                    if(rightedge < tipobj.offsetWidth)
                        position_x=curX - tipobj.offsetWidth;
                    else if(curX < leftedge)
                        position_x=5;
                    else
                        position_x=curX + options.offsetfromcursorX - options.offsetdivfrompointerX;

                    if(bottomedge < tipobj.offsetHeight)
                        position_y=curY - tipobj.offsetHeight + options.offsetfromcursorY - 5;
                    else
                        position_y=curY + options.offsetfromcursorY + options.offsetdivfrompointerY;

                    $("#" + options.tooltipId)
                        .css("top",position_y + "px")
                        .css("left",position_x + "px")
                }
            });
            if(options.clickRemove){
                $(this).mousedown(function(e){
                    $("#" + options.tooltipId).remove();
                    $(this).attr("title",title);
                });
            }
        });
    };

})(jQuery);
