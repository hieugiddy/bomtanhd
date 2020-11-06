<?php
  include('../connect.php');
  $svtai=$conn->prepare('select distinct server from linkphim where maSP='.$_GET['id'].' and loai="tai"');
  $svtai->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Document</title>
        <style>
                
/* giao diện bai viet*/
#contentmain hr {
   border:0 !important 
  }
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
	padding: 100px;
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

body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
} 
body::-webkit-scrollbar-thumb {
    background-color: #777;
}
body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}
        </style>
</head>
<body>
<div id="contentmain">
                
        <?php
           while($row=$svtai->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="card tai mb-2">
                        <div class="card-header">'.$row['server'].'</div>
                        <div class="card-body">';
                $linktai=$conn->prepare('select tenhienthi,link from linkphim where maSP='.$_GET['id'].' and loai="tai" and server="'.$row['server'].'" order by ngaythem ASC');
                $linktai->execute();
                while($row1=$linktai->fetch(PDO::FETCH_ASSOC)){                 
                  echo '<a class="btn mr-3 mt-2" href="'.$row1['link'].'" target="_blank">'.$row1['tenhienthi'].'</a>';
                }
                 echo '</div>
                </div><br/>';
        }
        ?>
</div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</html>
