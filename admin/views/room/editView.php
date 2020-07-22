<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Chỉnh sửa thông tin phòng</div>
		<div class="panel-body">


			<form id="formEditRoom" enctype="multipart/form-data" method="POST">
				<table class="table">
					<tr>
						<td>ID phòng</td>
						<td>
							<input type="text" id="RID" name="roomid" value="<?php echo $data["roomid"] ;?>" class="form-control" readonly>
						</td>
					</tr>
					<tr>
						<td>Tên Phòng</td>
						<td>
							<input type="text" name="roomame" id="Rname" value="<?php echo $data["roomame"] ;?>" class="form-control" require>
						</td>

					</tr>
					<tr>
						<td>Ảnh</td>
						<td>
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control" />
							<!-- <input type="file" name="image" id="image" class="form-control"/> -->
						</td>
					</tr>

					<tr>
						<td>Loại phòng</td>
						<td>
							<?php $selected=$data["roomtypeid"] ?>
							<select name="roomtypeid" id="RtypeID" class="form-control">
								<option <?php if($selected == "PHONGGIADINH"){echo("selected");}?> value="PHONGGIADINH">PHONGGIADINH</option>
								<option <?php if($selected == "PHONGTHUONG"){echo("selected");}?> value="PHONGTHUONG">PHONGTHUONG</option>
								<option <?php if($selected == "PHONGVIP"){echo("selected");}?> value="PHONGVIP">PHONGVIP</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Giá phòng</td>
						<td>
							<input name="roomprice" id="RPricee" value="<?php echo $data["roomprice"] ;?>" type="text" class="form-control" pattern="([0-9]{10})\b" required="">
						</td>
					</tr>

					<tr>
						<td>Số lượng người</td>
						<td>
							<input name="roomquanlity" id="RquanLT" type="text" class="form-control" pattern="([0-9]{10})\b" required="" value="<?php echo $data["roomquanlity"] ;?>" >
						</td>
					</tr>
					<tr>
						<td>Đánh giá</td>
						<td>
							<input type="text" name="roomrate" id="RRatee" value="<?php echo $data["roomrate"] ;?>" class="form-control" >
						</td>

					</tr>
					<tr>
						<td>Mô tả</td>
						<td>
							<textarea rows="8" name="discription"  id="RDISCr" class="form-control" ><?php echo $data["discription"] ?></textarea>
						</td>

					</tr>
					<tr>
						<td>Thú cưng</td>
						<td>
							<?php $pet = $data["allowpet"] ?>
							<!-- <input type="text" name="allowpet" value="<?php echo $data["allowpet"] ;?>" class="form-control" > -->
							<select name="allowpet" id="ALLPet" class="form-control">
								<option <?php if($pet == "1"){echo("selected");}?> value="1" >Cho phép</option>
								<option <?php if($pet == "0"){echo("selected");}?> value="0" >Không cho phép</option>
							</select>
						</td>

					</tr>
					

					<tr>
						<td></td>
						<td>
							<a href="#" type="submit" onclick="editRoom(<?php echo $data["roomid"]?>)" class="btn btn-success">Cập nhật phòng</a>
							<a href="index.php?controller=room/list" class="btn btn-success">Quay Lại</a>
				
						</td>
					</tr>
			</table>
			</form>
			
		</div>
	</div>
</div>