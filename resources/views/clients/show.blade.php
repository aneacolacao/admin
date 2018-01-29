@extends ('layouts.app')

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 blog-post">

			@include('partials.alerts.success')

			@include('partials.alerts.errors')

			<h2 class="blog-post-title">
				{{ $client->tradename }}
			</h2>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Razón Social</h4>
			    <p class="list-group-item-text">{{ $client->business_name }}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">RFC</h4>
			    <p class="list-group-item-text">{{ $client->rfc}}</p>
			</div>
			<h3>Dirección</h3>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Calle</h4>
			    <p class="list-group-item-text">{{ $client->street }}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">No. Exterior</h4>
			    <p class="list-group-item-text">{{ $client->exterior_num }}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Interior</h4>
			    <p class="list-group-item-text">{{ $client->interior_num }}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Colonia</h4>
			    <p class="list-group-item-text">{{ $client->colony }}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Estado / Delegación</h4>
			    <p class="list-group-item-text">{{ $client->region}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Ciudad</h4>
			    <p class="list-group-item-text">{{ $client->city}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Código Postal</h4>
			    <p class="list-group-item-text">{{ $client->zip_code}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">País</h4>
			    <p class="list-group-item-text">{{ $client->country}}</p>
			</div>
			
			<h3>Contacto de cuentas</h3>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Nombre</h4>
			    <p class="list-group-item-text">{{ $client->main_contact}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Teléfono</h4>
			    <p class="list-group-item-text">{{ $client->main_c_phone}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">E-mail</h4>
			    <p class="list-group-item-text">{{ $client->main_c_email}}</p>
			</div>
			<h3>Contacto de facturación</h3>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Nombre</h4>
			    <p class="list-group-item-text">{{ $client->billing_contact}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Teléfono</h4>
			    <p class="list-group-item-text">{{ $client->billing_c_phone}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">E-mail</h4>
			    <p class="list-group-item-text">{{ $client->billing_c_email}}</p>
			</div>
			<br/><br/>
			
			<strong>Creado en: {{ $client->created_at->toFormattedDateString() }}<br/><br/>

			<strong>Creado por:</strong> {{ $creator->name }} {{ $creator->last_name }}<br>
			<strong>Responsable:</strong> {{ $responsable->name }} {{ $responsable->last_name }}
				
			@if (count($projects)>0)
			<h2>Account Managers</h2>
			<ul>
			@foreach($projects as $pm)
				<li>{{ $pm->name}} {{ $pm->last_name}}</li>
			@endforeach
			    {{-- @if ($client->get_proj_ms->get(0)->name)
					<li>{{ $client->get_proj_ms->get(0)->name}} {{ $client->get_proj_ms->get(0)->name}}</li>
				@endif
				@if ($client->get_proj_ms->get(1)->name)
					<li>{{ $client->get_proj_ms->get(1)->name}}</li>
				@endif --}}
			</ul>
			@endif

			    {{-- <p class="list-group-item-text">{{ $client->user->name }}</p> --}}
			

			<a href="{{ route('clientes.edit', $client->id) }}" class="btn btn-primary">Actualizar cliente</a>
			<div class="pull-right">
			    @if ( Auth::user()->hasRole('master') )
			    	<a href="#" class="btn btn-danger">Eliminar cliente</a>
			    @endif
			</div>
		</div>
	</div>
</div>
@endsection