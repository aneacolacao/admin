@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1>Editar cliente</h1>

			@include('partials.alerts.success')

			@include('partials.alerts.errors')

			{!! Form::model($client, [
				'method' => 'PATCH',
				'route' => ['clientes.update', $client->id]
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

			<strong>Creado por:</strong> {{ $creator->name }} {{ $creator->last_name }}<br>
			<strong>Responsable:</strong> {{ $responsable->name }} {{ $responsable->last_name }}

			
			
			{{-- <h2>Account Managers</h2> --}}

			{{-- <div class="form-check">
				<label class="form-check-label">
				    @foreach ($proj_m as $pm)
				    	{{ Form::checkbox('proj_man[]', $pm->id, null, ['class' => 'form-check-input']) }}
				    	{{ $pm->name }} {{ $pm->last_name }}
					    	<br/>
				    @endforeach
				</label>
			</div> --}}

			<div class="form-group">
				{!! Form::text('project_manager_a', $proj_a->name . ' ' . $proj_a->last_name, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'project_manager_a')) !!}
				{!! Form::hidden('proj_a', $proj_a->id, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'proj_a')) !!}

				{!! Form::text('project_manager_b',  $proj_b->name . ' ' . $proj_b->last_name, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'project_manager_b')) !!}
				{!! Form::hidden('proj_b', $proj_b->id, array('placeholder' => 'Nombre','class' => 'form-control','id'=>'proj_b')) !!}
			</div>

			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}

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

		</div>
	</div>
</div>
@endsection