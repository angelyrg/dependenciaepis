<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioStoreRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ComentarioController extends Controller{
    
    public function __construct(){
        $this->middleware(['auth']);
    }


    public function store(ComentarioStoreRequest $request){

        $coment = new Comentario();
        $coment->comentario = $request->comentario;
        $coment->informe_id = $request->informe_id;
        $coment->user_id = Auth::user()->id;
        
        if ( $request->hasFile('archivo') ){
            $file = $request->file('archivo');
            $nombre_archivo = time().$file->getClientOriginalName();
            $file->move(public_path()."/files/informes/", $nombre_archivo);      
            $coment->archivo = $nombre_archivo;      
        }
        $coment->save();

        return back()->with('success', '¡Comentario publicado!');

    }


    public function destroy(Comentario $comentario){ //Falta implementar el front-end de esto
        // if ($comentario->archivo != null){
        //     $file_path = public_path().'/files/informes/'.$comentario->archivo;
        //     File::delete($file_path);
        // }
        // $comentario->delete();

        // return back()->with('success', '¡Comentario eliminado!');

    }
}
