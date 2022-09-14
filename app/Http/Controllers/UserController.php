<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT * FROM usuarios";
        $data = DB::select($sql);
        return $data;
    }


    public function ObtenerUsuarioPorId(Request $request, $id)
    {   
        $sql = 'SELECT * FROM miproyecto.publicaciones';
        $url = $request->fullUrl();
        $user = usuario::findOrFail($id);
        $query = $request->query($sql);
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $usuario = new Usuario;

        $validator = Validator::make($request->all(),[
            'correo' =>'required|string',
            'contrasena' => 'required|string',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'nickname' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(),400);
        };

        $usuario->correo = $request->correo;
        $usuario->contrasena = bcrypt($request->contrasena);
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->nickname = $request->nickname;
        $usuario->save();

        $mensaje = 'Los datos han sido guardados';

        return response()->json(compact('mensaje'),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function show($id)
    {
        $query = Usuario::where('idusuario',$id)->get();
        return response()->json(compact('query'),201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuarioActualizado = Usuario::Find($id);

        $request->validate([
            'nickname'=>'required|string'
        ]);

        $usuarioActualizado->nickname = $request->nickname;
        $usuarioActualizado->save();

        return Usuario::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = 'El usuario ha sido Eliminado';

        $usuarioElimando = Usuario::findOrFail($id);
        $usuarioElimando->delete();

        return $mensaje;
    }
}
