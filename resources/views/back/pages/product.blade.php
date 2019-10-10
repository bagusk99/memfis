@extends('back.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
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
		$('table').DataTable();
	})
</script>
@endpush
