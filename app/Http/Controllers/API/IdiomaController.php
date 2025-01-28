<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Models\Idiomas;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public $modelclass = Idiomas::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return IdiomaResource::collection(
            Idiomas::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage)
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idioma = json_decode($request->getContent(), true);

        $idioma = Idiomas::create($idioma);

        return new IdiomaResource($idioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idiomas $idioma)
    {
        return new IdiomaResource($idioma);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idiomas $idioma)
    {
        $cicloData = json_decode($request->getContent(), true);
        $idioma->update($cicloData);

        return new IdiomaResource($idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idiomas $idioma)
    {
        try {
            $idioma->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
