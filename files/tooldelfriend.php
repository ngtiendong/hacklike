			<div class="row">
					<form method="POST" action="">
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-gg-circle"></i> AUTO XOÁ BẠN
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Xoá Bạn</b> Là Gì?<br>
									+ <b>Auto Xoá Bạn</b> Là Công Cụ Giúp Bạn Tự Động Xoá Các Bạn Bè Không Tương Tác Hoặc Những Người Không Quen Biết Đã Bị Thêm Vào Danh Sách Bạn Bè.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Bạn Bè"</b> Để Chọn ID Bạn Bè.<br>
									Bước 2: Chọn Bạn Bè Bạn Muốn Xoá Và Ấn Nút Kế Bên Mục Tên Để Chọn. (Ấn Nút Chọn Tất Cả Để Chọn Tất Cả Bạn Bè)<br>
									Bước 3: Ấn Nút <b>"Xoá Bạn Bè"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<div id="hidetool">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary" onclick="display();">Xoá Bạn Bè</button>
									</span></center>
								</div>
								<div id="showtool" style="display: none;">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Đang Xoá Bạn Bè</button>
									</span></center>
								</div><br>
<?php
$content = @$_POST['message'];
$array_id = @$_POST['id'];
$success = 0;
if(isset($array_id) AND is_array($array_id)){
	foreach($array_id as $id){
		$curl = json_decode($work->cURL('https://graph.facebook.com/me/friends?method=delete&uid='.$id.'&access_token='.urlencode($content).'&access_token='.$_SESSION['access_token']), true);
		if($curl=='true') $success++;
	}
?>
								<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Xoá Bạn Bè<br>+ Xoá Bạn Bè Thành Công.<br>+ Đã Xoá <?php echo $success; ?> Bạn Bè.</p></div>
<?php
}
?>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Bạn Bè
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="checkbox">
									<label><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);"> Chọn Tất Cả</label>
								</div>
<?php
$data_friend = json_decode($work->cURL('https://graph.facebook.com/me/friends?fields=id,name&method=GET&limit=500&access_token='.$_SESSION['access_token']), true);
$count_data_friend = count($data_friend['data']);
for($i=0;$i<$count_data_friend;$i++){
?>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php echo $data_friend['data'][$i]['id']; ?>" name="id[]"><a href="https://www.facebook.com/<?php echo $data_friend['data'][$i]['id']; ?>" target="_blank"><?php echo $data_friend['data'][$i]['name']; ?></a></label>
								</div>
<?php
}
?>
							</div>
						</section>
					</div>
					</form>
				</div>