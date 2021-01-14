$("#btn-xuat").click(function(){
    var vl_html="";
    if($("#backup").val()==0)
        vl_html='<script>location.href="../API/XuatExcel"</script>';
    if($("#backup").val()==1)
        vl_html='<script>location.href="../API/XuatSQL"</script>';
    myWindow = window.open("", "myWindow", "width=200,height=100");
    myWindow.document.write(vl_html);
    setTimeout(function(){ myWindow.close();}, 1500);
});
$("#btn-xuatOT").click(function(){
    $.post("../API/XuatSQLTheoBang",{bang:$("#bang").val()},function(data){
        $("#kq-xuat").html(data);
    }); 
});
