<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Huyện Ứng Hòa - Trang đăng nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/style.css">
</head>
<body>
	<main>
		<div class="container">
			<div class="row">
				<div class="col s8 offset-s2">
					<div class="card card-login">
						<div class="card-login-splash">
							<div class="wrapper">
							</div>
							<img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?5818699651879506597" alt="">
						</div>
						<div class="card-content">
							<span class="card-title">Đăng nhập Hệ thống</span>
							<div class="error center" style="color: red;">
								<?php echo validation_errors('- '); ?>
								<?php if (isset($_SESSION['error'])) {
									echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
								} ?>
							</div>
							<form action="" method="post">
								<div class="input-field">
									<input id="email" type="email" name="email" class="validate" autocomplete="off" value="duyphongktpm@gmail.com">
									<label for="email" class="">Email</label>
								</div>
								<div class="input-field">
									<input id="password" type="password" name="password" class="validate" autocomplete="off" value="123456">
									<label for="password" class="">Mật khẩu</label>
								</div>
								<label>
									<input type="checkbox" checked="" />
									<span>Ghi nhớ?</span>
								</label>
								<br><br>
								<div>
									<button class="waves-effect waves-light btn right" type="submit"> Đăng nhập</button>
								</form>
								<a class="waves-effect waves-teal btn-flat modal-trigger" href="#forgot">Quên mật khẩu?</a>
								<div id="forgot" class="modal">
									<div class="modal-content">
										<h4>Đặt lại mật khẩu của bạn</h4>
										<form action="forgot_password" method="POST" role="form">
											<div class="input-field">
												<input id="email_forgot" type="email" name="email_forgot" class="validate" required="">
												<label for="email" class="">Email của bạn</label>
											</div>
											<button type="submit" name="forgot" value="submit" class="waves-effect waves-light btn">Lấy lại mật khẩu</button>
										</form>
									</div>
									<div class="modal-footer">
										<a href="#!" class="modal-close waves-effect waves-green btn-flat">Đóng</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/'); ?>js/customjs.js"></script>
</body>
</html>