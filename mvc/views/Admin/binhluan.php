<div class="row-fluid">	
	<div class="span7">
		<h1>Danh sách bình luận</h1>
		
		<ul class="messagesList" id="dsbinhluan">
		
		</ul>
		<div class="span12 center">
			<div class="dataTables_paginate paging_bootstrap pagination">
			<ul>
		<?php
			if(!isset($_GET['page'])) $page=1;
			else $page=$_GET['page'];

			if($data['tstrang']>1 && $_GET['page']>1)
				echo '<li class="prev">
				<a href="?page='.($_GET['page']-1).'">← Previous</a></li>';
			for($i=1;$i<=$data['tstrang'];$i++){
				if($i==$page)
					echo '<li class="active"><a href="">'.$page.'</a></li>';
				else
					echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
			}
			if($data['tstrang']>1 && $_GET['page']<$data['tstrang'])
				echo '<li class="next"><a href="?page='.($_GET['page']+1).'">Next → </a></li>';
		?>
		</ul>
			</div>
			</div>
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">Admin templates</a></li>
					<li><a href="http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>	
	</div>
	<div class="span5 noMarginLeft">
		
		<div class="message dark">
			
			<div class="header">
				<h1 id="ctbl-tenphim"></h1>
				<div class="from" id="ctbl-user"></div>
				<div class="date" id="ctbl-time"></div>	
							
			</div>
			<div class="content" id="ctbl-noidung"></div>
			<div id="like" style="margin:0;text-align:right"></div>
			<div id="msgBinhLuan"></div>
			<div style="height:1px;background:#ddd;margin:10px 0"></div>
			<p><strong>Trả lời:</strong></p>
			<div id="traloibinhluan"> </div>
			<br>
			<form class="replyForm" id="form-traloibl" method="post" action="../BinhLuan/themTraLoi" style="display:none">

				<fieldset>
					<input type="hidden" name="idBinhLuan" id="idBinhLuan"/>
					<textarea name="noidung" tabindex="3" class="input-xlarge span12" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>

					<div class="actions">
						
						<button tabindex="3" type="submit" class="btn btn-success">Send message</button>
						
					</div>

				</fieldset>

			</form>	
			
		</div>	
		
	</div>
			
</div>
<script>
var json=<?php echo $data['binhluan']; ?>;
danhSachBinhLuan(json);
</script>

<style>
	#traloibinhluan .noidung{
		text-align:justify;
		font-size:13px;
		margin-top:-10px;
		font-style:italic;
		color:#333
	}
	#traloibinhluan .item>div:first-child{
		float:left;
		margin-right:5px
	}
	#traloibinhluan .item>div:last-child{
		margin-left:35px;
	}
	#traloibinhluan .item{
		margin-left:80px
	}
	#dsbinhluan li.active{
		background:#eee !important
	}
</style>