<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersCiclosResource;
use App\Models\UsersCiclos;
use Illuminate\Http\Request;

class UsersCiclosController extends Controller
{
    public $modelclass = UsersCiclos::class;
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query =
            $request->attributes->has('queryWithParameters') ?
            $request->attributes->get('queryWithParameters') :
            UsersCiclos::query();
        return UsersCiclosResource::collection($query->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usersCiclos = json_decode($request->getContent(), true);

        $usersCiclos = UsersCiclos::create($usersCiclos);

        return new UsersCiclosResource($usersCiclos);
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersCiclos $usersCiclos)
    {
        return new UsersCiclosResource($usersCiclos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersCiclos $usersCiclos)
    {
        $userCicloData = json_decode($request->getContent(), true);
        $usersCiclos->update($userCicloData);

        return new UsersCiclosResource($usersCiclos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersCiclos $usersCiclos)
    {
        try {
            $usersCiclos->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()], 400);
        }
    }
}
