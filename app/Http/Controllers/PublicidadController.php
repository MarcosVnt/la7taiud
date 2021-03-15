<?php

namespace App\Http\Controllers;

use App\Publicidad;
use App\EstablecimientoTipo;
use App\Seccion;
use App\Tamano;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('publicidad.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $establecimiento_tipos = EstablecimientoTipo::all();
        $seccions = Seccion::all();
        $tamanos = Tamano::all();

        
        return view('publicidad.create')
                ->with('establecimiento_tipos',$establecimiento_tipos)
                ->with('seccions',$seccions)
                ->with('tamanos',$tamanos);


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
        $data = $request->validate([
           
                'descripcion' => 'required|min:8',
                'establecimiento_tipo' => 'required',
                'seccion' => 'required',
                'tamano' => 'required',
                'imagen' => 'required'
                
        

        ]);

        auth()->user()->publicidads()->create([
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'seccion_id' => $data['seccion'],
            'tamano_id' => $data['tamano'],
            'establecimiento_tipo_id' => $data['establecimiento_tipo'],


        ]);

            return redirect()->action('PublicidadController@index');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function show(Publicidad $publicidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicidad $publicidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicidad $publicidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicidad $publicidad)
    {
        //
    }


    public function imagen(Request $request)
    {
        //
        //return $request->all();
        //"subiendo imagen";
            $imagen = $request->file('file');
            $nombreImagen = time() . '.' . $imagen->extension();
            $imagen->move(public_path('storage/publicidad'), $nombreImagen );
            return response()->json(['correcto' => $nombreImagen]);
    
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()) {
            $imagen = $request->get('imagen');
   
            if( File::exists( 'storage/publicidad/' . $imagen ) ) {
                File::delete( 'storage/publicidad/' . $imagen );
            }
   
            return response('Imagen Eliminada', 200);
        }
    }
   

}
