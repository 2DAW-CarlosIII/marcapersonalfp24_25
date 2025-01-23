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
        if ($request->filled('_sort')) {
            $request->merge(['sortBy' => $request->_sort]);
        }
        if ($request->filled('_order')) {
            $request->merge(['sortOrder' => $request->_order]);
        }
        $response = $next($request);
        if ($request->routeIs('*.index')) {
            abort_unless(property_exists($request->route()->controller, 'modelclass'), 500, "It must exists a modelclass property in the controller.");
            $modelClassName = $request->route()->controller->modelclass;
            $query = $modelClassName::query();
            $filterValue = $request->q;
            if ($filterValue) {
                $filterColumns = $request->route()->controller->filterColumns;
                foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
                }
            }
            $query->orderBy($request->sortBy ?? 'id', $request->sortOrder ?? 'asc');
            $response->setData($query->paginate($request->perPage));
            $response->header('X-Total-Count', $modelClassName::count());
        }
        try {
            if (is_callable([$response, 'getData'])) {
                $responseData = $response->getData();
                if (isset($responseData->data)) {
                    $response->setData($responseData->data);
                }
            }
        } catch (\Throwable $th) {
        }
        return $response;
    }
}
