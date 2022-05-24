@extends('layouts.appAlumno')

@section('title', 'Alumno | Contestar Examen')

@section('content')
<div class='bg-green-200 w-3/4 h-9/10 m-auto mt-5 shadow rounded'>
    <form action="{{route('alumno.examenTerminado')}}">
    <div class='border border-2px h-9 bg-white flow-root'>
        <label class='font-serif ml-2 text-lg mr-80'>{{auth()->user()->name}}</label>
        <label class='font-bold ml-10 text-xl'>{{$examen->nombreExamen}}</label>
        <a href="{{route('alumno.examenes')}}" class='float-right'>
            <svg class="h-8 w-8 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" /> <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15" /></svg>
        </a>
        <button class='float-right' type="submit">
            <svg class="h-8 w-8 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z" />  <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />  <circle cx="12" cy="14" r="2" />  <polyline points="14 4 14 8 8 8 8 4" /></svg>
        </button>
    </div>
    <div>
        <div>
            <label class='font-bold text-xl'><center>Seleccione la respuesta correcta</center></label>
            <input type="hidden" name="idExamen" value="{{$examen->id}}"/>
            <?php $cont = 0; ?>
            @foreach ($preguntas as $pregunta)
                @if ($pregunta->idExamen === $examen->id)
                <?php $cont = $cont + 1;?>
                <label class='font ml-2 text-xl'>{{$cont .' .-  '. $pregunta->tituloRespuesta}}</label>
                <br>
                    <fieldset>
                    @foreach ($respuestas as $respuesta)
                        @if ($respuesta->idPregunta === $pregunta->id)
                            <label class='mx-2'>
                                <input type="radio" name="{{$respuesta->id}}" value="{{$respuesta->validacion}}"/>{{$respuesta->tituloRespuesta}}
                            </label>
                            <br>
                        @endif
                    @endforeach
                    </fieldset>
                @endif
            @endforeach
        </div>
    </div>
    </form>
</div>
@endsection