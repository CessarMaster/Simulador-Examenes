<?php

namespace App\Http\Controllers;
use App\Models\Examene;
use App\Models\User;
use App\Models\Respuesta;
use App\Models\Pregunta;
use App\Models\Resultado;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(){
        return view('alumno.alumno');
    }

    public function show(){
        $examenes = Examene::all();
        $usuarios = User::all();
        return view('alumno.examenes', compact('examenes'), compact('usuarios'));
    }

    public function verExamen(Examene $examen){
        $preguntas = Pregunta::all();
        $respuestas = Respuesta::all();
        return view('alumno.examen', compact('preguntas', 'respuestas', 'examen'));
    }

    public function resultados(){
        
        $resultados = Resultado::all();
        $examenes = Examene::all();
        $usuarios = User::all();

        return view('alumno.resultados', compact('resultados', 'examenes', 'usuarios'));
    }

    public function examenTerminado(Request $request){
        $preguntas = Pregunta::all();
        $respuestas = Respuesta::all();
        $cont=0;
        $acertadas=0;
        $preguntasDelExamne = 0;

        foreach ($preguntas as $pregunta) {
            if($pregunta->idExamen == $request->idExamen){
                $preguntasDelExamne = $preguntasDelExamne + 1;
            }
        }

        foreach ($respuestas as $respuesta) {
            $cont = $cont + 1;
            if($respuesta->validacion === 1){
                if($request->$cont){
                    $acertadas = $acertadas + 1;
                }
            }
        }

        $resultado = new Resultado();
        $resultado->idExamen = $request -> idExamen;
        $resultado->idUsuario = auth()->user()->id;
        $resultado->calificacion = ((100/$preguntasDelExamne)*$acertadas);

        $resultado->save();

        $resultados = Resultado::all();
        $examenes = Examene::all();
        $usuarios = User::all();

        return view('alumno.resultados', compact('resultados', 'examenes', 'usuarios'));
    }
}
