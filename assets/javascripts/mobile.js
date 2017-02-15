function sendMsg(){
    var name = $('.name').val();
    var msg  = $('.msg').val();
    $.ajax({
      url:"lib/receiver.php",
      method:"POST",
      data:{"name":name,"msg":msg},
    }).done(function(data){
      $('.msg').val('');
      alert("成功！");
    });
}
$(document).ready(function(){
  $height = $(window).height();
  $('.send').click(sendMsg);
});
