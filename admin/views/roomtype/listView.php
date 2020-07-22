<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách Loại phòng
        </h1>
    </div>
</div>

<a href="index.php?controller=roomtype/add" class="btn btn-primary" style="margin-bottom: 20px"> Thêm loại phòng mới</a>

<table class="table table-bordered table-hover">
	<tr style="text-align: center;font-weight: bold;">
		<td >STT</td>
		<td >roomtype id</td>
		<td >Tên loại phòng</td>
		<td >Ảnh</td>
		<td >Giá tiền giao động</td>
		<td colspan="2">
			Cập nhật
		</td>
	</tr>

	<?php
		$stt = 0;
		foreach ($data as $value) {
			$stt++;
	?>

	<tr>
		<td><?php echo $stt; ?></td>
		<td ><?php echo $value["roomtypeid"]; ?></td>
		<td ><?php echo $value["roomtypename"]; ?></td>
		<td><img class="imageFormat" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value["roomtypeimg"]); ?>"></td>
		<td ><?php echo $value["roomprice_range"]; ?></td>
		<td>
			<a href="index.php?controller=roomtype/edit&id=<?php echo $value["roomtypeid"] ;?>">Sửa</a>
		</td>
	</tr>
	<?php } ?>

</table>

