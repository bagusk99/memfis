@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		@if (session('success'))
			<div class="alert alert-success w-100">
				{{ session('success') }}
			</div>
		@endif
		<div class="card">
			<div class="card-body">

				<div class="card-title text-right">
					<a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary">
						<i class="fa fa-plus"></i>
						Add Data
					</a>
				</div>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Email</th>
							<th class="nowrap text-center width-1">Action</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script charset="utf-8">
	$(document).ready(function() {
		$('table').DataTable({
			processing: true,
			serverSide: true,
			ajax: `{{ route('customer.datatable') }}`,
			order: [[0, 'desc']],
			columns: [
				{data: 'id', name: 'id', searchable: false, visible: false },
				{data: 'name', name: 'name'},
				{data: 'user.email', name: 'user.email'},
				{
					data: 'id',
					orderable: false,
					className: '',
					render: function(data) {
						var html =
							`<a href="{{ route('customer.edit', '') }}/${data}" class="btn btn-sm nowrap mb-1 btn-icon btn-clean">
								<i class="fa fa-edit fa-fw"></i>
							</a>
							<button data-url="{{ route('customer.destroy', '') }}/${data}" class="text-danger btn btn-sm nowrap mb-1 btn-icon btn-clean btn-delete">
								<i class="fa fa-trash fa-fw"></i>
							</button>`

						return `<div class="nowrap">${html}</div>`;
					}
				}
			]
		});
	})
</script>
@endpush
