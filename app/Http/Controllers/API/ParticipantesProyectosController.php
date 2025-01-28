<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ParticipantesProyecto;
use App\Http\Resources\ParticipantesProyectoResource;
use Illuminate\Http\Request;

class ParticipantesProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ParticipantesProyectoResource::collection(
            ParticipantesProyecto::orderBy($request->_sort, $request->_order)
            ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pp = json_decode($request->getContent(),true);

        $pp = ParticipantesProyecto::create($pp);

        return new ParticipantesProyectoResource(($pp));
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipantesProyecto $pp)
    {
        return new ParticipantesProyectoResource($pp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipantesProyecto $pp)
    {
        $ppData = json_decode($request->getContent(), true);
        $pp->update($ppData);

        return new ParticipantesProyectoResource($pp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipantesProyecto $pp)
    {
        try {
            $pp->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
