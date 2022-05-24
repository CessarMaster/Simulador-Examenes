@extends('layouts.appMaestro')

@section('title', 'Docente | Home')

@section('content')
    <form class='form-register' action="{{route('maestro.guardarPregunta')}}" method="POST">
        @csrf

        <div class="row">
            <p class='mb-3'>Titulo del Examen</p>
            <input class='controls' type='text' name='title' id='title' value='{{$request->title}}' readonly/>
            <p class='mb-3'>ID del Examen</p>
            <input class='controls' type='text' name='idExamen' id='idExamen' Value='{{$request->idExamen}}' readonly/>
            <br>
        </div>
        <p class='mb-3'>Escriba la pregunta</p>
        <input class='controls' type='text' name='pregunta' id='pregunta' placeholder='Ingrese la pregunta' Required />
        <p class='mb-3'>Indique las posibles respuestas</p>
        <input class='controls' type='text' name='opcion1' id='opcion1' placeholder='Opcion 1' Required />
        <input class='controls' type='text' name='opcion2' id='opcion2' placeholder='Opcion 2' Required />
        <input class='controls' type='text' name='opcion3' id='opcion3' placeholder='Opcion 3' Required />

        <p class='mb-3 mt-0'>Seleccione la respuesta correcta</p>
        <input class='controls' type='text' name='correcta' id='correcta' placeholder='Correcta' Required />

        <div class='flex items-center pt-4'>
            <button  type="submit" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-6 px-4 rounded' >Siguiente Pregunta</button>
            <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-2 px-4 rounded' href="{{route('maestro.examenes')}}">Guardar</a>
            <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 ml-6 px-4 rounded' href="{{route('maestro.examenes')}}">Salir</a>
        </div>
    </form>
@endsection