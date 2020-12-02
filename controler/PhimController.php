<?php
function vote() {}
function timPhim() {}
function locPhim() {}
function slideShow() {}
function phimMoi($start,$soluong,$kieu,$quocgia,$theloai,$nam) {
    $dsphim= new Phim();
    foreach ($dsphim->getPhimMoi($start,$soluong,$kieu,$quocgia,$theloai,$nam) as $value) {
        $ten=$value->getTen();
        $slug=$value->getSlug();
        $tengoc=$value->getTenGoc();
        $poster=$value->getPoster();
        $status=$value->getStatus();
        echo '
        <a title="?layout=xemphim&slug='.$slug.'" href="?layout=xemphim&slug='.$slug.'" class="film-small lazy"> 
            <div class="poster-film-small " style="background-image:url(&#39;'. $poster.'&#39;)"> 
                <ul class="tag-film"> 
                    <li><div class="hd" style="width:auto !important;height:auto !important;padding:2px 4px">'.$status.'</div></li> 
                </ul> 
                <div class="play"></div> </div> 
                <div class="title-film-small"> <b class="title-film" id="tenphim">'.$ten.'</b> <p>'.$tengoc.'</p> 
            </div> 
        </a>';
    } 
}
function phanTrang($page,$limit,$kieu,$quocgia,$theloai,$nam){
    $dsphim= new Phim();
    $tongsophim=$dsphim->getSoLuongPhim($kieu,$quocgia,$theloai,$nam);
	/*tính số trang*/
	$tongsotrang=ceil($tongsophim/$limit);
	if($page!=null){
		$start=((int) $page-1)*$limit;/*tính vị trí của sản phẩm đầu tiên sẽ hiển thị trong trang thứ X*/
	}
	else
		$start=0;/*th trang x=1 - trang 1 nên hiển thị từ sản phẩm thứ 0*/
	
    phimMoi($start,$limit,$kieu,$quocgia,$theloai,$nam);
    echo '</div>
    </div>
    <div class="phantrang"><center>';
	if($tongsophim>0){/*nếu có sản phẩm thì mới show ra*/
		
		if($tongsotrang!=1){/*nếu có hơn 1 trang thì mới hiển thị phân trang*/
			for($i=1;$i<=$tongsotrang;++$i){
				if($page==null)
					$tmp=1;/*nếu ko tồn tại tham số $_GET['page'] thì tức ta đang ở trang 1*/
				else
					$tmp=$page;/*nếu tồn tại thì gán = số trang ta đang tham chiếu*/

				if($i==$tmp){/*nếu $i = số trang đang tham chiếu đến*/
					echo '<span>'.$tmp.'</span>';/*thì hiển thị số trang theo thẻ span*/
				}
				else/*ngược lại hiển thị số trang theo thẻ a*/{
					/*nếu tồn tại 1 trang các tham số thì sẽ có link phân trang khác nhau*/
					if(isset($_GET['phimle']))/*thì kiểm tra xem ta có đang ở trang phim lẻ*/
						echo '<a href="?layout=chuyenmuc&phimle&page='.$i.'">'.$i.'</a>';
                    if(isset($_GET['phimbo']))/*thì kiểm tra xem ta có đang ở trang phim bộ*/
                        echo '<a href="?layout=chuyenmuc&phimbo&page='.$i.'">'.$i.'</a>';
                    if(isset($_GET['topimdb']))/*thì kiểm tra xem ta có đang ở trang top imdb*/
                        echo '<a href="?layout=chuyenmuc&topimdb&page='.$i.'">'.$i.'</a>';
                    if(isset($_GET['quocgia']))
                        echo '<a href="?layout=chuyenmuc&quocgia='.$_GET['quocgia'].'&page='.$i.'">'.$i.'</a>';
                    if(isset($_GET['maTL']))
                        echo '<a href="?layout=chuyenmuc&maTL='.$_GET['maTL'].'&page='.$i.'">'.$i.'</a>';
                    if(isset($_GET['year']))
                        echo '<a href="?layout=chuyenmuc&year='.$_GET['year'].'&page='.$i.'">'.$i.'</a>';
                }
					
			}						
		}
	}
}
function phimHot() {}
function chuDeHot() {}
function topIMDB() {}
function phimLienQuan() {}
function getLinkXem() {}
function getLinkTai() {}
?>