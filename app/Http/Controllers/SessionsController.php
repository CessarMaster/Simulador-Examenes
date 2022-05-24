<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\False_;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        if(auth()->attempt(request(['email', 'password']))==false){
            return back()->withErrors([
                'message' =>'El usuario o contraseña son incorrectos..!',
            ]);
        }else{
            if(auth()->user()->tipoUsuario=='Docente'){
                return redirect()->to(route('maestro.index'));
            }else{
                return redirect()->to(route('alumno.index'));
            }
        }
    }
    public function destroy(){
        auth()->logout();
        return redirect()->to(route('login.index'));
    }
}
