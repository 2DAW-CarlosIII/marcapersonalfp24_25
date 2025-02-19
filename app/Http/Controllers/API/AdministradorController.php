<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministradorResource;
use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index(Request $request)
    {
        return AdministradorResource::collection(
            Administrador::orderBy($request->_sort, $request->_order)
            ->paginate($request->perPage)
        );
    }

    public function store(Request $request)
    {
        $administrador = json_decode($request->getContent(), true);
        $administrador = Administrador::create($administrador);
        return new AdministradorResource($administrador);
    }

    public function show(Administrador $administrador)
    {
        return new AdministradorResource($administrador);
    }

    public function update(Request $request, Administrador $administrador)
    {
        $administrador = json_decode($request->getContent(), true);
        $administrador->update($administrador);
        return new AdministradorResource($administrador);
    }

    public function destroy(Administrador $administrador)
    {
        try {
            $administrador->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se puede eliminar el administrador'], 400);
        }
    }
}
