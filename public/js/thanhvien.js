$("#username").keyup(function(){
    var giatri=$(this).val();
    $.post("../Validation/isExistUsername",{username:giatri},function(data){
        if(data=="true"){
            $("#checkUS").html('<font color="red">Đã tồn tại hoặc chưa nhập</font>');
        }
        else{
            $("#checkUS").html('<font color="green">Oke</font>');
        }
    });            
});

function showPass(id,obj){
    if($("#"+id).attr("type")==="password"){
        $("#"+id).attr("type","text");
        $(obj).removeClass("fa-eye").addClass("fa-eye-slash");
    }
    else{
        $("#"+id).attr("type","password");
        $(obj).removeClass("fa-eye-slash").addClass("fa-eye");
    }
}
function suaThanhVien(id){
    var arr=$("#AEGQT"+id).text().split(",");
    $("#formsua").css("display","block");
    $("#ck-doimk").css("display","block");
    $("#formsua input").val(id);
    $("#username").val($("#US"+id).text());
    $("#username").attr("readonly",true);
    $("#tenTV").val($("#HT"+id).text());
    $("#quyen").val(arr[3]);
    $("#avatar-img").attr("src",arr[0]);
    $("#avatar").val(arr[0]);
    $("#email").val(arr[1]);
    $("#gioiThieu").val(arr[2]);
    $("#matkhau").val('Anhyeu123');
    $("#matkhau").attr("readonly",true);
    $("#again-matkhau").val('Anhyeu123');
    $("#again-matkhau").attr("readonly",true);
}
$("#btn-reset-link").click(function(){
    $("#formsua").css("display","none");
    $("#ck-doimk").css("display","none");
    $("#formsua input").val(-1);
    $("#username").val('');
    $("#username").attr("readonly",false);
    $("#tenTV").val('');
    $("#quyen").val(0);
    $("#avatar-img").attr("src",'');
    $("#avatar").val('');
    $("#email").val('');
    $("#gioiThieu").val('');
    $("#matkhau").attr("readonly",false);
    $("#again-matkhau").attr("readonly",false);
    $("#again-matkhau").val('');
    $("#matkhau").val('');
});
$("#hiendoimk").click(function(){
    var kt=document.getElementById("hiendoimk");
    if(kt.checked){
        $("#matkhau").attr("readonly",false);
        $("#again-matkhau").attr("readonly",false);
        $("#again-matkhau").val('');
        $("#matkhau").val('');
    }
    else{
        $("#matkhau").attr("readonly",true);
        $("#again-matkhau").attr("readonly",true);
        $("#again-matkhau").val('-1');
        $("#matkhau").val('-1');
    }
});