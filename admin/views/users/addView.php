<div class="col-md-8 col-md-offset-2" style="margin-bottom: 100px;margin-top: 30px;">
	<div class="panel panel-primary">
		<div class="panel-heading" style="text-align: center;font-weight: bold;">Thêm tài khoản mới</div>
		<div class="panel-body">

			<?php if(isset($_GET["err"]) && $_GET["err"]=="false"){?>
				<div class="alert alert-danger">
					Mật khẩu và xác nhận mật khẩu không trùng khớp
				</div>
			<?php } ?>

			<form id="formInputAdduser" onsubmit="submidFunc()" enctype="multipart/form-data" method="POST">
				<table class="table">
					<tr>
						<td>Họ và tên</td>
						<td>
							<input type="text" name="fullname" placeholder="Nguyễn Văn A" class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Tên đăng nhập</td>
						<td>
							<input type="text" name="username" placeholder="Tên đăng nhập..." class="form-control" required="">
						</td>
					</tr>
					<tr>
						<td>Mật khẩu</td>
						<td>
							<input type="password" id="passCurr"" name="password" placeholder="Mật khẩu..." class="form-control" required="" />
						</td>
					</tr>
					<tr>
						<td>Xác nhận mật khẩu</td>
						<td>
							<input type="password" id="passConfir" name="repass" placeholder="Nhập lại mật khẩu" class="form-control" required="" />
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input type="Email" name="email" placeholder="example@gmail.com" class="form-control" required="">
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
							<input name="userPhoneNumber" value="" type="text" class="form-control" placeholder="0372746xxx..." pattern="([0-9]{10})\b" required="" autofocus="" oninvalid="this.setCustomValidity('Số điện thoại không hợp lệ!')" oninput="this.setCustomValidity('')">
						</td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td>
							<textarea name="userAddress" value="" class="form-control"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-primary" id="smUs">Tạo tài khoản mới</button>  
							<a href="index.php?controller=users/list" class="btn btn-success">Quay Lại</a>
						</td>
					</tr>
			</table>
			</form>
			
		</div>
	</div>
</div>