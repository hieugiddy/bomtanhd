function suaLink(id){
    var arr=$("#LL"+id).text().split(",");
    $("#formsua").css("display","block");
    $("#formsua input").val(id);
    $("#server").val($("#SV"+id).text());
    $("#loai").val(arr[0]);
    $("#tenhienthi").val($("#T"+id).text());
    $("#link").val(arr[1]);
}
$("#btn-reset-link").click(function(){
    $("#formsua").css("display","none");
    $("#formsua input").val(-1);
    $("#server").val('');
    $("#loai").val('');
    $("#tenhienthi").val('');
    $("#link").val('');
});