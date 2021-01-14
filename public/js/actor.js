function suaActor(id){
    var arr=$("#NAG"+id).text().split(",");
    $("#formsua").css("display","block");
    $("#formsua input").val(id);
    $("#tenActor").val($("#HT"+id).text());
    $("#nghiepvu").val(arr[0]);
    $("#avatar-img").attr("src",arr[1]);
    $("#avatar").val(arr[1]);
    $("#gioiThieu").val(arr[2]);
}
$("#btn-reset-link").click(function(){
    $("#formsua").css("display","none");
    $("#formsua input").val(-1);
    $("#tenActor").val('');
    $("#nghiepvu").val('dienvien');
    $("#avatar-img").attr('src','');
    $("#avatar").val('');
    $("#gioiThieu").val('');
});