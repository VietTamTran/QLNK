<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Huyện Ứng Hòa - Đặt lại mật khẩu</title>
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
								<h3>Đã nhớ lại?</h3>
								<a class="waves-effect waves-light btn" href="<?php echo base_url('auth/login') ?>">Đăng nhập</a>
							</div>
							<img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?5818699651879506597" alt="">
						</div>
						<div class="card-content">
							<span class="card-title">Đặt lại mật khẩu của bạn</span>
							<form action="" method="post">
								<div class="input-field">
									<input id="newpass" type="text" name="newpass" class="validate">
									<label for="newpass" class="">Mật khẩu mới</label>
								</div>
								<div>
									<input class="waves-effect waves-light btn right" type="submit" value="Thay đổi mật khẩu">
								</form>
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