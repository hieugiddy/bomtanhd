document.getElementById("defaultBinhLuan").click();
$(document).ready(function () {
    $("#btn-thembinhluan").click(function () {
        $.post("../BinhLuan/themBinhLuan", { ten: $("#theloai").val() }, function (data) {
            $("#checkTL").html(data);
        });
    });
});

function xemChiTiet(id,obj) {
    $.post("../BinhLuan/chiTietBinhLuan", { id:id }, function (data) {
        chiTietBinhLuan(JSON.parse(data)[0]);
    });
    $.post("../BinhLuan/getBinhLuanCon", { id:id }, function (data) {
        data=JSON.parse(data);
        if(data=="false"){
            $("#traloibinhluan").html("");
        }
        else
            hienThiTraLoi(data);
    });
    
    var item=document.getElementsByClassName("itemBL");
    for(var i=0;i<item.length;i++){
        item[i].classList.remove("active");
    }
    $(obj).addClass("active");
}
function thich(id,string){
    $.post("../BinhLuan/thaTym", { id:id }, function (data) {
        string.innerText=data;
    });
}

function xoaTraLoi(id) {
    $.post("../BinhLuan/xoaTraLoi", { id: id }, function (data) {
        $("#msgBinhLuan").html(data);
    });
}
function xoaBinhLuan(id,traloi) {
    console.log(id+"-"+traloi);
    $.post("../BinhLuan/xoaBinhLuan", { id:id,traloi:traloi}, function (data) {
        $("#msgBinhLuan").html(data);
    });
}