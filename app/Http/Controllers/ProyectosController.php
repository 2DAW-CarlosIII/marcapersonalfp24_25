<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectosController extends Controller
{
    public function getIndex()
    {
        $arrayProyectos = Proyecto::all();
        return view('proyectos.index')
            ->with('proyectos', $arrayProyectos);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

}
