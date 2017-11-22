@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Crear un cliente</h1>

			<hr/>

			<form method="POST" action="/clients">
			  {{ csrf_field() }}

			  <div class="form-group">
			    <label for="tradename">Cliente</label>
			    <input type="text" class="form-control" id="tradename" name="tradename">
			  </div>
			  <div class="form-group">
			    <label for="business_name">Razón Social</label>
			    <input type="text" class="form-control" id="business_name" name="business_name">
			  </div>
			  <div class="form-group">
			    <label for="rfc">R.F.C.</label>
			    <input type="text" class="form-control" id="rfc" name="rfc">
			  </div>
			  <div class="form-group">
			    <label for="street">Calle</label>
			    <input type="text" class="form-control" id="street" name="street">
			  </div>
			  <div class="form-group">
			    <label for="exterior_num">No. Exterior</label>
			    <input type="number" class="form-control" id="exterior_num" name="exterior_num">
			  </div>
			  <div class="form-group">
			    <label for="interior_num">Interior</label>
			    <input type="text" class="form-control" id="interior_num" name="interior_num">
			  </div>
			  <div class="form-group">
			    <label for="colony">Colonia</label>
			    <input type="text" class="form-control" id="colony" name="colony">
			  </div>
			  <div class="form-group">
			    <label for="region">Estado / Delegación</label>
			    <input type="text" class="form-control" id="region" name="region">
			  </div>
			  <div class="form-group">
			    <label for="city">Ciudad</label>
			    <input type="text" class="form-control" id="city" name="city">
			  </div>
			  <div class="form-group">
			    <label for="zip_code">Código Postal</label>
			    <input type="number" class="form-control" id="zip_code" name="zip_code">
			  </div>
			  <div class="form-group">
			    <label for="country">País</label>
			    <input type="text" class="form-control" id="country" name="country">
			  </div>
			  
			  <div class="form-group">
			    <label for="main_contact">Contacto principal</label>
			    <input type="text" class="form-control" id="main_contact" name="main_contact">
			  </div>
			  <div class="form-group">
			    <label for="main_c_phone">Contacto principal - Teléfono</label>
			    <input type="tel" class="form-control" id="main_c_phone" name="main_c_phone">
			  </div>
			  <div class="form-group">
			    <label for="main_c_email">Contacto principal - Email</label>
			    <input type="text" class="form-control" id="main_c_email" name="main_c_email">
			  </div>
			  <div class="form-group">
			    <label for="billing_contact">Contacto de facturación</label>
			    <input type="text" class="form-control" id="billing_contact" name="billing_contact">
			  </div>
			  <div class="form-group">
			    <label for="billing_c_phone">Contacto de facturación - Teléfono</label>
			    <input type="tel" class="form-control" id="billing_c_phone" name="billing_c_phone">
			  </div>
			  <div class="form-group">
			    <label for="billing_c_email">Contacto de facturación - Email</label>
			    <input type="text" class="form-control" id="billing_c_email" name="billing_c_email">
			  </div>
			  {{-- <div class="form-group">
			    <label for="projects_manager">Ejecutivas asignadas</label>
			    <select multiple class="form-control" id="projects_manager">
			      @foreach ($proj_m as $pm)
			      	@if ( $pm->hasRole('project_m') )
			      		<option>{{ $pm->name }} {{ $pm->last_name }}</option>
			      	@endif
			      @endforeach
			    </select>
			  </div> --}}
			  
			  <div class="form-check">
				<label class="form-check-label">
				    @foreach ($proj_m as $pm)
				    	@if ( $pm->hasRole('project_m') )
					    	<input class="form-check-input" type="checkbox" value="">
					    	{{ $pm->name }} {{ $pm->last_name }}
					    	<br/>
					    @endif
				    @endforeach
				</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</div>
@endsection