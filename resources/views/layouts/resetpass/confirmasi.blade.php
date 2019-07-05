<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Registration Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{asset('AdminLTE/plugins/iCheck/square/blue.css')}}">
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<h1><b>Reset Password</b></h1>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Confirmasi Password</p>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form action="{{route('reset.update')}}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group has-feedback">
					<label for="email" class="btn-block btn-flat" style="text-align: center;">Email :</label>
					<input type="hidden" name="id" class="form-control"value="{{$users->id}}" readonly>
					<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$users->email}}" readonly>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control"  id="Password" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" id="ConfirmPassword" name="" placeholder="Confirmasi Password">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-bottom: 5px;" id="btnSubmit">Submit</button>
						<a href="/form" class="btn btn-default btn-block btn-flat">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>

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
    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#Password").val();
                var confirmPassword = $("#ConfirmPassword").val();
                var karakter = password.length;
                if (password != confirmPassword) {
                    alert("Passwords do not match !!!");
                    return false;
                } else if( password == ''){
                	alert("Passwords harus di isi !!!");
                    return false;
                } else if( karakter < 5){
                	alert("Passwords kurang dari 5 !!!");
                    return false;
                }
                return true;
            });
        });
    </script>
</body>
</html>
