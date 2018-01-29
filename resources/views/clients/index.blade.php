@extends ('layouts.app')


@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<button><a href="{{ url('clientes/crear') }}">Nuevo Cliente</a></button>
			{{-- <button><a href="{{ route('register') }}">Seleccionar Cliente</a></button> --}}
		</div>
	</div>
</div>
@endsection



