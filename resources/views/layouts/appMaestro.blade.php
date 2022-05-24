<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link href="http://localhost/Laravel/simulador/resources/css/app.css" rel="stylesheet">
    <link href="http://localhost/Laravel/simulador/resources/css/CardDocente.css" rel="stylesheet">
    <link href="http://localhost/Laravel/simulador/resources/css/GenerarExamen.css" rel="stylesheet">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
    <div class="bg-gray-100 text-gray-80 h-screen text-black flex">
        <div class='w-full'>
            <div>
                <nav class="navbar navbar-expand-lg bg-black border-gray-200 px-2 sm:px-4 py-2.5">
                    <div class="container flex flex-wrap justify-between items-center mx-auto">
                        <a href="{{route('maestro.index')}}" class="flex items-center">
                            <img src="http://localhost/Laravel/simulador/resources/views/images/user1.png" width='40' alt=''>
                            <p class="self-center text-xl font-semibold whitespace-nowrap text-white">{{auth()->user()->name}}</p>
                        </a>
                        <div class="flex flex-wrap justify-between items-center row md:order-2">
                            <a href="{{route('login.destroy')}}">
                                <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Cerrar Sesión</span>
                            </a>
                        </div>
                        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbarNav">
                            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                <li>
                                    <a href="{{route('maestro.index')}}" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Inicio</a>
                                </li>
                                <li>
                                    <a href="{{route('maestro.examenes')}}" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Examenes</a>
                                </li>
                                <li>
                                    <a href="{{route('maestro.resultados')}}" class="self-center text-xl font-semibold whitespace-nowrap text-white" aria-current="page">Resultados</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            @yield('content')
            
        </div>
        
    
    </div>
</body>
</html>