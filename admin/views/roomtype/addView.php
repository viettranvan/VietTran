
<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Thêm loại phòng mới</div>
		<div class="panel-body">
			<form id="formAddImage" onsubmit="addRoomType()" method="POST" enctype="multipart/form-data">
				<table class="table">
					<tr>
						<td>Id loại phòng</td>
						<td>
							<input type="text" name="roomtypeid" id="RID" class="form-control" placeholder="Vui lòng nhập ID loại phòng">
						</td>
					</tr>
					<tr>
						<td>Tên loại phòng</td>
						<td>
							<input type="text" name="roomtypename" id="roomtypename" class="form-control" required="" placeholder="Vui lòng nhập tên loại phòng">
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
							Từ<input type="text" name="roomprice_range1" id="roomprice_range1" class="form-control" style="width: 40%" required  placeholder="Vui lòng nhập giá thấp nhất" />
							Đến<input type="text" name="roomprice_range2" id="roomprice_range2" class="form-control" style="width: 40%" required placeholder="Vui lòng nhập giá cao nhất" /> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-primary" id="smUs">Thêm loại phòng</button>
							<a href="index.php?controller=roomtype/list" class="btn btn-success">Quay Lại</a>
						</td>
					</tr>
			</table>
			</form>
		</div>
	</div>
</div>
