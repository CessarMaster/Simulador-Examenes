@extends('layouts.appMaestro')

@section('title', 'Docente | Examenes')

@section('content')
    <div class='w-3/4 bg-green-200 h-3/4 m-auto mt-5 shadow rounded relative flow-root'>
        <div class='border border-2px h-9 bg-white text-center'>
            <label class='font-serif ml-2 text-2xl'>Tus exámenes</label>
        <a class='float-right' href="{{route('maestro.crearExamen')}}" method="POST">
            <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
          </a>
        </div>
        <div>
            <div class="mb-3">
                @foreach ($examenes as $examen)
                    @if ($examen->idMaestro==auth()->user()->id)
                    <div class="card-container">
                        <div class="card-title-exam"><h3>{{$examen->nombreExamen}}</h3></div>
                        <div class="image-exam-docente"><img src="http://localhost/Laravel/simulador/resources/views/images/examen.jpg" alt='' class="imagenExamen"/></div>
                                <div class="mitad-exa">
                                    <div class="btn">
                                        <form action="{{route('maestro.destroy', $examen)}}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit"><svg class="h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  alt="Eliminar Examen">  <circle cx="12" cy="12" r="10" /><line x1="15" y1="9" x2="9" y2="15" /><line x1="9" y1="9" x2="15" y2="15" /></svg></button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection