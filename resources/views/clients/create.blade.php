@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Crear un cliente</h1>

			<hr/>
			
			@include('partials.alerts.success')

			@include('partials.alerts.errors')

			{!! Form::open([
				'route' => 'clientes.store'
			]) !!}

			{{ csrf_field() }}
			
			<div class="form-group">
    			{!! Form::text('tradename', null, ['class' => 'form-control', 'placeholder'=>'Cliente']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('business_name', null, ['class' => 'form-control', 'placeholder'=>'Razón Social']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('rfc', null, ['class' => 'form-control', 'placeholder'=>'R.F.C.']) !!}
			</div>

			<h2>Dirección</h2>

			<div class="form-group">
    			{!! Form::text('street', null, ['class' => 'form-control', 'placeholder'=>'Calle']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('exterior_num', null, ['class' => 'form-control', 'placeholder'=>'No. Exterior']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('interior_num', null, ['class' => 'form-control', 'placeholder'=>'Interior']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('colony', null, ['class' => 'form-control', 'placeholder'=>'Colonia']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('region', null, ['class' => 'form-control', 'placeholder'=>'Estado / Delegación']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Ciudad']) !!}
			</div>

			<div class="form-group">
    			{!! Form::number('zip_code', null, ['class' => 'form-control', 'placeholder'=>'Código Postal']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('country', null, ['class' => 'form-control', 'placeholder'=>'País']) !!}
			</div>

			<h2>Contacto de cuentas</h2>

			<div class="form-group">
    			{!! Form::text('main_contact', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
			</div>

			<div class="form-group">
    			{!! Form::number('main_c_phone', null, ['class' => 'form-control', 'placeholder'=>'Teléfono']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('main_c_email', null, ['class' => 'form-control', 'placeholder'=>'E-mail']) !!}
			</div>

			<h2>Contacto de facturación</h2>

			<div class="form-group">
    			{!! Form::text('billing_contact', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
			</div>

			<div class="form-group">
    			{!! Form::number('billing_c_phone', null, ['class' => 'form-control', 'placeholder'=>'Teléfono']) !!}
			</div>

			<div class="form-group">
    			{!! Form::text('billing_c_email', null, ['class' => 'form-control', 'placeholder'=>'E-mail']) !!}
			</div>

			<div class="form-group">
    			{!! Form::textarea('comments', null, ['class' => 'form-control', 'placeholder'=>'Comentarios']) !!}
			</div>
			
			<h2>Account Managers</h2>

{{-- 			<div class="form-check">
				<label class="form-check-label">
				    @foreach ($proj_m as $pm)
				    	{{ Form::checkbox('proj_man[]', $pm->id, null, ['class' => 'form-check-input']) }}
				    	{{ $pm->name }} {{ $pm->last_name }}
				    	<br/>
				    @endforeach
				</label>
			</div> --}}

			<div class="form-group">
				{!! Form::text('project_manager_a', null, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'project_manager_a')) !!}
				{!! Form::hidden('proj_a', null, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'proj_a')) !!}

				{!! Form::text('project_manager_b', null, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'project_manager_b')) !!}
				{!! Form::hidden('proj_b', null, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'proj_b')) !!}
			</div>

			{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

			{!! Form::close() !!}
			
	        <script>
				$(document).ready(function() {
					src = "{{ route('searchajax') }}";
					$("#project_manager_a").autocomplete({
						source: function(request, response) {
			        		console.log(request.term);
			            	$.ajax({
				                url: src,
				                dataType: "json",
				                data: {
				                    term : request.term
				                },
			                	success: function(data) {
				                  response(data);
				                  console.log(data);
				                  console.log(data[0].id);
			                   
			                	}
			            	});
			        	},
			        	select: function( event, ui ) {
			        		$( "#project_manager_a" ).val( ui.item.value );
					        $( "#proj_a" ).val( ui.item.id );
					        console.log(ui.item.id);
					        return false;
					        // console.log($( "#project_manager" ).val());
					        // console.log($( "#proj-a" ).val());
					    },
			        	minLength: 3,   
			    	});

			    	$("#project_manager_b").autocomplete({
						source: function(request, response) {
			        		console.log(request.term);
			            	$.ajax({
				                url: src,
				                dataType: "json",
				                data: {
				                    term : request.term
				                },
			                	success: function(data) {
				                  response(data);
				                  console.log(data);
				                  console.log(data[0].id);
			                   
			                	}
			            	});
			        	},
			        	select: function( event, ui ) {
			        		$( "#project_manager_b" ).val( ui.item.value );
					        $( "#proj_b" ).val( ui.item.id );
					        console.log(ui.item.id);
					        return false;
					        // console.log($( "#project_manager" ).val());
					        // console.log($( "#proj-a" ).val());
					    },
			        	minLength: 1,   
			    	});
				});
			</script>
			{{-- <form method="POST" action="/clientes">
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

			  
			  <div class="form-check">
				<label class="form-check-label">
				    @foreach ($proj_m as $pm)
				    	@if ( $pm->hasRole('project_m') )
					    	<input class="form-check-input" type="checkbox" name="proj_man[]" value="{{ $pm->id }}">
					    	{{ $pm->name }} {{ $pm->last_name }}
					    	<br/>
					    @endif
				    @endforeach
				</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Guardar</button>
			</form> --}}
		</div>
	</div>
</div>
@endsection