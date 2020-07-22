<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Chỉnh sửa thông tin tài khoản</div>
		<div class="panel-body">

			<form id="formInputEditUs" enctype="multipart/form-data" method="POST">
				<table class="table">
					<tr>
						<td>Họ và tên</td>
						<td>
							<input type="text" name="fullname" value="<?php echo $data["fullname"] ;?>" class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Tên đăng nhập</td>
						<td>
							<input type="text" name="username" value="<?php echo $data["loginname"] ;?>" class="form-control" readonly>
						</td>
					</tr>
					<tr>
						<td>Mật khẩu</td>
						<td>
							<input type="password" name="password" placeholder="Nếu muốn thay đổi mật khẩu vui lòng nhập mật khẩu mới" class="form-control"/>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input type="Email" name="email" value="<?php echo $data["email"] ;?>" class="form-control" readonly="">
						</td>
					</tr>
					<tr>
						<td>Giới tính</td>
						<td>
							<select name="gender" class="form-control">
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td>
							<input name="userPhoneNumber" type="text" class="form-control" value="<?php echo $data["phonenumber"] ;?>" pattern="([0-9]{10})\b" required="" oninvalid="this.setCustomValidity('Số điện thoại không hợp lệ!')" oninput="this.setCustomValidity('')">
						</td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td>
							<textarea name="userAddress" class="form-control" ><?php echo $data["address"]; ?></textarea>

						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<!-- <button type="submit" class="btn btn-primary" id="smUs">Cập nhật thông tin</button>   -->
							<a href="#" onclick="onEdit(<?php echo $data["userid"]?>)" class="btn btn-success">Cập nhật</a>
							<a href="index.php?controller=users/list" class="btn btn-success">Quay Lại</a>

						</td>
					</tr>
			</table>
			</form>
			
		</div>
	</div>
</div>