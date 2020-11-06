<?php
  $svxem=$conn->prepare('select distinct server from linkphim where maSP='.$_GET['id'].' and loai="xem"');
  $svxem->execute();
?>
<div id="contentmain">
        <center><div class="resize_video">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="embed-responsive-item" frameborder="0" id="myVideo" src=""></iframe></div>
        </div>
        </center>
        
        <?php
           echo '
           <div id="like" class="mt-3" style="float:left"> 
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=476759459479922&autoLogAppEvents=1" nonce="13tdmHTD"></script>
                <div class="fb-like" data-href="'.$linkweb.'?Layout=baiviet&id='.$_GET['id'].'" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div><br>
           </div>
           <select class="btn btn-primary" name="server" onchange="doiserver(this)" id="'.$_GET['id'].'" style="float:right;margin:10px 10px 20px 0">';
           while($row=$svxem->fetch(PDO::FETCH_ASSOC)){
		echo '<option value="'.$row['server'].'">'.$row['server'].'</option>';
           }
           echo '</select><br>'; 
        ?>
        <div id="kq" style="clear:both">
                <?php
                $svxem=$conn->prepare('select server from linkphim where maSP='.$_GET['id'].' and loai="xem"');
                $svxem->execute();
                echo '<div class="card xem">
                        <div class="card-body">';
                $linkxem=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="xem" and server="'.$svxem->fetchcolumn().'" order by ngaythem ASC');
                $linkxem->execute();
                $i=1;
                while($row1=$linkxem->fetch(PDO::FETCH_ASSOC)){
                  if($i==1){
                     echo '<a class="btn mr-2 mt-2 tablinks active" id="defaultOpen" onclick="openCity(event,\''.$row1['link'].'\')">'.$row1['tenhienthi'].'</a>';
                     $i=0;
                   }
                  else  echo '<a class="btn mr-2 mt-2 tablinks" onclick="openCity(event,\''.$row1['link'].'\')">'.$row1['tenhienthi'].'</a>';
                }
                 echo '</div>
                </div><br/>';
                ?>
        </div>
</div>

<style>
  #tab_link span{
   font-size:12px;
   padding:5px;
   background:#eee;
    margin:4px 7px;
    border-radius:3px;
    display:inline-block;
  }
	.dstap p{
		margin-bottom: 0 !important;
		line-height: 28px
	}
	#contentmain .tab-pane{
		padding: 0 5px !important
	}
	#contentmain .resize_video{
		padding: 0 ;
		box-sizing: border-box;
	}
  #contentmain .tai {
   height:auto !important; 
    border:1px solid #f1f1f1
  }
  #contentmain p{
   letter-spacing:1px
  }
  #contentmain .xem {
   height:auto !important; 
    border:0 solid #f1f1f1
  }
  .card-header{
   border-bottom:0 solid rgb(0,0,0) !important ;
   font-weight:500
  }
  #contentmain .xem .card-header{
   padding:5px !important;
    font-size:15px !important;
    background:#fff !important;
    color:#000 !important
  }
    #contentmain .tai .card-header{
   padding:5px !important;
    font-size:15px !important;
    background:#fff !important;
    color:#000!important
  }
 #contentmain .card-body{
   padding:5px 10px 13px 15px !important; 
    background:#f1f1f1 !important
  }
  #contentmain .xem .btn{
   font-size:13px !important;
    padding:5px 7px !important;
    color:#fff !important;
    background: #333;
    display: inline-block;
  border: none;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  }
  
  #contentmain .tai .btn{
   font-size:13px !important;
    padding:5px 7px !important;
    color:#fff !important;
    background: #339966
  }
  #contentmain .btn.active{
   background:#900 
  }
  #contentmain .btn:hover{
   background:#900 
  }
  #contentmain .btn:active{
   background:orange 
  }
  #contentmain img{
      width: auto !important;
  max-width:100%;
    margin:0 auto !important
    }
  #contentmain #content-gioithieu p{
   text-align:justify 
  }
#contentmain{
	padding: 0;
	box-sizing: border-box;
}
@media(max-width: 1024px){
	#contentmain{
		padding: 0px !important;
	}
	
}
  @media(max-width:770px)
{

#contentmain{
	padding: 0;
	box-sizing: border-box;
}
}
@media(max-width: 650px)
{
#contentmain{
	min-width: 100%;
	width: 100%;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

#contentmain .resize_video{
		padding: 0 ;
	}

}

</style>


<script>
  function doiserver(obj){
    var id=obj.id;
    var server=obj.value;
      $.ajax({
          url : "/Theme/baiviet/hienthiphim.php",
          type : "get",
          dataType:"text",
          data : {
               id : id,
               server: server
          },
          success : function (result){
              $('#kq').html(result);
              document.getElementById("defaultOpen").click();
          }
      });
  }

</script>
