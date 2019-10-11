@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<div class="card-title text-right">
					<a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary">
						<i class="fa fa-plus"></i>
						Add Data
					</a>
				</div>

				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th class="nowrap text-center">Price</th>
							<th>Description</th>
							<th class="nowrap text-center">Action</th>
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
			ajax: `{{ route('employee.datatable') }}`,
			columns: [
				{data: 'id', name: 'id', searchable: false, visible: false },
				{data: 'name', name: 'name'},
				{data: 'price_sell', name: 'price_sell', className: 'nowrap'},
				{data: 'description', name: 'description'},
				{
					data: 'id',
					orderable: false,
					className: '',
					render: function(data) {
						var html =
							`<button type="button" data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-sm nowrap mb-1 btn-icon btn-clean">
								<i class="fa fa-edit fa-fw"></i>
							</button>
							<button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="text-danger btn btn-sm nowrap mb-1 btn-icon btn-clean">
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
