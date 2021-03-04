<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>SCP - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/entrar/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/entrar/css/util.css">
	<link rel="stylesheet" type="text/css" href="/entrar/css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(/entrar/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Carências e Provimento
					</span>
				</div>

				<form class="login100-form validate-form" action="<?= base_url() ?>/login/check" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="O usuário é obrigatório">
						<span class="label-input100">Usuário</span>
						<input class="input100" type="text" name="user" placeholder="Entre com o nome do usuário">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="A senha é obrigatória">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="password" placeholder="Entre com a senha">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Lenbrar de mim
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Esqueceu a senha?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn txt1">
						<button class="login100-form-btn ">Entrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="/entrar/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/vendor/bootstrap/js/popper.js"></script>
	<script src="/entrar/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/vendor/daterangepicker/moment.min.js"></script>
	<script src="/entrar/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="/entrar/js/main.js"></script>

</body>

</html>