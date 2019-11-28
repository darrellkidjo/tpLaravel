@extends('Acceuil')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				@if (auth()->user()->is_admin == 1)
					@include('admin')
				@else
					@include('client')
				@endif
			</div>
		</div>
	</div>
@endsection