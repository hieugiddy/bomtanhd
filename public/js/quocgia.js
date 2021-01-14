
$(document).ready(function(){
    var tf=false;
    $("#quocgia").keyup(function(){
        var giatri=$(this).val();
        $.post("../Validation/isExistQuocGia",{slug:giatri},function(data){
            if(data=="true"){
                $("#checkQG").html('<font color="red">Đã tồn tại hoặc chưa nhập</font>');
                tf=false;
            }
            else{
                $("#checkQG").html('<font color="green">Oke</font>');
                tf=true;
            }
        });            
    });
    $("#btn-themquocgia").click(function(){
        if(tf){
            $.post("../QuocGia/themQuocGia",{ten:$("#quocgia").val()},function(data){
                $("#checkQG").html(data);
            });
        }
    });    
});

function suaQuocGia(id){
    var temp= $('#'+id).text();
    $('#'+id).html("<input type='hidden' id='idQG"+id+"' value='"+id+"'/><input type='text' id='valueQG"+id+"' value='"+temp+"' style='float:left;margin-right:10px;width:22vh'/><input type='submit' class='btn btn-success' id='btn-suaQuocGia-"+id+"' value='Lưu'>");
    $("#btn-suaQuocGia-"+id).click(function(){
        var valueQG=$("#valueQG"+id).val()
        var idQG=$("#idQG"+id).val()
        $.post("../QuocGia/updateQuocGia",{ten:valueQG,id:idQG},function(data){
            if(data=='false')
                $("#checkQG").html('<font color="red">Cập nhập thất bại</font>');
            else
                 $('#'+id).html(data);

        });
    })
}
function xoaQuocGia(id){
    $.post("../QuocGia/xoaQuocGia",{id:id},function(data){
        $("#checkQG").html(data);
    });
}