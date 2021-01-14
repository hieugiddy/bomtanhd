
$(document).ready(function(){
    var tf=false;
    $("#theloai").keyup(function(){
        var giatri=$(this).val();
        $.post("../Validation/isExistTheLoai",{slug:giatri},function(data){
            if(data=="true"){
                $("#checkTL").html('<font color="red">Đã tồn tại hoặc chưa nhập</font>');
                tf=false;
            }
            else{
                $("#checkTL").html('<font color="green">Oke</font>');
                tf=true;
            }
        });            
    });
    $("#btn-themtheloai").click(function(){
        if(tf){
            $.post("../TheLoai/themTheLoai",{ten:$("#theloai").val()},function(data){
                $("#checkTL").html(data);
            });
        }
    });
});


function suaTheLoai(id){
    var temp= $('#'+id).text();
    $('#'+id).html("<input type='hidden' id='idQG"+id+"' value='"+id+"'/><input type='text' id='valueQG"+id+"' value='"+temp+"' style='float:left;margin-right:10px;width:22vh'/><input type='submit' class='btn btn-success' id='btn-suaTheLoai-"+id+"' value='Lưu'>");
    $("#btn-suaTheLoai-"+id).click(function(){
        var valueQG=$("#valueQG"+id).val()
        var idQG=$("#idQG"+id).val()
        $.post("../TheLoai/updateTheLoai",{ten:valueQG,id:idQG},function(data){
            if(data=='false')
                $("#checkTL").html('<font color="red">Cập nhập thất bại</font>');
            else
                 $('#'+id).html(data);

        });
    })
}
function xoaTheLoai(id){
    $.post("../TheLoai/xoaTheLoai",{id:id},function(data){
        $("#checkTL").html(data);
    });
}