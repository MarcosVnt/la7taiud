<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Plato;
use App\Carta;
use App\Familia;
use App\Publicidad;
use App\User;

use Illuminate\Http\Request;
use Image;
//use Illuminate\Http\File;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;


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

        $establecimiento->nombre_fiscal = $request['estado']['nombre_fiscal'];
        $establecimiento->direccion = $request['estado']['direccion'];
        $establecimiento->codigo_postal = $request['estado']['codigo_postal'];
        $establecimiento->poblacion = $request['estado']['poblacion'];
        $establecimiento->provincia = $request['estado']['provincia'];

        $establecimiento->telefono = $request['estado']['telefono'];
        $establecimiento->movil = $request['estado']['movil'];
        $establecimiento->email = $request['estado']['email'];
        $establecimiento->web = $request['estado']['web'];
        $establecimiento->contacto = $request['estado']['contacto'];
        $establecimiento->observaciones = $request['estado']['observaciones'];
        




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
     
        //$familias = $carta->familias;
        $familias = $carta->familias()->orderBy('orden')->get();

        $resultado = collect();
        $alergenosR = collect();
        $platoAlergenos= collect();
        $alergenos = [];
        $platos =[];
        
        //dd($familias->plato;
        foreach ($familias as $familia) {



            $platos = $familia->platos()->orderBy('nombre')->get();
            

            $resultado = $resultado->concat($platos);
           // dd($platos);

            foreach ($platos as $plato) {
                /*  echo $plato;
                 echo '.-----------------------------';
                 echo $plato->alergenos()->get();
                 */ 
                 
                 $alergenos = $plato->alergenos()->get();

                $plato['alergenos'] =  $plato->alergenos()->pluck('nombre');
                //$platoAlergenos->concat($plato);
                //$platoAlergenos = $platoAlergenos->concat($alergenos);
                
              //  dd($plato, $alergenos);
     
                $alergenosR = $alergenosR->concat($alergenos);

               // $resultado = $resultado->concat($alergenos);

                
     
             } 

            
            
           
        }


        $publicidads = Publicidad::inRandomOrder()->limit(3)->get();

       

      //  dd($familias,$platos,$resultado);
      //dd($resultado);

        return ['familias' => $familias,
         'platos' => $resultado, 
         'alergenos' => $alergenosR,
         'alergenos2' => $alergenos,
         'platos2' => $platos,
         'platoAlergenos' => $platoAlergenos,
         'publicidads' => $publicidads,
         
    ];
    }

    public function familiaplatos(Request $request, Familia $familia)
    {
    // dd($establecimiento);
     
        $platos = $familia->platos;

      // dd($familias);

        return ['platos' => $platos];
    }


    public function mostrar(Establecimiento $establecimiento)
    {
        //
      //  echo url("/posts/{$post->id}");
      $publicidad = Publicidad::all();

      return view('front.establecimiento.index',compact('establecimiento','publicidad'));

//dd($establecimiento);



    }





    public function altafotoOriginal(Request $request, Establecimiento $establecimiento)
    {
     

        $estable= $request->establecimientoCodigo;
            $imagen = $request->file('file');
            $nombreImagen = time() . '.' . $imagen->extension();
            $imagen->move(public_path('storage/establecimiento/'.$estable), $nombreImagen );

            if ($imagen){
                $establecimiento = Establecimiento::where('id','=',$estable)->first();
                $establecimiento->imagen = $nombreImagen;
              

                $establecimiento->save();
            }


            return $nombreImagen;
    
    }


    public function altafoto(Request $request, Establecimiento $establecimiento)
    {
     //comprimiendo 
     $this->validate($request, [
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
    ]);

        $estable= $request->establecimientoCodigo;



            $image = $request->file('file');
            $nombreImagen = time() . '.' . $image->extension();

            $destinationPath = public_path('/storage/establecimiento/');
            $destinationPath2 =  public_path('/storage/establecimiento/'.$estable);

            if (!file_exists($destinationPath2)) {
                //mkdir($destinationPath2, 666, true);
                mkdir($destinationPath2, 0777, true);
            }



           $img = Image::make($image->getRealPath());

          //  $destinationPath2 =  public_path('`\storage\establecimiento\`'.$estable);
         
         
         //   dd($img,$image,$image->getRealPath(),$destinationPath,$destinationPath2);
           
            $img->resize(3400, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->orientate(); 
            

          //  $img->resize(800, 800)->save($destinationPath2.'/'.$nombreImagen);
            
 
           /*   $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
               $constraint->upsize();
            });  */
          //  $img->rotate(-45);

           // dd($img,$image);
            
            $img->save($destinationPath2.'/'.$nombreImagen);

           //  dd($img,$image);

         //   $img->save($destinationPath2.'/'.$nombreImagen); 



         //  $image->move($destinationPath2, $nombreImagen);
        
            if ($image){
                $establecimiento = Establecimiento::where('id','=',$estable)->first();
                $establecimiento->imagen = $nombreImagen;
              

                $establecimiento->save();
            }

            /* if( File::exists( 'storage/establecimiento/'.$estable.'/'. $nombreImagen ) ) {
                File::delete( 'storage/establecimiento/'.$estable.'/'. $nombreImagen );
            }
 */
            return $nombreImagen;
    
    }

    public function borrarimagen(Request $request)
    {


        if($request->ajax()) {
        
            $imagen = $request->get('imagen');
            $establecimiento= $request->establecimientoCodigo;
   
   
            if( File::exists( 'storage/establecimiento/'.$establecimiento.'/'. $imagen ) ) {
                File::delete( 'storage/establecimiento/'.$establecimiento.'/'. $imagen );
            }
   
            return response('Imagen Eliminada', 200);
        }
    }



    public function altafotoplato(Request $request, Plato $plato)
    {
     $this->validate($request, [
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
        ]);

        if(Auth::check() ){

            $user = User::find(Auth::user()->id);
            $estable = $user->establecimiento->id;
        }else{
            return ['file'=> 'debe registrarse para subir platos '];
        }

        $plato= $request;
      //  dd($plato,$user, $estable);


            $image = $request->file('file');
            $nombreImagen = time() . '.' . $image->extension();

            $destinationPath = public_path('/storage/establecimiento/');
            $destinationPath2 =  public_path('/storage/establecimiento/'.$estable);

           /* $destinationPath2 =  public_path('/storage/establecimiento/'.$estable.'/platos/');*/

             if (!file_exists($destinationPath2)) {
                mkdir($destinationPath2, 0777, true);
            }
 

           $img = Image::make($image->getRealPath());

           
            $img->resize(3400, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->orientate(); 
            

            
            $img->save($destinationPath2.'/'.$nombreImagen);

        
           /* PRIMERO GUARDAR PLATO ...   
           if ($image){
                $plato = Plato::where('id','=',$estable)->first();
                $plato->imagen = $nombreImagen;
              

                $plato->save();
            } */

       
            return $nombreImagen;
    
    }



    public function pdfqr(Request $request) {



        if(Auth::check() ){

            $user = User::find(Auth::user()->id);
            $estable = $user->establecimiento->id;

            $establecimiento = Establecimiento::where('id','=',$estable)->first();
        }else{
            return ['error'=> 'debe registrarse para subir platos '];

        }



        $publicidads = Publicidad::inRandomOrder()->limit(2)->get();



$qr =$request->qr;


if($establecimiento->imagen===null){
    
 $img = 'img/Vile_m.JPG';

}else{
 $img = 'storage/establecimiento/'.$establecimiento->id.'/'.$establecimiento->imagen;
}
    

//dd($img);

 
$qrcode = base64_encode(\QrCode::format('svg')->size(200)->errorCorrection('H')->generate($qr));

//return view('pdf.pdfqr',compact('qrcode','publicidads','establecimiento','img'));

$pdf = \PDF::loadView('pdf.pdfqr', compact('qrcode','publicidads','establecimiento','img'));

  return $pdf->download('pdfqr.pdf');
          
   //return $pdf->stream();









//dd($request,$qr);


return view('pdf.pdfqr',['qr' => $qr]);


//$html = '<img src="' . $qr . '">';



            $pdf = \PDF::loadView('pdf.pdfqr',
        ['qr'=>$qr]
        
        );
        
          //  dd($pdf);
         // $pdf->loadHTML($html);
         
         

         return $pdf->download('pdfqr.pdf');
          
        

        /*   $pdf = \PDF::loadView('pdf.pdfqr',['qr'=>$cabecera,
          'articulos'=>$articulos, 
          'muestroTotal'=>$muestroTotal,
          'componentes'=>$componentes,
          'base'=>$base,
          'total_iva'=>$total_iva,
          'total_iva_incluido'=>$total_iva_incluido] 
          
          
       
       );*/
       $pdf->save('pdf/'.$name);




    }



}
