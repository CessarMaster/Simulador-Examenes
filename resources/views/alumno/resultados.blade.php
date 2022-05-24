@extends('layouts.appAlumno')

@section('title', 'Alumno | Resultados')

@section('content')

<div class='bg-blue-200 w-3/4 h-3/4 m-auto mt-5 shadow rounded'>
    <div class='border border-2px h-9 bg-white text-center'>
        <label class='font-serif ml-2 text-2xl'>Resultados</label>
    </div>
    <div>
        <div class="mb-3">
            <table class="w-full text-l text-left text-black border-2">
                <thead>
                    <tr>
                        <th>ID-Examen</th>
                        <th>Docente Creador</th>
                        <th>Titulo del Examen</th>
                        <th>Alumno Que Realizo</th>
                        <th>Calificacion</th>
                    </tr>
                    <tbody>
                        @foreach ($resultados as $resultado)
                        <tr>
                            <th>
                                {{$resultado->idExamen}}
                            </th>
                            <th>
                                @foreach ($examenes as $examen)
                                    @if ($resultado->idExamen === $examen->id)
                                        @foreach ($usuarios as $usuario)
                                            @if ($examen->idMaestro === $usuario->id)
                                                {{$usuario->name}}
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @foreach ($examenes as $examen)
                                    @if ($resultado->idExamen === $examen->id)
                                        {{$examen->nombreExamen}}
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                @foreach ($usuarios as $usuario)
                                    @if ($resultado->idUsuario === $usuario->id)
                                     {{$usuario->name}}
                                    @endif
                                @endforeach
                            </th>
                            <th>
                                {{$resultado->calificacion}}
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection