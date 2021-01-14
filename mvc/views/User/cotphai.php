<div class="khoi-phai">
<div class="topphim-doc style1">
<iframe src="https://www6.cbox.ws/box/?boxid=851799&boxtag=HMAOwY" class="" width="100%" height="500" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>
</div>
<div class="topphim-doc style1">
<h3>top phim hot</h3>
<ul class="film mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="height: 500px;overflow: auto;"><div id="mCSB_1" class="mCustomScrollBox mCS-inset-2-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
<?php
    for($i=0;$i<count($data['hot']);$i++){
        echo '
        <li>
        <a href="'.$data['info'][0]->linkweb.'/Phim/XemPhim/'.$data['hot'][$i]->slug.'" title="'.$data['hot'][$i]->tenPhim.'">
        <div class="image lazy" style="background-image:url(&#39;'.$data['hot'][$i]->poster.'&#39;)"></div>
        <div class="info"> <b class="title-film">'.$data['hot'][$i]->tenPhim.'</b>
        <p>'.$data['hot'][$i]->tengoc.'</p> <span class="luotxem">Lượt xem: '.number_format($data['hot'][$i]->luotxem,0,'.',',').'</span> <span class="imdb">IMDB '.$data['hot'][$i]->imdb.'</span> </div>
        </a>
        </li>
        ';
    }
?>


</div>
</div>
</ul>
</div>


<div class="chudehot">
<h3><a title="Chủ Đề HOT" href="https://bomtanhd.net/#" style="text-decoration:none;color:#cdcdcd;"> chủ đề hot</a></h3>
<ul style="height: 1300px;overflow: auto;" class="">
<li>
<a title="Doctor Who" href="/new-serie" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/doctorwho50thmin.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Tuyển Tập Marvel" href="/vu-tru-mavel" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/3206_the_avengersmin.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Game Of Throne" href="/tro-choi-vuong-quyen" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/1752366min.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Star Trek" href="/search?q=star" style="background-image:url(https://i3.wp.com/bongngo.com/statics/assets/img/Star_Trek.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Vượt Ngục" href="/search?q=vuot+nguc" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/prisonbreaks5.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Kẻ Huy Diệt" href="/ke-huy-diet" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/maxresdefaultmin.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Quá Nhanh Quá Nguy Hiểm" href="/qua-nhanh-qua-nguy-hiem" style="background-image:url(https://static.wapmaker.net/5cfafc47fce1810f802a08d0/Config/bg1542x300.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Chúa Nhẫn" href="/search?q=chúa+tể+những+chiếc+nhẫn" style="background-image:url(https://i3.wp.com/bongngo.com/statics/assets/img/The-Hobbit.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Harry Potter" href="/search?q=Harry+Potter" style="background-image:url(https://i3.wp.com/bongngo.com/statics/assets/img/Harry-Potter.jpg);background-size: cover;"></a>
</li>
<li>
<a title="Friday 13th" href="/search?q=Friday+13th" style="background-image:url(https://i3.wp.com/bongngo.com/statics/assets/img/friday-the-13th.jpg);background-size: cover;"></a>
</li>
</ul>
</div>

</div>
</div>
