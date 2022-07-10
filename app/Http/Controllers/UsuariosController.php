<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');

    }  

    public function MisDatos()
    {
        //

        return view('modulos.Mis-datos');
    }

    public function DatosUpdate(Request $request)
    {

        if(auth()->user()->email != request('email')){

            if(isset($datos['passwordN'])){

                $datos = request()->validate([
 
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users'],
                    'passwordN'=>['required','string','min:3']
     
                ]);
     
                
            }else{

                $datos = request()->validate([
 
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users']
     
                ]);

            }

        }else{

            if(isset($datos['passwordN'])){

                $datos = request()->validate([
 
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email'],
                    'passwordN'=>['required','string','min:3']
     
                ]);
     
                
            }else{

                $datos = request()->validate([
 
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email']
     
                ]);

            }

        }

        if(request('documento')){
            $documento = $request['documento'];
        }else{
            $documento = auth()->user()->documento;


        }

        if(request('fotoPerfil')){
 
            Storage::delete('public/'.auth()->user()->foto);
     
            $rutaImg = $request['fotoPerfil']->store('Usuarios/'.$datos["name"], 'public');
     
           }else{
     
            $rutaImg = auth()->user()->foto;
     
           }
     



           if(isset($datos["passwordN"])){


 
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos["name"],
            'email'=>$datos["email"], 'documento'=>$documento, 'foto'=>$rutaImg, 'password'=>
            Hash::make($datos["passwordN"])]);
     
           }else{
     
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos["name"],
            'email'=>$datos["email"], 'documento'=>$documento, 'foto'=>$rutaImg]);
     
           }
     
           return redirect('Mis-datos');





        /*
        if(auth()->user()->email != request('email')){
 
          if(isset($datos['passwordN'])){
 
            $datos = request()->validate([
 
                'name'=>['required','string','max:255'],
                'email'=>['required','email','unique:users'],
                'passwordN'=>['required','string','min:3']
 
            ]);
 
          }else{
 
            $datos = request()->validate([
 
                'name'=>['required','string','max:255'],
                'email'=>['required','email','unique:users']
 
            ]);
 
          }
            
        }else{
 
            if(isset($datos['passwordN'])){
 
                $datos = request()->validate([
    
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email'],
                    'passwordN'=>['required','string','min:3']
    
                ]);
    
              }else{
    
                $datos = request()->validate([
    
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users']
    
                ]);
    
              }
 
        }
 
 
       if(request('documento')){
 
            $documento = $request['documento'];
 
       }else{
 
            $documento = auth()->user()->documento;
 
       } 
 
 
       if(request('fotoPerfil')){
 
        Storage::delete('public/'.auth()->foto);
 
        $rutaImg = $request['fotoPerfil']->store('Usuarios/'.$datos["name"], 'public');
 
       }else{
 
        $rutaImg = auth()->user()->foto;
 
       }
 

       echo '<pre>';
       $pepa = 'oedkoekdde';
       echo $pepa;
       echo '</pre>';
 
       if(isset($datos["passwordN"])){


 
        DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos["name"],
        'email'=>$datos["email"], 'documento'=>$documento, 'foto'=>$rutaImg, 'password'=>
        Hash::make($datos["passwordN"])]);
 
       }else{
 
        DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos["name"],
        'email'=>$datos["email"], 'documento'=>$documento, 'foto'=>$rutaImg]);
 
       }
 
       return redirect('Mis-datos');
           */
    }

    public function index()
    {
        //

        if(auth()->user()->rol != 'administrador' ){
            return redirect('Inicio');
        }
        $usuarios = Usuarios::all();

        return view('modulos.Usuarios')->with('usuarios',$usuarios);
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
        $datos = request()->validate([
            'name' => ['string','max:255'],
            'rol' => ['required'],
            'email' => ['string','unique:users'],
            'password' => ['string','min:3']
        ]);

        Usuarios::create([
            'name' => $datos["name"],
            'email' => $datos["email"],
            'rol' => $datos["rol"],
            'password' => Hash::make($datos["password"]),
            'documento' => '',
            'foto' => ''
        ]);

        return redirect('Usuarios')->with('UsuarioCreado','OK');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $id)
    {
        //

        if(auth()->user()->rol != 'administrador'){
            return redirect('Inicio');
        }
        $usuarios = Usuarios::all();

        $usuario = Usuarios::find($id->id);


        return view('modulos.Usuarios',compact('usuarios','usuario'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $usuario = Usuarios::find($id);


        if($usuario->email != request("email")){
                $datos = request()->validate([
                    'name'=>['required'],
                    'rol'=>['required'],
                    'email'=> ['required','email','unique:users']
                ]);


        }else{

            $datos = request()->validate([
                'name'=>['required'],
                'rol'=>['required'],
                'email'=> ['required','email']
            ]);

        }

        if($usuario['password'] != request('password')){
            $clave = request('password');
        }else{
            $clave = $usuario['password'];
        }
        DB::table('users')->where('id',$usuario['id'])->update((['name'=>$datos['name'],'email'=>$datos['email'],'rol'=>$datos['rol'],'password'=>Hash::make($clave)]));
        return redirect('Usuarios')->with('UsuarioActualizado','OK');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $usuario = Usuarios::find($id);
        $exp = explode("/",$usuario->foto);

        if(Storage::delete('public/'.$usuario->foto)){
            Storage::deleteDirectory('public/'.$exp[0].'/'.$exp[1]);


        }
        Usuarios::destroy($id);

        return redirect('Usuarios');

    }
}
