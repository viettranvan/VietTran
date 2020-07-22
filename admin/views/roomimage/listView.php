<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách ảnh phòng
        </h1>
    </div>
</div>

<!-- index.php?controller=users/add -->
<a href="index.php?controller=roomimage/add" class="btn btn-primary" style="margin-bottom: 20px"> Thêm ảnh mới</a>

<table class="table table-bordered table-hover">
	<tr style="text-align: center;font-weight: bold;">
		<td width="50">STT</td>
		<td width="70" >room id</td>
		<td >Ảnh 1</td>
		<td >Ảnh 2</td>
		<td >Ảnh 3</td>
		<td colspan="2">Cập nhật</td>
	</tr>

	<?php
		$stt = 0;
		foreach ($data as $value) {
			$stt++;
	?>

	<tr>
		<td><?php echo $stt; ?></td>
		<td><?php echo $value["roomid"]; ?></td>
		<td><img class="imageFormat" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value["image1"]); ?>"></td>
		<td><img class="imageFormat" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value["image2"]); ?>"></td>
		<td><img class="imageFormat" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value["image3"]); ?>"></td>
		<td>
			<a href="index.php?controller=roomimage/edit&id=<?php echo $value["roomid"] ;?>">Sửa</a>
		</td>
		<td>
			<a onclick="deleteImage(<?php echo $value["roomid"];?>)" href="#">Xóa</a>
		</td>
	</tr>
	<?php } ?>
</table>

<ul class="paginate">
	<?php for($i=1;$i<=$page_show; $i++) { ?>
	<a href="index.php?controller=roomimage/list&p=<?php echo $i; ?>" style="font-weight: bold;"><li><?php echo $i; ?></li></a>
	<?php } ?>

	<?php
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index>1) { 
	?>
	<a href="index.php?controller=roomimage/list&p=<?php echo $page_index - 1 ;?>"><li> << </li></a>
	<?php } ?>

	<?php
		$page_index2 = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index2<$page_show) { 
	?>
	<a href="index.php?controller=roomimage/list&p=<?php echo $page_index2 + 1 ;?>"><li> >> </li></a>
	<?php } ?>
	
	
</ul>
<label style="float: right;">
	<?php 
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		echo $page_index;
	?>
</label>