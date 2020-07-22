<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Thêm phòng mới</div>
		<div class="panel-body">

			<form id="formAddRoom" onsubmit="addRoom()" enctype="multipart/form-data" method="POST">
				<table class="table">
					<tr>
						<td>ID phòng</td>
						<td>
							<input type="text" id="RID" name="roomid" placeholder="Vui lòng nhập id phòng" class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Tên Phòng</td>
						<td>
							<input type="text" name="roomame" id="Rname" placeholder="Vui lòng nhập tên phòng" class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Ảnh phòng</td>
						<td>
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control" >
						</td>
					</tr>
					<tr>
						<td>Loại phòng</td>
						<td>
							<select name="roomtypeid" id="RtypeID" class="form-control">
 
								<?php
									$stt = 0;
									foreach ($data as $value) {
										echo "<option value='{$value["roomtypeid"]}'>{$value["roomtypename"]}</option>";
										$stt++;
								?>

								<?php } ?>
							</select>

						</td>
					</tr>
					<tr>
						<td>Giá phòng</td>
						<td>
							<input type="text" name="roomprice" id="RPricee" placeholder="Vui lòng nhập giá phòng" class="form-control" required="" />
						</td>
					</tr>
					<tr>
						<td>Số lượng người</td>
						<td>
							<input type="text" name="roomquanlity" id="RquanLT" placeholder="Vui lòng nhập số lượng người tối đa" class="form-control" required="" />
						</td>
					</tr>
					<tr>
						<td>Đánh giá</td>
						<td>
							<input type="text" id="RRatee" name="roomrate" placeholder="Vui lòng nhập đánh giá. VD: 6.5" class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Mô tả</td>
						<td>
							<textarea rows="7" id="RDISCr" name="discription" class="form-control"></textarea>
						</td>
					</tr>
					<tr>
						<td>Thú cưng</td>
						<td>
							<select id="ALLPet" name="allowpet" class="form-control">
								<option value="1">Cho phép</option>
								<option value="0">Không cho phép</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-primary" id="smUs">Thêm phòng mới</button>  
							<a href="index.php?controller=room/list" class="btn btn-success">Quay Lại</a>
						</td>
					</tr>
			</table>
			</form>
			
		</div>
	</div>
</div>