@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class='w-full max-w-xs m-auto'>

    @error('message')
        <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 text-center'>
            <span class='sm:inline block'>Error: Usuario o contraseña incorrectos</span>
        </div>
    @enderror

    <form class='bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4' action="" method="POST">

        @csrf

        <div class='mb-4 relative'>
            <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' id='email' name='email' placeholder='Ingresa tu usuario' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class=' absolute  inset-y-0  left-2 flex items-center'>
                    <i class='material-icons'>account_circle</i>
                </div>
            </div>
        </div>

        <div class='mb-4 relative'>
            <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='password' name='password' id='password' placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-10 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class=' absolute  inset-y-0  left-2 flex items-center'>
                    <i class='material-icons'>verified_user</i>
                </div>
            </div>
        </div>

        <div class="topping ml-1 mb-3 mt-0">
            <input type="checkbox" id="topping" name="topping" value="Paneer" onclick="verpassword()"> Ver contraseña</input>
        </div>

        <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 rounded focus:outline-none focus:shadow-outline w-full m-auto' type="submit">Iniciar Sesión</button>

    </form>
    <form action="{{route('register.index')}}">
        <p class='my-2 text-sm flex justify-center px-3 '>¿No tienes una cuenta?</p>
        <button class='bg-slate-50 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full m-auto' type="submit">Crear Cuenta</button>
    </form>
</div>
<script>
    function verpassword(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
</script>
@endsection