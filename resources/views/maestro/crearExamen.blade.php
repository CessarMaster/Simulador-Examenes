@extends('layouts.appMaestro')

@section('title', 'Docente | Home')

@section('content')
    <form class='form-register' action="{{route('maestro.guardarExamen')}}" method="POST">
        @csrf

        <div class="row">
            <p class='mb-4 font-serif text-2xl'>Ingrese el titulo del examen</p>
            <input class='controls' type='text' name='title' id='title' placeholder='Ingrese el titulo del examen' Required />
            <p class='mb-4 font-serif text-2xl'>ID del examen</p>
            <input class='controls' type='text' name='idExamen' id='idExamen' Value=
                {{rand(1000,9999)}}
            readonly/>
        </div>

        <div class='flex items-center pt-4'>
            <button  type="submit" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-6 px-4 rounded' >Siguiente</button>
            <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-6 px-4 rounded' href="{{route('maestro.examenes')}}">Salir</a>
        </div>
    </form>
@endsection