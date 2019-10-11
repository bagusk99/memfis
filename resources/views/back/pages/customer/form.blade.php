@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
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

				<div class="row justify-content-md-center">
					<div class="col-md-6">
						
						<form action="{{ $action }}" method="post" enctype="multipart/form-data">
							@csrf
							@if (@$data)
								@method('PUT')
							@endif
							
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" value="{{ ($v = @$data->name)? $v: old('name') }}" name="name" id=""/>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" value="{{ ($v = @$data->user->email)? $v: old('email') }}" name="email" id=""/>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" value="" name="password" id=""/>
							</div>
							<div class="form-group">
								<label>Retype Password</label>
								<input type="password" class="form-control" value="" name="retypePassword" id=""/>
							</div>
							<div class="form-group text-right">
								<a href="{{ route('customer.index') }}" class="btn btn-sm btn-danger text-light">Cancel</a>
								<button class="btn btn-sm btn-success">Save</button>
							</div>

						</form>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
