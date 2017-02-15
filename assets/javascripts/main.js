function reText(index){
  $.ajax({
    url:'lib/msg.php',
    data: {"index":index},
    method:"POST",
    dataType: "json",
  }).done(function(text){
    text = text[0];
    $msg = text['name']+":"+text['message'];
    $('.message').empty().append($msg).css('top','100%').animate({top:'0%'},1000,'linear',function(){
      index += 1;
      setTimeout("reText("+index+")",2000);
    });
  });
}

function changeBackground(index){
  $.ajax({
    url:'lib/img.php',
    data: {"index":index},
    method:"POST",
  }).done(function(figure){
    $('.figure').fadeTo('slow',0.3,function(){
      $(this).css('background-image',"url("+figure+")");
    }).fadeTo('slow',1);
    index += 1 ;
    setTimeout('changeBackground('+index+')',4000);
  });
}

$(document).ready(function(){
  $(window).height();
  $('.figure').css('height',$(window).height()+"px");
  changeBackground(0);
});
