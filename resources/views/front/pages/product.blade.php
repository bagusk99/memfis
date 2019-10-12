@extends('front.app')

@section('content')
<div class="row pb-5" style="min-height:65vh">

	<div class="col-md-3">
		<img class="w-100" src="{{ asset($product->photo) }}" alt=""/>
	</div>
	<div class="col-md-9">
		<h3>Description</h3>
		<hr>
		<p>{{ $product->description }}</p>
	</div>

</div>
<!-- /.row -->
@endsection
