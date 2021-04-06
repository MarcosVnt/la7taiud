<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Carta;
use App\Familia;
use Illuminate\Http\Request;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        //
        //$establecimiento = Establecimientos::where('user_id', auth()->user()->id )->latest()->simplePaginate(3);
    $establecimiento= "";
        return view('establecimientos.profile',compact('establecimiento'));
    }
  
     public function index()
    {
        //
        //$establecimiento = Establecimientos::where('user_id', auth()->user()->id )->latest()->simplePaginate(3);
    $establecimiento= "";
        return view('establecimientos.index',compact('establecimiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('establecimientos.index',compact('establecimiento'));

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        //
      // dd($request,$establecimiento);

       /*   $data = $request->validate([
            'nombre_comercial' => 'required|min:8',
            'cif' => 'required',
            
        ]);

        dd($data); */

  //      dd($request['estad0'],$request['estado']['id'],$request['cif']);
  
        $establecimiento->nombre_comercial = $request['estado']['nombre_comercial'];
        $establecimiento->cif = $request['estado']['cif'];
      

        $establecimiento->save();

        return ['establecimiento' => $establecimiento];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }

    public function cartas(Request $request, Establecimiento $establecimiento)
    {
    // dd($establecimiento);
     
        $cartas = $establecimiento->cartas;

       //dd($cartas);

        return ['cartas' => $cartas];
    }

    public function cartafamilias(Request $request, Carta $carta)
    {
    // dd($establecimiento);
     
        $familias = $carta->familias;
        $resultado = collect();
        
        //dd($familias->plato;
        foreach ($familias as $familia) {



            $platos = $familia->platos()->orderBy('nombre')->get();

            $resultado = $resultado->concat($platos);

          


           /*  foreach ($familia->platos as $plato) {

                dd($plato,$plato->pivot,$plato->pivot->familia_id);

            } */
            //
            
           
        }

      //  dd($familias,$platos,$resultado);
      //dd($resultado);

        return ['familias' => $familias, 'platos' => $resultado];
    }

    public function familiaplatos(Request $request, Familia $familia)
    {
    // dd($establecimiento);
     
        $platos = $familia->platos;

      // dd($familias);

        return ['platos' => $platos];
    }



}
