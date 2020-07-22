<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách tài khoản
        </h1>
    </div>
</div>

<a href="index.php?controller=users/add" class="btn btn-primary" style="margin-bottom: 20px"> Thêm tài khoản</a>

<table class="table table-bordered table-hover">
	<tr style="text-align: center;font-weight: bold;">
		<td width="50px">STT</td>
		<td width="70">user id</td>
		<td width="150">Họ tên</td>
		<td width="120">login name</td>
		<td width="120">password</td>
		<td width="250">email</td>
		<td width="80">Giới tính</td>
		<td width="100">SĐT</td>
		<td width="200">vkey</td>
		<td>Địa chỉ</td>
		<td width="50">Confirm</td>
		<td colspan="2" width="70">Cập nhật</td>
	</tr>

	<?php
		$stt = 0;
		foreach ($data as $value) {
			$stt++;
	?>

	<tr>
		<td><?php echo $stt; ?></td>
		<td><?php echo $value["userid"]; ?></td>
		<td><?php echo $value["fullname"]; ?></td>
		<td><?php echo $value["loginname"]; ?></td>
		<td><?php echo $value["password"]; ?></td>
		<td><?php echo $value["email"]; ?></td>
		<td><?php echo $value["gender"]; ?></td>
		<td><?php echo $value["phonenumber"]; ?></td>
		<td><?php echo $value["vkey"]; ?></td>
		<td><?php echo $value["address"]; ?></td>
		<td><?php echo $value["confirm"]; ?></td>
		<td>
			 <!-- onclick="onEdit(<?php echo $value["userid"];?>)"  -->
			<a href="index.php?controller=users/edit&id=<?php echo $value["userid"] ;?>">Sửa</a>
		</td>
		<td>
			<a onclick="onDelete(<?php echo $value["userid"];?>)" href="#">Xóa</a>
		</td>
	</tr>
	<?php } ?>

</table>

<ul class="paginate">
	<?php for($i=1;$i<=$page_show; $i++) { ?>
	<a href="index.php?controller=users/list&p=<?php echo $i; ?>" style="font-weight: bold;"><li><?php echo $i; ?></li></a>
	<?php } ?>

	<?php
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index>1) { 
	?>
	<a href="index.php?controller=users/list&p=<?php echo $page_index - 1 ;?>"><li> << </li></a>
	<?php } ?>

	<?php
		$page_index2 = isset($_GET["p"])?$_GET["p"]:1;
		if($page_index2<$page_show) { 
	?>
	<a href="index.php?controller=users/list&p=<?php echo $page_index2 + 1 ;?>"><li> >> </li></a>
	<?php } ?>
	
</ul>
<label style="float: right;">
	<?php 
		$page_index = isset($_GET["p"])?$_GET["p"]:1;
		echo $page_index;
	?>
</label>