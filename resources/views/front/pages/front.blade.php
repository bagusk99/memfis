@extends('front.app')

@section('content')
<div class="row">

	@foreach ($product as $x)
		<div class="col-md-3 mb-4">
			<div class="card h-100">
				<a href="{{ route('product', $x->id) }}"><img class="card-img-top" src="{{ asset($x->photo) }}" alt=""></a>
				<div class="card-body">
					<h4 class="card-title">
						<a href="{{ route('product', $x->id) }}">{{ $x->name }}</a>
					</h4>
					<h5>{{ $x->price_sell }}</h5>
				</div>
			</div>
		</div>
	@endforeach

</div>
<!-- /.row -->
@endsection
