<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Tipo_Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
   
    public function index()
    {
     
       $servicios=Servicio::select(
        'servicios.*',
        'tipo__servicios.nombre as nombre_tipo',
        )  
        ->join('tipo__servicios','tipo__servicios.id','=','servicios.id_tipo_servicio')
        ->where('servicios.activo','=',1)
        ->get();

        return view('servicio/index',compact('servicios'));
    }


    public function create()
    {
        $tipos=Tipo_Servicio::all();
        return view('servicio/create',compact('tipos'));
    }

    public function eliminados()
    {
        $servicios=Servicio::select(
            'servicios.*',
            'tipo__servicios.nombre as nombre_tipo',
            )  
            ->join('tipo__servicios','tipo__servicios.id','=','servicios.id_tipo_servicio')
            ->where('servicios.activo','=',0)
            ->get();
        return view('servicio/eliminados',compact('servicios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'precio'=>'required',
            'id_tipo_servicio' => 'required'  
        ]);
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->id_tipo_servicio = $request->id_tipo_servicio;
        $servicio->save();

        return redirect(route('servicio.index'));
    }


    public function show(Servicio $servicio)
    {
        //
    }


    public function edit(Servicio $servicio)
    {
        $tipos=Tipo_Servicio::all();
        return view('servicio/editar',compact('servicio','tipos'));
    }


    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'precio'=>'required'   
        ]);

        $servicio->nombre= $request->nombre;
        $servicio->precio= $request->precio;
        $servicio->update();

        return redirect(route('servicio.index'));
    }


    public function destroy(Servicio $servicio)
    {
        $servicio->activo=0;
        $servicio->update();
        return redirect(route('servicio.index'));
    }

    public function restaurar(Servicio $servicio)
    {
        $servicio->activo=1;
        $servicio->update();
        return redirect(route('servicio.index'));
    }
}
