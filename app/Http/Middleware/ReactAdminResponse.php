<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Termwind\parse;

class ReactAdminResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->merge(['perPage' => 10]);
        if ($request->filled('_start')) {
            if ($request->filled('_end')) {
                $request->merge(['perPage' => 1 + $request->_end - $request->_start]);
            }
            $request->merge(['page' => intval($request->_start / $request->perPage) + 1]);
        }
        $response = $next($request);
        if ($request->routeIs('*.index')) {

            //abort_unless(property_exists($request->route()->controller, 'modelclass'), 500, "It must exists a modelclass property in the controller.");
           // $response->header('X-Total-Count', $modelClassName::count());
        }
        try {
            /*if (is_callable([$response, 'getData'])) {
                $responseData = $response->getData();
                if (isset($responseData->data)) {
                    $response->setData($responseData->data);
                }
            }*/
            $modelClassName = $request->route()->controller->modelclass;

            $sort = $request->_sort;
            $order = $request->_order;
            $q = $request->q;
            $start = $request->_start;
            $end = $request->_end;
            $query = $modelClassName::query();
            $fillable = $modelClassName::getFillable();

            if($q){
                $query->orWhere(function($query) use ($fillable, $q){
                    foreach ($fillable as $key) {
                        $query->orWhere($key, 'like', "%$q%");
                    }
                    return $query;
                });
            }

            if($order && $sort){
                $query->orderBy($sort, $order);
            }
            if($start){
                $query->skip($start);
            }
            if($end){
                $query->take($end - $start);
            }
        } catch (\Throwable $th) {
        }
        return $response;
    }
}
