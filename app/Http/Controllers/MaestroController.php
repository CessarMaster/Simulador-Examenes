<?php

namespace App\Http\Controllers;
use App\Models\Examene;
use App\Models\User;
use App\Models\Respuesta;
use App\Models\Pregunta;
use App\Models\Resultado;

use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function index(){
        return view('maestro.maestro');
    }

    public function show(){
        $examenes = Examene::all();
        return view('maestro.examenes', compact('examenes'));
    }

    public function destroy(Examene $examen){
        
        $examen->delete();

        return redirect()->route('maestro.examenes');
    }

    public function crearExamen(){
        return view('maestro.crearExamen');
        
    }

    public function guardarExamen(Request $request){
        
        $examen = new Examene();
        $examen->id = $request -> idExamen;
        $examen->nombreExamen = $request->title;
        $examen->idMaestro = auth()->user()->id;
        $examen->save();

        return view('maestro.crearPregunta', compact('request'));
    }

    public function resultados(){
        
        $resultados = Resultado::all();
        $examenes = Examene::all();
        $usuarios = User::all();

        return view('maestro.resultados', compact('resultados', 'examenes', 'usuarios'));
    }

    public function guardarPregunta(Request $request){

        $pregunta = new Pregunta();
        $pregunta->tituloRespuesta = $request -> pregunta;
        $pregunta->idExamen = $request -> idExamen;
        $pregunta->save();

        #Guardado de la respuesta 1
        $respuesta = new Respuesta();
        $respuesta->tituloRespuesta = $request -> opcion1;
        if($request -> opcion1 === $request -> correcta){
            $respuesta->validacion = 1;
        }else{
            $respuesta->validacion = 0;
        }
        $respuesta->idPregunta = $pregunta->id;
        
        $respuesta->save();
        #Guardado de la respuesta 2
        $respuesta2 = new Respuesta();
        $respuesta2->tituloRespuesta = $request -> opcion2;
        if($request -> opcion2 === $request -> correcta){
            $respuesta2->validacion = 1;
        }else{
            $respuesta2->validacion = 0;
        }
        $respuesta2->idPregunta = $pregunta->id;
        
        $respuesta2->save();
        #Guardado de la respuesta 1
        $respuesta3 = new Respuesta();
        $respuesta3->tituloRespuesta = $request -> opcion3;
        if($request -> opcion3 === $request -> correcta){
            $respuesta3->validacion = 1;
        }else{
            $respuesta3->validacion = 0;
        }
        $respuesta3->idPregunta = $pregunta->id;
        
        $respuesta3->save();

        return view('maestro.crearPregunta', compact('request'));

    }
}
