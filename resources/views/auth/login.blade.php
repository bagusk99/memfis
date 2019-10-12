<!DOCTYPE html>
<html>
	<head>
		@include('front.modules.meta')
	<body>
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<form action="" method="post">
								@csrf

								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" value="{{ old('email') }}" name="email" id=""/>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" value="{{ old('password') }}" name="password" id=""/>
								</div>
								<div class="form-group text-right">
									<a href="{{ route('auth.register') }}" class="btn btn-sm btn-outline-secondary">Register</a>
									<button class="btn btn-sm btn-primary">Login</button>
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
