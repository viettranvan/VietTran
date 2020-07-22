
<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Thêm loại phòng mới</div>
		<div class="panel-body">
			<form id="formAddImage" method="POST" enctype="multipart/form-data">
				<table class="table">
					<tr>
						<td>Id loại phòng</td>
						<td>
							<input type="text" name="roomtypeid" id="RID" value="<?php echo $data["roomtypeid"] ;?>" class="form-control" readonly>
						</td>
					</tr>
					<tr>
						<td>Tên loại phòng</td>
						<td>
							<input type="text" name="roomtypename" id="roomtypename" value="<?php echo $data["roomtypename"] ;?>" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>Ảnh chính</td>
						<td>
							<input type="file" name="roomtypeimg" id="roomtypeimg" class="form-control" required />
						</td>
					</tr>
					<tr>
						<td>Giá dao động</td>
						<td>
							<?php  
		
								$str = $data["roomprice_range"];
								$test = explode(' ', $str);
								$min = substr($test[0], 1);
								$max = substr($test[2], 1);
							?>
							Từ<input type="text" name="roomprice_range1" id="roomprice_range1" value="<?php echo $min ;?>" class="form-control" style="width: 40%" required  placeholder="Vui lòng nhập giá thấp nhất" />
							Đến<input type="text" name="roomprice_range2" id="roomprice_range2" value="<?php echo $max ;?>" class="form-control" style="width: 40%" required placeholder="Vui lòng nhập giá cao nhất" /> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<a href="#" type="submit" onclick="editRoomType()" class="btn btn-success">Cập nhật loại phòng</a>
							<a href="index.php?controller=roomtype/list" class="btn btn-success">Quay Lại</a>
						</td>
					</tr>
			</table>
			</form>
		</div>
	</div>
</div>
