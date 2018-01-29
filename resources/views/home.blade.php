@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @if ( Auth::user()->hasRole('master') )
                <button><a href="{{ url('register') }}">Registrar usuario</a></button>                
            @endif
            <br/>
            <button><a href="{{ url('clientes/crear') }}">Nuevo Cliente</a></button>

            <select class="form-control" name="cliente" onchange="document.location.href='/clientes/' + this.value">
                <option selected disabled>Selecciona cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->tradename }}</option>
                @endforeach
            </select>
            {{-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
