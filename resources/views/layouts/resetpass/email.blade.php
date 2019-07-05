<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reset Password</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{asset('AdminLTE/plugins/iCheck/square/blue.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<h1><b>Reset Password</b></h1>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">E-Mail Address</p>
			@if (session('Success'))
			<div class="alert alert-success">
				{{ session('Success') }}
			</div>
			@endif
			@if (session('Gagal'))
			<div class="alert alert-danger">
				{{ session('Gagal') }}
			</div>
			@endif
			<form method="POST" action="{{route('reset.pass')}}">
				@csrf
				<div class="form-group has-feedback">
					<input type="email" name="email" class="form-control" placeholder="E-Mail Address">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="row" style="margin-top: 20px;">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-bottom: 5px;">Send Password Reset Link</button>
						<a href="/login" class="btn btn-default btn-block btn-flat">Cancel</a>
					</div>
				</div>
			</form>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="{{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
			});
		});
	</script>
</body>
</html>
