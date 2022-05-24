@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class='w-full'>
        <div>
            <nav class="bg-black border-gray-200 px-2 sm:px-4 py-2.5">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <a href="{{redirect()->to('/')}}" class="flex items-center">
                        <img src="http://localhost/Laravel/simulador/resources/views/images/user1.png" width='40' alt=''>
                        <p class="self-center text-xl font-semibold whitespace-nowrap text-white">{{auth()->user()->name}}</p>
                    </a>
                    <div class="flex flex-wrap justify-between items-center row md:order-2">
                        <a href="{{route('login.destroy')}}">
                            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Cerrar Sesión</span>
                            <img src='http://localhost/Laravel/simulador/resources/views/images/logout.png' width='35' alt=''>
                        </a>
                    </div>
                    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbarNav">
                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                            <li>
                                <a href="{{redirect()->to('/')}}" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Inicio</a>
                            </li>
                            <li>
                                <a href="#" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Examenes</a>
                            </li>
                            <li>
                                <a href="#" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Resultados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection