@extends('layouts.appAlumno')

@section('title', 'Alumno | Examenes')

@section('content')
    <div class='bg-blue-200 w-3/4 h-3/4 m-auto mt-5 shadow rounded'>
        <div class='border border-2px h-9 bg-white text-center'>
            <label class='font-serif ml-2 text-2xl'>Exámenes Disponibles</label>
        </div>
        <div>
            <div class="mb-3">
                @foreach ($examenes as $examen)

                <div class="card-container">
                    <div class="card-title"><h3>{{$examen->nombreExamen}}</h3></div>
                        <div class="image-container"><img src="http://localhost/Laravel/simulador/resources/views/images/cardimage.jpg"/></div>
                            <div class="mitad">
                                <div class="card-content">     
                                    <div class="card-body"><p class="card-title-p">Profesor:</p> <p class="card-profesor">
                                        @foreach ($usuarios as $user)
                                            @if ($examen->idMaestro==$user->id)
                                            {{$user->name}}
                                            @endif
                                        @endforeach
                                        </p></div>
                                </div>
                                <div class="btn"><button><a href='{{route('alumno.verExamen', $examen)}}'>Ver examen</a></button></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection