<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link rel="stylesheet" href="{{('backend/assets/styles/style.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{('backend/assets/plugin/waves/waves.min.css')}}">

</head>

<body>

<div id="single-wrapper">
	<form method="POST" action="{{ route('login') }}" class="frm-single">
        @csrf
		<div class="inside">
			<div class="title"><strong>HS</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input">
                <input type="email" placeholder="Email" class="frm-inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class="fa fa-user frm-ico"></i>


                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
			<!-- /.frm-input -->
			<div class="frm-input">
                <input type="password" placeholder="Password" class="frm-inp @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <i class="fa fa-lock frm-ico"></i>

                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>

			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>


			<!-- /.row -->
			<div class="frm-footer">HS © 2021.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->


	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{('backend/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{('backend/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{('backend/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{('backend/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{('backend/assets/plugin/waves/waves.min.js')}}"></script>

	<script src="{{('backend/assets/scripts/main.min.js')}}"></script>
</body>
</html>
