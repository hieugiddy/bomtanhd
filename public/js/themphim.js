function getAPIPhim(json) {
    var tenphim,tengoc,status="",nam;
    if(tenphim=json.title)
        tenphim=json.title;
    else
        tenphim=json.name
    
    if(json.original_title)
        tengoc=json.original_title;
    else
        tengoc=json.original_name;
    

    if(json.runtime){
        status=json.runtime+" phút";
        $("#kieu").val('phimle');
    }
    else{
        status=json.number_of_episodes+"/"+json.number_of_episodes;
        $("#kieu").val('phimbo');
    }
        
    if(json.release_date)
        nam=json.release_date.split("-")[0];
    else
        nam=json.first_air_date.split("-")[0];
    
    tengoc+=" ("+nam+")";
    tenphim+=" ("+nam+") - "+tengoc+" | BomTanHD";
    var imdb=json.vote_average;
    var tagline=json.tagline;
    var poster="https://image.tmdb.org/t/p/w300/"+json.poster_path;
    var anhbia="https://image.tmdb.org/t/p/w500/"+json.backdrop_path;
    var gioithieu = json.overview;
    var tukhoa=tengoc+","+tenphim+","+tagline;
    var congty='';
    if(json.production_companies.length==0)
        congty='Đang cập nhật';
    else
        for(var i=0;i<json.production_companies.length;++i){
            congty+=json.production_companies[i].name+', ';
        }
    $("#tenphim").val(tenphim);
    $("#tengoc").val(tengoc);
    $("#poster").val(poster);
    $("#anhbia").val(anhbia);
    $("#nam").val(nam);
    $("#congty").val(congty);
    $("#imdb").val(imdb);
    $("#status").val(status);
    $("#tagline").val(tagline);
    $("#gioithieu").val(gioithieu).blur();
    $("#tukhoa").val(tukhoa);
}
$("#btn-fetch").click(function(){
    var loai;
    if($("#loaifetch").val()=='phimle-f')
        loai='movie';
    else
        loai='tv';
    $("#fetch-kq").html('<script src="https://api.themoviedb.org/3/'+loai+'/'+$("#tmdb-id").val()+'?api_key=ad05119fa13b5ea24959fc859e02d44b&callback=getAPIPhim&language=vi&region=vi"></script><font color="green">Lấy dữ liệu thành công</font>')
})
function getDienVien(json) {
  var hinhdv;
  if(json.profile_path!=null) hinhdv='https://image.tmdb.org/t/p/w500/'+json.profile_path; else hinhdv='https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Bongngotv_config/no_picture_available.png';
  var item='<div class="swiper-slide dvc"><div class="item slick-slide slick-cloned" style="width: 192px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="-5" aria-hidden="true"><a target="_blank" title="'+json.biography+'" href="https://www.themoviedb.org/person/'+json.id+'" style="background-image:url('+hinhdv+')" tabindex="-1"> <div class="black-gradient"> <b class="title-film">'+json.name+'</b> <p>'+json.biography+'</p> </div> </a></div></div>';
    document.write(item);
  }