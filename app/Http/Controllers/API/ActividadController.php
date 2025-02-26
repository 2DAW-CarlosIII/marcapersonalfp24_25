<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActividadResource;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ActividadController extends Controller
{
    public $modelclass = Actividad::class;

    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ActividadResource::collection(
            Actividad::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Actividad::class);

        $actividad = json_decode($request->getContent(), true);

        $actividad = Actividad::create($actividad);

        return new ActividadResource($actividad);

    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        return new ActividadResource($actividad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividad $actividad)
    {
        Gate::authorize('update', $actividad);

        $actividad = json_decode($request->getContent(), true);

        $actividad->update($actividad);

        return new ActividadResource($actividad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividad)
    {
        try {
            Gate::authorize('delete', $actividad);
            $actividad->delete();
            return response()->json([
                'message' => 'Actividad eliminada correctamente'
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar la actividad'
            ], 500);
        }
    }
}
