$("#icon-user").click(function(){
    if($("#profile").attr("class")=="active"){
        $("#profile").removeClass("active");
        $("#profile-menu").removeClass("active");
    }
    else{
        $("#profile").addClass("active");
        $("#profile-menu").addClass("active");
    }
});
$("#btn-trailer").click(function(){
  $("#video-player").html($("#data-trailer").html());
});
function thich(id,element,domain){
  $.post(domain+"/BinhLuan/thaTym", { id:id }, function (data) {
      $("#"+element).html(data+' <i class="fa fa-heart"></i>');
  });
}
function getTraLoi(id,element,domain){
  if($("#"+element).css("display")=="none"){
      $("#"+element).css("display","block");
      var str='<div id="form-binhluan" style="display:flex;width:97%;margin:auto"><div id="avt-me" style="float:left;margin-right:10px"></div><div id="binhluan-me" style="display:inline;width:90%"><form action="'+domain+'/BinhLuan/themTraLoi" method="post"><input type="hidden" class="idBinhLuan" name="idBinhLuan" value="'+id+'"/><textarea name="noidung" id="message" rows="3" placeholder="Nhập nội dung bình luận..." style="width:100%;margin:0 auto;display:block"></textarea><button name="btn-traloi-fe" class="btn btn-success" style="float:right;margin:10px">Bình luận</button></form></div></div>';
      $.post(domain+"/BinhLuan/getBinhLuanCon", { id:id }, function (data) {
        data=JSON.parse(data);
        if(!data){
            $("#"+element).html("");
        }
        else{
          for(var k=0;k<data.length;k++){
            str+='<div class="item-traloi" style="display:flex;width:100%;"><div class="avt-traloi" style="float:left;margin-right:10px"><img src="'+data[k][0].avatar+'" width="30px"/></div><div id="noidung-traloi" style="display:inline;width:90%"><strong>'+data[k][0].ten+'</strong> (<span style="font-size:small"><em>'+data[k][0].thoiGian+'</em></span>) <br><p style="font-size:15px;margin:0">'+data[k][0].noidung+'</p><p id="chucnang" style="margin:0 0 0 15px"><span id="like'+data[k][0].id+'" onclick="thich(\''+data[k][0].id+'\',\'like'+data[k][0].id+'\',\''+domain+'\')" style="cursor:pointer;font-size:15px;float:right">'+data[k][0].thich+' <i class="fa fa-heart"></i></span></p></div></div>';
          }
          $("#"+element).html(str);
        }
      });
  }
  else{
      $("#"+element).css("display","none");
      $("#"+element).html("");
  }
}


 function xemphim(obj){
   var play=document.getElementById('video-player');
   var videoembed=document.getElementsByClassName('embed-responsive-item');
   play.innerHTML='<div class="embed-responsive embed-responsive-16by9 mx-auto"><iframe width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src=""></iframe></div>';
   obj.style.display="none";
   document.getElementById("dsserver").style.display="block";
   document.getElementById("defaultOpen").click();
}
function taiphim(){
  document.getElementById('id01').style.display='block';
}
  function trailer(){
    var play=document.getElementById('video-player');
    var trail=document.getElementsByClassName('embed-responsive-item');
    play.innerHTML='<div class="embed-responsive embed-responsive-16by9 mx-auto"><iframe width="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src="https://tailen.ml/bomtanhd/getphim.php?link='+trail[0].src+'"></iframe></div>';
  }