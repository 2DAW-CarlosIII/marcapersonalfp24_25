<?php

namespace App\Http\Controllers;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;

class ReconocimientoController extends Controller
{
    public function getIndex()
    {
        $arrayReconocimientos = Reconocimiento::all();
        return view('reconocimientos.index')
            ->with('reconocimientos', $arrayReconocimientos);
    }

    public function getShow($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
            return view('reconocimientos.show')
                ->with('reconocimiento', $reconocimiento)
                ->with('id', $id);
    }

    public function getCreate()
    {
        return view('reconocimientos.create');
    }

    public function getEdit($id)
    {
        $reconocimiento = Reconocimiento::findOrFail($id);
            return view('reconocimientos.edit')
                ->with('reconocimiento', $reconocimiento)
                ->with('id', $id);
    }



}
