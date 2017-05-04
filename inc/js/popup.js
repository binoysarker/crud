$("document").ready(function (){
$("select#type").change(function(){
var val = $("select#type").val();
if (val == "") {return;}
$("html").append('<div class="body"></div>');
$("div.body").css({position:'absolute',top:0,left:0,width:'100%',height:'100%',backgroundColor:'#000'});
$("div.body").animate({opacity:0.5},'fast');
var windowWidth = document.documentElement.clientWidth;  
var windowHeight = document.documentElement.clientHeight;  
var elemWidth = $("#popupMSG").width();
var elemHeight = $("#popupMSG").height();
$("#popupMSG").css({  zIndex:10,
"position": "absolute",  
"top": windowHeight/2-elemWidth/2,  
"left": windowWidth/2-elemHeight/2  
});
$("#popupMSG").show(400).html($("div.holder").html());
$("#popupMSG form").attr('action','demo.php?type='+val);
$("#popupMSG p").text("Please Enter "+ val );
$("#popupMSG a").click(function() {$("#popupMSG").fadeOut('slow');
$("div.body").fadeOut('slow');
});
});
});