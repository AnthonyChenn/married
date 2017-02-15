function changeBackground(index){
  $.ajax({
    url:'lib/img2.php',
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
  $('.figure').css('height',$(window).height()+"px");
  changeBackground(0);
});
