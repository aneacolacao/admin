@extends ('layouts.app')

@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 blog-post">
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
			
			<h3>Contacto principal</h3>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Nombre</h4>
			    <p class="list-group-item-text">{{ $client->main_contact}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Teléfono</h4>
			    <p class="list-group-item-text">{{ $client->main_c_phone}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Correo electrónico</h4>
			    <p class="list-group-item-text">{{ $client->main_c_email}}</p>
			</div>
			<h3>Contacto para facturación</h3>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Nombre</h4>
			    <p class="list-group-item-text">{{ $client->billing_contact}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Teléfono</h4>
			    <p class="list-group-item-text">{{ $client->billing_c_phone}}</p>
			</div>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Correo electrónico</h4>
			    <p class="list-group-item-text">{{ $client->billing_c_email}}</p>
			</div>
			<br/><br/>
			<div class="list-group">
			    <h4 class="list-group-item-heading">Creado por: Andrea Cadena</h4>
			    <h4 class="list-group-item-heading">Responsable: Andrea Cadena</h4>
			    <h4 class="list-group-item-heading">Project A: Andrea Cadena</h4>
			    <h4 class="list-group-item-heading">Project B: Andrea Cadena</h4>
			    {{-- <p class="list-group-item-text">{{ $client->user->name }}</p> --}}
			</div>
		</div>
	</div>
</div>
@endsection