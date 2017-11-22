
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            	<div style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px; overflow: hidden;">
            		<img class="avatar" src="/uploads/avatars/{{ $user->avatar }}">	
            	</div>
            	
                <h2>Perfil de {{ $user->name }}</h2>

                <form enctype="multipart/form-data" action="/profile" method="POST">
                	<label>Update Profile Image</label>
                	<input type="file" name="avatar">
                	{{ csrf_field() }}
                	<input type="submit" value="Subir imagen" class="pull-right btn btn-sm btn-primary">
                	
                </form>
            </div>
        </div>
    </div>
@endsection
