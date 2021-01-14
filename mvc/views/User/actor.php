
<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<div id="info-actor" style="display:flex;margin-bottom:20px">
    <div id="avatar" style="float:left;margin-right:20px">
        <img src="<?php echo $data['avatar']; ?>" alt="<?php echo $data['tendv']; ?>" width="150px">
    </div>
    <div id="info" style="display:inline;vertical-align:top;">
        <h2><?php echo $data['tendv']; ?></h2>
        <p style="text-align:justify"><?php echo $data['gioithieu']; ?></p>
    </div>
</div>
 <span class="line-ngang"></span>
<div class="group-film-small" id="dsphim">

<script>
  showPhim(<?php echo $data['phim'];?>,"dsphim",'<?php echo $data['info'][0]->linkweb; ?>');
</script>

</div>
</div>
<div id="phantrang">
	<center>
		<?php 
			echo $data['phantrang'];
		?>
	</center>
</div>
</div>


<div class="quangcao">
</div>