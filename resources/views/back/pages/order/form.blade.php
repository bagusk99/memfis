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
								<label>Employee</label>
								<select class="form-control" name="employees_id" id="employees_id">
									@foreach ($employee as $x)
										<option value="{{ $x->id }}" {{ ($x->id == @$data->employees_id)? 'selected': '' }}>{{ $x->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Customer</label>
								<select class="form-control" name="customers_id" id="customers_id">
									@foreach ($customer as $x)
										<option value="{{ $x->id }}" {{ ($x->id == @$data->customers_id)? 'selected': '' }}>{{ $x->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Product</label>
								<select class="form-control" name="products_id" id="products_id">
									@foreach ($product as $x)
										<option value="{{ $x->id }}" {{ ($x->id == @$data->products_id)? 'selected': '' }}>{{ $x->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Total</label>
								<input class="form-control" type="text" value="{{ ($v = @$data->total)? $v: old('total') }}" name="total" id=""/>
							</div>
							<div class="form-group text-right">
								<a href="{{ route('order.index') }}" class="btn btn-sm btn-danger text-light">Cancel</a>
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
