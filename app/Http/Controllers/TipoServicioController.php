<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Servicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    public function index()
    {
       $tipo_servicios= Tipo_Servicio::all()->where('activo','=',1);
       return view('servicio_tipo/index',compact('tipo_servicios'));
    }


    public function create()
    {
        return view('servicio_tipo/create');
    }

    public function eliminados()
    {
        $tipo_servicios= Tipo_Servicio::all()->where('activo','=',0);
        return view('servicio_tipo/eliminados',compact('tipo_servicios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'descripcion'=>'required'   
        ]);
        $tipo_servicio = new Tipo_Servicio();
        $tipo_servicio->nombre = $request->nombre;
        $tipo_servicio->descripcion = $request->descripcion;
        $tipo_servicio->save();

        return redirect(route('tipo_servicio.index'));
    }


    public function show(Tipo_Servicio $tipo_servicio)
    {
        //
    }


    public function edit(Tipo_Servicio $tipo_servicio)
    {
       
        return view('servicio_tipo/editar',compact('tipo_servicio'));
    }


    public function update(Request $request, Tipo_Servicio $tipo_servicio)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'descripcion'=>'required'   
        ]);

        $tipo_servicio->nombre= $request->nombre;
        $tipo_servicio->descripcion= $request->descripcion;
        $tipo_servicio->update();
        
        return redirect(route('tipo_servicio.index'));
    }


    public function destroy(Tipo_Servicio $tipo_servicio)
    {
        $tipo_servicio->activo=0;
        $tipo_servicio->update();
        return redirect(route('tipo_servicio.index'));
    }

    public function restaurar(Tipo_Servicio $tipo_servicio)
    {
        $tipo_servicio->activo=1;
        $tipo_servicio->update();
        return redirect(route('tipo_servicio.index'));
    }
}
