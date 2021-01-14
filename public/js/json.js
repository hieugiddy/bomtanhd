
function formatTime(date) {
    var date=date.split(":");
    var hours = date[0];
    var minutes = date[1];
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}
function showTheloai(json, ul, domain) {
    var ul = document.getElementById(ul);
    var menu_item = "";
    for (var i = 0; i < json.length; i++) {
        menu_item += '<li> <a class="label-name" href="' + domain + '/TheLoai/DanhSach/' + json[i].slug + '/1">' + json[i].tenTL + '</a> </li>';
    }
    ul.innerHTML = menu_item;
}
function showQuocGia(json, ul, domain) {
    var ul = document.getElementById(ul);
    var menu_item = "";
    for (var i = 0; i < json.length; i++) {
        menu_item += '<li> <a class="label-name" href="' + domain + '/QuocGia/DanhSach/' + json[i].slug + '/1">' + json[i].ten + '</a> </li>';
    }
    ul.innerHTML = menu_item;
}
function showNam(json, ul, domain) {
    var ul = document.getElementById(ul);
    var menu_item = "";
    for (var i = 0; i < json.length; i++) {
        menu_item += '<li> <a class="label-name" href="' + domain + '/Nam/DanhSach/' + json[i].nam + '/1">' + json[i].nam + '</a> </li>';
    }
    ul.innerHTML = menu_item;
}
function showSlide(json, slide, domain) {
    var slide = document.getElementById(slide);
    var slide_item = "";
    for (var i = 0; i < json.length; i++) {
        slide_item += '<div class="swiper-slide"><a class="lazy" href="' + domain + '/Phim/XemPhim/' + json[i].slug + '" title="' + json[i].tenPhim + '" tabindex="-1"><img src="' + json[i].anhbia + '" alt="' + json[i].tenPhim + '" style="object-fit: cover;background-repeat:no-repeat;width: 100%;height: 100%;"/></a></div>';
    }
    slide.innerHTML = slide_item;
}

function showPhim(json, phim, domain) {
    var phim = document.getElementById(phim);
    var phim_item = "";
    for (var i = 0; i < json.length; i++) {
        phim_item += '<a title="' + json[i].tenPhim + '" href="' + domain + '/Phim/XemPhim/' + json[i].slug + '" class="film-small lazy"> <div class="poster-film-small " style="background-image:url(&#39;' + json[i].poster + '&#39;)"> <ul class="tag-film"> <li><div class="hd" style="width:auto !important;height:auto !important;padding:2px 4px">' + json[i].status + '</div></li> </ul> <div class="play"></div> </div> <div class="title-film-small"> <b class="title-film" id="tenphim">' + json[i].tenPhim + '</b> <p>' + json[i].tengoc + '</p> </div> </a>';
    }
    phim.innerHTML = phim_item;
}
function chiTietBinhLuan(json){
    document.getElementById("form-traloibl").style.display="block";
    document.getElementById("ctbl-tenphim").innerHTML='<a href="../Phim/XemPhim/'+json.slug+'" target="_blank" style="color:#fff">"'+json.tenPhim+'"</a>';
    document.getElementById("ctbl-user").innerHTML='<img src="'+json.avatar+'" width="30px" height="30px"/> <b>'+json.ten+'</b> / '+json.email;
    document.getElementById("ctbl-time").innerHTML='<i class="halflings-icon time"></i>'+json.thoiGian.split(" ")[0]+', <b>'+formatTime(json.thoiGian.split(" ")[1])+'</b>';
    document.getElementById("ctbl-noidung").innerHTML='<blockquote>'+json.noidung+'</blockquote>';
    document.getElementById("like").innerHTML='<span id="sobinhluan">'+json.thich+'</span>&nbsp;<i class="fa fa-heart" style="cursor:pointer" onclick="thich(\''+json.idBinhLuan+'\',sobinhluan)"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<span style="cursor:pointer" onclick="xoaBinhLuan(\''+json.idBinhLuan+'\',\''+json.traloi+'\')"><i class="fa fa-trash"></i>&nbsp;Xóa</span>';
    document.getElementById("idBinhLuan").value=json.idBinhLuan;
}
function danhSachBinhLuan(json) {
    var binhluan_item = "";
    for (var i = 0; i < json.length; i++) {
        var datetime=json[i].thoiGian.split(" ");
        var ngay=datetime[0];
        var gio=formatTime(datetime[1]);
        if(i==0)
            binhluan_item += '<li id="defaultBinhLuan" onclick="xemChiTiet(\''+json[i].idBinhLuan+'\',this)" class="itemBL "><span class="from"><span class="glyphicons star"><i></i></span> '+json[i].ten+'<span class="glyphicons paperclip"><i></i></span></span><span class="title">'+json[i].noidung+'</span><span class="date">'+ngay+' - <b>'+gio+'</b></span></li> ';
        else
            binhluan_item += '<li onclick="xemChiTiet(\''+json[i].idBinhLuan+'\',this)" class="itemBL "><span class="from"><span class="glyphicons star"><i></i></span> '+json[i].ten+'<span class="glyphicons paperclip"><i></i></span></span><span class="title">'+json[i].noidung+'</span><span class="date">'+ngay+' - <b>'+gio+'</b></span></li> ';
    }
    document.getElementById("dsbinhluan").innerHTML=binhluan_item;
}
function hienThiTraLoi(json){
    var items="";
    var dstraloi=document.getElementById("traloibinhluan");
    for(var i=0;i<json.length;i++){
        if(!json[i])
            continue;
        js_item=json[i][0];
        items+='<div class="item"><div><img src="'+js_item.avatar+'" alt="'+js_item.ten+'" width="30px" height="30px" style="float:left"></div><div><p class="ten">'+js_item.ten+'</p><p class="noidung">'+js_item.noidung+'</p><div id="like" style="margin:0;text-align:right"><span id="sobinhluan'+js_item.id+'">'+js_item.thich+'</span>&nbsp;<i class="fa fa-heart" style="cursor:pointer" onclick="thich(\''+js_item.id+'\',sobinhluan'+js_item.id+')"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<span style="cursor:pointer" onclick="xoaTraLoi(\''+js_item.id+'\')"><i class="fa fa-trash"></i>&nbsp;Xóa</span></div></div></div>';
    }
    dstraloi.innerHTML=items;
}
function showPhimItem(json){

}
function suaPhim_Show(json){
    var id=json[0].id;
    var tenphim=json[0].tenPhim;
    var tengoc=json[0].tengoc;
    
    if(json[0].kieu=='phimle')
        document.getElementById("kieu").value='phimle';
    else
        document.getElementById("kieu").value='phimbo';
    
    var status=json[0].status;
    var nam=json[0].nam;
    var imdb=json[0].imdb;
    var tagline=json[0].tagline;
    var poster=json[0].poster;
    var anhbia=json[0].anhbia;
    var gioithieu=json[0].gioithieu;
    var tukhoa=json[0].tukhoa;
    var congty=json[0].congtysx;
    var trailer=json[0].trailer;
    var theloai=json[0].theloai.split(",");
    var quocgia=json[0].quocgia.split(",");
    var daodien=json[0].daodien.split(",");
    var dienvien=json[0].dienvien.split(",");

    document.getElementById("id").value=id;
    document.getElementById("tenphim").value=tenphim;
    document.getElementById("tengoc").value=tengoc;
    document.getElementById("poster").value=poster;
    document.getElementById("anhbia").value=anhbia;
    document.getElementById("poster-img").src=poster;
    document.getElementById("anhbia-img").src=anhbia;
    document.getElementById("poster-cu").value=poster;
    document.getElementById("anhbia-cu").value=anhbia;
    document.getElementById("nam").value=nam;
    document.getElementById("congty").value=congty;
    document.getElementById("trailer").value=trailer;
    document.getElementById("imdb").value=imdb;
    document.getElementById("status").value=status;
    document.getElementById("tagline").value=tagline;
    document.getElementById("gioithieu").value=gioithieu;
    document.getElementById("gioithieu").blur();
    document.getElementById("tukhoa").value=tukhoa;
    
    var ele_theloai=document.getElementById("theloai");
    for(var i=0;i<ele_theloai.options.length;i++){
        for(var j=0;j<theloai.length-1;j++){
            if(ele_theloai.options[i].value==theloai[j])
                ele_theloai.options[i].selected=true;
        }
        
    }
    

    var ele_quocgia=document.getElementById("quocgia");
    for(var i=0;i<ele_quocgia.options.length;i++){
        for(var j=0;j<quocgia.length-1;j++){
            if(ele_quocgia.options[i].value==quocgia[j])
                ele_quocgia.options[i].selected=true;
        }
    }
    
    var ele_daodien=document.getElementById("daodien");
    for(var i=0;i<ele_daodien.options.length;i++){
        for(var j=0;j<daodien.length-1;j++){
            if(ele_daodien.options[i].value==daodien[j])
                ele_daodien.options[i].selected=true;
        }
    }

    var ele_dienvien=document.getElementById("dienvien");
    for(var i=0;i<ele_dienvien.options.length;i++){
        for(var j=0;j<dienvien.length-1;j++){
            if(ele_dienvien.options[i].value==dienvien[j])
                ele_dienvien.options[i].selected=true;
        }
    }
}
