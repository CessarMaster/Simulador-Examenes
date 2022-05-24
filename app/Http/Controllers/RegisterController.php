<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request-> name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->tipoUsuario = $request->tipoUsuario;

        $user->save();
        
        auth()->login($user);

        if(auth()->user()->tipoUsuario=='Docente'){
            return redirect()->to(route('maestro.index'));
        }else{
            return view('alumno.alumno');
        }
    }
}
