<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use DateTime;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
       $consultas= Consulta::all()->where('activo','=',1);
       return view('consulta/index',compact('consultas'));
    }


    public function create()
    {
        return view('consulta/create');
    }

    public function eliminados()
    {
        $consultas= Consulta::all()->where('activo','=',0);
        return view('consulta/eliminados',compact('tipo_servicios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'precio'=>'required',
            'descripcion'=>'required'   
        ]);

        $consulta = new Consulta();
        $consulta->precio = $request->precio;
        $consulta->descripcion = $request->descripcion;
        $consulta->fecha = date('y-n-d h:i:s ');
        $consulta->save();

        return redirect(route('consulta.index'));
    }


    public function show(Consulta $consulta)
    {
        //
    }


    public function edit(Consulta $consulta)
    {
       
        return view('consulta/editar',compact('tipo_servicio'));
    }


    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'nombre'=>'required|max:40',
            'descripcion'=>'required'   
        ]);

        $consulta->nombre= $request->nombre;
        $consulta->descripcion= $request->descripcion;
        $consulta->update();
        
        return redirect(route('consulta.index'));
    }


    public function destroy(Consulta $consulta)
    {
        $consulta->activo=0;
        $consulta->update();
        return redirect(route('consulta.index'));
    }

    public function restaurar(Consulta $consulta)
    {
        $consulta->activo=1;
        $consulta->update();
        return redirect(route('consulta.index'));
    }
}
