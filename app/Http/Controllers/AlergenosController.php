<?php

namespace App\Http\Controllers;

use App\Alergeno;
use Illuminate\Http\Request;

class AlergenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $alergenos = Alergeno::all();
        //return ['alergenos', $alergenos]; son iguales ???

          return response()->json(['alergenos' => $alergenos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Alergenos  $alergenos
     * @return \Illuminate\Http\Response
     */
    public function show(Alergenos $alergenos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alergenos  $alergenos
     * @return \Illuminate\Http\Response
     */
    public function edit(Alergenos $alergenos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alergenos  $alergenos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alergenos $alergenos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alergenos  $alergenos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alergenos $alergenos)
    {
        //
    }
}
