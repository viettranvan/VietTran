<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách đặt phòng
        </h1>
    </div>
</div>

<table class="table table-bordered table-hover">
	<tr style="text-align: center;font-weight: bold;">
		<td >STT</td>
		<td >user id</td>
		<td >room id</td>
		<td >Ngày đến</td>
		<td >Ngày đi</td>
		<td >Giá($)</td>
		<td >Chi tiết đặt phòng</td>
		<td>Cập nhật</td>
	</tr>

	<?php
		$stt = 0;
		foreach ($data as $value) {
			$stt++;
	?>

	<tr>
		<td><?php echo $stt; ?></td>
		<td><?php echo $value["userid"]; ?></td>
		<td><?php echo $value["roomid"]; ?></td>
		<td><?php echo $value["datearrive"]; ?></td>
		<td><?php echo $value["dateleave"]; ?></td>
		<td><?php echo $value["price"]; ?></td>
		<td><?php echo $value["bookingdetail"]; ?></td>
		<td>
			<a onclick="deleteBooking(<?php echo $value["userid"];?>,'<?php echo $value["datearrive"];?>','<?php echo $value["dateleave"];?>')" href="#">Xóa</a>
		</td>
	</tr>
	<?php } ?>
</table>

<ul class="paginate">
	<?php for($i=1;$i<=$page_show; $i++) { ?>
	<a href="index.php?controller=booking/booking&p=<?php echo $i; ?>" style="font-weight: bold;"><li><?php echo $i; ?></li></a>
	<?php } ?>

	<?php
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index>1) { 
	?>
	<a href="index.php?controller=booking/booking&p=<?php echo $page_index - 1 ;?>"><li> << </li></a>
	<?php } ?>

	<?php
		$page_index2 = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index2<$page_show) { 
	?>
	<a href="index.php?controller=booking/booking&p=<?php echo $page_index2 + 1 ;?>"><li> >> </li></a>
	<?php } ?>
	
	
</ul>
<label style="float: right;">
	<?php 
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		echo $page_index;
	?>
</label>