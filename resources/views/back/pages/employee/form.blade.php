@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<div class="row justify-content-md-center">
					<div class="col-md-6">
						
						<form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" value="{{ ($v = @$data->name)? $v: old('name') }}" name="name" id=""/>
							</div>
							<div class="form-group text-right">
								<a href="{{ route('employee.index') }}" class="btn btn-sm btn-danger text-light">Cancel</a>
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
