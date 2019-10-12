<!DOCTYPE html>
<html>
	<head>
		@include('front.modules.meta')
	<body>
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					@if (session('error'))
						<div class="alert alert-danger w-100">
							{{ session('error') }}
						</div>
					@endif

					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li style="text-transform:capitalize">{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="card">
						<div class="card-body">
							<form action="{{ route('auth.do_register') }}" method="post">
								@csrf

								<div class="form-group">
									<label>Name</label>
									<input class="form-control" type="text" value="{{ old('password') }}" name="name" id=""/>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" value="{{ old('email') }}" name="email" id=""/>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" value="{{ old('password') }}" name="password" id=""/>
								</div>
								<div class="form-group">
									<label>Retype Password</label>
									<input class="form-control" type="password" value="{{ old('retypePassword') }}" name="retypePassword" id=""/>
								</div>
								<div class="form-group text-right">
									<a href="{{ route('auth.login') }}" class="btn btn-sm btn-outline-secondary">Login</a>
									<button class="btn btn-sm btn-primary">Register</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('front.modules.script')
	</body>
</html>
