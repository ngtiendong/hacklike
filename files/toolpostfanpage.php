			<div class="row">
					<form method="POST" action="">
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-gg-circle"></i> AUTO ĐĂNG TRANG
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Đăng Trang</b> Là Gì?<br>
									+ <b>Auto Đăng Trang</b> Là Công Cụ Giúp Bạn Tự Động Đăng Nội Dung Lên Các Trang Bạn Đã Thích.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Trang"</b> Để Chọn ID Trang.<br>
									Bước 2: Chọn Trang Bạn Muốn Đăng Nội Dung Lên Và Ấn Nút Kế Bên Mục Tên Để Chọn. (Ấn Nút Chọn Tất Cả Để Chọn Tất Cả Trang)<br>
									Bước 3: Nhập Nội Dung Bạn Muốn Đăng.<br>
									Bước 4: Ấn Nút <b>"Đăng Trang"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<label for="exampleInputContent">Nội Dung Bài Viết</label>
								<textarea name="message" class="form-control" placeholder="Nhập Nội Dung Bạn Muốn Đăng..."><?php echo @$_POST['message']; ?></textarea><br>
								<div id="hidetool">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary" onclick="display();">Đăng Trang</button>
									</span></center>
								</div>
								<div id="showtool" style="display: none;">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Đang Đăng Trang</button>
									</span></center>
								</div><br>
<?php
$content = @$_POST['message'];
$array_id = @$_POST['id'];
$success = 0;
if(isset($array_id) AND is_array($array_id)){
	foreach($array_id as $id){
		$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/feed?method=post&message='.urlencode($content).'&access_token='.$_SESSION['access_token']), true);
		if(isset($curl['id'])) $success++;
	}
?>
								<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Đăng Trang<br>+ Đăng Trang Thành Công.<br>+ Đã Đăng <?php echo $success; ?> Trang.</p></div>
<?php
}
?>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Trang
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
$data_page = json_decode($work->cURL('https://graph.facebook.com/me/likes?fields=id,name&method=GET&limit=500&access_token='.$_SESSION['access_token']), true);
$count_data_page = count($data_page['data']);
for($i=0;$i<$count_data_page;$i++){
?>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php echo $data_page['data'][$i]['id']; ?>" name="id[]"><a href="https://www.facebook.com/<?php echo $data_page['data'][$i]['id']; ?>" target="_blank"><?php echo $data_page['data'][$i]['name']; ?></a></label>
								</div>
<?php
}
?>
							</div>
						</section>
					</div>
					</form>
				</div>