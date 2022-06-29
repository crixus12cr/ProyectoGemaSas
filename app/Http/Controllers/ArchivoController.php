<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function txt(Request $request)
    {
        $files = $request->file('file');
        $nombre = $files->getClientOriginalName();

        $files2 = fopen($files, "r") or die("no hay");
        $i=0;
        while ($line = fgets($files2)) {
            //echo($line)."<br>";

                if(!$i = 0){
                    $datos = explode(",", $line);
                
                    $email = !empty($datos[0])  ? ($datos[0]) : '';
                    $nombre = !empty($datos[1])  ? ($datos[1]) : '';
                    $codigo= !empty($datos[2])  ? ($datos[2]) : '';
                
                }
                
                Archivo::create([
                    'email' => $email,
                    'nombre' => $nombre,
                    'codigo' => $codigo
                ]);

                $i++;
        }
         
        return redirect()->route('/welcome'); 


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $archivos = Archivo::where('codigo', 1)->orderByDesc('id')->get();
        $archivos2 = Archivo::where('codigo', 2)->orderByDesc('id')->get();
        $archivos3 = Archivo::where('codigo', 3)->orderByDesc('id')->get();

        return view('/welcome', compact('archivos', 'archivos2', 'archivos3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('archivo.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = $request->validate(
            [
                'email' => 'required',
                'nombre' => 'required',
                'codigo' => 'required'
            ]
        );

        $archivo = Archivo::create($datos);
        return redirect()->route('/welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
        return view('archivo/editar', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
        $datos = $request->validate(
            [
                'email' => 'required',
                'nombre' => 'required',
                'codigo' => 'required'
            ]
        );
        $archivo->update($datos);
        return redirect()->route('/welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
        $archivo->delete();
        return back()->with('succes', 'Usuario Eliminado');
    }
}
