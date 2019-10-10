@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Name</th>
							<th>Price</th>
							<th>Description</th>
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
			ajax: `{{ route('product.datatable') }}`,
			columns: [
				{data: 'id', name: 'id', searchable: false, visible: false },
				{data: 'name', name: 'name'},
				{data: 'price_sell', name: 'price_sell'},
				{data: 'description', name: 'description'},
			]
		});
	})
</script>
@endpush
