@extends('layouts.appMaestro')

@section('title', 'Docente | Home')

@section('content')
    <div class='text-center font-bold mt-4'>
        <div class="welcome-content">
            <img src="https://gstatic.com/classroom/themes/Writing.jpg" class="welcome-image"/>
                    <h2>BIENVENIDO!</h2>
                <div class="user">
                    <h3>Docente {{auth()->user()->name}}</h3>
                </div>
        </div>
    </div>
@endsection