<?php

namespace App\Http\Controllers;

use App\Tamano;
use App\Seccion;
use App\Publicidad;
use App\EstablecimientoTipo;
use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $publicidads = auth()->user()->vacantes;

        $publicidads = Publicidad::where('user_id', auth()->user()->id )->latest()->simplePaginate(3);
//dd($publicidads);
        return view('publicidads.index',compact('publicidads'));
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

        
        return view('publicidads.create')
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
        return view('publicidads.show')->with('publicidad', $publicidad);

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


        $establecimiento_tipos = EstablecimientoTipo::all();
        $seccions = Seccion::all();
        $tamanos = Tamano::all();


        
        return view('publicidads.edit')
                ->with('establecimiento_tipos',$establecimiento_tipos)
                ->with('seccions',$seccions)
                ->with('tamanos',$tamanos)
                ->with('publicidad',$publicidad);
                
       // return 'editar Publiciadd'.$publicidad;
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
    public function destroy(Publicidad $publicidad, Request $request)
    {
        //
        //dd($publicidad,$request);
        //return response()->json($request);
        $publicidad->delete();
        return response()->json(['mensaje' => 'Se eliminó la Publicidad ' . $publicidad->titulo]);




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

    public function estado(Request $request, Publicidad $publicidad)
    {
        // Leer nuevo estado y asignarlo
        $publicidad->activa = $request->estado;

        // guardarlo en la BD
        $publicidad->save();

        return response()->json(['respuesta' => 'Correcto']);
    }


    public function mostrar(Request $request)
    {
        // $publicidads = auth()->user()->vacantes;
       // dd($request);
       

        //$publicidads = Publicidad::where('seccion_id', $request->seccions )->where('establecimiento_tipo_id',$request->tipos)->get();
       // $publicidads = Publicidad::first();

        $publicidads = Publicidad::inRandomOrder()->first();

        return response()->json(['publicidads' => $publicidads]);
        
        //return view('publicidads.index',compact('publicidads'));
    }




}
